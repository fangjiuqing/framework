<?php
namespace re\rgx;
// PASSED
/**
 * 导航助手类
 * $Id: navigation.helper.php 951 2017-12-18 06:43:09Z fangwei $
 */
class navigation_helper extends rgx {
    public static $navs    =    [
        //商品管理
        [
            'name'   =>    '商品管理',
            'icon'   =>    'fa fa-home',
            'urls'    =>   [
                ['url' => 'goods-index', 'name' => '商品列表'],
                ['url' => 'goods-add', 'name' => '商品添加'],
            ],
        ],

        //分类管理
        [
            'name'   =>    '分类管理',
            'icon'   =>    'fa fa-home',
            'urls'    =>   [
                ['url' => 'category-index-t-1', 'name' => '商品分类'],
                ['url' => 'category-add-t-1', 'name' => '分类添加'],
            ],
        ],

        //样品发送
        [
            'name'   =>    '样品发送',
            'icon'   =>    'fa fa-home',
            'urls'    =>   [
                ['url' => 'sample-index-t-1', 'name' => '待发样品'],
                ['url' => 'sample-index-t-2', 'name' => '已发样品'],
            ],
        ],

        //计划
        [
            'name'   =>    '商品采购',
            'icon'   =>    'fa fa-handshake-o',
            'urls'    =>   [
                ['url' => 'sourcing-index' ,   'name' => '供应大厅'],
                ['url' => 'sourcing-sample' , 'name' => '样品寄送'],
                ['url' => 'sourcing-focus' ,  'name' => '设置关注'],
            ],
        ],

        // 设置
        [
            'name'  =>    '账户设置',
            'icon'  =>    'fa fa-cogs',
            'urls'  => [
                ['url'  => 'config-account', 'name' => '修改密码'],
            ],
        ],

        // 系统管理
        [
            'name'  =>    '系统管理',
            'icon'  =>    'fa fa-setting',
            'urls'  => [
                ['url'  => 'group-index', 'name' => '组别管理'],
                ['url'  => 'group-add', 'name' => '新增组别'],
            ],
        ],

    ];

    /**
     * 根据当前登录用户获取导航菜单
     * @param  [type] $login [description]
     * @return [type]        [description]
     */
    public static function get ($login = []) {
        if ( $login['is_admin'] ) {
            return self::$navs + self::$admin_navs;
        }
        return self::$navs;
    }

    /**
     * [format description]
     * @method format
     * @param  array  $except [description]
     * @return [type] [description]
     */
    public static function format ($except = [] ) {
        $data    =    [];
        foreach( self::$navs as $k => $v ) {
            if ( $v['url'] ) {
                $data[$v['url']]    =    $v['name'];
            }
            if ( !empty($v['urls']) ) {
                foreach ( $v['urls'] as $sk => $sv ) {
                    $data[$sv['url']]    =    $sv['name'];
                }
            }
        }
        return $data;
    }
} //Class End