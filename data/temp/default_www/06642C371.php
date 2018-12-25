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
        margin-right: 10px;
    }
</style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <form action="<?php echo(RGX\router::url('@%s-save' , $_MODULE)); ?>" method="post" id="sform" class="form-horizontal">
            <input type="hidden" name="data[group_id]" value="<?php echo(intval($data['group_id']));?>">

            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-cog"></i>
                                基本信息
                            </h5>
                            <button class="btn btn-success pull-right" type="submit">保存内容</button>
                        </div>
                        <div class="ibox-content">
                            <div class="row row-dashed">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">组别名称</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="group_label" name="data[group_label]" value="<?php echo($data['group_label'] ?: '');?>" maxlength="255" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">权限列表</label>
                                        <div class="col-sm-10">
                                            <table class="table table-bordered perms-list"> <?php unset($k, $v); $k_index = 0; foreach ((array)$perms as $k => $v): $k_index ++;?> <tr>
                                                    <th width="20%"><?php echo($v['name']);?></th>
                                                    <td width="80%"> <?php if (empty($v['urls'])):?> <span><input type="checkbox" <?php if (in_array($v['url'] , $data['group_perm'])):?> checked="true" <?php endif;?>name="perms[]" value="<?php echo($v['url']);?>"><?php echo($v['name']);?></span> <?php else:?> <?php unset($sk, $sv); $sk_index = 0; foreach ((array)$v['urls'] as $sk => $sv): $sk_index ++;?> <span><input type="checkbox" <?php if (in_array($sv['url'] , $data['group_perm'])):?> checked="true" <?php endif;?>name="perms[]" value="<?php echo($sv['url']);?>"><?php echo($sv['name']);?></span> <?php endforeach;?> <?php endif;?></td>
                                                </tr> <?php endforeach;?> </table>
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
