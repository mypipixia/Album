<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>密码设置</title>
    <link href="/yqf/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <script src="/yqf/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <style>
        [class*='col-']{
            height: 34px;
            line-height: 34px;
            margin-bottom: 20px;
        }
        .two{
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row one">
            <div class="col-xs-2 text-right">
                <label>输入旧密码:</label>
            </div>
            <div class="col-xs-10">
                 <input type="password" class="form-control">
            </div>
            <div class="col-xs-2 text-right">
                <label>手机号:</label>
            </div>
            <div class="col-xs-10">
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-info">发送验证码</button>
                    </span>
                </div>
            </div>
            <div class="col-xs-2 text-right">
                <label>输入验证码:</label>
            </div>
            <div class="col-xs-10">
                <input type="text" class="form-control">
            </div>
            <div class="col-xs-10 col-xs-offset-2">
                <button class="btn btn-default btn-block">确认</button>
            </div>

        </div>
        <div class="row two">
            <div class="col-xs-2 text-right">
                <label>请输入新密码:</label>
            </div>
            <div class="col-xs-10">
                <input class="form-control" type="password">
            </div>
            <div class="col-xs-2 text-right">
                <label>请再次输入:</label>
            </div>
            <div class="col-xs-10">
                <input class="form-control" type="password">
            </div>
            <div class="col-xs-10 col-xs-offset-2">
                <button class="btn btn-block btn-default">确认修改</button>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(function () {
        $('.one .btn').click(function (e) {
            $('.one').animate({
                opacity:0,
            },500,function () {
                $('.one').css('display','none');
                $('.two').animate({
                    opacity:1,
                },500)
            })
        })
    })
</script>