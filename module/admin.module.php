<?php
namespace com\default_www;
use re\rgx as RGX;

setlocale(LC_MONETARY, PHP_OS == 'Linux' ? 'zh_CN.UTF8' : 'zh_CN');

if (!function_exists('money_format')) {
    function money_format ($fmt, $val, $symbol = '￥') {
        $n = $val;
        $c = is_float($n) ? 1 : number_format($n, $r);
        $d = '.';
        $t = ',';
        $sign = ($n < 0) ? '-' : '';
        $i = $n = number_format(abs($n), $r);
        $j = (($j = $i.length) > 3) ? $j % 3 : 0;

       return  $symbol . $sign . ($j ? substr($i,0, $j) + $t : '') .
                    preg_replace('/(\d{3})(?=\d)/', "$1" + $t, substr($i, $j));
    }
}

/**
 * 模块基类
 * $Id: admin.module.php 931 2017-12-11 15:44:01Z fangwei $
 */
class admin_module extends base_module {

    /**
     * 架构方法
     * @param array $params [description]
     */
    public function __construct ($params = []) {
        parent::__construct($params);
        if (empty($this->login)) {
            $this->redirect('login');
        }
        $this->get_navs($this->login);
        // if ( $this->login['admin_group_id'] != 1 ) {
        //     $this->check_perm ($this->login);
        // }
    }

    /**
     * [get_navs description]
     * @method get_navs
     * @param  integer  $admin_group [description]
     * @return [type]   [description]
     */
    public function get_navs( $login ) {
        $navs = RGX\navigation_helper::get($login);
        $this->assign('navs' , $navs);
    }

    /**
     * [check_perm description]
     * @method check_perm
     * @param  [type]     $login [description]
     * @return [type]     [description]
     */
    public function check_perm ($login) {
        $_opt = RGX\router::get_mod(false) . '-' . RGX\router::get_act(false);
        # 默认无需权限检测的加入到用户已有的权限列表中
        $login['admin_perms'][] = 'index-index';
        $login['admin_perms'][] = 'index-home';
        if ( !in_array($_opt , $login['admin_perms'] ) ) {
            $this->show_msg('无权操作！');die;
        }

    }
} //Class End