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
                            <i class="fa fa-list text-success"></i> 产品列表
                        </h5>
                        <div class="ibox-tools">
                            <a role="button" class="btn btn-success btn-xs radius-middle" href="<?php echo(RGX\router::url('@product-add' , $filter['type'])); ?>" style="color:#fff">
                                <i class="fa fa-plus"></i> 添加
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="row row-margin-top">

    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-sm-2 control-label text-center">合同编号</label>
            <div class="col-sm-10">
                <input type="text" class="form-control label-opt" data-key="sn" placeholder="合同编号" value="<?php echo($filter['sn']);?>">
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center">合同金额</label>
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group modal-date">
                            <input type="text" class="form-control label-opt" data-key="samount" value="<?php echo($filter['samount']);?>" placeholder="起始金额">
                            <span class="input-group-addon">至</span>
                            <input type="text" class="form-control label-opt" data-key="eamount" value="<?php echo($filter['eamount']);?>" placeholder="最大金额">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-margin-top">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-sm-2 control-label text-center">甲方单位</label>
            <div class="col-sm-10">
                <select class="form-control label-opt" data-key="groups">
                    <option value="0">全部</option><?php unset($k, $v); $k_index = 0; foreach ((array)$filter_groups as $k => $v): $k_index ++;?><option value="<?php echo($k);?>" <?php if ($filter['groups'] == $k):?> selected="selected"<?php endif;?>><?php echo($v);?></option><?php endforeach;?></select>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center">关键字</label>
            <div class="col-sm-11">
                <input type="text" class="form-control label-opt" data-key="keyword" placeholder="关键字搜索" value="<?php echo($filter['keyword']);?>" />
            </div>
        </div>
    </div>
</div>

<div class="row row-margin-top">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-sm-2 control-label text-center">合同性质</label>
            <div class="col-sm-10">
                <select class="form-control label-opt" data-key="type">
                    <option value="0">全部</option><?php unset($k, $v); $k_index = 0; foreach ((array)$filter_type as $k => $v): $k_index ++;?><option value="<?php echo($k);?>" <?php if ($filter['type'] == $k):?> selected="selected"<?php endif;?>><?php echo($v);?></option><?php endforeach;?></select>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center">签订时间</label>
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group date">
                            <input type="text" class="form-control datepicker label-opt" data-key="sdate" placeholder="开始时间" value="<?php echo($filter['sdate']);?>" />
                            <span class="input-group-addon">至</span>
                            <input type="text" class="form-control datepicker label-opt" data-key="edate" placeholder="结束时间" value="<?php echo($filter['edate']);?>" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-margin-top">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-sm-2 control-label text-center">业务类型</label>
            <div class="col-sm-10">
                <select class="form-control label-opt" data-key="btype"> <?php unset($k, $v); $k_index = 0; foreach ((array)$filter_service as $k => $v): $k_index ++;?> <option value="<?php echo($k ? $k : 999);?>" <?php if ($filter['btype'] == $k):?> selected="selected"<?php endif;?>><?php echo($v['title']);?></option> <?php if (!empty($v['child'])):?> <?php unset($kk, $vv); $kk_index = 0; foreach ((array)$v['child'] as $kk => $vv): $kk_index ++;?> <option value="<?php echo($kk);?>" <?php if ($filter['btype'] == $kk):?> selected="selected"<?php endif;?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo($vv);?></option> <?php endforeach;?> <?php endif;?><?php endforeach;?> </select>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center">所在区域</label>
            <div class="col-sm-4">
                <input type="text" id="region_preview" data-url="<?php echo(RGX\router::url('misc-region-pid-~')); ?>" class="form-control label-opt" data-key="area" value="<?php echo($filter['area']);?>" placeholder="点击选择 ( 默认全部 )" readonly="true" />
                <input type="hidden" data-key="regions" id="regions" class="label-opt" />
            </div>

            <label class="col-sm-2 control-label text-center text-danger">完成进度</label>
            <div class="col-sm-2">
                <input type="number" class="form-control label-opt" data-key="sper" value="<?php echo($filter['sper']);?>" placeholder="开始" />
            </div>
            <div class="col-sm-3">
                <input type="number" class="form-control label-opt" data-key="eper" value="<?php echo($filter['eper']);?>" placeholder="结束" />
            </div>
        </div>
    </div>
</div>

<div class="row row-margin-top">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center" style="margin-left: 8px; width: 50px">已传报告</label>
            <div class="col-sm-11"><?php unset($k, $v); $k_index = 0; foreach ((array)$report_type as $k => $v): $k_index ++;?><span style="min-width: 160px; margin-right:5px; line-height: 30px; display: inline-block;">
                    <input type="checkbox" value="<?php echo($k);?>" <?php if (in_array($k , $retypes)):?> checked="true" <?php endif;?>class="label-opt checkbox report-type" />&nbsp;<?php echo($v);?> </span><?php endforeach;?><input type="hidden" data-key="retypes"  id="retypes" class="label-opt" />
            </div>
        </div>
    </div>
</div>

<div class="row row-margin-top text-center">
    <div class="col-md-12">
        <a href="javascript:;" class="btn btn-xs btn-primary pull-right" data-url="tender-list" id="search-btn" style="margin-top:5px;margin-right: 15px;" id="filter_sbtn">
            <i class="fa fa-search"></i> 搜 索
        </a>

        <a href="<?php echo(RGX\router::url('contract-index')); ?>" class="btn btn-xs btn-warning pull-right" style="margin-top:5px;margin-right: 15px;">
            <i class="fa fa-circle-o"></i> 重 置
        </a>
    </div>
</div>
<div class="row-margin-top"></div>
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
            <a href="<?php echo(RGX\router::url('@%s-view-id-%d' , $_MODULE , $v['patent_id'])); ?>" class="btn btn-success btn-xs radius-small" title="查看">查看</a>
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
