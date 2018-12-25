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
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            <i class="fa fa-area-chart"></i>
                            海关进出口数据
                        </h5>
                        <!-- <div class="pull-right mr10" style="margin-top: 2px;">
                            <select class="statictis-filter form-control">
                                <option value="1">按客户类型</option>
                                <option value="2">按业务类型</option>
                            </select>
                        </div>
                        <div class="pull-right mr10 filter-year" style="margin-top: 9px;">
                            <span class="label label-danger" data-y="1">近一年</span>
                            <span class="label" data-y="2">近两年</span>
                            <span class="label" data-y="3">近三年</span>
                        </div> -->
                    </div>
                    <div class="ibox-content">
<div id="product-echart" style="height: 600px;width: 100%"></div>
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


    <script src="http://newcaifu.d/template/style/js/echarts.min.js"></script>
    <script>
        var app = echarts.init(document.getElementById('product-echart'));
        var dataMap = {};
        function dataFormatter(obj) {
            var pList = [2011,2012,2013,2014,2015];
            var temp;
            for (var year = 2011; year <= 2015; year++) {
                var max = 0;
                var sum = 0;
                temp = obj[year];
                for (var i = 0, l = temp.length; i < l; i++) {
                    max = Math.max(max, temp[i]);
                    sum += temp[i];
                    obj[year][i] = {
                        name : pList[i],
                        value : temp[i]
                    }
                }
                obj[year + 'max'] = Math.floor(max / 100) * 100;
                obj[year + 'sum'] = sum;
            }
            return obj;
        }

       
       //console.log(import_data);
        // 进口
        dataMap.dataSI = dataFormatter({
            2015:[3752.48,5928.32,13126.86,6635.26,8037.69,12152.15,5611.48,5962.41,7927.89,25203.28,16555.58,8309.38,9069.2,6390.55,24017.11,15427.08,9815.94,9361.99,26447.38,5675.32,714.5,5543.04,11029.13,2194.33,3780.32,208.79,6935.59,2377.83,975.18,1056.15,3225.9],
            2014:[3388.38,4840.23,10707.68,5234,6367.69,9976.82,4506.31,5025.15,7218.32,21753.93,14297.93,6436.62,7522.83,5122.88,21238.49,13226.38,7767.24,7343.19,23014.53,4511.68,571,4359.12,8672.18,1800.06,3223.49,163.92,5446.1,1984.97,744.63,827.91,2592.15],
            2013:[3752.48,5928.32,13126.86,6635.26,8037.69,12152.15,5611.48,5962.41,7927.89,25203.28,16555.58,8309.38,9069.2,6390.55,24017.11,15427.08,9815.94,9361.99,26447.38,5675.32,714.5,5543.04,11029.13,2194.33,3780.32,208.79,6935.59,2377.83,975.18,1056.15,3225.9],
            2012:[3388.38,4840.23,10707.68,5234,6367.69,9976.82,4506.31,5025.15,7218.32,21753.93,14297.93,6436.62,7522.83,5122.88,21238.49,13226.38,7767.24,7343.19,23014.53,4511.68,571,4359.12,8672.18,1800.06,3223.49,163.92,5446.1,1984.97,744.63,827.91,2592.15],
            2011:[2855.55,3987.84,8959.83,3993.8,5114,7906.34,3541.92,4060.72,6001.78,18566.37,11908.49,4905.22,6005.3,3919.45,18901.83,11010.5,6038.08,5687.19,19419.7,3381.54,443.43,3448.77,6711.87,1476.62,2582.53,136.63,4236.42,1527.24,575.33,662.32,1929.59]
        });

        // 出口
        dataMap.dataTI = dataFormatter({
            //max : 26600,
            2015:[3752.48,5928.32,13126.86,6635.26,8037.69,12152.15,5611.48,5962.41,7927.89,25203.28,16555.58,8309.38,9069.2,6390.55,24017.11,15427.08,9815.94,9361.99,26447.38,5675.32,714.5,5543.04,11029.13,2194.33,3780.32,208.79,6935.59,2377.83,975.18,1056.15,3225.9],
            2014:[3388.38,4840.23,10707.68,5234,6367.69,9976.82,4506.31,5025.15,7218.32,21753.93,14297.93,6436.62,7522.83,5122.88,21238.49,13226.38,7767.24,7343.19,23014.53,4511.68,571,4359.12,8672.18,1800.06,3223.49,163.92,5446.1,1984.97,744.63,827.91,2592.15],
            2013:[3752.48,5928.32,13126.86,6635.26,8037.69,12152.15,5611.48,5962.41,7927.89,25203.28,16555.58,8309.38,9069.2,6390.55,24017.11,15427.08,9815.94,9361.99,26447.38,5675.32,714.5,5543.04,11029.13,2194.33,3780.32,208.79,6935.59,2377.83,975.18,1056.15,3225.9],
            2012:[3388.38,4840.23,10707.68,5234,6367.69,9976.82,4506.31,5025.15,7218.32,21753.93,14297.93,6436.62,7522.83,5122.88,21238.49,13226.38,7767.24,7343.19,23014.53,4511.68,571,4359.12,8672.18,1800.06,3223.49,163.92,5446.1,1984.97,744.63,827.91,2592.15],
            2011:[2855.55,3987.84,8959.83,3993.8,5114,7906.34,3541.92,4060.72,6001.78,18566.37,11908.49,4905.22,6005.3,3919.45,18901.83,11010.5,6038.08,5687.19,19419.7,3381.54,443.43,3448.77,6711.87,1476.62,2582.53,136.63,4236.42,1527.24,575.33,662.32,1929.59]
        });
        console.log(dataMap);

        option = {
            baseOption: {
                timeline: {
                    // y: 0,
                    axisType: 'category',
                    // realtime: false,
                    // loop: false,
                    autoPlay: true,
                    // currentIndex: 2,
                    playInterval: 2000,
                    // controlStyle: {
                    //     position: 'left'
                    // },
                    data: ['2011','2012','2013','2014','2015'],
                    label: {
                        formatter : function(s) {
                            return (new Date(s)).getFullYear();
                        }
                    }
                },
                title: {
                    subtext: '数据来自海关'
                },
                tooltip: {
                },
                legend: {
                    x: 'right',
                    data: ['进口', '出口']
                },
                calculable : true,
                grid: {
                    top: 80,
                    bottom: 100,
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow',
                            label: {
                                show: true,
                                formatter: function (params) {
                                    return params.value.replace('\n', '');
                                }
                            }
                        }
                    }
                },
                xAxis: [
                    {
                        'type':'category',
                        'axisLabel':{'interval':0},
                        'data':[
                            '2011','2012','2013','2014','2015'
                        ],
                        splitLine: {show: false}
                    }
                ],
                yAxis: [
                    {
                        type: 'value',
                        name: '货币（美元）'
                    }
                ],
                series: [
                    {name: '进口', type: 'bar'},
                    {name: '出口', type: 'bar'},
                    {
                        name: '占比',
                        type: 'pie',
                        center: ['75%', '35%'],
                        radius: '28%',
                        z: 100
                    }
                ]
            },
            options: [       
                {
                    title : {text: '2011进出口数据'},
                    series : [
                        {data: dataMap.dataSI['2011']},
                        {data: dataMap.dataTI['2011']},
                        {data: [
                            {name: '进口', value: dataMap.dataSI['2011sum']},
                            {name: '出口', value: dataMap.dataTI['2011sum']}
                        ]}
                    ]
                },
                {
                    title : {text: '2012进出口数据'},
                    series : [
                        {data: dataMap.dataSI['2012']},
                        {data: dataMap.dataTI['2012']},
                        {data: [
                            {name: '进口', value: dataMap.dataSI['2012sum']},
                            {name: '出口', value: dataMap.dataTI['2012sum']}
                        ]}
                    ]
                },
                {
                    title : {text: '2013进出口数据'},
                    series : [
                        {data: dataMap.dataSI['2013']},
                        {data: dataMap.dataTI['2013']},
                        {data: [
                            {name: '进口', value: dataMap.dataSI['2013sum']},
                            {name: '出口', value: dataMap.dataTI['2013sum']}
                        ]}
                    ]
                },
                {
                    title : {text: '2014进出口数据'},
                    series : [
                        {data: dataMap.dataSI['2014']},
                        {data: dataMap.dataTI['2014']},
                        {data: [
                            {name: '进口', value: dataMap.dataSI['2014sum']},
                            {name: '出口', value: dataMap.dataTI['2014sum']}
                        ]}
                    ]
                },
                {
                    title : {text: '2015进出口数据'},
                    series : [
                        {data: dataMap.dataSI['2015']},
                        {data: dataMap.dataTI['2015']},
                        {data: [
                            {name: '进口', value: dataMap.dataSI['2015sum']},
                            {name: '出口', value: dataMap.dataTI['2015sum']}
                        ]}
                    ]
                }
            ]
        };

        function cut_str(str,len) { 
            var str_length = 0;
            var str_len = 0;
            str_cut = new String();
            str_len = str.length;
            for (var i = 0; i < str_len; i++) {
              a = str.charAt(i);
              str_length++;
              if (escape(a).length > 4) {
                //中文字符的长度经编码之后大于4 
                str_length++;
              }
              str_cut = str_cut.concat(a);
              if (str_length >= len) {
                str_cut = str_cut;
                return str_cut;
              }
            }
            //如果给定字符串小于指定长度，则返回源字符串； 
            if (str_length < len) {
              return str;
            }
        } 

        $(function () {
            year = 1;
            type = 1;
            app.setOption(option, true);
            
            //load_data();

            /**
             * @param  {[type]}
             * @return {[type]}
             */
            $('.statictis-filter').on('change' , function(){
                var _type = parseInt($(this).find('option:selected').val());
                if ( _type > 0 ) {
                    type = _type;
                }
                load_data();
            });

            $('.filter-year').on('click' , 'span' , function () {
                if ( !$(this).hasClass('label-danger') ) {
                    $('.filter-year span').removeClass('label-danger');
                    $(this).addClass('label-danger');
                    year = parseInt($(this).attr('data-y'));
                    load_data();
                }
                
            });
        });

        function load_data() {
            app1.showLoading();
            var api_url = RGXLIB.url('stat-capi-t-%d-y-%d~', type, year);
            $.get(api_url).done(function (data) {
                app1.hideLoading();
                app1.setOption({
                    title: {
                        text: data.data.title
                    },
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                            type : 'line'        // 默认为直线，可选为：'line' | 'shadow'
                        }
                    },
                    legend: data.data.legend,
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis: data.data.xAxis,
                    
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series: data.data.series
                } , true);
            });
        }

    </script>
</body>
<!--</html>