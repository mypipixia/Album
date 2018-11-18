<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.js"></script>
    <style>
        .list-group-item{
            border: 0;
        }
    </style>
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="modal-body text-center" style="color:orangered;">修改成功</h3>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

    <ul class="list-group">
        <li class="list-group-item">
            <label>用户ID:</label><?php echo ($user["id"]); ?></li>
        <li class="list-group-item">
            <label>
                <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
                昵称:<input type="text" name="name" class="form-control" value="<?php echo ($user["name"]); ?>" autocomplete="off">
            </label>
        </li>
        <li class="list-group-item">
            <label>
                性别:
            </label>
            <?php if($user["sex"] == 1): ?><label class="radio-inline">
                    <input type="radio" name="sex"  value="1" checked> 男
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sex"  value="0"> 女
                </label>
                <?php else: ?>
                <label class="radio-inline">
                    <input type="radio" name="sex"  value="1"> 男
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sex"  value="0" checked> 女
                </label><?php endif; ?>
        </li>
        <li class="list-group-item">
            <label>
                个人简介:
                <textarea rows="3" cols="50" name="info" class="form-control" style="resize: none"><?php echo ($user["info"]); ?></textarea>
            </label>
        </li>
        <li class="list-group-item">
            <button class="btn btn-default">提交</button>
        </li>
    </ul>
</body>
</html>
<script>
    $(function () {
        $('.btn-default').click(function () {
            let id = $("[name='id']").val();
            let name = $("[name='name']").val();
            let info = $("[name='info']").val();
            let sexlist = $("[name='sex']");
            let sex;
            sexlist.each(function (i,e) {
                if (sexlist.eq(i).prop('checked')){
                    sex = sexlist.eq(i).val();
                }
            });
            $.ajax({
                type:'post',
                url:'upuserinfo',
                data:{
                    id:id,
                    name:name,
                    info:info,
                    sex:sex
                },
                success(msg){
                    if (msg==1){
                        $('#myModal').modal('show');
                        setTimeout(function () {
                            $('#myModal').modal('hide');
                        },500)
                    }
                }
            })
        })
    })
</script>