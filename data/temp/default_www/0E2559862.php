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
<style type="text/css">
    #specs .input-group {
        margin-bottom: 10px;
    }
</style>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <form action="<?php echo(RGX\router::url('@%s-save' , $_MODULE)); ?>" method="post" id="sform" class="form-horizontal">
            <input type="hidden" name="data[goods_id]" value="<?php echo($data['goods_id'] ?: 0);?>">
            <div class="row">
                <div class="col-sm-12">
                    <!--商品基本信息开始-->
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-cogs"></i>
                                基本信息
                            </h5>
                            <a class="btn btn-success pull-right" id="submit-form" type="submit">保存内容</a>
                        </div>
                        <div class="ibox-content">
                            <div class="row row-dashed">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="goods_name" name="data[goods_name]" value="<?php echo($data['goods_name']);?>" placeholder="请输入分类名称" maxlength="64">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">商品分类</label>
                                        <div class="col-sm-10">
<select class="form-control" id="cat_parent" name="data[goods_cat_id]"><?php if (false):?><option value="0">├ 作为一级类目</option><?php endif;?><?php unset($k, $v); $k_index = 0; foreach ((array)$cat_tree as $k => $v): $k_index ++;?><option value="<?php echo($v['cat_id']);?>" <?php if ($v['cat_id'] == $data[goods_cat_id]):?> selected<?php endif;?>><?php echo(str_repeat('&nbsp;', ($v['cat_level']) * 5));?>└ <?php echo($v['cat_name']);?> </option><?php endforeach;?></select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">规格属性</label>
                                        <div class="col-sm-10">
                                            <div id="specs"> <?php if ($data['goods_specs']):?> <?php unset($k, $v); $k_index = 0; foreach ((array)$data['goods_specs'] as $k => $v): $k_index ++;?> <div class="input-group">
                                                   <span class="input-group-addon"><?php echo($v['goods_spec_key']);?></span>
                                                   <input type="text" class="form-control" name="specs[<?php echo($v['goods_spec_key']);?>]" value="<?php echo($v['goods_spec_val']);?>">
                                                </div> <?php endforeach;?> <?php else:?> <input type="text" class="form-control" disabled placeholder="请先选择分类" /> <?php endif;?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">库存数量</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="goods_storage" name="data[goods_storage]" value="<?php echo($data['goods_storage']);?>" placeholder="请输入分类名称" maxlength="64">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">阶梯定价</label>
                                        <div class="col-sm-10 nums-prices" style="position: relative;"> <?php if ($data['goods_price']):?> <?php unset($k, $v); $k_index = 0; foreach ((array)$data['goods_price'] as $k => $v): $k_index ++;?> <div class="input-group per90 mb10">
                                                    <input type="number" class="form-control" placeholder="起始数量" name="start[]" value="<?php echo($v['goods_start']);?>" />
                                                    <span class="input-group-addon"> ~ </span>
                                                    <input type="number" class="form-control" placeholder="截止数量" name="end[]" value="<?php echo($v['goods_end']);?>" />
                                                    <span class="input-group-addon"> 价格 </span>
                                                    <input type="number" class="form-control" placeholder="元/件" name="price[]" value="<?php echo($v['goods_price']);?>" />
                                                </div> <?php endforeach;?> <?php else:?> <div class="input-group per90 mb10">
                                                    <input type="number" class="form-control" placeholder="起始数量" name="start[]" />
                                                    <span class="input-group-addon"> ~ </span>
                                                    <input type="number" class="form-control" placeholder="截止数量" name="end[]" />
                                                    <span class="input-group-addon"> 价格 </span>
                                                    <input type="number" class="form-control" placeholder="元/件" name="price[]" />
                                                </div> <?php endif;?><a class="btn btn-xs btn-link pull-right add-price" style="position: absolute;right: 14px; top: 5px">增加</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-4" style="text-align: center;">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="data[goods_cover]" value="<?php echo($data['goods_cover']);?>" />
                                            <img src="<?php if ($data['goods_cover']):?>http://matchmaking.d/data/attachment/<?php echo($data['goods_cover']);?><?php else:?>http://matchmaking.d/static/images/no-pic.png<?php endif;?>" class="add-cover">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--商品基本信息结束-->

                    <!--商品详情开始-->
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>
                                <i class="fa fa-cogs"></i>
                                商品详情
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row row-dashed">
                                <div class="col-sm-12">
                                    <!-- 加载编辑器的容器 -->
                                    <script id="editor" name="content" type="text/plain"> <?php echo($data['goods_detail']);?> </script>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--商品详情结束-->
                </div>
            </div>
        </form>
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


    <script type="text/javascript" charset="utf-8" src="http://matchmaking.d/template/style/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="http://matchmaking.d/template/style/js/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->

