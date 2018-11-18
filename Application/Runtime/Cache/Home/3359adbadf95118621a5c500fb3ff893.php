<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>地址</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <link href="/toshop/Public/Home/css/user.css" rel="stylesheet">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/toshop/Public/Lib/font-awesome-4.7.0/css/font-awesome.css">
    <style type="text/css">
        body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
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
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=DD279b2a90afdf0ae7a3796787a0742e"></script>

</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal fade" id="myModals" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="modal-body text-center con" style="color:orangered;"></h3>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加收货地址</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="收货人" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                            <input type="text" name="phone" class="form-control" placeholder="手机号码" autocomplete="off">
                            <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></span>
                            <input type="text" id="reg" name="address" class="form-control" placeholder="收货地址" autocomplete="off">
                            <span class="input-group-addon ditu" style="cursor: pointer">地图</span>
                        </div>
                    </div>
                <div class="di" style="width: 80%;height: 200px;margin-left: 10%">
                    <div id="allmap"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary save">保存</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-block btn-default add">添加新地址</button>
        </div>
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
        <div class="col-xs-12" style="margin-top: 20px">
            <button class="btn btn-danger btn-block del">删除</button>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");    // 创建Map实例
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  // 初始化地图,设置中心点坐标和地图级别
    //添加地图类型控件
    map.addControl(new BMap.MapTypeControl({
        mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));
    map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    map.addEventListener("click",function(e){
        var lngLat = new BMap.Point(e.point.lng,e.point.lat);
        var geoc =new BMap.Geocoder();
        geoc.getLocation(lngLat, function(rs){
            var addComp = rs.addressComponents;
            var province = addComp.province;//省
            var city = addComp.city;//市
            var district = addComp.district;//区或县
            $('#reg').val(province+city+district);
        });
    });
</script>
<script>
    $(function () {
        //删除监听
        $('.del').click(function () {
            var a;
            $('.bore').each(function (i,e) {
                if (e.dataset['index']==0){
                    a = e.children[0].value;
                }
            });
            $.ajax({
               type:'post',
               url:'delre',
               data:{
                   id:a
               },
               success(msg){
                   if (msg==1){
                           location.reload();
                   } else {
                       $('#myModals').modal('show');
                       $('.con').text('删除失败');
                       setTimeout(function () {
                           $('#myModals').modal('hide');
                       },1000)
                   }
               }
           })
        });


        //添加地址
        $('.save').click(function () {
            let name = $('[name="name"]').val();
            let phone = $('[name="phone"]').val();
            let address = $('[name="address"]').val();
            let id = $('[name="id"]').val();
            $.ajax({
                type:'post',
                url:'address',
                data:{
                    name:name,
                    phone:phone,
                    address:address,
                    userid:id
                },
                success(msg){
                    if(msg==1){
                        $('#myModals').modal('show');
                        $('.con').text('添加成功');
                        setTimeout(function () {
                            $('#myModals').modal('hide');
                            location.reload();
                        },500);
                    }else {
                        $('#myModals').modal('show');
                        $('.con').text('添加失败');
                        setTimeout(function () {
                            $('#myModals').modal('hide');
                        },1000)
                    }
                }
            })
        });




        $('.add').click(function () {
            $('#myModal').modal('show');
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