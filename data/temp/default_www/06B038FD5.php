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
                <form action="<?php echo(RGX\router::url('company-save-~')); ?>" method="POST" id="sform" class="form-horizontal">
                    <!--项目信息-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-cogs text-success"></i> 项目信息
                            </h5>
                            <div class="ibox-tools">
                                <a href="<?php echo(RGX\router::url('projects-history')); ?>" class="btn btn-info btn-xs" style="color: #fff"> 
                                    <i class="fa fa-backward"></i> 返回</i>
                                </a>
                            </div>
                        </div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">经营场所面积</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[buss_area]" value="<?php echo($company_data['buss_area']);?>" />
                                                <span class="input-group-addon">M²</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">经营地址</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[buss_address]" value="<?php echo($company_data['buss_address']);?>" />
                                                <span class="input-group-addon">住所</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">经营人数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_employee]" value="<?php echo($company_data['buss_employee']);?>" />
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全管理机构</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_security_agence]" value="<?php echo($company_data['buss_security_agence']);?>" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全管理员</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_security_manager]" value="<?php echo($company_data['buss_security_manager']);?>" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">持证人数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_security_auth]" value="<?php echo($company_data['buss_security_auth']);?>" />
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">资产总计</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[buss_asset_sum]" value="<?php echo($company_data['buss_asset_sum']);?>" />
                                                <span class="input-group-addon">万元</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">年营业收入</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[buss_year_sale]" value="<?php echo($company_data['buss_year_sale']);?>" />
                                                <span class="input-group-addon">万元</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">年主营收入</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data[buss_year_main_sale]" value="<?php echo($company_data['buss_year_main_sale']);?>" />
                                                <span class="input-group-addon">万元</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">期末从业数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_end_employee]" value="<?php echo($company_data['buss_end_employee']);?>" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">应缴社保人数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_should_insurance]" value="<?php echo($company_data['buss_should_insurance']);?>" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">实缴社保人数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_insuranced]" value="<?php echo($company_data['buss_insuranced']);?>" />
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全证书等级</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_certi_level]" value="<?php echo($company_data['buss_certi_level']);?>" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全证书编号</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_certi_sn]" value="<?php echo($company_data['buss_certi_sn']);?>" />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全证书日期</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="data[buss_certi_date]" value="<?php echo($company_data['buss_certi_date']);?>" />
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">生产类企业</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="data[buss_is_pro]"> <?php unset($k, $v); $k_index = 0; foreach ((array)$boolean as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>" <?php if ($company_data['buss_is_pro'] == $k):?> selected="selected" <?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">重点监管</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="data[buss_is_focus]"> <?php unset($k, $v); $k_index = 0; foreach ((array)$boolean as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>" <?php if ($company_data['buss_is_focus'] == $k):?> selected="selected" <?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">重大危险源</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="data[buss_is_danger]"> <?php unset($k, $v); $k_index = 0; foreach ((array)$boolean as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>" <?php if ($company_data['buss_is_danger'] == $k):?> selected="selected" <?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                    <!--营业执照信息信息-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-credit-card text-success"></i> 所属公司信息
                            </h5>
                        </div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">统一社会信用码</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="91320105MA1MJL1W84">
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">企业名称</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="南京呗塔猫网络科技有限公司">
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">类型</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="有限责任公司(自然人独资)">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">法定代表人</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="李瑞景">
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">注册资本</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="100.000000万人民币">
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">成立日期</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="2016年04月25日">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">营业期限自</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="2016年04月25日">
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">营业期限至</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="-">
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">登记机关</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="南京市江宁区市场监督管理局">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">核准日期</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="2018年01月23日">
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">登记状态</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="存续（在营、开业、在册）">
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">住所</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="南京市麒麟科技创新园智汇路300号B单元二楼">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">经营范围</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>value="电子产品、计算机软硬件及配件研发；网络技术服务；计算机系统集成服务。（依法须经批准的项目，经相关部门批准后方可开展经营活动）">
            </div>
        </div> <?php if ($disabled):?> <div class="col-sm-4">
            <label class="col-sm-4 control-label">
                <a href="<?php echo(RGX\router::url('@company-add')); ?>">更多>>></a>
            </label>
        </div> <?php endif;?></div>
</div>
                        </div>
                    </div>

                    
                </form>
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
