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
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins fixed-height">
                    <div class="ibox-title">
                        <h5><?php echo($_pos['cur']);?></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row row-margin-top">

    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-sm-2 control-label text-center">录取学校</label>
            <div class="col-sm-10">
                <select class="form-control label-opt" data-key="school">
                    <option value="0">全部</option><?php unset($k, $v); $k_index = 0; foreach ((array)$school as $k => $v): $k_index ++;?><option value="<?php echo($k);?>" <?php if ($filter['school'] == $k):?> selected="selected"<?php endif;?>><?php echo($v);?></option><?php endforeach;?></select>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center">初试分数</label>
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group modal-date">
                            <input type="text" class="form-control label-opt" data-key="sexam" value="<?php echo($filter['sexam']);?>" placeholder="起始分数">
                            <span class="input-group-addon">至</span>
                            <input type="text" class="form-control label-opt" data-key="eexam" value="<?php echo($filter['eexam']);?>" placeholder="最大分数">
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
            <label class="col-sm-2 control-label text-center">考试年份</label>
            <div class="col-sm-10">
                <select class="form-control label-opt" data-key="year">
                    <option value="0">全部</option>
                    <option value="2016" <?php if ($filter['year'] == 2016):?> selected="selected"<?php endif;?>>2016年</option>
                    <option value="2017" <?php if ($filter['year'] == 2017):?> selected="selected"<?php endif;?>>2017年</option>
                    <option value="2018" <?php if ($filter['year'] == 2018):?> selected="selected"<?php endif;?>>2018年</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center">复试分数</label>
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group modal-date">
                            <input type="text" class="form-control label-opt" data-key="smeeting" value="<?php echo($filter['smeeting']);?>" placeholder="起始分数">
                            <span class="input-group-addon">至</span>
                            <input type="text" class="form-control label-opt" data-key="emeeting" value="<?php echo($filter['emeeting']);?>" placeholder="最大分数">
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
            <label class="col-sm-2 control-label text-center">学习形式</label>
            <div class="col-sm-10">
                <select class="form-control label-opt" data-key="stype">
                    <option value="0">全部</option>
                    <option value="1" <?php if ($filter['stype'] == 1):?> selected="selected"<?php endif;?>>全日制</option>
                    <option value="2" <?php if ($filter['stype'] == 2):?> selected="selected"<?php endif;?>>非全日制</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center">累计总分</label>
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group date">
                            <input type="text" class="form-control label-opt" data-key="stotal" placeholder="开始时间" value="<?php echo($filter['stotal']);?>" />
                            <span class="input-group-addon">至</span>
                            <input type="text" class="form-control label-opt" data-key="etotal" placeholder="结束时间" value="<?php echo($filter['etotal']);?>" />
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
            <label class="col-sm-2 control-label text-center">录取专业</label>
            <div class="col-sm-10">
                <select class="form-control label-opt" data-key="mtype">
                    <option value="0">全部</option>
                    <option value="1" <?php if ($filter['mtype'] == 1):?> selected="selected"<?php endif;?>>法学</option>
                    <option value="2" <?php if ($filter['mtype'] == 2):?> selected="selected"<?php endif;?>>非法学</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center">筛选总数</label>
            <div class="col-sm-11">
                <input type="text" style="border: none" class="form-control" value="共计 <?php echo($pobj['total']);?> 人" disabled="disabled" />
            </div>
        </div>
    </div>
</div>

<div class="row row-margin-top">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="col-sm-1 control-label text-center" style="margin-left: 8px; width: 50px">数据概况</label>
            <div class="col-sm-11 data-summary">
                <p>
                    <span class="btn btn-danger btn-xs">初试</span>最低分-<b class="text-danger"><?php echo($summary['exam']['low']);?></b> ，最高分-<b class="text-warning"><?php echo($summary['exam']['high']);?></b>，平均分-<b class="text-info"><?php echo($summary['exam']['averg']);?></b>
                </p>
                <p>
                    <span class="btn btn-info btn-xs">复试</span>最低分-<b class="text-danger"><?php echo($summary['meeting']['low']);?></b> ，最高分-<b class="text-warning"><?php echo($summary['meeting']['high']);?></b>，平均分-<b class="text-info"><?php echo($summary['meeting']['averg']);?></b>
                </p>
                <p>
                    <span class="btn btn-warning btn-xs">总分</span>最低分-<b class="text-danger"><?php echo($summary['total']['low']);?></b> ，最高分-<b class="text-warning"><?php echo($summary['total']['high']);?></b>，平均分-<b class="text-info"><?php echo($summary['total']['averg']);?></b>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row row-margin-top text-center">
    <div class="col-md-12">
        <a href="javascript:;" class="btn btn-xs btn-primary pull-right" data-url="stat-score" id="search-btn" style="margin-top:5px;margin-right: 15px;" id="filter_sbtn">
            <i class="fa fa-search"></i> 搜 索
        </a>

        <a href="<?php echo(RGX\router::url('graduate-score')); ?>" class="btn btn-xs btn-warning pull-right" style="margin-top:5px;margin-right: 15px;">
            <i class="fa fa-circle-o"></i> 重 置
        </a>
    </div>
</div>
<div class="row-margin-top"></div>
<style type="text/css">
.data-summary {margin-top: -2px;}
.data-summary p {
    display: inline-block;
    line-height: 33px;
    margin-right: 10px;
}
</style>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>考试年份</th>
                                    <th>考试姓名</th>
                                    <th>准考证号</th>
                                    <th>录取专业</th>
                                    <th>研究方向</th>
                                    <th>初试分数</th>
                                    <th>复试分数</th>
                                    <th>累计总分</th>
                                    <th>学习形式</th>
                                    <th>录取学校</th>
                                </tr>
                            </thead>

                            <tbody> <?php unset($k, $v); $k_index = 0; foreach ((array)$list as $k => $v): $k_index ++;?> <tr>
                                    <td><?php echo($v['log_year']);?></td>
                                    <td><?php echo($v['log_name']);?></td>
                                    <td><?php echo($v['log_sn']);?></td>
                                    <td><?php echo($v['log_major']);?></td>
                                    <td><?php echo($v['log_subject']);?></td>
                                    <td> <?php if ($v['log_exam'] > 0):?> <?php echo($v['log_exam']);?> <?php else:?> 推荐免试 <?php endif;?></td>
                                    <td> <?php if ($v['log_meeting'] > 0):?> <?php echo($v['log_meeting']);?> <?php else:?> 推荐免试 <?php endif;?></td>
                                    <td> <?php if ($v['log_total'] > 0):?> <?php echo($v['log_total']);?> <?php else:?> 推荐免试 <?php endif;?></td>
                                    <td><?php echo($v['log_study']);?></td>
                                    <td><?php echo($school[$v['log_school']]);?></td>
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

    <script src="http://angel.d/static/js/jquery.min.js"></script>
<script src="http://angel.d/template/style/js/bootstrap.min.js?v=3.3.6"></script>
<script src="http://angel.d/template/style/js/content.min.js?v=1.0.0"></script>
<script src="http://angel.d/static/dialog/lhgdialog.min.js?skin=discuz&amp;1"></script>
<script src="http://angel.d/static/js/RGX.lib.min.js"></script>
<script src="http://angel.d/static/js/rgx.js"></script>
<script src="http://angel.d/template/style/js/common.js"></script>
<script src="http://angel.d/template/style/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="http://angel.d/static/js/upload.js"></script>


</body>

</html>
