<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品</title>
    <link rel="stylesheet" href="/toshop/Public/Lib/css/bootstrap.css">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.min.js"></script>
    <script src="/toshop/Public/Admin/js/product.js"></script>
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
<!--模态窗2尺寸设置-->
<div class="modal fade" id="myModalsize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel">尺寸设置</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover size table-condensed">
                    <input type="hidden" name="id">
                    <?php if(is_array($size)): $i = 0; $__LIST__ = $size;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$size): $mod = ($i % 2 );++$i;?><tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sizename" value="<?php echo ($size["id"]); ?>"> <?php echo ($size["sizename"]); ?>
                                    </label>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary sizebtn">确认</button>
            </div>
        </div>
    </div>
</div>
<!--颜色模态窗-->
<div class="modal fade" id="myModalcolor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">颜色设置</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover color table-condensed">
                    <input type="hidden" name="id">
                    <?php if(is_array($color)): $i = 0; $__LIST__ = $color;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><tr style="cursor: pointer">
                            <td><input type="checkbox"  name="colorname" value="<?php echo ($c["id"]); ?>"></td>
                            <td><button class="btn colors" style='background:<?php echo ($c["ename"]); ?>'></button></td>
                            <td><?php echo ($c["colorname"]); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary colorbtn">确认</button>
            </div>
        </div>
    </div>
