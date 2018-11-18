<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>结算</title>
    <link href="/yqf/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <script src="/yqf/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/yqf/toshop/Public/Lib/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/yqf/toshop/Public/Lib/font-awesome-4.7.0/css/font-awesome.css">
    <style>
        header{
            width: 100%;
            height: 60px;
            font-size: 30px;
            line-height: 60px;
            text-indent: 20px;
            letter-spacing: 10px;
            background: #dddddd;
        }
        .address p{
            font-size: 16px;
            text-indent: 20px;
            margin-top: 10px;
        }
        .bore{
            width: 100%;
            border: 1px solid black;
            height: 150px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;}

        .bore ul{
            margin: 0;
            padding: 0;
        }
        .bore ul li{
            list-style: none;
            margin-top: 10px;
            text-align: center;
        }
        .bore ul li span{
            font-size: 16px;
        }
        .bore{
            position: relative;
        }
        .bore:hover{
            background: #cccccc;
        }
        .flo{
            position: absolute;
            bottom: 5px;
            right: 5px;
        }
        .shops [class*='col-']{
            height: 40px;
            line-height: 40px;
        }
        .top{
            width: 100%;
            height: 50px;
            background: #23262e;
            padding:0 20px 0 20px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        .top a{
            display: inline-block;
            width: 100px;
            color: white;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
        }
        a:hover{
            text-decoration: none;
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="modal-body text-center text-danger">是否取消支付</h3>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary qr">确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="modal fade" id="myModaltwo" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="modal-body text-center text-danger">是否支付</h3>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary pa">确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="modal fade" id="myModalthree" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="modal-body text-center text-danger contents">支付成功,正在跳转</h3>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<div class="top">
    <a href="" style="color: #178888;opacity: 1">支付</a>
    <a href="../Index/index.html">主页</a>
    <a href="../User/user.html">我的专栏</a>
    <a href="../Shop/shopcar.html">购物车</a>
</div>
<div class="address">
    <p>请选择收货地址</p>
    <div class="container-fluid">
        <div class="row">
            <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-3 si">
                    <div class="bore" data-index="1">
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>" class="ids">
                        <ul>
                            <li><span>收货人:</span><?php echo ($vo["consignee"]); ?></li>
                            <li><span>电话号码:</span><?php echo ($vo["phone"]); ?></li>
                            <li><span>地址:</span><?php echo ($vo["address"]); ?></li>
                        </ul>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <hr>
</div>

<div class="shops">
    <ul class="list-group">
        <li class="list-group-item">
            <div class="row text-center">
                <div class="col-md-1">序号</div>
                <div class="col-md-2">图标</div>
                <div class="col-md-2">商品名称</div>
                <div class="col-md-1">尺寸</div>
                <div class="col-md-1">颜色</div>
                <div class="col-md-1">价格</div>
                <div class="col-md-2">数量</div>
                <div class="col-md-2">小计</div>
            </div>
        </li>
        <?php if(is_array($pay)): $i = 0; $__LIST__ = $pay;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li class="list-group-item">
                <div class="row text-center">
                    <div class="col-md-1 xh"><?php echo ($i); ?></div>
                    <div class="col-md-2"><img src="/yqf/toshop/<?php echo ($c["img"]); ?>" style="max-width: 100%;height: 40px"></div>
                    <div class="col-md-2"><?php echo ($c["pname"]); ?></div>
                    <div class="col-md-1"><?php echo ($c["sizename"]); ?></div>
                    <div class="col-md-1"><?php echo ($c["colorname"]); ?></div>
                    <div class="col-md-1 ps"><?php echo ($c["price"]); ?></div>
                    <div class="col-md-2 dp">
                        <?php echo ($c["num"]); ?>
                    </div>
                    <div class="col-md-2 xj"><?php echo ($c["allprice"]); ?></div>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <div class="panel le">
        <div class="container-fluid">
            <h3>订单价格:￥<span id="price"><?php echo ($allmoney); ?></span></h3>
            <h3>总数:<span id="nums"><?php echo ($allnum); ?></span></h3>
            <a class="btn btn-lg btn-info jie pay">支付</a>
            <a class="btn btn-lg btn-danger jie notpay">取消支付</a>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(function () {
        $('.si:nth-of-type(1) .bore')[0].dataset['index'] = 0;
        $('.si:nth-of-type(1) .bore').append('<div class="flo">\n' +
            '                <i class="fa fa-check" style="color: red;" aria-hidden="true"></i>\n' +
            '            </div>').css({
            border:'1px solid red'
        });

        //取消支付支付
        $('.notpay').click(function () {
            $('#myModal').modal('show');
        });

        $('.qr').click(function () {
            let a;
            $('.bore').each(function (i,e) {
                if (e.dataset['index']==0){
                    a = e.children[0].value;
                }
            });
            $.ajax({
                type:'post',
                url:'notpay',
                data:'addressid='+a,
                dataType:'JSON',
                success(msg){
                    $('#myModal').modal('hide');
                    if (msg==1){
                        $('.contents').text('支付已取消,正在跳转');
                        $('#myModalthree').modal('show');
                        setTimeout(function () {
                            window.location = '../User/user';
                        },2000)
                    }
                }
            })
        });

        // 确认支付
        $('.pay').click(function (e) {
            e.preventDefault();
            $('#myModaltwo').modal('show');
        });

        $('.pa').click(function () {
            let a;
            $('.bore').each(function (i,e) {
                if (e.dataset['index']==0){
                    a = e.children[0].value;
                }
            });
            $.ajax({
                type:'post',
                url:'pay',
                data:'addressid='+a,
                dataType:'JSON',
                success(msg){
                    $('#myModaltwo').modal('hide');
                    if (msg==1){
                        $('.contents').text('支付成功,正在跳转');
                        $('#myModalthree').modal('show');
                        setTimeout(function () {
                            window.location = '../User/user';
                        },2000);
                    }
                }
            })
        });


        $('.bore').click(function () {
            $('.bore').css({
                border:'1px solid black'
            }).children('.flo').remove();
            $('.bore').each(function (i,e) {
                e.dataset['index'] = 1;
            });
            $(this).append('<div class="flo">\n' +
                '                <i class="fa fa-check" style="color: red;" aria-hidden="true"></i>\n' +
                '            </div>').css({
                border:'1px solid red'
            });
            this.dataset['index'] = 0;
        })
    })
</script>