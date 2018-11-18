<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>评价</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.js"></script>
    <style>
        img{
            display: block;
            max-width: 100%;
        }
        .table th{
            text-align: center;
        }
        .table td{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">订单详情</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>商品名</th>
                        <th>购买数</th>
                        <th>单价</th>
                        <th>小计</th>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="container">
    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="media">
            <div class="col-xs-8">
                <div class="media-right">
                    <div class="media-heading">
                        <div class="media-left orderid">
                            订单编号:<?php echo ($arr["oderid"]); ?>
                        </div>
                        <div class="media-right">
                            订单用户:<?php echo ($arr["consignee"]); ?>&nbsp
                            用户电话:<?php echo ($arr["phone"]); ?>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="media-left">
                            商品总数:<span><?php echo ($arr["productnum"]); ?></span>件<br>
                            总价:<span><?php echo ($arr["ordermoney"]); ?></span>元
                        </div>
                        <div class="media-right">
                            下单时间:<?php echo (date('Y-m-d H:i:s',$arr["orderdata"])); ?><br>
                            <a class="see" data-id=<?php echo ($arr["oderid"]); ?> style="cursor: pointer;">点击查看详情</a>
                        </div>
                        <div class="media-bottom">
                            订单地址:<?php echo ($arr["address"]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-2">
                <button class="btn btn-info pay" data-id="<?php echo ($arr["oderid"]); ?>"  style="margin-top: 60px">评价</button>
            </div>
        </div><hr><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</body>
</html>
<script>
    $(function () {
        var p;
        $('.pay').click(function () {
            p = this.dataset['id'];
            $('#myModaltwo').modal('show');
        });


        $('.see').click(function () {
            let orderid = this.dataset['id'];
            $('.table').children('.de').remove();
            $.ajax({
                type:'post',
                url:'tonotpaydetails',
                data:'orderid='+orderid,
                dataType:'JSON',
                success(msg){
                    for (var i=0;i<msg.length;i++){
                        $('.table').append(' <tr class="de">\n' +
                            '                        <td>'+msg[i].name+'</td>\n' +
                            '                        <td>'+ msg[i].buynum +'</td>\n' +
                            '                        <td>'+ msg[i].price +'</td>\n' +
                            '                        <td>'+ msg[i].buycount +'</td>\n' +
                            '                    </tr>')
                    }
                    $('#myModal').modal('show');
                }
            })
        })
    })
</script>