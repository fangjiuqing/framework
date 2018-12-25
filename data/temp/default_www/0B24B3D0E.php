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
<link href="http://newcaifu.d/template/style/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo(RGX\router::url('company-save-~')); ?>" method="POST" id="sform" class="form-horizontal">
                    <!--营业执照信息信息开始-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-credit-card text-success"></i> 营业执照信息
                            </h5> <?php if (!$disabled):?> <div class="ibox-tools">
                                <button type="submit" class="btn btn-info btn-xs"> 
                                    <i class="fa fa-save"></i> 保存</i>
                                </button>
                            </div> <?php endif;?></div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">统一社会信用码</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_code]" value="<?php echo($licen['licen_code']);?>" placeholder="企业统一社会信用代码" />
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">企业名称</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="comp[comp_title]" value="<?php echo($comp['comp_title']);?>" placeholder="企业名称" />
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">类型</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_comp_type]" value="<?php echo($licen['licen_comp_type']);?>" placeholder="工商企业类型" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">法定代表人</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_reputater]" value="<?php echo($licen['licen_reputater']);?>" placeholder="企业法定代表人" />
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">注册资本</label>

            <div class="col-sm-8">
                <div class="input-group">
                    <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_capital]" value="<?php echo($licen['licen_capital']);?>" placeholder="注册资本，单位：万元" />
                    <span class="input-group-addon">万元</span>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">成立日期</label>

            <div class="col-sm-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control datepicker" <?php if ($disabled):?> disabled="" <?php endif;?>name="comp[comp_regis_date]" value="<?php if ($comp['comp_regis_date']):?><?php echo(date('Y-m-d' , $comp['comp_regis_date']));?><?php endif;?>" placeholder="成立日期" />
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">营业期限自</label>

            <div class="col-sm-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control datepicker" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_buss_start]" value="<?php if ($licen['licen_buss_start']):?><?php echo(date('Y-m-d' , $licen['licen_buss_start']));?><?php endif;?>" placeholder="企业营业期限生效日" />
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">营业期限至</label>

            <div class="col-sm-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control datepicker" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_buss_end]" value="<?php if ($licen['licen_buss_end']):?><?php echo(date('Y-m-d' , $licen['licen_buss_end']));?><?php endif;?>" placeholder="无固定日期可不填" />
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">登记机关</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_reg_org]" value="<?php echo($licen['licen_reg_org']);?>" placeholder="企业注册变更登记机关" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">核准日期</label>

            <div class="col-sm-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control datepicker" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_audit_date]" value="<?php if ($licen['licen_audit_date']):?><?php echo(date('Y-m-d' , $licen['licen_audit_date']));?><?php endif;?>" placeholder="企业核准日期" />
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">登记状态</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_buss_status]" value="<?php echo($licen['licen_buss_status']);?>" placeholder="经营状态" />
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">住所</label>

            <div class="col-sm-8">
                <input type="text" id="licen_reg_addr" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_reg_addr]" value="<?php echo($licen['licen_reg_addr']);?>" placeholder="企业住所" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">经营范围</label>

            <div class="col-sm-8">
                <input type="text" id="licen_buss_sephere" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="licen[licen_buss_sephere]" value="<?php echo($licen['licen_buss_sephere']);?>" placeholder="登记经营范围" />
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">联系人</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="comp[comp_contacter]" value="<?php echo($comp['comp_contacter']);?>" placeholder="联系人" />
            </div>
        </div>

        <div class="col-sm-4">
            <label class="col-sm-4 control-label">联系电话</label>

            <div class="col-sm-8">
                <input type="text" class="form-control" <?php if ($disabled):?> disabled="" <?php endif;?>name="comp[comp_phone]" value="<?php echo($comp['comp_phone']);?>" placeholder="联系电话" />
            </div>
        </div>
    </div>
