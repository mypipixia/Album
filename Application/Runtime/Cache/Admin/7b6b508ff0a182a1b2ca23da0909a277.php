<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品类别添加</title>
    <link rel="stylesheet" href="/yqf/toshop/Public/Lib/css/bootstrap.css">

</head>
<body>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading ">
                商品类别添加
            </div>
            <form class="form-horizontal" method="post" action="toaddkind" enctype="multipart/form-data">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="input-group col-xs-8">
                            <span class="input-group-addon">类别名称</span>
                            <input class="form-control" type="text" name="kindname" autocomplete="off" placeholder="请输入类别名称">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="input-group col-xs-8">
                            <span class="input-group-addon">类别简介</span>
                            <textarea class="form-control" rows="10" style="resize: none" placeholder="请输入内容" name="kindtitle"></textarea>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <label for="inputfile">上传类别logo图</label>
                        <input type="file" id="inputfile"  multiple="multiple" name="kindimg">
                    </li>
                    <li class="list-group-item">
                        <div class="input-group col-xs-8">
                            <button class="btn btn-block btn-success">确认保存</button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>