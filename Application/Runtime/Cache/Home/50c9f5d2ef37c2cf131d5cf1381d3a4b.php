<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <link href="/toshop/Public/Home/css/login.css" rel="stylesheet">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/toshop/Public/Lib/font-awesome-4.7.0/css/font-awesome.css">

</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="modal-body text-center contents"></h3>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col-xs-4 col-xs-offset-4 login-border one">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4 login-img">
                    <img src="/toshop/Public/Home/images/login/logo.png">
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
                    <button class="btn btn-block login-btn" id="login">登录</button>
                <div>
                    <input class="pass" type="checkbox">记住密码
                    <a href="#" class="pass-a">用户注册</a>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <a href="../Index/index.html" class="login-right">返回首页</a>
                </div>
            </div>
        </div>



        <div class="col-xs-4 col-xs-offset-4 login-border two">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4 login-img">
                    <img src="/toshop/Public/Home/images/login/logo.png">
                </div>
                <div class="col-xs-8 col-xs-offset-2">
                    <form action="register" method="post" id="registerform">
                        <div class="form-group">
                            <label class="sr-only"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                <input class="form-control" type="text" name="name" placeholder="请输入用户名" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                <input class="form-control" type="password" name="psw" placeholder="请输入密码" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input class="form-control" type="text" name="phone" id="phone" placeholder="请输入电话号" autocomplete="off">
                                <span class="input-group-btn"><button class="btn btn-info" id="phonesend">发送短信</button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code-fork" aria-hidden="true"></i></span>
                                <input class="form-control" type="text" placeholder="请输入验证码" autocomplete="off" id="code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-snapchat-square" aria-hidden="true"></i></span>
                                <select class="form-control" name="sex">
                                    <option value="1">男</option>
                                    <option value="0">女</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-block" id="register">注册</button>
                        <a type="button" class="btn btn-info btn-block backlogin">返回登录</a>
                    </form>
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
</div>
</body>
</html>
<script>
    $(function () {
        $('.pass-a').click(function () {
            $('.one').animate({
                left:'10%',
                opacity:0,
                zIndex:-1
            },500,function () {
                $('.two').animate({
                    left:0,
                    opacity:1,
                    zIndex:2
                },500)
            })
        });

        $('.backlogin').click(function () {
            $('.two').animate({
                left:'10%',
                opacity:0,
                zIndex:-1
            },500,function () {
                $('.one').animate({
                    left:0,
                    opacity:1,
                    zIndex:2
                },500)
            })
        });


        //短信验证
        var k;
        let timephone;
        $('#phonesend').click(function (e) {
            e.preventDefault();
            let phone =  $('#phone').val();
            var time = 60;
            let phonesend = $(this);
            $.ajax({
                type:'POST',
                url:'send_code',
                data:'telphone='+phone,
                dataType:'JSON',
                success(msg){
                    if (msg.code == 100){
                        $('.contents').text('请输入正确的电话格式');
                        $('#myModal').modal('show');
                    }else {
                        changetime();
                        timephone = setInterval(changetime,1000);
                        function changetime() {
                            if (time>0){
                                time--;
                                phonesend.text(time+'s');
                                phonesend.prop('disabled',true)
                            } else {
                                phonesend.text('发送短信');
                                clearInterval(timephone);
                                phonesend.prop('disabled',false)
                            }
                        }
                        setTimeout(function () {
                            msg = undefined;
                        },180000);
                        k = msg.k;
                    }
                }
            })
        });

        //注册监听
        $('#register').click(function () {
           let name  = $('#registerform [name="name"]').val();
           let psw  = $('#registerform [name="psw"]').val();
           let codes = $('#code').val();
           let phone = $('#phone').val();
           let sex = $('#registerform [name="sex"]').val();
            if (name.length==0){
               $('.contents').text('用户名不能为空');
               $('#myModal').modal('show');
               return
           }
           if (psw.length==0){
               $('.contents').text('密码不能为空');
               $('#myModal').modal('show');
               return
           }
           if (phone.length==0){
               $('.contents').text('请输入电话号码');
               $('#myModal').modal('show');
               return
           }
           if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(phone))) {
               $('.contents').text('请输入正确的手机格式');
               $('#myModal').modal('show');
               return
           }
            if (codes != k){
                $('.contents').text('请输入正确的验证码或你的验证码已过期');
                $('#myModal').modal('show');
                return
            }
            $.ajax({
                type:'post',
                url:'register',
                data:'name='+name+'&psw='+psw+'&phone='+phone+'&sex='+sex,
                success(msg){
                    if (msg==1){
                        $('.contents').text('你的用户名'+name+'已存在');
                        $('#myModal').modal('show');
                    } else if (msg==2){
                        $('.contents').text('你的电话号码'+phone+'已注册');
                        $('#myModal').modal('show');
                    } else if (msg==3){
                        $('.contents').text('注册成功');
                        $('#myModal').modal('show');
                        $('#name').val(name);
                        $('#psw').val(psw);
                        $('#registerform [name="name"]').val("");
                        $('#registerform [name="psw"]').val("");
                        $('#code').val("");
                        $('#phone').val("");
                        $('#phonesend').prop('disabled',false).text('发送短信');
                        clearInterval(timephone);
                        $('#myModalregister').modal('hide');
                    } else {
                        $('.contents').text('注册失败');
                        $('#myModal').modal('show');
                    }
                }
            })
        });

        function checkMobile(){
            var sMobile = document.mobileform.mobile.value;
            if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(sMobile))){
                alert("不是完整的11位手机号或者正确的手机号前七位");
                document.mobileform.mobile.focus();
                return false;
            }
        }

        $('.pass-a').click(function () {
            $('#myModalregister').modal('show');
        });

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
                        $('.contents').text('用户名或密码错误');
                        $('#myModal').modal('show');
                    }
                }
            })
        })
    })
</script>