</div>
                        </div>
                    </div>
                    <!--营业执照信息信息结束-->

                    <!--生产经营信息开始-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-cogs text-success"></i> 生产经营信息
                            </h5>
                        </div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">所属行业</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_industry]" value="<?php echo($buss['buss_industry']);?>" placeholder="企业所属行业" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">主要产品</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_main_product]" value="<?php echo($buss['buss_main_product']);?>" placeholder="企业主要产品、所需原料" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">主要采购</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_main]" value="<?php echo($buss['buss_main']);?>" placeholder="企业主要采购原料" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">经营场所面积</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="buss[buss_area]" value="<?php echo($buss['buss_area']);?>" placeholder="经营场所面积" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                                <span class="input-group-addon">M²</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">经营地址</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="buss_address" name="buss[buss_address]" value="<?php echo($buss['buss_address']);?>" placeholder="生成经营地址" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                                <span class="input-group-addon cursor sync-licen-addr">住所</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">经营人数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_employee]" value="<?php echo($buss['buss_employee']);?>" placeholder="生成经营人数" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全管理机构</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_security_agence]" value="<?php echo($buss['buss_security_agence']);?>" placeholder="生成安全管理机构" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全管理员</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_security_manager]" value="<?php echo($buss['buss_security_manager']);?>" placeholder="安全管理人数" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">持证人数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_security_auth]" value="<?php echo($buss['buss_security_auth']);?>" placeholder="安全管理持证人数" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">资产总计</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="buss[buss_asset_sum]" value="<?php echo($buss['buss_asset_sum']);?>" placeholder="经营资产总计，单位：万元" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                                <span class="input-group-addon">万元</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">年营业收入</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="buss[buss_year_sale]" value="<?php echo($buss['buss_year_sale']);?>" placeholder="企业年营业总收入" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                                <span class="input-group-addon">万元</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">年主营收入</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="buss[buss_year_income]" value="<?php echo($buss['buss_year_income']);?>" placeholder="主营业务年收入" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                                <span class="input-group-addon">万元</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">期末从业数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_end_employee]" value="<?php echo($buss['buss_end_employee']);?>" placeholder="期末从业人数" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">应缴社保人数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_should_insurance]" value="<?php echo($buss['buss_should_insurance']);?>" placeholder="应缴纳社保人数" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">实缴社保人数</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_insuranced]" value="<?php echo($buss['buss_insuranced']);?>" placeholder="实缴社保人数" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全证书等级</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_certi_level]" value="<?php echo($buss['buss_certi_level']);?>" placeholder="企业安全证书等级" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全证书编号</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="buss[buss_certi_sn]" value="<?php echo($buss['buss_certi_sn']);?>" placeholder="企业安全证书编号" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">安全证书日期</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control datepicker" name="buss[buss_certi_date]" value="<?php if ($buss['buss_certi_date']):?><?php echo(date('Y-m-d' , $buss['buss_certi_date']));?><?php endif;?>" placeholder="安全证书日期" <?php if ($disabled):?> disabled="" <?php endif;?>/>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">生产类企业</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="buss[buss_is_pro]" <?php if ($disabled):?> disabled="" <?php endif;?>> <?php unset($k, $v); $k_index = 0; foreach ((array)$boolean as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>" <?php if ($buss['buss_is_pro'] == $k):?> selected="selected" <?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">重点监管</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="buss[buss_is_focus]" <?php if ($disabled):?> disabled="" <?php endif;?>> <?php unset($k, $v); $k_index = 0; foreach ((array)$boolean as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>" <?php if ($buss['buss_is_focus'] == $k):?> selected="selected" <?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">重大危险源</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="buss[buss_is_danger]" <?php if ($disabled):?> disabled="" <?php endif;?>> <?php unset($k, $v); $k_index = 0; foreach ((array)$boolean as $k => $v): $k_index ++;?> <option value="<?php echo($k);?>" <?php if ($buss['buss_is_danger'] == $k):?> selected="selected" <?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                    <!--生产经营信息结束-->

                    <!--关注信息开始-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-heart text-success"></i> 关注信息
                            </h5>
                        </div>

                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label"><span class="label label-default">关注专利</span></label>
                                        <div class="col-sm-8">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label"><span class="label label-default">关注企业</span></label>
                                        <div class="col-sm-8">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label"><span class="label label-default">关注项目</span></label>
                                        <div class="col-sm-8">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">专利关键字</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favpatent[fav_keyword]" placeholder="一行一个，下同" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favpatent['fav_keyword']):?><?php echo($favpatent['fav_keyword']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">所属行业</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favcompany[fav_industry]" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favcompany['fav_industry']):?><?php echo($favcompany['fav_industry']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">项目关键字</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favprojects[fav_keyword]" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favprojects['fav_keyword']):?><?php echo($favprojects['fav_keyword']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">专利申请人</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favpatent[fav_pa]" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favpatent['fav_pa']):?><?php echo($favpatent['fav_pa']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">主要产品</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favcompany[fav_product]" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favcompany['fav_product']):?><?php echo($favcompany['fav_product']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">项目主体</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favprojects[fav_cname]" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favprojects['fav_cname']):?><?php echo($favprojects['fav_cname']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">专利权利人</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favpatent[fav_cpa]" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favpatent['fav_cpa']):?><?php echo($favpatent['fav_cpa']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">主要采购</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favcompany[fav_purch]" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favcompany['fav_purch']):?><?php echo($favcompany['fav_purch']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="col-sm-4 control-label">项目应用领域</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" name="favprojects[fav_field]" <?php if ($disabled):?> disabled="" <?php endif;?>><?php if ($favprojects['fav_field']):?><?php echo($favprojects['fav_field']);?><?php endif;?></textarea>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                    <!--关注信息结束-->
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

        $('.sync-licen-addr').on('click' , function() {
            $('#buss_address').val($('#licen_reg_addr').val());
        });
    </script>
</body>

</html>
