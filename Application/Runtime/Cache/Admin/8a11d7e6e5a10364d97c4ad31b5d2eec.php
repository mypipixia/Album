<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>艺人</title>
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
        .table > thead > tr > th,
        .table > tbody > tr > td,
        .table > tfoot > tr > td{
            vertical-align: middle;
        }
        label{
            margin-top: 5px;
            margin-bottom: 5px;
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
    </style>
</head>
<body>
<div class="panel panel-default">
    <div class="modal fade" id="myModaltwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <p>操作栏</p>
                </div>
                <div class="modal-body">
                    <form  id="forms" method="post" enctype="multipart/form-data">
                        <label>名称:</label>
                        <input type="text" autocomplete="off" class="form-control" name="aname" id="aname">
                        <input type="hidden" name="aid" id="aid">
                        <label>简介:</label>
                        <textarea class="form-control" style="resize: none" name="ainfo" id="ainfo"></textarea>
                        <label>地区:</label>
                        <select class="form-control" name="rid" id="rid">
                            <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["rid"]); ?>"><?php echo ($vo["rname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <label>个人/团队</label>
                        <select class="form-control" name="aband" id="aband">
                            <option value="0">男</option>
                            <option value="1">女</option>
                            <option value="2">团队</option>
                        </select>
                        <label>是否推荐</label>
                        <select class="form-control" name="isrecommend" id="isrecommend">
                            <option value="0">推荐</option>
                            <option value="1">不推荐</option>
                        </select>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-xs-6 col-md-6 col-md-offset-3">
                                <div class="thumbnail">
                                    <img id="alogo" src="" alt="类别logo" style="max-width: 100%">
                                    <div class="caption">
                                        <h3>logo</h3>
                                        <input type="file" name="logo" id="logos">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="btns">确认</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <h3 class="modal-body text-center contents">删除成功</h3>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <div class="panel-heading">
        <input type="button" class="btn btn-warning" value="添加艺人" id="addre">
        <input type="button" class="btn btn-danger" value="删除艺人" id="alldel">
    </div>

    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="allchex"> <label for="allchex">全选</label>
                </th>
                <th>名称</th>
                <th>logo</th>
                <th>介绍</th>
                <th>地区</th>
                <th>艺人/乐队</th>
                <th>是否推荐</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                <td class="aid">
                    <input type="checkbox" value="<?php echo ($v["aid"]); ?>" name="aid">
                </td>
                <td class="aname"><?php echo ($v["aname"]); ?></td>
                <td width="10%" class="alogo">
                    <?php if($v["alogo"] == null): ?>无
                        <?php else: ?>
                        <img src="/toshop/<?php echo ($v["alogo"]); ?>" width="30%"><?php endif; ?>
                </td>
                <td class="ainfo"><?php echo ($v["ainfo"]); ?></td>
                <td class="rid" data-id="<?php echo ($v["rid"]); ?>"><?php echo ($v["rname"]); ?></td>
                <td class="aband" data-aband="<?php echo ($v["aband"]); ?>">
                    <?php if($v["aband"] == 0): ?>男性歌手
                        <?php elseif($v["aband"] == 1): ?>
                        女性歌手
                        <?php else: ?>
                        团队组合<?php endif; ?>
                </td>
                <td class="isrecommend" data-isre="<?php echo ($v["isrecommend"]); ?>">
                    <?php if($v["isrecommend"] == 1): ?><button class="btn btn-default iscom"></button>
                        <?php else: ?>
                        <button class="btn btn-success iscom" ></button><?php endif; ?>
                </td>
                <td>
                    <a href="#" class="btn btn-info upda">修改</a>
                    <a href="/toshop/index.php/admin/actor/dela?id=<?php echo ($v["aid"]); ?>" class="btn btn-danger btn-del">删除</a>
                </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="page1">
        <?php echo ($page); ?>
    </div>