<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor', {
    autoHeight: true,
    initialFrameWidth: 1180,
    toolbars: [[
        'fullscreen', 'source', '|', 'undo', 'redo', '|',
        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
        'directionalityltr', 'directionalityrtl', 'indent', '|',
        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
        'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
        'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'insertframe', 'pagebreak', 'template', 'background', '|',
        'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
        'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
    ]]
});
</script>
    <script>
        var allow_min = 1,
            allow_max = 99,
            goods_id  = parseInt("<?php echo($data['goods_id'] ? : 0);?>");

        $(function() {
            /**
             * [选择分类拉取规格]
             * @param  {[type]} ){                             var val [description]
             * @return {[type]}     [description]
             */
            $('#cat_parent').on('change' , function(){
                var val = $(this).find('option:selected').val();
                spe_url = "<?php echo(RGX\router::url('goods-specs-gid-#gid#-cid-~')); ?>" + val;
                spe_url = spe_url.replace('#gid#' , goods_id);
                RGX.get_json(spe_url , function(d) {
                    var specs_html = '';
                    if ( d.code == 0 ) {
                        $.each(d.data , function(k , v){
                            specs_html += '<div class="input-group">';
                            specs_html +=     '<span class="input-group-addon">'+ k +'</span>';
                            specs_html +=     '<input type="text" class="form-control" name="specs['+k+']" placeholder="请输入'+k+'信息" value="'+v+'">';
                            specs_html += '</div>';
                        });
                    }else{
                        specs_html = '<input type="text" class="form-control" disabled placeholder="请先选择分类" />';
                    }
                    $('#specs').empty().html(specs_html);
                });
            });

            /**
             * [最小起订量处理]
             * @param  {[type]} )
             * @return {[type]}
             */
            $('.nums-prices').find('input[name="start[]"]').on('blur' , function() {
                var this_min = parseInt( $(this).val() );
                console.log(this_min);
                // if ( this_min < allow_min ) {
                //     RGX.msg('最小起订量为'  + allow_min);
                //     $(this).val(allow_min).focus();
                // }
            });

            /**
             * [最小起订量处理]
             * @param  {[type]} )
             * @return {[type]}
             */
            $('.nums-prices').find('input[name="end[]"]').on('blur' , function() {
                var this_max = parseInt( $(this).val() );
                console.log(this_max);
                // allow_min = this_max + 1;
            });

            /**
             * [增加新的价格]
             * @param  {[type]} )
             * @return {[type]}   [description]
             */
            $('.add-price').on('click' , function() {
                var add_html  = '<div class="input-group per90 mb10">';
                    add_html +=    '<input type="number" class="form-control" placeholder="起始数量" name="start[]" />';
                    add_html +=    '<span class="input-group-addon"> ~ </span>';
                    add_html +=    '<input type="number" class="form-control" placeholder="截止数量" name="end[]" />';
                    add_html +=    '<span class="input-group-addon"> 价格 </span>';
                    add_html +=    '<input type="number" class="form-control" placeholder="元/件" name="price[]" />';
                    add_html += '</div>';

                $('.nums-prices').append(add_html);
            });

            /**
             * 表单提交
             */
            $('#submit-form').on('click' , function() {
                var request  = new Object();
                request.data = $('#sform').serialize() + '&content=' + ue.getContent();
                request.url  = $('#sform').attr('action');
                request.succ = function(d) {
                    if ( d.code == 0 ) {
                        RGX.succ('操作成功！');
                    }
                }
                RGX.ajaxpost(request);
            });
        });
    </script>
</body>

</html>