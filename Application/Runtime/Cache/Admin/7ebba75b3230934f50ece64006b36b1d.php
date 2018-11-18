<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>轮播图</title>
    <link rel="stylesheet" href="/toshop/Public/Lib/css/bootstrap.css">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.min.js"></script>
    <style>
        .navbar{
            border-radius: 0;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">轮播图设置</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="addlunbo" id="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class=" col-xs-6 col-md-offset-3">
                            <a href="#" class="thumbnail">
                                <img src="" alt="上传轮播图" id="showimg">
                                <div class="caption">
                                    <input type="file" name="img" id="img">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>简介:</label>
                        <input type="text" class="form-control" name="title" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>是否显示:</label>
                        <select class="form-control" name="isshow">
                            <option value="1">显示</option>
                            <option value="0">不显示</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="save">保存</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<div class="modal fade" id="myModaltwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h3 class="modal-body text-center contents">在这里添加一些文本</h3>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">轮播管理</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="#" id="addimg">添加轮播图</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="row">
            <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="/toshop/<?php echo ($vo["img"]); ?>"
                             alt="通用的占位符缩略图">
                        <div class="caption text-center">
                            <p>
                                    <a data-lid="<?php echo ($vo["lid"]); ?>" data-isshow="<?php echo ($vo["isshow"]); ?>"
                                       class="btn btn-info uplunbo" role="button"
                                       data-toggle="tooltip"
                                       data-placement="bottom" title="点击可切换显示隐藏">
                                        <?php if($vo["isshow"] == 1): ?>显示
                                            <?php else: ?>隐藏<?php endif; ?>
                                    </a>
                                <a data-lid="<?php echo ($vo["lid"]); ?>" class="btn btn-danger dellunbo" role="button">
                                    删除
                                </a>
                            </p>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(function () {
        $('.dellunbo').click(function () {
            let lid = this.dataset['lid'];
            let del = this.parentElement.parentElement.parentElement;
            if (!confirm('是否确认删除')){
                return
            }
            $.ajax({
                type:'POST',
                url:'del',
                data:'lid='+lid,
                success(msg){
                    if (msg==1){
                        del.style.display = 'none';
                        $(".contents").text("删除成功");
                        $('#myModaltwo').modal('show');
                    }else {
                        $(".contents").text("发生错误信息");
                        $('#myModaltwo').modal('show');
                    }
                }
            })
        });
        //更新轮播
        $('.uplunbo').click(function () {
            let lid = this.dataset['lid'];
            let isshow = this.dataset['isshow'];
            let del = this.parentElement.parentElement.parentElement;
            let the = this;
            if (isshow == 1){
                the.innerText = '隐藏';
                the.setAttribute('data-isshow',0);
            } else {
                the.innerText = '显示';
                the.setAttribute('data-isshow',1)
            }
            $.ajax({
                type:'POST',
                url:'uplunbo',
                data:'lid='+lid+'&isshow='+isshow,
                success(msg){
                    if (msg==0){
                        $(".contents").text("修改失败");
                        $('#myModaltwo').modal('show');
                        if (isshow == 1){
                            the.innerText = '显示'
                        } else {
                            the.innerText = '隐藏'
                        }
                    }
                }
            })
        });
        //图片预览
        $('#img').change(function () {
            let file = this.files[0];
            let ready = new FileReader();
            ready.readAsDataURL(file);
            ready.onload = function () {
                $('#showimg').attr('src',ready.result)
            }
        });

        //添加轮播图
        $('#addimg').click(function () {
            $("#myModal").modal('show');
        });

        $('#save').click(function () {
            let file = $('#img')[0].files[0];
            if (file){
                $('#form').submit();
            } else {
                $(".contents").text("请添加轮播图");
                $('#myModaltwo').modal('show');
            }
        })

        $(function () { $("[data-toggle='tooltip']").tooltip(); });
    })
</script>