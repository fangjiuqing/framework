<?php
namespace re\rgx;

/**
 * 商品助手类
 * $Id: goods.helper.php fangwei $
 */
class goods_helper extends rgx {
    /**
     * [get_list description]
     * @param  array   $condition [description]
     * @param  integer $page      [description]
     * @param  integer $page_size [description]
     * @return [type]             [description]
     */
    public static function get_list ($condition = [] , $page = 1, $page_size = 12) {
        $tab   = OBJ('goods_table');
        if ( !empty($condition) ) {
            foreach ( $condition as $k => $v ) {
                $tab->where("`$k` = '{$v}'");
            }
        }
        $pager = new page_helper($tab, $page, $page_size);
        $p_tab = OBJ('goods_price_table');
        $s_tab = OBJ('goods_specs_table');

        $tab->map( function($row) use ($p_tab,$s_tab) {
            $row['goods_price'] = $p_tab->where('goods_id = ' . $row['goods_id'])->order('goods_start ASC')->get_all();
            $row['goods_specs'] = $s_tab->where('goods_id = ' . $row['goods_id'])->get_all();
            return $row;
        });

        return [
            'data'    =>    $tab->get_all(),
            'pobj'    =>    $pager->to_array()
        ];
    }

    /**
     * [get description]
     * @param  array  $condition [条件]
     * @return [type]            [description]
     */
    public static function get ( $condition = [] ) {
        $tab   = OBJ('goods_table');
        $tab->left_join('goods_detail_table' , 'goods_table.goods_id' , 'goods_detail_table.goods_id');
        if ( !empty($condition) ) {
            foreach ( $condition as $k => $v ) {
                $tab->where("`goods_table`.`$k` = '{$v}'");
            }
        }
        $data  = $tab->get();

        $p_tab = OBJ('goods_price_table');
        $s_tab = OBJ('goods_specs_table');
        $data['goods_price'] = $p_tab->where('goods_id = ' . $data['goods_id'])->order('goods_start ASC')->get_all();
        $data['goods_specs'] = $s_tab->where('goods_id = ' . $data['goods_id'])->get_all();
        return $data;
    }
} // Class End