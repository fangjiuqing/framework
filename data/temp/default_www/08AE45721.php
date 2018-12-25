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
                            <i class="fa fa-list text-success"></i> <?php echo($_pos['cur']);?> </h5>
                    </div>

                    <div class="ibox-content">
                        <!--filter start-->
                        <div class="row row-margin-top">
                            <input type="hidden" data-key="m" value="<?php echo($filter['m'] ? : 0);?>" />
                            <input type="hidden" data-key="f" value="<?php echo($filter['f'] ? : 0);?>" />
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-center">专利名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control label-opt" data-key="keyword" placeholder="专利名称，如低压长袋双侧脉冲袋式除尘器" value="<?php echo($filter['keyword']);?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-center">专利类型</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control label-opt" data-key="cat" placeholder="专利类型，如实用新型" value="<?php echo($filter['cat']);?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-center">申请号</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control label-opt" data-key="sn" placeholder="申请号，如CN200520000041.7" value="<?php echo($filter['sn']);?>">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row row-margin-top">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-center">申请人</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control label-opt" data-key="pa" placeholder="申请人，如合肥水泥设计研究院" value="<?php echo($filter['pa']);?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-center">当前权利人</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control label-opt" data-key="cpa" placeholder="当前权利人，如合肥水泥设计研究院" value="<?php echo($filter['cpa']);?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label text-center">状态</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control label-opt" data-key="ls1" placeholder="法律状态,如有效专利、失效专利、实质审查" value="<?php echo($filter['ls1']);?>">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row row-margin-top text-center">
                            <div class="col-md-12">
                                <a href="javascript:;" class="btn btn-xs btn-primary pull-right" data-url="patent-index" id="search-btn" style="margin-top:5px;margin-right: 15px;" id="filter_sbtn">
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

                        <!--data table end-->
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
