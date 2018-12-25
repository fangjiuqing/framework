<?php
namespace com\default_www;
use re\rgx as RGX;

class account_module extends admin_module {
    /**
     * 筛选
     *
     * @var unknown_type
     */
    private $_filter_c = array(
        'nick'          => array('昵称或账号', 'admin_account or admin_nickname'),
        'sdate'         => array('创建日期-开始', 'admin_create_date'),
        'edate'         => array('创建日期-结束', 'admin_create_date'),
        'groups'        => array('权限组别', 'admin_group_id'),
        'lsdate'        => array('最后登录日期-开始', 'admin_lastlogin_date'),
        'ledate'        => array('最后登录日期-结束', 'admin_lastlogin_date')
    );

    /**
     * [index_action description]
     * @method index_action
     * @return [type]       [description]
     */
    public function index_action () {
        $this->list_action();
    }

    /**
     * [list_action description]
     * @method list_action
     * @return [type]      [description]
     */
    public function list_action () {
        $this->set_pos('cur' , '账户管理');
        $tab = RGX\OBJ('admin_table');
    
        //过滤筛选
        $filter = $this->filter($this->_filter_c , ['nick']);

        # 昵称 登录账号
        if ( $filter['nick'] ) {
            $tab->where('CONCAT(admin_account,admin_nickname) LIKE \'%' . $filter['nick'] . '%\'');
        }

        # 权限组别
        if ( $filter['groups'] ) {
            $tab->where('admin_group_id = ' . intval($filter['groups']));
        }

        # 创建起止时间筛选
        $create_date = '';
        if ( $filter['sdate'] ) {
            $create_date = $create_date_start = 'admin_create_date > ' . strtotime($filter['sdate']);
        }

        if ( $filter['edate'] ) {
            $create_date = $create_date_end = 'admin_create_date < ' . strtotime($filter['edate']);
        }

        if ( $filter['sdate'] && $filter['edate'] ) {
            $create_date = '';
            $create_date = $create_date_start . ' AND ' . $create_date_end;
        }
        if ( $create_date ) {
            $tab->where($create_date);
        }

        # 登录起止时间筛选
        $lastlogin_date = '';
        if ( $filter['lsdate'] ) {
            $lastlogin_date = $lastlogin_date_start = 'admin_lastlogin_date > ' . strtotime($filter['lsdate']);
        }

        if ( $filter['ledate'] ) {
            $lastlogin_date = $lastlogin_date_end = 'admin_lastlogin_date < ' . strtotime($filter['ledate']);
        }

        if ( $filter['lsdate'] && $filter['ledate'] ) {
            $lastlogin_date = '';
            $lastlogin_date = $lastlogin_date_start . ' AND ' . $lastlogin_date_end;
        }
        if ( $lastlogin_date ) {
            $tab->where($lastlogin_date);
        }

        # 权限组别
        $groups = RGX\OBJ('admin_group_table')->get_all();
        $filter_groups = [];
        foreach ( $groups as $v ) {
            $filter_groups[$v['group_id']] = $v['group_name'];
        }
        $this->assign('filter_groups' , $filter_groups);

        $pager = new RGX\page_helper($tab, $this->get('pn'), 24);
        $tab->map(function($row) {
            $g_tab = RGX\OBJ('admin_group_table');
            $temp              =    $g_tab->where('group_id = ' . $row['admin_group_id'])->get();
            $row['group_name'] =    $temp['group_name'];
            return $row;
        });
        $this->assign('list' , $tab->get_all());
        $this->assign('pobj', $pager->to_array());
        $this->assign('filter', $filter);
        $this->display('account/list.tpl');
    }

    /**
     * [account_action description]
     * @method account_action
     * @return [type]         [description]
     */
    public function add_action() {
        $id  = intval($this->get('id'));
        if ($this->login['admin_group_id'] != 1 && $id != $this->login['admin_id']) {
            $this->show_msg('您无权进行该操作');
        }
        $org = 0;
        if ( $id ) {
            $tab    =    RGX\OBJ('admin_table');
            $data   =    $tab->get(['admin_id' => $id ]);
        }
        else {
            $data['admin_lastlogin_date']=   REQUEST_TIME;
        }
        $this->assign('admin_group' , RGX\OBJ('admin_group_table')->get_all());

        $this->assign('data',$data);
        $this->display('account/add.tpl');
    }

    /**
     * [账号修改]
     * @method update_action
     * @return [type]        [description]
     */
    public function save_action() {
        $data         = $this->get('data', 'p');
        $admin_id     = intval($data['admin_id']);

        # 新增时密码必填
        if ( !$admin_id && empty($data['admin_passwd']) ) {
            $this->ajax_failure('密码必须输入！');
        }

        // 修改信息时：填写了密码字段（需要更新密码时处理）
        if ( !empty($data['admin_passwd']) ) {
            // 字母开头加数字组合
            if ( !preg_match('/^[a-zA-Z][a-zA-Z0-9_]{5,15}$/', $data['admin_passwd'])) $this->ajax_failure('密码必须是6-15位，英文字母开头和数字的组合！');

            if ( $data['admin_passwd'] != $data['cfm_password']) $this->ajax_failure('两次输入不一致！');

            $data['admin_salt']     =    $data['admin_salt'] ? : RGX\misc::randstr(6);
            $data['admin_passwd']   =    md5(md5($data['admin_passwd']) . $data['admin_salt']);
            $data['admin_lastip']   =    $data['admin_lastip'] ? : ip2long(RGX\app::get_ip());
        }else{
            unset($data['admin_passwd'] , $data['cfm_password']);
        }

        $obj = RGX\OBJ('admin_table');
        if ($obj->load($data)) {
            $rslt    =    $obj->save();
            if ( $rslt['code'] === 0 ) {
                $rslt['url']    =    RGX\router::url('account-list');
                $this->ajaxout($rslt);
            }else{
                $this->ajax_failure($obj->get_error());
            }
        }else{
            $this->ajax_failure($obj->get_error());
        }
        $this->ajaxout(['code' => 0, 'msg'=>'' , 'url' => RGX\router::url('account-list')]);

    }

    /**
     * [删除]
     * @method del_action
     * @return [type]     [description]
     */
    public function del_action () {
        $id = intval($this->get('id'));
        if ( $id ) {
            $ret    =    RGX\OBJ('admin_table')->where('admin_id = ' . $id)->delete();
            if ( $ret ) $this->ajax_success('删除成功');
        }
        $this->ajax_failure('删除失败!');
    }

    public function passwd_action () {
        $this->redirect('account-add-id-' . $this->login['admin_id']);
    }


}// Class End