<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>购物车</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/toshop/Public/Home/css/go.css">

    <style>
        html body{
            min-width: 1200px;
            margin: 0;
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
    </style>
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="modal-body text-center" style="color: orangered">订单不允许为空</h3>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


<div class="top">
    <a href="" style="color: #178888;opacity: 1">我的购物车</a>
    <a href="../Index/index.html">主页</a>
    <a href="../User/user.html">我的专栏</a>
    <a href="../Shop/statement.html">继续支付</a>
</div>
<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3>购物车</h3>
        </div>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <div class="row text-center">
                <div class="col-md-1">
                    <label>
                        <input type="checkbox" id="pid"> 全选
                    </label>
                </div>
                <div class="col-md-1">序号</div>
                <div class="col-md-2">图标</div>
                <div class="col-md-1">商品名称</div>
                <div class="col-md-1">尺寸</div>
                <div class="col-md-1">颜色</div>
                <div class="col-md-1">价格</div>
                <div class="col-md-2">数量</div>
                <div class="col-md-1">小计</div>
                <div class="col-md-1">操作</div>
            </div>
        </li>
        <?php if(is_array($car)): $i = 0; $__LIST__ = $car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li class="list-group-item">
                <div class="row text-center">
                    <div class="col-md-1">
                        <input type="checkbox" name="chex" data-id="<?php echo ($c["pid"]); ?>">
                    </div>
                    <div class="col-md-1 xh"><?php echo ($i); ?></div>
                    <div class="col-md-2"><img src="/toshop/<?php echo ($c["img"]); ?>" style="max-width: 100%;height: 40px"></div>
                    <div class="col-md-1"><?php echo ($c["pname"]); ?></div>
                    <div class="col-md-1"><?php echo ($c["sizename"]); ?></div>
                    <div class="col-md-1"><?php echo ($c["colorname"]); ?></div>
                    <div class="col-md-1 ps"><?php echo ($c["price"]); ?></div>
                    <div class="col-md-2 dp">
                        <input type="number" class="form-control" value="<?php echo ($c["num"]); ?>" name="numlist" min="1">
                    </div>
                    <div class="col-md-1 xj"><?php echo ($c["allprice"]); ?></div>
                    <div class="col-md-1 bag">删除</div>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>
    <div class="panel le">
        <h3>订单价格:￥<span id="price">0</span></h3>
        <h3>总数:<span id="nums">0</span></h3>
        <a class="btn btn-lg btn-info jie" id="pay">结算</a>
        <a href="clearcar" class="btn btn-lg btn-danger jie">清空</a>
    </div>
</div>

<script src="/toshop/Public/Home/js/shop.js"></script>
</div>
</body>
</html>
<script>
    $(function () {
        $('#pay').click(function () {
            let pid = [];
            $('[name="chex"]').each(function (i,e) {
                if (e.checked){
                    pid.push(parseInt(e.dataset['id']));
                }
            });
            pid = JSON.stringify(pid);
            $.ajax({
                type:'post',
                url:'topay',
                data:'pid='+pid,
                dataType:'json',
                success(msg){
                    if (msg==1){
                        window.location = 'statement';
                    } else {
                        $('#myModal').modal('show');
                        setTimeout(function () {
                            $('#myModal').modal('hide');
                        },1000)
                    }
                }
            })
        })

    })
</script>