<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link href="/yqf/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <link href="/yqf/toshop/Public/Home/css/register.css" rel="stylesheet">
    <script src="/yqf/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/yqf/toshop/Public/Lib/js/bootstrap.js"></script>
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="modal-body text-center">用户名或密码错误</h3>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4 login-border">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4 login-img">
                    <img src="/yqf/toshop/Public/Home/images/login/logo.png">
                </div>
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="form-group login-input">
                        <label class="sr-only">用户名</label>
                        <input class="form-control" type="text" id="name" placeholder="用户名/邮箱" autocomplete="off">
                    </div>
                    <div class="form-group login-input">
                        <label class="sr-only">密码</label>
                        <input class="form-control" type="password" id="psw" placeholder="密码">
                    </div>
                    <button class="btn btn-block login-btn" id="login">注册</button>
                    <div>
                        <a href="login.html" class="pass-a">返回登录</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <a href="../Index/index.html" class="login-right">返回首页</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(function () {
        $('#login').click(function () {
            let name = $('#name').val();
            let psw = $('#psw').val();
            $.ajax({
                type:'POST',
                url:'tologin',
                data:'name='+name+'&psw='+psw,
                success(msg){
                    if (msg==1){
                        window.location = "../Index/index.html"
                    }else {
                        $('#myModal').modal('show');
                    }
                }
            })
        })
    })
</script>