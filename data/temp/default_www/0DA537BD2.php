<?php namespace com\default_www;use re\rgx as RGX;!defined('IN_RGX') && exit('Access Denied'); unset($this);?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title><?php echo((is_array($_title) ? join('_', $_title) : $_title));?></title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="http://angel.d/template/style/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="http://angel.d/static/font-awesome/css/font-awesome.css?v=4.7.0" rel="stylesheet">
    <link href="http://angel.d/template/style/css/animate.min.css" rel="stylesheet">
    <link href="http://angel.d/template/style/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="http://angel.d/template/style/css/bids.css?v=1.0.0" rel="stylesheet">
    <script type="text/javascript">
        var upload_image_url = '<?php echo(RGX\router::url('@upload-image')); ?>',
            DATA_URL    = 'http://angel.d/data/',
            STATIC_URL  = 'http://angel.d/static/',
            UPLOAD_URL  = 'http://angel.d/data/attachment/',
            _route      = <?php echo(json_encode($route, JSON_UNESCAPED_UNICODE));?>,
            _url        = '<?php echo($_MODULE);?>-<?php echo($_ACTION);?>',
            _filter     = <?php echo(json_encode($filter['values'], JSON_UNESCAPED_UNICODE));?>,
            filter      = <?php echo(json_encode($filter, JSON_UNESCAPED_UNICODE));?>;
    </script>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation" style="width: 190px;">
    <div class="nav-close">
        <i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header" style="text-align: center">
                <div class="dropdown profile-element">
                    <a href="javascript:;" data-href="<?php echo(RGX\router::url('account-add-id-%d' , $login['admin_id'])); ?>">
                        <span class="clear">
                           <span class="block m-t-xs"><strong class="font-bold" style="font-size: 14px;">Angel On Road</strong></span>
                           <span class="text-muted text-xs block" style="font-size: 12px;">&nbsp;</span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">富</div>
            </li> <?php unset($k, $v); $k_index = 0; foreach ((array)$navs as $k => $v): $k_index ++;?><?php if (!empty($v['urls'])):?><li>
                    <a href="javascript:;">
                        <span class="icon-span"><i class="<?php echo($v['icon']);?>"></i></span>
                        <span class="nav-label"><?php echo($v['name']);?></span>
                    </a>
                    <ul class="nav nav-second-level"> <?php unset($sk, $sv); $sk_index = 0; foreach ((array)$v['urls'] as $sk => $sv): $sk_index ++;?> <li>
                            <a class="J_menuItem" href="<?php echo(RGX\router::url($sv['url'])); ?>" data-index="<?php echo($sk);?>"><?php echo($sv['name']);?></a>
                        </li> <?php endforeach;?> </ul>
                </li><?php else:?><li>
                    <a class="J_menuItem" href="<?php echo(RGX\router::url($v['url'])); ?>">
                        <span class="icon-span"><i class="<?php echo($v['icon']);?>"></i></span>
                        <span class="nav-label"><?php echo($v['name']);?></span>
                    </a>
                </li><?php endif;?><?php endforeach;?> </ul>
    </div>
</nav>
<!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1" style="margin-left:190px;">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <ul class="nav navbar-top-links pull-left" id="nav-list">
                        <!-- <li class="hidden-xs">
                            <a href="<?php echo(RGX\router::url('account-passwd')); ?>" class="J_menuItem" data-index="0">
                                <i class="fa fa-user"></i>  
                            </a>
                        </li> -->
                    </ul>
                    <div class="navbar-header hide">

                        <form role="search" class="navbar-form-custom" action="<?php echo(RGX\router::url('employee-list~')); ?>" method="get" target="iframe0">
                            <input type="hidden" name="stype" value="name">
                            <input type="hidden" name="status" value="4">
                            <div class="form-group">
                                <input type="text" placeholder="请输入雇员关键字 …" class="form-control" name="skey" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                <i class="fa fa-user"></i> <?php echo($login['user_name']);?><span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu" style="min-width: 110px;">
                                    <li>
                                        <a href="<?php echo(RGX\router::url('config-account')); ?>" class="J_menuItem" data-index="0">账号信息</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?php echo(RGX\router::url('misc-logout')); ?>" class="J_menuItem" data-index="0">注销登录</a>
                                    </li>
                                </ul>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="index_home">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>
                <a href="<?php echo(RGX\router::url('index-logout')); ?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo(RGX\router::url('index-home')); ?>" frameborder="0" data-id="index_home" seamless></iframe>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>
    <script src="http://angel.d/template/style/js/jquery.min.js?v=2.1.4"></script>
    <script src="http://angel.d/template/style/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="http://angel.d/template/style/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="http://angel.d/template/style/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="http://angel.d/template/style/js/plugins/layer/layer.min.js"></script>
    <script src="http://angel.d/template/style/js/hplus.min.js?v=4.1.0"></script>
    <script src="http://angel.d/template/style/js/contabs.min.js"></script>
    <script src="http://angel.d/template/style/js/plugins/pace/pace.min.js"></script>
    <script src="http://angel.d/static/js/RGX.lib.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var nav = <?php echo(json_encode($nav, JSON_UNESCAPED_UNICODE));?>,
                nav_target = [];
            if ( nav.length > 0 ) {
                var li = '';
                $.each(nav , function(k,v) {
                    li  +=  '<li class="hidden-xs' + ((k==0) ? ' active' : '') + '">';
                    li  +=      '<a href="javascript:;" class="nav-li" data-key="' + v.name + '">';
                    //li  +=      '<i class="' + v.icon + '"></i>';
                    li  +=      v.name;
                    li  +=      '</a>';
                    li  +=  '</li>'; 
                    nav_target[v.name] = v;

                    // 默认第一个放在左侧的导航
                    if ( k == 0 ) {
                        create_left_nav('#side-menu',v);
                    }
                });
                $('#nav-list').html(li);
            }

            // 往左侧变换导航内容
            $('#nav-list').on('click' , 'a.nav-li' , function(){
                var key = $(this).attr('data-key');
                $('#nav-list').find('li').removeClass('active');
                $(this).parent().addClass('active');
                var nav_left = nav_target[key];
                create_left_nav('#side-menu',nav_left);
            });
        });// Jquery End

        function create_left_nav (elm_id , lef_nav) {
            var li   = '<li class="active">';
            if ( lef_nav.urls != undefined ) {
                li  +=      '<a class="J_menuItem" onClick="return false">';
                li  +=          '<span class="icon-span"><i class="'+lef_nav.icon+'"></i></span>';
                li  +=          '<span class="nav-label">'+lef_nav.name+'</span>';
                li  +=          '<span class="fa arrow"></span>';
                li  +=          '<ul class="nav nav-second-level collapse in" aria-expanded="true" style="">';
                $.each(lef_nav.urls , function(k,v) {
                    li  +=          '<li>';
                    li  +=               '<a class="J_menuItem" href="'+ RGXLIB.url(v.url)+'" data-index="0">';
                    li  +=               v.name;
                    li  +=               '</a>';
                    li  +=           '</li>';
                });
                li  +=          '</ul>';
                li  +=      '</a>';
                li  +=  '</li>'; 
            }
            li  +=  '</li>';
            $(elm_id).find('li.nav-header').nextAll().remove();
            $(elm_id).find('li.nav-header').after(li);
        }
    </script>
    </body>
</html>

