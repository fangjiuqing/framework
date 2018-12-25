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
    <link href="http://matchmaking.d/template/style/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="http://matchmaking.d/static/font-awesome/css/font-awesome.css?v=4.7.0" rel="stylesheet">
    <link href="http://matchmaking.d/template/style/css/animate.min.css" rel="stylesheet">
    <link href="http://matchmaking.d/template/style/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="http://matchmaking.d/template/style/css/bids.css?v=1.0.0" rel="stylesheet">
    <script type="text/javascript">
        var upload_image_url = '<?php echo(RGX\router::url('@upload-image')); ?>',
            DATA_URL    = 'http://matchmaking.d/data/',
            STATIC_URL  = 'http://matchmaking.d/static/',
            UPLOAD_URL  = 'http://matchmaking.d/data/attachment/',
            _route      = <?php echo(json_encode($route, JSON_UNESCAPED_UNICODE));?>,
            _url        = '<?php echo($_MODULE);?>-<?php echo($_ACTION);?>',
            _filter     = <?php echo(json_encode($filter['values'], JSON_UNESCAPED_UNICODE));?>,
            filter      = <?php echo(json_encode($filter, JSON_UNESCAPED_UNICODE));?>;
    </script>
<style type="text/css">
    .perms-list span {
        display: inline-block;
        line-height: 40px;
        margin-right: 15px;
        min-width: 100px;
        /*font-size: 18px;*/
    }
    .perms-list input {
        /*width: 18px;
        height: 18px;*/
    }
</style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <form action="<?php echo(RGX\router::url('@%s-save' , $_MODULE)); ?>" method="post" id="sform" class="form-horizontal">
            <input type="hidden" name="cat[cat_id]" value="<?php echo(intval($cat['cat_id']));?>">
            <input type="hidden" name="cat[cat_py]" value="<?php echo($cat['cat_py'] ?: 'auto');?>">
            <input type="hidden" name="cat[cat_type]" value="<?php echo($type_id);?>">
            <input type="hidden" name="cat[cat_paths]" value="<?php echo($cat['cat_paths']);?>">

            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-cogs"></i>
                                分类信息
                            </h5>
                            <button class="btn btn-success pull-right" type="submit">保存内容</button>
                        </div>
                        <div class="ibox-content">
                            <div class="row row-dashed">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="cat_name" name="cat[cat_name]" value="<?php echo($cat['cat_name']);?>" placeholder="请输入分类名称" maxlength="64">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">上级分类</label>
                                        <div class="col-sm-10">
<select class="form-control" id="cat_parent" name="cat[cat_parent]"><?php if (true):?><option value="0">├ 作为一级类目</option><?php endif;?><?php unset($k, $v); $k_index = 0; foreach ((array)$cat_tree as $k => $v): $k_index ++;?><option value="<?php echo($v['cat_id']);?>" <?php if ($v['cat_id'] == $parent_id):?> selected<?php endif;?>><?php echo(str_repeat('&nbsp;', ($v['cat_level']) * 5));?>└ <?php echo($v['cat_name']);?> </option><?php endforeach;?></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">规格属性</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="cat_desc" name="cat[cat_desc]" rows="5" name="cat[cat_desc]" style="line-height: normal;padding:10px;"><?php echo($cat['cat_desc'] ? join("\n", $cat['cat_desc']): '');?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">排序值</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="cat_sort" name="cat[cat_sort]" value="<?php echo($cat['cat_sort'] ?: 0);?>" placeholder="请输入分类名称" maxlength="5">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="http://matchmaking.d/static/js/jquery.min.js"></script>
<script src="http://matchmaking.d/template/style/js/bootstrap.min.js?v=3.3.6"></script>
<script src="http://matchmaking.d/template/style/js/content.min.js?v=1.0.0"></script>
<script src="http://matchmaking.d/static/dialog/lhgdialog.min.js?skin=discuz&amp;2"></script>
<script src="http://matchmaking.d/static/js/RGX.lib.min.js"></script>
<script src="http://matchmaking.d/static/js/rgx.js"></script>
<script src="http://matchmaking.d/template/style/js/common.js"></script>
<script src="http://matchmaking.d/template/style/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="http://matchmaking.d/static/js/upload.js"></script>


    <script>
        $(function() {
            RGX.post('#sform');
        });
    </script>
</body>

</html>