<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>尺寸</title>
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
<body>
<!--尺寸添加-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加尺寸</h4>
            </div>
            <div class="modal-body">
                <form action="addsize" method="post" id="formsize">
                    <div class="form-group">
                        <label>尺寸名</label>
                        <input class="form-control" type="text" name="sizename" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>尺寸信息</label>
                        <textarea class="form-control" rows="2" style="resize: none;" name="sizeinfo"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="toaddsize">确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!--颜色添加-->
<div class="modal fade" id="myModaltwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">添加颜色</h4>
            </div>
            <div class="modal-body">
                <form action="addcolor" method="post" id="formcolor">
                    <div class="form-group">
                        <label>颜色名</label>
                        <input class="form-control" type="text" name="colorname" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>颜色样式</label>
                        <input class="form-control" type="color" name="ename" autocomplete="off">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="toaddcolor">确认</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-success" id="addsize">添加尺寸</button>
            <button class="btn btn-warning" id="addcolor">添加颜色</button>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>尺寸编号</th>
                                <th>尺寸名</th>
                                <th>尺寸信息</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo ($vo["sizename"]); ?></td>
                                    <td><?php echo ($vo["sizeinfo"]); ?></td>
                                    <td>
                                        <a class="btn btn-danger" href="delsize?id=<?php echo ($vo["id"]); ?>">删除</a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-6">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="success">
                            <th>颜色编号</th>
                            <th>颜色名</th>
                            <th>颜色样式</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($color)): $i = 0; $__LIST__ = $color;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($i); ?></td>
                                <td><?php echo ($vo["colorname"]); ?></td>
                                <td>
                                    <button class="btn colors" style='background:<?php echo ($vo["ename"]); ?>'></button>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="delcolor?id=<?php echo ($vo["id"]); ?>">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(function () {
        $('#addsize').click(function () {
            $('#myModal').modal('show');
        });
        $('#toaddsize').click(function () {
            $('#formsize').submit();
        });

        $('#addcolor').click(function () {
            $('#myModaltwo').modal('show');
        });
        $('#toaddcolor').click(function () {
            $('#formcolor').submit();
        })
    })
</script>