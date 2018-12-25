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
                <!--企业信用信息-->
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>
                            <i class="fa fa-credit-card text-success"></i> 信用信息
                        </h5>
                        <div class="ibox-tools">
                            <a role="button" class="btn btn-success btn-xs radius-middle" href="<?php echo(RGX\router::url('@company-add')); ?>" style="color:#fff">
                                <i class="fa fa-pencil"></i> 修改</i>
                            </a>
                        </div>
                    </div>

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

                <!--专利信息-->
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>
                            <i class="fa fa-copyright text-success"></i> 专利信息
                        </h5>
                        <div class="ibox-tools">
                            <a role="button" class="btn btn-success btn-xs radius-middle" href="<?php echo(RGX\router::url('@user-add-type-%d-s-%d' , $filter['type'], $filter['s'])); ?>" style="color:#fff">
                                <i class="fa fa-list"></i> 更多
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-striped dataTables">
    <thead>
        <th class="center" width="8%">专利申请号</th>
        <th class="center" width="13%">专利名称</th>
        <th class="center" width="8%">专利类型</th>
        <th class="center" width="8%">公开号</th>
        <th class="center" width="8%">申请日期</th>
        <th class="center" width="8%">法律状态</th>
        <th class="center" width="10%">发明人</th>
        <th class="center" width="5%">操作</th>
    </thead><?php if (empty($patent_list)):?><tr>
        <table class="table table-striped dataTables">
            <tr><td>暂无记录</td></tr>
        </table>
    </tr><?php endif;?><tbody><?php unset($k, $v); $k_index = 0; foreach ((array)$patent_list as $k => $v): $k_index ++;?><tr class="center" id="item-<?php echo($v['patent_id']);?>">
        <td class="project-title"> <?php echo($v['patent_sn'] ? : '暂无');?> </td>
        <td class="project-title"> <?php echo($v['patent_title'] ? : '暂无');?> </td>
        <td> <?php echo($v['patent_type'] ? : '暂无');?> </td>
        <td> <?php echo($v['patent_pn'] ? : '暂无');?> </td>
        <td> <?php echo(date('Y-m-d' , $v['patent_apply_date']));?> </td>
        <td> <?php echo($v['patent_ls1'] ? : '暂无');?> </td>
        <td> <?php echo($v['patent_in'] ? : '暂无');?> </td>
        

        <td class="center">
            <a href="<?php echo(RGX\router::url('@patent-view-id-%d' , $v['patent_id'])); ?>" class="btn btn-success btn-xs radius-small" title="查看">查看</a>
        </td>
    </tr><?php endforeach;?></tbody>
</table>
<div class="pull-right"><style type="text/css">
	.pagination li {
	    display: block;
	    float: left;
	    background: #fff;
	    border: none;
	    border-radius: 0;
	}
	.paging_jump {
	    width: 90px;
        margin-left: 16px;
	}
	.paging_jump .input-group {
	    width: 100%;
	}

	.paging_jump .input-group .form-control {
	    -webkit-box-shadow: none;
	    box-shadow: none;
	}
</style><?php if ($pobj['total'] && $pobj['max'] > 1):?><ul class="pagination pagination-sm"><?php if ($pobj['prev']):?><li>
        <a class="pagination-atag" href="<?php echo(RGX\router::url($pobj['url'] . "-pn-%d", $pobj['prev'])); ?>" aria-label="Previous" data-pn="<?php echo($pobj['prev']);?>">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li><?php else:?><li class="disabled">
        <a class="pagination-atag" href="javascript:;" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li><?php endif;?><li class="<?php echo($pobj['pn'] == 1 ? 'active' : '');?>">
        <a class="pagination-atag" href="<?php echo(RGX\router::url($pobj['url'] . "-pn-1")); ?>" data-pn="1">1</a>
    </li><?php unset($k, $v); $k_index = 0; foreach ((array)$pobj['link'] as $k => $v): $k_index ++;?><?php if ($v > 1 && $v < $pobj['max']):?><li class="<?php echo($pobj['pn'] == $v ? 'active' : '');?>">
        <a class="pagination-atag" href="<?php if (is_numeric($v)):?><?php echo(RGX\router::url($pobj['url'] . '-'.$pobj['var'].'-%d' , $v)); ?><?php else:?>javascript:void(0);<?php endif;?>" data-pn="<?php echo($v);?>"><?php echo($v);?></a>
    </li><?php endif;?><?php endforeach;?><?php if ($pobj['max'] > 1):?><li class="<?php echo($pobj['pn'] == $pobj['max'] ? 'active' : '');?>">
        <a class="pagination-atag" href="<?php echo(RGX\router::url($pobj['url'] . "-pn-%d", $pobj['max'])); ?>" data-pn="<?php echo($pobj['max']);?>"><?php echo($pobj['max']);?></a>
    </li><?php endif;?><?php if ($pobj['next']):?><li>
        <a class="pagination-atag" href="<?php echo(RGX\router::url($pobj['url'] . "-pn-%d", $pobj['next'])); ?>" aria-label="Next" data-pn="<?php echo($pobj['next']);?>">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li><?php else:?><li class="disabled">
        <a class="pagination-atag" href="javascript:;" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li><?php endif;?><li class="paging_jump">
        <div class="input-group">
            <input type="text" class="form-control paging_pn" value="<?php echo($pobj['pn']);?>"  placeholder="页码" maxlength="5" style="text-align: center" />
            <span class="input-group-btn">
                <button style="height: 26px; padding: 2px 3px;" class="btn btn-info pagination-atag" type="button" data-url="<?php echo(RGX\router::url($pobj['url'] . "-pn-~")); ?>" >
                    GO
                </button>
            </span>
        </div>
    </li>
    <li class="clearfix"></li>
</ul><?php endif;?></div>
<div class="clearfix"></div>

                    </div>
                    <div class="clearfix"></div>
                </div>

                <!--产品信息-->
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>
                            <i class="fa fa-handshake-o text-success"></i> 客户经理
                        </h5>
                    </div>

                    <div class="ibox-content">
                        <div class="col-sm-4">
                            <div class="contact-box">
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img alt="image" class="img-circle m-t-xs img-responsive" src="">
                                        <div class="m-t-xs font-bold">客户经理</div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h3><strong>沈雷</strong></h3>
                                    <p><i class="fa fa-map-marker"></i> 江苏·南京</p>
                                    <address>
                                        <abbr title="Phone">Tel:</abbr> 15380426789
                                    </address>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="col-sm-4 label-control text-right">对客户经理留言</label>
                                <div class="col-sm-8">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 label"></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
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


</body>

</html>
