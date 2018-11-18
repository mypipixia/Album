<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品</title>
    <link rel="stylesheet" href="/toshop/Public/Lib/css/bootstrap.css">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.min.js"></script>
    <style>
        .table th{
            text-align: center;
        }
        .table td{
            text-align: center;
        }
        .table a:hover{
            text-decoration: none;
        }
        .navbar{
            margin-bottom: 0;
        }
        .table > thead > tr > th,
        .table > tbody > tr > td,
        .table > tfoot > tr > td{
            vertical-align: middle;
        }

        div.page1 {
            margin-top: 20px;
            margin-right: 10px;
            float: right;
            color: #666;
        }
        div.page1 span.current , div.page1 a{
            border: 1px solid #dcdcdc;
            display: block;
            float: left;
            font-size: 12px;
            margin-right: 5px;
            padding: 3px 10px;
            text-decoration: none;
            border-radius: 3px;
        }
        .dropdown-menu{
            min-width: 0;
            max-width: 95px;
        }
        div.page1 span.current{
            background: #ff5c5c none repeat scroll 0 0 !important;
            border-color: #ff5c5c;
            color: #ffffff !important;
            display: block;
            float: left;
            font-size: 12px;
            cursor: pointer;
        }
        div.page1 a.prev,div.page1 a.next{
            padding: 3px 4px;
        }
        .size tr{
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="modal fade" id="myModals" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel">订单详情</h4>
            </div>
                <table class="table tables">
                    <tr>
                        <th>商品名</th>
                        <th>图片</th>
                        <th>购买数</th>
                        <th>颜色</th>
                        <th>尺寸</th>
                        <th>单价</th>
                        <th>小计</th>
                    </tr>
                </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="modal-body text-center" id="contents">
                是否确认发货
            </h3>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-default tosend">确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!--导航条-->
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-brand" href="#">订单管理:</span>
        </div>
        <ul class="nav navbar-nav tab" id="mytab">
            <li role="presentation" class="active">
                <a href="#home">待发货</a>
            </li>
            <li role="presentation">
                <a href="#menu1">已发货</a>
            </li>
            <li role="presentation">
                <a href="#menu2">已签收</a>
            </li>
        </ul>
    </div>
</nav>
<div class="tab-content">
    <!--待发货-->
    <div id="home" class="tab-pane fade in active">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>订单编号</th>
                    <th>收货人</th>
                    <th>收货地址</th>
                    <th>订单时间</th>
                    <th>总金额</th>
                    <th>商品总数</th>
                    <th>商品详情</th>
                    <th>发货</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td class="orderid"><?php echo ($vo["oderid"]); ?></td>
                        <td><?php echo ($vo["consignee"]); ?></td>
                        <td><?php echo ($vo["address"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$vo["orderdate"])); ?></td>
                        <td><?php echo ($vo["ordermoney"]); ?></td>
                        <td><?php echo ($vo["productnum"]); ?></td>
                        <td><a style="cursor: pointer" class="see" data-id="<?php echo ($vo["oderid"]); ?>">查看商品详情</a></td>
                        <td><a class="btn btn-info send" data-toggle="modal" data-target="#myModal">发货</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="page1">
            <?php echo ($page); ?>
        </div>
    </div>
    <!--已发货订单-->
    <div id="menu1" class="tab-pane fade">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>订单编号</th>
                <th>收货人</th>
                <th>收货地址</th>
                <th>订单时间</th>
                <th>总金额</th>
                <th>商品总数</th>
                <th>商品详情</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($arrs)): $i = 0; $__LIST__ = $arrs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["oderid"]); ?></td>
                    <td><?php echo ($vo["consignee"]); ?></td>
                    <td><?php echo ($vo["address"]); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$vo["orderdate"])); ?></td>
                    <td><?php echo ($vo["ordermoney"]); ?></td>
                    <td><?php echo ($vo["productnum"]); ?></td>
                    <td><a style="cursor: pointer" class="see" data-id="<?php echo ($vo["oderid"]); ?>">查看商品详情</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="page1">
            <?php echo ($page); ?>
        </div>
    </div>
    <!--已签收订单-->
    <div id="menu2" class="tab-pane fade">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>订单编号</th>
                <th>收货人</th>
                <th>收货地址</th>
                <th>订单时间</th>
                <th>总金额</th>
                <th>商品总数</th>
                <th>查看商品详情</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($isget)): $i = 0; $__LIST__ = $isget;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["oderid"]); ?></td>
                    <td><?php echo ($vo["consignee"]); ?></td>
                    <td><?php echo ($vo["address"]); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$vo["orderdate"])); ?></td>
                    <td><?php echo ($vo["ordermoney"]); ?></td>
                    <td><?php echo ($vo["productnum"]); ?></td>
                    <td><a style="cursor: pointer" class="see" data-id="<?php echo ($vo["oderid"]); ?>">查看商品详情</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="page1">
            <?php echo ($page); ?>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(function () {

        $('#seach').click(function () {

        });


        $("#mytab a").click(function (e) {
            e.preventDefault();
            $(this).tab("show");
        });
        var orderid;
        $('.send').click(function () {
             orderid= $(this).parent().prevAll('.orderid').text();
        });
        $('.tosend').click(function () {
            $.ajax({
                type:'post',
                url:'/toshop/index.php/admin/order/send',
                data:'orderid='+orderid,
                dataType:'json',
                success(msg){
                    if (msg == 1){
                        window.location = location
                    } else {
                        alert('修改失败');
                    }
                }
            })
        });

        $('.see').click(function () {
            let orderid = this.dataset['id'];
                $('.tables').children('.de').remove();
                $.ajax({
                    type:'post',
                    url:'tonotpaydetails',
                    data:'orderid='+orderid,
                    dataType:'JSON',
                    success(msg){
                        for (var i=0;i<msg.length;i++){
                            $('.tables').append(' <tr class="de">\n' +
                                '        <td>'+msg[i].name+'</td>\n' +
                                '        <td style="width: 10%"><img style="max-width: 100%;height: 30px" src="/toshop/'+msg[i].img+'"></td>\n' +
                                '        <td>'+msg[i].buynum+'</td>\n' +
                                '        <td>'+msg[i].colorname+'</td>\n' +
                                '        <td>'+msg[i].sizename+'</td>\n' +
                                '        <td>'+msg[i].price+'</td>\n' +
                                '        <td>'+msg[i].buycount+'</td>\n' +
                                '    </tr>')
                        }
                        $('#myModals').modal('show');
                    }
                })
            })
    })
</script>