</div>
<!--艺人设置 -->
<div class="modal fade" id="myModalactor" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>艺人设置</h3>
            </div>
            <div class="modal-body">
                <div class="form-group actor">
                    <label class="sr-only">艺人</label>
                    <input type="hidden" name="id">
                    <select class="form-control">
                        <?php if(is_array($actor)): $i = 0; $__LIST__ = $actor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><option value="<?php echo ($a["aid"]); ?>" class="actorname"><?php echo ($a["aname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        <option value="0" class="actorname" selected>无</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-info actorbtn" data-dismiss="modal">确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!--提示模态窗-->
<div class="modal fade" id="myModalone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h3 class="modal-body text-center" id="contents"></h3>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!--导航条-->
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-brand" href="#">商品管理:</span>
        </div>
        <ul class="nav navbar-nav tab" id="mytab">
            <li role="presentation" class="active">
                <a href="#home">查看商品</a>
            </li>
            <li role="presentation">
                <a href="#menu1">商品添加</a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <span class="kindtitle">类别</span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu allkind">
                    <li><a href="/toshop/index.php/admin/product/product.html">全部</a></li>
                    <?php if(is_array($kind)): $i = 0; $__LIST__ = $kind;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><li>
                            <a href="/toshop/index.php/admin/product/product.html?kid=<?php echo ($p["kindid"]); ?>"><?php echo ($p["kindname"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </li>
        </ul>
        <form  action="product"  id="a" class="navbar-form " method="post" role="search">
            <div class="form-group col-xs-offset-1">
                <div class="input-group">
                    <input type="text" class="form-control" name="seach"  placeholder="搜索">
                    <span class="input-group-btn">
                        <button class="btn btn-default d" type="button">搜索</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</nav>
<script>
    $(function () {
        $('.d').click(function () {
            $('#a').submit();
        })
    })
</script>
<div class="tab-content">
    <!--商品展示-->
    <div id="home" class="tab-pane fade in active">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><label style="cursor: pointer"><input type="checkbox" id="allchex"> 全选</label></th>
                    <th>商品序号</th>
                    <th>商品名</th>
                    <th>价格</th>
                    <th>库存</th>
                    <th>销售量</th>
                    <th>是否显示</th>
                    <th>是否推荐</th>
                    <th>上架时间</th>
                    <th>类别</th>
                    <th>可查看</th>
                    <th>可操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="caozou">
                        <td class="id"><input type="checkbox" name="id" value="<?php echo ($vo["id"]); ?>"></td>
                        <td><?php echo ($i); ?></td>
                        <td class="name"><?php echo ($vo["name"]); ?></td>
                        <td class="price"><?php echo ($vo["price"]); ?></td>
                        <td class="num"><?php echo ($vo["num"]); ?></td>
                        <td class="sales"><?php echo ($vo["sales"]); ?></td>
                        <td>
                            <?php if($vo["isshow"] == 1): ?><button class="btn btn-success isshow" data-toggle="tooltip" data-placement="right" title="点击切换，绿色为显示" data-id="<?php echo ($vo["isshow"]); ?>"></button>
                                <?php else: ?>
                                <button class="btn btn-default isshow" data-toggle="tooltip" data-placement="right" title="点击切换，绿色为显示" data-id="<?php echo ($vo["isshow"]); ?>"></button><?php endif; ?>
                        </td>
                        <td>
                            <?php if($vo["isrecommend"] == 1): ?><button class="btn btn-success isrecommend" data-toggle="tooltip" data-placement="right" title="点击切换，绿色为推荐" data-id="<?php echo ($vo["isrecommend"]); ?>"></button>
                                <?php else: ?>
                                <button class="btn btn-default isrecommend" data-toggle="tooltip" data-placement="right" title="点击切换，绿色为推荐" data-id="<?php echo ($vo["isrecommend"]); ?>"></button><?php endif; ?>
                        </td>
                        <td><?php echo (date('Y-m-d H:i:s',$vo["uptime"])); ?></td>
                        <td class="kid" data-kid="<?php echo ($vo["kid"]); ?>"><?php echo ($vo["kindname"]); ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">设置
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu tab" role="menu" id="mytabss">
                                    <li role="presentation">
                                        <a href="#" class="setsize">尺寸设置</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" class="setcolor">颜色设置</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" class="setactor">艺人设置</a>
                                    </li>
                                    <li role="presentation">
                                         <a href="#menu3" data-img="<?php echo ($vo["img"]); ?>" class="setimg">图片设置</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">操作
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu tab" role="menu" id="mytabs">
                                    <li role="presentation">
                                        <a href="#" class="delpro">删除</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#menu2" class="uppro">修改</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="page1">
            <?php echo ($page); ?>
        </div>
    </div>
    <!--商品添加-->
    <div id="menu1" class="tab-pane fade">
            <div class="container-fluid">
                <div class="row" style="margin-top: 20px">
                    <div class="col-xs-6">
                        <form action="addproduct" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>商品名称:</label>
                                <input class="form-control" type="text" name="name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>商品价格:</label>
                                <input class="form-control" type="number" name="price" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>库存:</label>
                                <input class="form-control" type="number" name="num" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>是否显示:</label>
                                <select class="form-control" name="isshow" autocomplete="off">
                                    <option value="1">显示</option>
                                    <option value="0">不显示</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>是否推荐:</label>
                                <select class="form-control" name="isrecommend" autocomplete="off">
                                    <option value="1">推荐</option>
                                    <option value="0">不推荐</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>商品类别:</label>
                                <select class="form-control" name="kid" autocomplete="off">
                                    <?php if(is_array($kind)): $i = 0; $__LIST__ = $kind;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["kindid"]); ?>"><?php echo ($vo["kindname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail">
                                        <img src="/toshop/Public/Admin/images/adp.jpg" style="max-width: 100%"  width="50%" alt="封面" id="forimg">
                                        <div class="caption">
                                            <input type="file" name="img" id="files">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info btn-block" style="margin-bottom: 20px">确认保存</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--商品修改-->
    <div id="menu2" class="tab-pane fade">
            <div class="container-fluid">
               <div class="col-xs-6" style="margin-top: 20px">
                   <form method="post" action="uppro">
                        <div class="form-group">
                            <label>商品名称:</label>
                            <input type="text" name="name" class="form-control" autocomplete="off">
                            <input type="hidden" name="id" class="form-control" autocomplete="off">
                        </div>
                       <div class="form-group">
                           <label>商品价格:</label>
                           <input type="number" name="price" class="form-control" autocomplete="off">
                       </div>
                       <div class="form-group">
                           <label>库存:</label>
                           <input type="number" name="num" class="form-control" autocomplete="off">
                       </div>
                       <div class="form-group">
                           <label>商品类别:</label>
                           <select class="form-control" name="kid" autocomplete="off">
                               <?php if(is_array($kind)): $i = 0; $__LIST__ = $kind;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["kindid"]); ?>"><?php echo ($vo["kindname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                           </select>
                       </div>
                       <div class="form-group">
                           <button class="btn-success btn-block btn">确认</button>
                       </div>
                   </form>
               </div>
            </div>
        </div>
    <!--图片设置-->
    <div id="menu3" class="tab-pane fade">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="" alt="封面图" id="cover">
                        <div class="caption">
                            <h3>封面图</h3>
                            <form action="upimg" method="post" enctype="multipart/form-data">
                                <label class="sr-only"></label>
                                <input type="file" id="profile" name="img">
                                <input type="hidden" name="img" id="proimg">
                                <input type="hidden" name="id" id="proid">
                                <button class="btn btn-info" style="margin-top: 20px">确认修改</button>
                            </form>
                        </div>
                    </a>
                </div>
                <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="/toshop/Public/Admin/images/overlay.png" class="img-rounded" style="max-width: 100%;display: block">
                        </div>
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

        $('.allkind li').click(function () {
            $('.kindtitle').text($(this).children().text());
        });

        //图片设置
        $('.setimg').click(function () {
            let id = $(this).parents('.caozou').children('.id').children().val();
            $('#cover').attr('src','/toshop/'+this.dataset['img']);
            $('#proid').val(id);
            $('#proimg').val(this.dataset['img']);
        });

        $('#profile').change(function () {
            let file = this.files[0];
            let ready = new FileReader();
            ready.readAsDataURL(file);
            ready.onload = function () {
                $('#cover').attr('src',ready.result);
            }
        });

        //艺人设置
        $('.setactor').click(function () {
            let id = $(this).parents('.caozou').children('.id').children().val();
            $('.actor [name="id"]').val(id);
            $('#myModalactor').modal('show');
            let actorlist = $('.actor .actorname');
            $.ajax({
                type:'POST',
                url:'/toshop/index.php/admin/product/selactor',
                data:'id='+id,
                dataType:'JSON',
                success(msg){
                    actorlist.each(function (d,p) {
                        if (msg[0].aid == actorlist[d].value){
                            actorlist[d].selected = true;
                        }
                    })
                }
            })
        });
        $('.actorbtn').click(function () {
            let id =  $('.actor [name="id"]').val();
            let aid;
            $('.actor option').each(function (e,i) {
                if (i.selected){
                    aid = i.value;
                }
            });
            $.ajax({
               type:'post',
               url:'/toshop/index.php/admin/product/setactor',
                data:'aid='+aid+'&pid='+id,
                success(msg){
                    if (msg==1){
                        $('#contents').text('设置成功');
                        $('#myModalone').modal('show');
                    } else {
                        $('#contents').text('设置失败');
                        $('#myModalone').modal('show');
                    }
                }
            })
        });
        //颜色设置
        $('.setcolor').click(function () {
            let id = $(this).parents('.caozou').children('.id').children().val();
            $('.color [name="id"]').val(id);
            let colorlist = $('.color [name="colorname"]');
            colorlist.prop('checked',false);
            $('#myModalcolor').modal('show');
            $.ajax({
                type:'POST',
                url:'/toshop/index.php/admin/product/selcolor',
                data:'id='+id,
                dataType:'JSON',
                success(msg){
                    for (var i=0;i<msg.length;i++){
                        colorlist.each(function (d,p) {
                            if (msg[i].cid == colorlist[d].value){
                                colorlist[d].checked = true;
                            }
                        })
                    }
                }
            })

        });
        $('.colorbtn').click(function () {
            let colorlist = $('.color [name="colorname"]');
            let data = [];
            let id =  $('.color [name="id"]').val();
            colorlist.each(function (i,e) {
                if (colorlist[i].checked){
                    data.push(parseInt(colorlist[i].value));
                }
            });
            data = JSON.stringify(data);
            $.ajax({
                type:'POST',
                url:'/toshop/index.php/admin/product/setcolor',
                data:'id='+id+'&data='+data,
                success(msg){
                    if (msg==1){
                        $('#contents').text('设置成功');
                        $('#myModalone').modal('show');
                    } else {
                        $('#contents').text('设置失败');
                        $('#myModalone').modal('show');
                    }
                }
            })
        });
        //尺寸设置
        $('.setsize').click(function () {
            let id = $(this).parents('.caozou').children('.id').children().val();
            $('.size [name="id"]').val(id);
            let sizelist = $('.size [name="sizename"]');
            sizelist.prop('checked',false);
            $('#myModalsize').modal('show');
            $.ajax({
                type:'POST',
                url:'/toshop/index.php/admin/product/selsize',
                data:'id='+id,
                dataType:'JSON',
                success(msg){
                   for (var i=0;i<msg.length;i++){
                       sizelist.each(function (d,p) {
                           if (msg[i].sid == sizelist[d].value){
                               sizelist[d].checked = true;
                           }
                       })
                   }
                }
            })

        });
        $('.sizebtn').click(function () {
           let sizelist = $('.size [name="sizename"]');
           let data = [];
           let id =  $('.size [name="id"]').val();
            sizelist.each(function (i,e) {
               if (sizelist[i].checked){
                    data.push(parseInt(sizelist[i].value));
               }
           });
            data = JSON.stringify(data);
            $.ajax({
                type:'POST',
                url:'/toshop/index.php/admin/product/setsize',
                data:'id='+id+'&data='+data,
                success(msg){
                   if (msg==1){
                       $('#contents').text('设置成功');
                       $('#myModalone').modal('show');
                   } else {
                       $('#contents').text('设置失败');
                       $('#myModalone').modal('show');
                   }
                }
            })
        });
        //单选
        $('.size tr').click(function () {
           let che = $(this).children().children().children().children();
           if (che.prop('checked')){
               che.prop('checked',false)
           } else {
               che.prop('checked',true)
           }
        });
        $('.color tr').click(function () {
            let che = $(this).children().children('input');
            if (che.prop('checked')){
                che.prop('checked',false)
            } else {
                che.prop('checked',true)
            }
        });
        //监听修改按钮
        $('.uppro').click(function () {
          let id = $(this).parents('.caozou').children('.id').children().val();
          let name = $(this).parents('.caozou').children('.name').text();
          let price = $(this).parents('.caozou').children('.price').text();
          let num = $(this).parents('.caozou').children('.num').text();
          let kid = $(this).parents('.caozou').children('.kid')[0].dataset['kid'];
          $('#menu2 [name="name"]').val(name);
          $('#menu2 [name="price"]').val(price);
          $('#menu2 [name="num"]').val(num);
          $('#menu2 [name="id"]').val(id);
          $('#menu2 [name="kid"] option').each(function (index,e) {
              if (e.value == kid){
                  e.selected = true;
              }
          })
        });
        //导航切换
        $('.tab li').click(function () {
            $('.tab li').removeClass('active');
            $(this).addClass('active');
        });
        //提示显示
        $("[data-toggle='tooltip']").tooltip();
        //删除
        $('.delpro').click(function () {
                let id=  $(this).parents('.caozou').children(0).children().val();
                let tr = $(this).parents('.caozou')[0];
                if (!confirm('是否确认删除')) {
                    return;
                }
                $.ajax({
                    type:'post',
                    url:'/toshop/index.php/admin/product/delpro',
                    data:'id='+id,
                    success(msg){
                        if (msg==1){
                            tr.style.display = 'none';
                        } else {
                            $('#contents').text('删除失败');
                            $('#myModalone').modal('show');
                        }
                    }
                })
            });
        //显示设置
        $('.isshow').click(function () {
        let isshow= this.dataset['id'];
        let id=  $(this).parents('.caozou').children(0).children().val();
        let a = $(this);
        $.ajax({
            type:'POST',
            url:'/toshop/index.php/admin/product/setisshow',
            data:'isshow='+isshow+'&id='+id,
            success(msg){
                if (msg==1){
                    a.toggleClass('btn-success');
                    a.toggleClass('btn-default');
                    if (isshow==1){
                        a[0].dataset['id'] = 0;
                    } else {
                        a[0].dataset['id']=1
                    }
                }else {
                    $('#contents').text('修改失败');
                    $('#myModalone').modal('show');
                }
            }
        })
    });
        //推荐设置
        $('.isrecommend').click(function () {
            let isshow= this.dataset['id'];
            let id=  $(this).parents('.caozou').children(0).children().val();
            let a = $(this);
            $.ajax({
                type:'POST',
                url:'/toshop/index.php/admin/product/setisrecommend',
                data:'isrecommend='+isshow+'&id='+id,
                success(msg){
                    if (msg==1){
                        a.toggleClass('btn-success');
                        a.toggleClass('btn-default');
                        if (isshow==1){
                            a[0].dataset['id'] = 0;
                        } else {
                            a[0].dataset['id']=1
                        }
                    }else {
                        $('#contents').text('修改失败');
                        $('#myModalone').modal('show');
                    }
                }
            })
        })
    });
</script>