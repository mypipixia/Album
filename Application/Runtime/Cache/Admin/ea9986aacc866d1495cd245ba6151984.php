<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>角色管理</title>
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
<div class="modal fade" id="myModaltwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <p>操作栏</p>
            </div>
            <div class="modal-body">
                <form id="forms" method="post" action="adduser">
                    <div class="form-group">
                        <label>用户名:</label>
                        <input class="form-control" type="text" name="username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>密码:</label>
                        <input class="form-control" type="password" name="userpsw" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>角色分配:</label>
                        <select class="form-control" name="vid">
                            <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>用户状态:</label>
                        <select class="form-control" name="status">
                            <option value="1">激活</option>
                            <option value="0">未激活</option>
                        </select>
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
            <form action="autorole" method="post" id="formrole">
                <h3 class="modal-body text-center contents">
                    <div class="form-group">
                        <input type="hidden" name="uid" id="uid">
                        <label class="sr-only">角色分配:</label>
                        <select class="form-control" name="vid">
                            <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" ><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </h3>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-info up">修改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


<div class="panel">
    <div class="panel-heading panel-default">
        <input type="button" class="btn btn-info" value="添加用户" id="addrole">
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>序号</th>
            <th>用户名</th>
            <th>最近一次登录时间</th>
            <th>角色名</th>
            <th>状态</th>
            <th>设置</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($i); ?></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["logintime"])); ?></td>
                <td><?php echo ($vo["title"]); ?></td>
                <td data-id="<?php echo ($vo["id"]); ?>" data-status="<?php echo ($vo["status"]); ?>">
                    <?php if($vo["status"] == 1): ?><button class="btn btn-success status"></button>
                        <?php else: ?> <button class="btn btn-default status"></button><?php endif; ?>
                </td>
                <td data-id="<?php echo ($vo["id"]); ?>"><a style="cursor: pointer" class="js">角色分配</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
<script>
    $(function () {
        $('#addrole').click(function () {
            $('#myModaltwo').modal('show');
        });
        $('#btns').click(function () {
            $('#forms').submit();
        });
        //角色分配
        $('.js').click(function () {
            $('#myModal').modal('show');
            let uid = this.parentElement.dataset['id'];
            $('#uid').val(uid);
        });

        //角色修改
        $('.up').click(function () {
            $('#formrole').submit();
        });
        //状态
        $('.status').click(function () {
             let id = this.parentElement.dataset['id'];
             let status =  this.parentElement.dataset['status'];
             let btn = $(this);
            $.ajax({
                type:'post',
                url:'status',
                data:'id='+id+'&status='+status,
                success(msg){
                    if (msg==1){
                      btn.toggleClass('btn-success');
                      btn.toggleClass('btn-default');
                    }
                }
            })
        })
    })
</script>