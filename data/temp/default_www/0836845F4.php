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
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
    <h5><i class="fa fa-support"></i> <?php echo($_pos['cur']);?></h5> <?php if ($_MODULE != 'tender'):?> <?php if ($_ACTION == 'index' || $_ACTION == 'list' || true):?> <?php if ($add_url):?> <a href="<?php echo($add_url);?>" class="btn btn-xs btn-success pull-right" id="add_rule_btn">
	        <i class="fa fa-plus"></i> 新增
	    </a> <?php else:?> <a href="<?php echo(RGX\router::url('%s-add', $_MODULE)); ?>" class="btn btn-xs btn-success pull-right" id="add_rule_btn">
	        <i class="fa fa-plus"></i> 新增
	    </a> <?php endif;?><?php endif;?><?php endif;?></div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">
                                            <input type="checkbox" id="checkall" <?php if (empty($list)):?> disabled="disabled" <?php endif;?>/>
                                        </th>
                                        <th width="10%" align="center">封面图片</th>
                                        <th width="22%">商品名称</th>
                                        <th width="8%">库存数量</th>
                                        <th width="18%">规格属性</th>
                                        <th width="18%">供货价格</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                </thead>
                                <tbody> <?php if (empty($list)):?> <tr>
                                        <table class="table table-bordered">
                                            <tr><td>暂无数据</td></tr>
                                        </table>
                                    </tr> <?php endif;?><?php unset($k, $v); $k_index = 0; foreach ((array)$list as $k => $v): $k_index ++;?> <tr id="item-<?php echo($v['goods_id']);?>">
                                        <td>
                                            <input type="checkbox" class="i-checks" value="<?php echo($v['goods_id']);?>" />
                                        </td>

                                        <td>
                                            <img src="http://matchmaking.d/data/attachment/<?php echo($v['goods_cover']);?>" class="list-cover" />
                                        </td>

                                        <td><?php echo($v['goods_name']);?></td>
                                        <td><?php echo($v['goods_storage']);?></td>
                                        <td> <?php if (!empty($v['goods_specs'])):?> <?php unset($sk, $sv); $sk_index = 0; foreach ((array)$v['goods_specs'] as $sk => $sv): $sk_index ++;?> <p class="tdp">
                                                    <span class="btn btn-xs"><?php echo($sv['goods_spec_key']);?></span>
                                                    <span class="detail"><?php echo($sv['goods_spec_val']);?></span>
                                                </p> <?php endforeach;?> <?php else:?> 无 <?php endif;?></td>
                                        <td> <?php if (!empty($v['goods_price'])):?> <?php unset($sk, $sv); $sk_index = 0; foreach ((array)$v['goods_price'] as $sk => $sv): $sk_index ++;?> <p class="tdp">
                                                    <span class="btn btn-xs"><?php echo($sv['goods_start']);?> - <?php echo($sv['goods_end']);?></span>
                                                    <span class="detail"><?php echo($sv['goods_price']);?>元/件</span>
                                                </p> <?php endforeach;?> <?php else:?> 无 <?php endif;?></td>
                                        <td>
                                            <a class="btn btn-xs btn-success" title="编辑<?php echo($v['goods_name']);?>" href="<?php echo(RGX\router::url('%s-add-id-%d' , $_MODULE, $v['goods_id'])); ?>">编辑</a>
                                            <a href="<?php echo(RGX\router::url('%s-del-id-%d' , $_MODULE, $v['goods_id'])); ?>" data-confirm="操作不可撤销，确认吗？" data-target="#item-<?php echo($v['goods_id']);?>" class="btn btn-xs btn-danger btn-delete">
                                                删除
                                            </a>
                                        </td>
                                    </tr> <?php endforeach;?> </tbody>
                            </table>
                        </div>
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
                </div>
            </div>
        </div>
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


</body>

</html>
