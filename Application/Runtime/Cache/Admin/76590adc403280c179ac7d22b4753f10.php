<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>权限分配</title>
    <link rel="stylesheet" href="/yqf/toshop/Public/Lib/css/bootstrap.css">
    <script src="/yqf/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/yqf/toshop/Public/Lib/js/bootstrap.min.js"></script>
    <style>
        .table th{
            text-align: center;
        }
        .table tr{
            cursor: pointer;
        }
        .table td{
            text-align: center;
        }
        .table a:hover{
            text-decoration: none;
        }

    </style>
</head>
<body>
<div class="panel">
    <div class="panel-heading">
        <button class="btn btn-info" id="allot">分配</button>
        <a href="role.html" class="btn btn-danger">取消分配</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>
                权限分配
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
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="role">
                <td>
                    <input name="node" type="checkbox" value="<?php echo ($vo["id"]); ?>">
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
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <input type="hidden" id="rules" value="<?php echo ($rulelist); ?>">
    <input type="hidden" id="id" value="<?php echo ($id); ?>">
</div>
</body>
</html>
<script>
    $(function () {
        //点击选中
        let id = $('#id').val();
        $('#allot').click(function () {
           let nodelist =  $('[name="node"]') ;
           let rules = "";
           nodelist.each(function (i,e) {
               if (e.checked){
                  rules = rules+','+e.value;
               }
           });
            $.ajax({
               type:'post',
               url:'upnode',
               data:'id='+id+'&rules='+rules,
               success(msg){
                   if (msg==1){
                       alert('修改成功');
                   } else {
                     alert('修改失败')
                   }
               }
           })

        });


        let rulelist = $('#rules').val();
        $('.role').each(function (i,e) {
            if (rulelist.indexOf(e.children[0].children[0].value)<0) {
                this.children['0'].children['0'].checked = false;
            }else {
                e.children['0'].children['0'].checked = true;
            }
        });


        $('.role').click(function () {
            if ( this.children['0'].children['0'].checked) {
                this.children['0'].children['0'].checked = false;
            }else {
                this.children['0'].children['0'].checked = true;
            }
         })
    })
</script>