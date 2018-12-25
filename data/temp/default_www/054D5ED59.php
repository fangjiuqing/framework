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
    <link href="http://newcaifu.d/template/style/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="http://newcaifu.d/static/font-awesome/css/font-awesome.css?v=4.7.0" rel="stylesheet">
    <link href="http://newcaifu.d/template/style/css/animate.min.css" rel="stylesheet">
    <link href="http://newcaifu.d/template/style/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="http://newcaifu.d/template/style/css/bids.css?v=1.0.0" rel="stylesheet">
    <script type="text/javascript">
        var upload_image_url = '<?php echo(RGX\router::url('@upload-image')); ?>',
            DATA_URL    = 'http://newcaifu.d/data/',
            STATIC_URL  = 'http://newcaifu.d/static/',
            UPLOAD_URL  = 'http://newcaifu.d/data/attachment/',
            _route      = <?php echo(json_encode($route, JSON_UNESCAPED_UNICODE));?>,
            _url        = '<?php echo($_MODULE);?>-<?php echo($_ACTION);?>',
            _filter     = <?php echo(json_encode($filter['values'], JSON_UNESCAPED_UNICODE));?>,
            filter      = <?php echo(json_encode($filter, JSON_UNESCAPED_UNICODE));?>;
    </script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo(RGX\router::url('projects-save-~')); ?>" method="POST" id="sform" class="form-horizontal">
                    <input type="hidden" name="data[pro_id]" value="<?php echo($data['pro_id'] ? : 0);?>" />
                    <!--项目信息开始-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-cogs text-success"></i> 项目信息
                            </h5> <?php if ($_ACTION == 'add'):?> <div class="ibox-tools">
                                <button type="submit" class="btn btn-info btn-xs"> 
                                    <i class="fa fa-save"></i> 保存</i>
                                </button>
                            </div> <?php endif;?></div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">项目名称</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_title]" value="<?php echo($data['pro_title']);?>" placeholder="例：高耐候PVDF薄膜的研发" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">项目大类</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_cat]" value="<?php echo($data['pro_cat']);?>" placeholder="例：企业生产制造服务项目" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">项目小类</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_cat1]" value="<?php echo($data['pro_cat1']);?>" placeholder="例：改善中小微企业服务环境-专精特新小巨人企业智能化升级" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">应用领域</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_field]" value="<?php echo($data['pro_field']);?>" placeholder="例：重点特色产业-2.先进碳材料产业" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">重点支持内容</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_zhongdian_supp]" value="<?php echo($data['pro_zhongdian_supp']);?>" placeholder="例：3．前沿类新材料：纳米材料、石墨烯、3D打印材料等" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">20省市联动重点</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="data[pro_is_union_spei]"> <?php unset($k, $v); $k_index = 0; foreach ((array)$boolean as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>" <?php if ($data['pro_is_union_spei'] == $k):?> selected="selected" <?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">所属公司</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_comp_title]" value="<?php echo($data['pro_comp_title']);?>" disabled="disabled" placeholder="例：XXX技术有限公司" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">项目联系人</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_contacter]" value="<?php echo($data['pro_contacter']);?>" placeholder="例：王某某" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">联系电话</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_contacter_phone]" value="<?php echo($data['pro_contacter_phone']);?>" placeholder="例：13888888888" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--项目信息结束-->

                    <!--申报信息开始-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-credit-card text-success"></i> 申报及效益
                            </h5>
                        </div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">市级主管部门/地区</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_region1]" value="<?php echo($data['pro_region1']);?>" placeholder="例：南京市经信委" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">县级主管部门/地区</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[pro_region2]" value="<?php echo($data['pro_region2']);?>" placeholder="例：建邺区经信办" />
                                        </div>
                                    </div> <?php if ($_ACTION == 'add'):?> <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">报送单位</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="apply[apply_gov_name]" value="<?php echo($apply['apply_gov_name']);?>" placeholder="例：南京市政府项目支持部" />
                                        </div>
                                    </div> <?php endif;?></div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">总投资额</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[pro_investment]" value="<?php echo($data['pro_investment']);?>" placeholder="例：500" />
                                                <span class="input-group-addon">万</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">申请金额</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[pro_apply_inves]" value="<?php echo($data['pro_apply_inves']);?>" placeholder="例：200" />
                                                <span class="input-group-addon">万</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label"></label>
                                        <div class="col-sm-8">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">预计新增营收</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[pro_increae_sale]" value="<?php echo($data['pro_increae_sale']);?>" placeholder="例：500" />
                                                <span class="input-group-addon">万</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">新增税收</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[pro_increae_tax]" value="<?php echo($data['pro_increae_tax']);?>" placeholder="例：200" />
                                                <span class="input-group-addon">万</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">新增利润</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[pro_increae_profit]" value="<?php echo($data['pro_increae_profit']);?>" placeholder="例：100" />
                                                <span class="input-group-addon">万</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--申报信息结束-->

                    <!--项目内容开始-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-paste text-success"></i> 项目内容
                            </h5>
                        </div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea rows="5" class="form-control" name="data[pro_content]"><?php echo($data['pro_content']);?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--项目内容结束--> <?php if ($apply):?> <!--项目审批信息开始-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-inbox text-success"></i> 申报进度
                            </h5>
                        </div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <span class="mr20">
                                            <i class="fa fa-calendar"></i> 申请日期 : <?php echo(date('Y-m-d' , $apply['apply_date']));?> </span>
                                        <span class="mr20">
                                            审批状态：<b class="<?php if ($apply['apply_status'] == 4):?> text-info<?php else:?> text-danger <?php endif;?>mr20"><?php echo($status[$apply['apply_status']]);?></b>
                                        </span>
                                        <span class="mr20"> <?php if ($apply['apply_audit_advise']):?> 审批建议：<?php echo(htmlspecialchars_decode($apply['apply_audit_advise'], ENT_QUOTES));?> <?php endif;?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--项目审批信息结束--> <?php endif;?></form>
            </div>
        </div>
    </div>
    <script src="http://newcaifu.d/static/js/jquery.min.js"></script>
<script src="http://newcaifu.d/template/style/js/bootstrap.min.js?v=3.3.6"></script>
<script src="http://newcaifu.d/template/style/js/content.min.js?v=1.0.0"></script>
<script src="http://newcaifu.d/static/dialog/lhgdialog.min.js?skin=discuz&amp;1"></script>
<script src="http://newcaifu.d/static/js/RGX.lib.min.js"></script>
<script src="http://newcaifu.d/static/js/rgx.js"></script>
<script src="http://newcaifu.d/template/style/js/common.js"></script>
<script src="http://newcaifu.d/template/style/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="http://newcaifu.d/static/js/upload.js"></script>


    <script type="text/javascript">
        RGX.post('#sform');
    </script>
</body>

</html>
