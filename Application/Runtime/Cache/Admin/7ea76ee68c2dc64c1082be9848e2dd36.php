<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>权限管理</title>
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
        .table > thead > tr > th,
        .table > tbody > tr > td,
        .table > tfoot > tr > td{
            vertical-align: middle;
        }
    </style>
</head>
<body>
<!--<div class="modal fade" id="myModaltwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">-->
    <!--<div class="modal-dialog">-->
        <!--<div class="modal-content">-->
            <!--<div class="modal-header">-->
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                <!--<p>操作栏</p>-->
            <!--</div>-->
            <!--<div class="modal-body">-->
                <!--<form id="forms" method="post" action="addnode">-->
                    <!--<div class="form-group">-->
                        <!--<label>权限名:</label>-->
                        <!--<input class="form-control" id="name" type="text" name="name" autocomplete="off">-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<label>权限简介:</label>-->
                        <!--<textarea class="form-control" id="title" name="title" rows="2" style="resize: none"></textarea>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<label>权限等级:</label>-->
                        <!--<select name="level" class="form-control">-->
                            <!--<option value="1">模块</option>-->
                            <!--<option value="2">管理</option>-->
                            <!--<option value="3">操作</option>-->
                        <!--</select>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<label>父节点:</label>-->
                        <!--<select class="form-control" name="pid">-->
                            <!--<?php if(is_array($level)): $i = 0; $__LIST__ = $level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?>-->
                                <!--<?php if($l["level"] == 1): ?>-->
                                    <!--<option value="<?php echo ($l["id"]); ?>"><?php echo ($l["name"]); ?></option>-->
                                    <!--<?php else: ?>-->
                                    <!--<option value="<?php echo ($l["id"]); ?>">&nbsp;&nbsp;<?php echo ($l["name"]); ?></option>-->
                                <!--<?php endif; ?>-->
                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                        <!--</select>-->
                    <!--</div>-->
                <!--</form>-->
            <!--</div>-->
            <!--<div class="modal-footer">-->
                <!--<button type="button" class="btn btn-default" id="btns">确认</button>-->
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
            <!--</div>-->
        <!--</div>&lt;!&ndash; /.modal-content &ndash;&gt;-->
    <!--</div>&lt;!&ndash; /.modal &ndash;&gt;-->
<!--</div>-->
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <!--<div class="modal-dialog">-->
        <!--<div class="modal-content">-->
            <!--<div class="modal-header">-->
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
            <!--</div>-->
            <!--<h3 class="modal-body text-center contents">删除成功</h3>-->
            <!--<div class="modal-footer">-->
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
            <!--</div>-->
        <!--</div>&lt;!&ndash; /.modal-content &ndash;&gt;-->
    <!--</div>&lt;!&ndash; /.modal &ndash;&gt;-->
<!--</div>-->


<div class="panel">
    <!--<div class="panel-heading panel-default">-->
        <!--<input type="button" class="btn btn-warning" value="添加权限" id="addnode">-->
    <!--</div>-->
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>
                序号
            </th>
            <th>
                权限名称
            </th>
            <th>
                权限简介
            </th>
            <th>
                权限等级
            </th>
            <!--<th>操作</th>-->
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td>
                    <?php echo ($i); ?>
                </td>
                <?php if($vo["level"] == 1): ?><td width="13%" style="text-align: left"><?php echo ($vo["name"]); ?></td>
                    <?php elseif($vo["level"] == 2): ?>
                    <td width="13%" style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["name"]); ?></td>
                    <?php else: ?>
                    <td width="13%" style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["name"]); ?></td><?php endif; ?>
                <td>
                    <?php echo ($vo["title"]); ?>
                </td>
                <td>
                    <?php if($vo["level"] == 1): ?>模块
                        <?php elseif($vo["level"] == 2): ?>
                        管理
                        <?php else: ?>
                        操作<?php endif; ?>
                </td>
                <!--<td>-->
                    <!--<a href="#" data-id="<?php echo ($vo["kindid"]); ?>" class="btn btn-success del">删除</a>-->
                <!--</td>-->
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
<script>
    $(function () {
        $('#addnode').click(function () {
            $('#myModaltwo').modal('show');
        });
        $('#btns').click(function () {
            let name = $('#name').val();
            if (name.length == 0){
                $('.contents').text('权限名不能为空');
                $('#myModal').modal('show');
            }else {
                $('#forms').submit();
            }
        })
    })
</script>