<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>统计</title>
    <script src="https://cdn.bootcss.com/echarts/4.2.0-rc.2/echarts-en.common.js"></script>
</head>
<body>
<div id="main" style="width: 600px;height:400px;"></div>
</body>
</html>
<script>
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '各类商品月销售数'
        },
        tooltip: {},
        legend: {
            data:['销量']
        },
        xAxis: {
            data: ["专辑","写真","门票","周边"]
        },
        yAxis: {},
        series: [{
            name: '销量',
            type: 'bar',
            data: [5, 20, 36, 10]
        }]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);

</script>