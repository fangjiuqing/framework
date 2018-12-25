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
<link href="http://angel.d/template/style/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<!-- Data Tables -->
<link href="http://angel.d/template/style/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<style type="text/css">
    .fixed-height {
        min-height: 329px;
    }
</style>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-3">
                <div class="ibox float-e-margins fixed-height">
                    <div class="ibox-title">
                        <h5>个人档案</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 label-control text-right">
                                    <i class="fa fa-user"></i>
                                    姓名
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly="readonly" value="<?php echo($user['user_name']);?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 label-control text-right">
                                    <i class="fa fa-phone-square"></i>
                                    电话
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly="readonly" value="<?php echo($user['user_mobile']);?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 label-control text-right">
                                    <i class="fa fa-female"></i>
                                    性别
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly="readonly" value="<?php echo($garder[$user['user_sex']]);?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 label-control text-right">
                                    <i class="fa fa-vimeo"></i>
                                    身高
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly="readonly" value="<?php echo($user['user_height']);?>" />
                                        <span class="input-group-addon">CM</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 label-control text-right">
                                    <i class="fa fa-viacoin"></i>
                                    体重
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly="readonly" value="<?php echo($user['user_weight']);?>" />
                                        <span class="input-group-addon">KG</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="padding-left:20px; margin-top: 18px">
                                BMI<b class="text-danger"><?php echo($bmi);?></b>，评价：<span class="text-info"><?php echo($sys_word);?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="ibox float-e-margins fixed-height">
                    <div class="ibox-title">
                        <h5>体重监测</h5>
                        <a class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#add-weight">录入</a>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" width="13%">序号</th>
                                    <th>测量日期</th>
                                    <th>当次体重</th>
                                    <th class="text-center">相较上次</th>
                                </tr>
                            </thead>

                            <tbody> <?php unset($k, $v); $k_index = 0; foreach ((array)$weight_log as $k => $v): $k_index ++;?> <tr>
                                    <td class="text-center"><?php echo($k+1);?></td>
                                    <td><?php echo(date('Y-m-d' , $v['log_weight_date']));?></td>
                                    <td><?php echo($v['log_weight_nums']);?>KG</td>
                                    <td class="text-center"> <?php if ($v['log_weight_change'] > 0):?> <b class="text-danger"> <?php echo($v['log_weight_change']);?> <i class="fa fa-long-arrow-up"></i>
                                        </b> <?php else:?> <b class="text-info"> <?php echo($v['log_weight_change']);?> <i class="fa fa-long-arrow-down"></i>
                                        </b> <?php endif;?></td>
                                </tr> <?php endforeach;?> </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="ibox float-e-margins fixed-height">
                    <div class="ibox-title">
                        <h5>开始运动</h5>
                        <div class="ibox-tools">
                            <audio src="http://audio.xmcdn.com/group37/M05/26/BD/wKgJoFoxKpCg2Md6AJddWLtd3Vc807.m4a" controls="controls" preload id="audio"></audio>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <button class="btn btn-large btn-primary" style="width: 75%">跑步计时</button>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-large btn-success pull-right clock-time-set" data-mins="30">
                                        <i class="fa fa-clock-o">30分</i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="weather">
                            <div class="ibox-title">
                                <h5>今日天气</h5>
                                <small class="pull-right" style="margin-top: 9px;"> <?php echo($weather['week']);?>，<?php echo($weather['city']);?>，<?php echo($weather['weather']);?>，实时<?php echo($weather['tempnow']);?>℃，低<?php echo($weather['templow']);?>℃，高<?php echo($weather['temphigh']);?>℃

                                    <a class="text-primary">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </small>
                            </div>
                            <div class="ibox-content" style="border:none"> <?php unset($k, $v); $k_index = 0; foreach ((array)$weather['index'] as $k => $v): $k_index ++;?> <p style="font-size: 12px">
                                    <b class="text-info"><?php echo(RGX\misc::cutstr($v['name'], 4));?></b> <?php echo($v['level']);?> , <?php echo(RGX\misc::cutstr($v['msg'], 25));?> </p> <?php endforeach;?> </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="ibox float-e-margins fixed-height">
                    <div class="ibox-title">
                        <h5>收支明细</h5>
                        <a class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#add-fee">录入</a>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th class="text-center" width="6%">序号</th>
                                    <th>单项金额</th>
                                    <th>发生日期</th>
                                    <th>收支类型</th>
                                    <th>收支分类</th>
                                    <th>备注说明1</th>
                                    <th>备注说明2</th>
                                </tr>
                            </thead>

                            <tbody> <?php unset($k, $v); $k_index = 0; foreach ((array)$fee_log as $k => $v): $k_index ++;?> <tr>
                                    <td class="text-center"><?php echo($k+1);?></td>
                                    <td> <?php if ($v['log_fee_amount'] > 0):?> <b class="text-danger"> <?php echo($v['log_fee_amount']);?> </b> <?php else:?> <b class="text-info"> <?php echo($v['log_fee_amount']);?> </b> <?php endif;?></td>
                                    <td><?php echo(date('Y-m-d' , $v['log_fee_date']));?></td>
                                    <td><?php echo($fee_type[$v['log_fee_type']]);?></td>
                                    <td><?php echo($fee_cat[$v['log_fee_type']][$v['log_fee_cat']]);?></td>
                                    <td><?php echo($v['log_fee_desc1']);?></td>
                                    <td><?php echo($v['log_fee_desc2']);?></td>
                                </tr> <?php endforeach;?> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="add-weight" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                </button>
                <h4 class="modal-title">录入体重数据</h4>
                <small class="font-bold">用心记录，每一天都会有新的变化哦 :)</small>
            </div>
            <div class="modal-body">
                <form action="<?php echo(RGX\router::url('user-saveweight-~')); ?>" method="POST" id="saveweight" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">本次体重</label>
                            <div class="col-sm-10">
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="data[log_weight_nums]"  placeholder="本次体重" id="log_weight_nums" value="<?php echo($user['user_weight']);?>" />
                                    <span class="input-group-addon">KG</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">测量日期</label>
                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="data[log_weight_date]" id="log_weight_date" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">备注</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="data[log_weight_remark]" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="save-weight-submit">保存</button>
            </div>
        </div>
    </div>