</div>
</body>
</html>
<script>
    window.onload=function()
    {
        var myform=document.getElementById("forms");
        myform.onkeypress=function(ev)
        {
            var ev=window.event||ev;
            if(ev.keyCode==13||ev.which==13)
            {
                return false;
            }
        }
    };

    $(function () {
        var fal = true;
        $('#addre').click(function () {
            fal = true;
            $('#aid').val("");
            $('#aname').val("");
            $('#ainfo').val("");
            $('#alogo').attr('src',"");
            $('#rid option').prop('selected',false);
            $('#isrecommend option').prop('selected',false);
            $('#aband option').prop('selected',false);
            $('#myModaltwo').modal('show');
        });
//文件图片预览
        $('#logos').change(function(){
            let file = this.files[0] ;
            let ready = new FileReader();
            ready.readAsDataURL(file);
            ready.onload = function () {
                $('#alogo').attr('src',ready.result)
            }
        });

        $('.upda').click(function () {
            fal = false;
            $('#myModaltwo').modal('show');
            let aid = $(this).parent().parent().children('.aid').children().val();
            let aname = $(this).parent().parent().children('.aname').text();
            let alogo = $(this).parent().parent().children('.alogo').children().attr('src');
            let ainfo = $(this).parent().parent().children('.ainfo').text();
            let rid = $(this).parent().parent().children('.rid')[0].dataset['id'];
            let aband = $(this).parent().parent().children('.aband')[0].dataset['aband'];
            let isrecommend = $(this).parent().parent().children('.isrecommend')[0].dataset['isre'];
            $('#aid').val(aid);
            $('#aname').val(aname);
            $('#ainfo').val(ainfo);
            $('#alogo').attr('src',alogo);
            $('#rid option').each(function (index,e) {
                if (e.value == rid){
                    e.selected = true;
                }
            });
            $('#aband option').each(function (index,e) {
                if (e.value == aband){
                    e.selected = true;
                }
            });
            $('#isrecommend option').each(function (index,e) {
                if (e.value == isrecommend){
                    e.selected = true;
                }
            })
        });


        $('.iscom').click(function () {
            $(this).toggleClass('btn-default');
            $(this).toggleClass('btn-success');
            let aid= $(this).parent().parent().children('.aid').children().val();
            let isrecommend =  $(this).parent()[0].dataset['isre'];
            $.ajax({
                type:'GET',
                url:'/toshop/index.php/admin/actor/isrecommend',
                data:'aid='+aid+'&isrecommend='+isrecommend,
            })
        });


        $('#btns').click(function () {
            let name = $('#aname').val();
            if (name.length == 0){
                $('.contents').text('名字不能为空');
                $('#myModal').modal('show');
            }else {
                if (fal){
                    // $.ajax({
                    //     type:"POST",
                    //     url:"selc",
                    //     data:"name="+name,
                    //     success(msg){
                    //         if (msg==1){
                    //             alert("你输入的类名已存在")
                    //         } else {
                    //         }
                    //     }
                    // })
                    $('#forms').attr('action','/toshop/index.php/admin/actor/addactor');
                    $('#forms').submit();

                }else {
                    $('#forms').attr('action','/toshop/index.php/admin/actor/upactor');
                    $('#forms').submit();
                    // $.ajax({
                    //     type:"POST",
                    //     url:"selcs",
                    //     data:"name="+name+"&id="+id,
                    //     success(msg){
                    //         if (msg==1){
                    //             alert("你输入的类名已存在")
                    //         } else {
                    //         }
                    //     }
                    // })
                }
            }
        });

        //全选
        $('#allchex').click(function () {
            if ($(this).prop('checked')) {
                $('.aid>input').prop('checked',true)
            } else {
                $('.aid>input').prop('checked',false)
            }
        });


        //批量删除
        $('#alldel').click(function () {
            let list = [];
            let chelist = $('.aid>input');
            chelist.each(function (i,e) {
                if (e.checked){
                    list.push(parseInt(e.value))
                }
            });
            list = JSON.stringify(list);
            $.ajax({
                type:'POST',
                url:'/toshop/index.php/admin/actor/delall',
                data:'list='+list,
                success(msg){
                    if (msg){
                        if (msg==1){
                            chelist.each(function (i,e) {
                                if (e.checked){
                                    e.parentElement.parentElement.style.display = 'none';
                                }
                            });
                            $('.contents').text('删除成功');
                            $('#myModal').modal('show');

                        } else {
                            $('.contents').text('删除失败');
                            $('#myModal').modal('show');
                        }
                    }
                }
            })
        })
    });

</script>