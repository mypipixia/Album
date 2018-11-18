<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>头像设置</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <!--<script src="/toshop/Public/Lib/js/bootstrap.js"></script>-->
    <style>
        .top-img{
            display: block;
            width: 100%;
            position: relative;
            height: 50px;
        }
        .ti{
            position: absolute;
            top: 0;
            cursor: pointer;
        }
        input[type="file"]{
            position: absolute;
            top: 0;
            z-index: 5;
            opacity: 0;
            cursor: pointer;
        }
       .userimg{
           width: 100%;
           height: 300px;
           line-height: 300px;
           background: #f9f9f9;
           text-align: center;
       }
        .userimg img{
            width:40%;
        }
        .demo p{
            font-size: 18px;
            text-align: center;
        }
        .demo img{
            width: 80%;
            margin-left: 10%;
        }
    </style>
</head>
<body>
    <div>
        <a class="top-img">
            <form method="post" action="upheading" enctype="multipart/form-data">
                <input type="file" name="headimg" class="form-control">
                <input type="hidden" name="id" class="form-control" value="<?php echo ($user["id"]); ?>">
                <button class="btn btn-default btn-block ti">点击上传图片</button>
            </form>
        </a>
        仅支持JPG、GIF、PNG、JPEG、BMP格式，文件小于4M
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-8" style="border-right: 1px solid #cccccc">
                    <div class="userimg">
                        <?php if($user["headimg"] == null): ?><img src="/toshop/Public/Admin/images/user.png"/>
                            <?php else: ?>
                            <img src="/toshop/<?php echo ($user["headimg"]); ?>"><?php endif; ?>
                    </div>
                </div>
                <div class="col-xs-3">
                    效果预览
                    你上传的图片会自动生成尺寸，请注意小尺寸的头像是否清晰
                    <div class="demo">
                        <?php if($user["headimg"] == null): ?><img src="/toshop/Public/Admin/images/user.png" class="img-circle"/>
                            <?php else: ?>
                            <img src="/toshop/<?php echo ($user["headimg"]); ?>" class="img-circle"><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 50px">
                <button class="btn btn-default d">保存</button>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(function () {
        $('.d').click(function (e) {
            e.preventDefault();
            $('form').submit();
        });

        $('[type="file"]').change(function () {
            let file = this.files[0];
            let ready = new FileReader();
            ready.readAsDataURL(file);
            ready.onload = function () {
                $('.img-circle').attr('src',ready.result);
            }
        })
    })
</script>