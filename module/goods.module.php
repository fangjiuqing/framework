<?php
namespace com\default_www;
use re\rgx as RGX;

class goods_module extends admin_module {

    /**
     * [index_action description]
     * @method index_action
     * @return [type]       [description]
     */
    public function index_action () {
        $this->list_action();
    }

    /**
     * 管理组
     *
     */
    public function list_action () {
        $this->set_pos('cur', '商品列表');
        $condition = [
            'goods_admin_id'    =>    $this->login['admin_id'],
        ];
        $list = RGX\goods_helper::get_list($condition);
        $this->assign('list' , $list['data']);
        $this->assign('pobj', $list['pobj']);
        $this->display('goods/list.tpl');
    }

     /**
     * 新增/修改
     */
    public function add_action () {
        $id = intval($this->get('id'));
        if ( $id ) {
            $condition = [
                'goods_id'    =>    $id
            ];
            $data = RGX\goods_helper::get($condition);
            $this->assign('data' , $data);
        }
        $type_id  = RGX\category_helper::TYPE_GOODS;
        $cat_tree = RGX\category_table::get_tree($type_id, 0, 1);
        $this->assign('cat_tree', $cat_tree);
        $this->display('goods/add.tpl');
    }

    /**
     * 删除
     */
    public function del_action () {

        $this->ajaxout(array(
            'code'  => 1,
            'msg'   => '记录未找到'
        ));
    }

    /**
     * 保存
     */
    public function save_action () {
        $data     = $this->get('data', 'p');

        $goods_id = 0;
        $tab      = RGX\OBJ('goods_table');
        $data['goods_admin_id'] = $this->login['admin_id'];
        if ( $tab->load($data) ) {
            $ret      = $tab->save();

            $goods_id = $ret['row_id'];
        }

        if ( $goods_id ) {
            #事务SQL列表
            $sql     = [];
            $content = $this->get('content' , 'p');

            # 更新商品详情
            $sql[]     = "INSERT INTO goods_detail_table (goods_id,goods_detail) values ('$goods_id', '$content') ON DUPLICATE KEY UPDATE goods_detail = '$content';";

            # 阶梯定价
            $start   = $this->get('start' , 'p');
            $end     = $this->get('end' , 'p');
            $price   = $this->get('price' , 'p');
            if ( (count($start) == count($end)) && (count($end) == count($price)) ) {
                $new_arr = [];
                foreach ( $start as $k => $v ) {
                    $new_arr[$k]['start'] = $v;
                    $new_arr[$k]['end']   = $end[$k];
                    $new_arr[$k]['price'] = $price[$k];
                }
                # 删除旧数据
                $sql[] = "DELETE FROM `goods_price_table` WHERE goods_id = {$goods_id}";

                # 插入新数据
                foreach ( $new_arr as $k => $v ) {
                    $sql[] = " INSERT INTO `goods_price_table` (goods_id,goods_start,goods_end,goods_price) VALUES ({$goods_id},{$v['start']},{$v['end']},{$v['price']}); ";
                }
            }

            # 规格属性
            $specs    = $this->get('specs' , 'p');
            if ( !empty($specs) ) {
                # 删除旧数据
                $sql[] = "DELETE FROM `goods_specs_table` WHERE goods_id = {$goods_id};";

                # 插入新数据
                foreach ($specs as $k => $v ) {
                    $sql[] = "INSERT INTO `goods_specs_table` (goods_id,goods_spec_key,goods_spec_val) VALUES($goods_id,'{$k}' , '{$v}');";
                }
            }

            # 事务执行
            if ( $tab->transaction($sql) ) {
                $this->ajaxout(array(
                    'code'  => 0,
                    'msg'   => '操作成功',
                ));
            }
        }

        $this->ajaxout(array(
            'code'  => 1,
            'msg'   => '失败了',
            'error' => $tab->get_error()
        ));
    }

    /**
     * [获取分类下规格]
     * @return [type] [description]
     */
    public function specs_action () {
        $cid  = intval($this->get('cid'));
        $gid  = intval($this->get('gid'));

        $info = [];

        # 从分类中获取
        if ( $cid ) {
            $data = RGX\OBJ('category_table')->fields('cat_desc')->where('cat_id = ' . $cid)->get();
            if ( !empty($data) ) {
                if ( $data['cat_desc'] ) {
                    $temp = explode('#' , $data['cat_desc']);
                    foreach ( $temp as $v ) {
                        $info[$v] = '';
                    }
                }

                # 如果有商品ID，获取相应属性值
                if ( $gid && !empty($info) ) {
                    $data = RGX\OBJ('goods_specs_table')->where('goods_id = ' . $gid)->get_all();
                    foreach ( $data as $v ) {
                        $info[$v['goods_spec_key']] = $v['goods_spec_val'];
                    }
                }
            }
        }

        if ( !empty($info) ) {
            $this->ajaxout(array(
                'code'  => 0,
                'msg'   => '',
                'data'  => $info
            ));
        }

        $this->ajaxout(array(
            'code'  => 1,
            'msg'   => '获取失败'
        ));
    }

}// Class End