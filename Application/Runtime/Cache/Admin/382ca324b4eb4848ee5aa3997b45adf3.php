<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>地区管理</title>
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
    </style>
</head>
<body> <!--模态窗-->
<div class="modal fade" id="myModaltwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <p>请在下表添加商品</p>
                    </div>
                    <div class="modal-body">
                        <form id="forms" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>地区名:</label>
                                <input class="form-control" id="rname" type="text" name="rname" autocomplete="off">
                                <input type="hidden" name="rid" id="rid">
                            </div>
                            <div class="form-group">
                                <label>地区简介:</label>
                                <textarea class="form-control" id="rinfo" name="rinfo" rows="6" style="resize: none"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-md-6 col-lg-offset-3">
                                    <div class="thumbnail">
                                        <img id="rimg" src="" alt="地区logo" style="max-width: 100%">
                                        <input type="hidden" name="rimg" id="rimgs">
                                        <div class="caption">
                                            <h3>logo</h3>
                                            <input type="file" name="rimgs" id="rimgd">
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


        <div class="panel panel-default">
            <div class="panel-heading">
                <input type="button" class="btn btn-warning" value="添加地区" id="addre">
                <input type="button" class="btn btn-danger" value="删除地区" id="alldel">
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="allchex" id="allchex"> <label for="allchex">全选</label>
                        </th>
                        <th>
                            地区名
                        </th>
                        <th>
                            简介
                        </th>
                        <th>
                            logo
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="rid">
                                <input type="checkbox" name="rid" value="<?php echo ($vo["rid"]); ?>">
                            </td>
                            <td class="rname"><?php echo ($vo["rname"]); ?></td>
                            <td class="rinfo"><?php echo ($vo["rinfo"]); ?></td>
                            <td style="cursor: pointer" class="rimg">
                                <img src="/toshop/<?php echo ($vo["rimg"]); ?>" style="max-width: 100%">
                                <input type="hidden" value="<?php echo ($vo["rimg"]); ?>">
                            </td>
                            <td>
                                <a href="#" class="btn btn-info upda">修改</a>
                                <a href="delr?id=<?php echo ($vo["rid"]); ?>" class="btn btn-danger">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
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
        var fals = true;
        $('#addre').click(function () {
            $('#rname').val("");
            $('#rid').val("");
            $('#rinfo').val("");
            $('#rimg').attr('src',"");
            $('#myModaltwo').modal('show');
            fals = true;
        });

        $('#rimgd').change(function(){
            let file = this.files[0] ;
            let ready = new FileReader();
            ready.readAsDataURL(file);
            ready.onload = function () {
                $('#rimg').attr('src',ready.result)
            }
        });

        $('[name="allchex"]').click(function () {
            if ($(this).prop('checked')){
                $('[name="rid"]').prop('checked',true)
            } else {
                $('[name="rid"]').prop('checked',false)
            }
        });

        $('.upda').click(function () {
            fals = false;
            var name = $(this).parent().prevAll('.rname').text().trim();
            var kindid = $(this).parent().prevAll('.rid').children().val();
            var title =  $(this).parents().prevAll('.rinfo').text().trim();
            var img =  $(this).parents().prevAll('.rimg').children('input').val();
            $('#rname').val(name);
            $('#rid').val(kindid);
            $('#rinfo').val(title);
            $('#rimgs').val(img);
            $('#rimg').attr('src',"/toshop/"+img);
            $('#myModaltwo').modal('show');
        })


        $('body').on('click','#alldel',function () {
            var list = $('[name="rid"]');
            var data = [];
            list.each(function (index,e) {
                if (e.checked){
                    data.push(parseInt(e.value));
                }
            }) ;
            data = JSON.stringify(data);
            if (confirm('是否确认删除')){
                $.ajax({
                    type:'post',
                    url:'/toshop/index.php/admin/kind/alldelr',
                    data:'data='+data,
                    dataType:'JSON',
                    success(msg){
                        if (msg == 1){
                            $('#myModal').modal('show');
                            $('.contents').text('删除成功');
                            list.each(function (index,v) {
                                if (v.checked) {
                                    v.parentElement.parentElement.style.display = "none";
                                }
                            })
                        } else {
                            $('#myModal').modal('show');
                            $('.contents').text('删除失败');
                        }
                    }
                });
            }
        });

        $('#btns').click(function () {
            var name = $('#rname').val();
            var id = $('#rid').val();
            if (fals){
                $.ajax({
                    type:'POST',
                    url:'selp',
                    data:'rname='+name,
                    success(msg){
                        if (msg==1){
                            $('.contents').text(`你输入的地区 ${name} 已存在`);
                            $('#myModal').modal('show');
                        } else {
                            $('#forms').attr({
                                action:'addregion'
                            });
                            $('#forms').submit();
                        }
                    }
                });
            }else {
                $.ajax({
                    type:'POST',
                    url:'rname',
                    data:'rname='+name+"&rid="+id,
                    success(msg){
                        if (msg==1){
                            $('.contents').text(`你输入的地区 ${name} 已存在`);
                            $('#myModal').modal('show');
                        } else {
                            $('#forms').attr({
                                action:'upregion'
                            });
                            $('#forms').submit();
                        }
                    }
                });
            }
        })
    })
</script>