</div>
    <div class="modal inmodal" id="add-fee" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
                </button>
                <h4 class="modal-title">收支录入</h4>
                <small class="font-bold">坚持记账，消费收入明明白白 :)</small>
            </div>
            <div class="modal-body">
                <form action="<?php echo(RGX\router::url('fee-save-~')); ?>" method="POST" id="savefee" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">发生金额</label>
                            <div class="col-sm-10">
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="data[log_fee_amount]"  placeholder="金额" id="log_fee_amount" />
                                    <span class="input-group-addon">￥</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">记录日期</label>
                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" name="data[log_fee_date]" id="log_fee_date" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">收支类型</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="log_fee_type" name="data[log_fee_type]"> <?php unset($k, $v); $k_index = 0; foreach ((array)$fee_type as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>"><?php echo($v);?></option> <?php endforeach;?> </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">费用分类</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="log_fee_cat" name="data[log_fee_cat]"> <?php unset($k, $v); $k_index = 0; foreach ((array)$fee_cat[1] as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>"><?php echo($v);?></option> <?php endforeach;?> </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">备注说明1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="data[log_fee_desc1]" placeholder="如高铁车票" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-2 control-label">备注说明2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="data[log_fee_desc2]" placeholder="如高铁车次，G7029" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="save-fee-submit">保存</button>
            </div>
        </div>
    </div>
</div>

    <script src="http://angel.d/static/js/jquery.min.js"></script>
<script src="http://angel.d/template/style/js/bootstrap.min.js?v=3.3.6"></script>
<script src="http://angel.d/template/style/js/content.min.js?v=1.0.0"></script>
<script src="http://angel.d/static/dialog/lhgdialog.min.js?skin=discuz&amp;1"></script>
<script src="http://angel.d/static/js/RGX.lib.min.js"></script>
<script src="http://angel.d/static/js/rgx.js"></script>
<script src="http://angel.d/template/style/js/common.js"></script>
<script src="http://angel.d/template/style/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="http://angel.d/static/js/upload.js"></script>


    <script src="http://angel.d/template/style/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="http://angel.d/template/style/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    
    <script type="text/javascript">
        $(function() {
            var fee_cat = <?php echo(json_encode($fee_cat, JSON_UNESCAPED_UNICODE));?>;

            $('#save-weight-submit').on('click' , function() {
                var log_weight_nums = $('#log_weight_nums').val();
                var log_weight_date = $('#log_weight_date').val();

                if ( log_weight_nums && log_weight_date ) {
                    RGX.formpost('#saveweight' , function(d) {
                        if (d.code == 0 ) {
                            RGX.msg(d.msg , function(){
                                setTimeout(function(){
                                    if ( d.url ) {
                                        location.href = d.url;
                                    }
                                } , 1000);
                            } , 'succ');
                        }else{
                            RGX.msg(d.msg);
                        }
                    });
                }else{
                    RGX.msg('体重数与日期必填！');
                }
            });

            var play_list = [];
            play_list.push('464446.m4a');

            /**
             * [Play Music]
             * @param  {[type]} ) {                      
             * @return {[type]}   [description]
             */
            $('.play-music').on('click' , function() {
                $('#audio').attr("src","http://angel.d/data/media/464446.m4a");
            });

            $('#log_fee_type').on('change' , function() {
                var fee_type     = $(this).find("option:selected").val();
                var fee_cat_ele  = $('#log_fee_cat');
                var option = '';
                fee_cats = fee_cat[fee_type];
                $.each(fee_cats , function(idx,ele) {
                    option += '<option value="'+idx+'">' + ele + '</option>';
                });
                fee_cat_ele.html(option);
            });

            // 保存收支费用录入
            $('#save-fee-submit').on('click' , function() {
                var log_fee_amount = $('#log_fee_amount').val();
                var log_fee_date   = $('#log_fee_date').val();
                var log_fee_type   = $('#log_fee_type').val();
                var log_fee_cat    = $('#log_fee_cat').val();

                if ( log_fee_amount && log_fee_date && log_fee_type && log_fee_cat) {
                    RGX.formpost('#savefee' , function(d) {
                        if (d.code == 0 ) {
                            RGX.msg(d.msg , function(){
                                setTimeout(function(){
                                    if ( d.url ) {
                                        location.href = d.url;
                                    }
                                } , 1000);
                            } , 'succ');
                        }else{
                            RGX.msg(d.msg);
                        }
                    });
                }else{
                    RGX.msg('金额、类型、分类与日期必填！');
                }
            });

            $(".dataTables").dataTable();
        });
    </script>
</body>

</html>
