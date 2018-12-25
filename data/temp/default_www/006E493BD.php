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
<link rel="stylesheet" href="http://newcaifu.d/template/style/css/plugins/datapicker/datepicker3.css">
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <!--产品信息-->
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>
                            <i class="fa fa-list text-success"></i> 数据详情
                        </h5>
                    </div>

                    <div class="ibox-content">
                        <!--filter start-->
                        <div class="row row-margin-top">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-right">单位代码</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control label-opt" data-key="csn" placeholder="单位代码" value="<?php echo($filter['csn']);?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-right">产品代码</label>
                                    <div class="col-sm-10">
                                        <div class="input-group modal-date">
                                            <input type="text" class="form-control label-opt" data-key="psn" placeholder="产品代码" value="<?php echo($filter['psn']);?>" />
                                            <span class="input-group-addon cursor" data-toggle="modal" data-target="#product-list"><i class="fa fa-list"></i>目录查询</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-right">进出口类型</label>
                                    <div class="col-sm-10">
                                        <select class="form-control label-opt" data-key="type">
                                            <option value="0">全部</option> <?php unset($k, $v); $k_index = 0; foreach ((array)$sta_type as $k => $v): $k_index ++;?> <option value="<?php echo($v);?>" <?php if ($filter['type'] == $v):?> selected="selected"<?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row row-margin-top">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-right">第一数量</label>
                                    <div class="col-sm-10">
                                        <div class="input-group modal-date">
                                            <input type="text" class="form-control label-opt" data-key="snums" value="<?php echo($filter['snums']);?>" placeholder="起始数量">
                                            <span class="input-group-addon">至</span>
                                            <input type="text" class="form-control label-opt" data-key="enums" value="<?php echo($filter['enums']);?>" placeholder="最大数量">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-right">美元值</label>
                                    <div class="col-sm-10">
                                        <div class="input-group modal-date">
                                            <input type="text" class="form-control label-opt" data-key="samount" value="<?php echo($filter['samount']);?>" placeholder="起始金额">
                                            <span class="input-group-addon">至</span>
                                            <input type="text" class="form-control label-opt" data-key="eamount" value="<?php echo($filter['eamount']);?>" placeholder="最大金额">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-right">年份</label>
                                    <div class="col-sm-10">
                                        <select class="form-control label-opt" data-key="year">
                                            <option value="0">全部</option> <?php unset($k, $v); $k_index = 0; foreach ((array)$filter_year as $k => $v): $k_index ++;?> <option value="<?php echo($v);?>" <?php if ($filter['year'] == $v):?> selected="selected"<?php endif;?>><?php echo($v);?></option> <?php endforeach;?> </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row row-margin-top text-center">
                            <div class="col-md-12">
                                <a href="javascript:;" class="btn btn-xs btn-primary pull-right" data-url="haikwan-index" id="search-btn" style="margin-top:5px;margin-right: 15px;" id="filter_sbtn">
                                    <i class="fa fa-search"></i> 搜 索
                                </a>

                                <a href="<?php echo(RGX\router::url('%s-index' , $_MODULE)); ?>" class="btn btn-xs btn-warning pull-right" style="margin-top:5px;margin-right: 15px;">
                                    <i class="fa fa-circle-o"></i> 重 置
                                </a>
                            </div>
                        </div>
                        <div class="row-margin-top"></div>
                        <!--filter end-->

                        <!--data table start-->
                        <table class="table table-striped table-hover dataTables">
                            <thead>
                                <th class="text-center" width="10%">单位代码</th>
                                <th class="center" width="18%">单位名称</th>
                                <th class="text-center" width="10%">产品代码</th>
                                <th class="center" width="10%">产品名称</th>
                                <th class="text-center" width="8%">计量单位</th>
                                <th width="8%">第一数量</th>
                                <th class="center" width="8%">美元值</th>
                                <th class="center" width="10%">进出口类型</th>
                                <th class="text-center" width="8%">发生年份</th>
                            </thead> <?php if (empty($list)):?> <tr>
                                <table class="table table-striped dataTables">
                                    <tr><td>暂无记录</td></tr>
                                </table>
                            </tr> <?php endif;?><tbody>
                            <tr>
                                <td class="text-center">合计</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo(number_format($total_nums));?></td>
                                <td class="center text-warning">$<?php echo(number_format($total_usd));?></td>
                                <td></td>
                                <td></td>
                            </tr> <?php unset($k, $v); $k_index = 0; foreach ((array)$list as $k => $v): $k_index ++;?> <tr class="center" id="item-<?php echo($v['sta_id']);?>">
                                <td class="text-center"> <?php echo($v['hg_company_sn']);?> </td>
                                <td class="project-title"> <?php echo($v['hg_company_name'] ? : '-');?> </td>
                                <td class="text-center"> <?php echo($v['hg_product_sn'] ? : '-');?> </td>
                                <td class="center"> <?php echo($v['hg_product_name'] ? : '-');?> </td>
                                <td class="text-center"> <?php echo($v['sta_unit'] ? : '-');?> </td>
                                <td > <?php echo(number_format($v['sta_nums']));?> </td>
                                <td class="center text-warning">
                                    $<?php echo(number_format($v['sta_usd']));?> </td>
                                <td class="center"> <?php echo($sta_type[$v['sta_type']]);?> </td>
                                <td class="text-center"> <?php echo(date('Y' , $v['sta_date']));?> </td>
                            </tr> <?php endforeach;?> </tbody>
                        </table>
                        <div class="pull-right">
                            <style type="text/css">
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
                        <!--data table end-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product list modal start-->
    <div class="modal inmodal fade" id="product-list" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">海关进出口产品名录</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td width="15%">序号</td><td width="30%">代码</td><td>名称</td>
                            </tr> <?php unset($k, $v); $k_index = 0; foreach ((array)$product_list as $k => $v): $k_index ++;?> <tr>
                                <td><?php echo($v['hg_product_id']);?></td><td><?php echo($v['hg_product_sn']);?></td><td><?php echo($v['hg_product_name']);?></td>
                            </tr> <?php endforeach;?> </thead>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <!-- product list modal end-->
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
