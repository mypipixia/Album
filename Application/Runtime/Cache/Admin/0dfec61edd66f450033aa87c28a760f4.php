<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet"/>
    <link href="/toshop/Public/Admin/css/login.css" rel="stylesheet" type="text/css" />
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.min.js"></script>
</head>

<body>
<div class="login_box">

    <div class="login">
        <div class="login_name">
            <p>后台管理系统</p>
        </div>
        <input name="username" type="text"  placeholder="用户名" autocomplete="off" />
        <input name="password" type="password" id="password" placeholder="密码"/>
        <input value="登录" style="width:100%;" type="submit" data-toggle="modal" data-target="#myModal">




        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                        </h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</div>
</body>
</html>
<script>
    $(function () {
        $('[type="submit"]').click(function (e) {
            let name = $('[name="username"]').val();
            let psw = $('[name="password"]').val();
            $.ajax({
                type:'POST',
                url:'tologin',
                data:'username='+name+'&password='+psw,
                success(msg){
                    if (msg==1){
                        window.location = "../Index/index.html";
                    } else if (msg==0) {
                        $('#myModalLabel').text('账号已冻结');
                        $('.modal-body').text('请联系相关人员');
                    }else if(msg==2){
                        $('#myModalLabel').text('账号或密码输入错误');
                        $('.modal-body').text('请检查账号密码是否输入');
                    }
                }
            })
        })
    })

</script>