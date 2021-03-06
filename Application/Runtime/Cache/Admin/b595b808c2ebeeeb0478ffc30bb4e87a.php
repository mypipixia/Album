<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>什么都卖</title>
	<link rel="stylesheet" href="/toshop/Public/Lib/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
	<div class="layui-header">
		<div class="layui-logo">后台管理</div>
		<!-- 头部区域（可配合layui已有的水平导航） -->
		<ul class="layui-nav layui-layout-left">
			<li class="layui-nav-item"><a href="statistics.html" target="p">首页</a></li>
			<li class="layui-nav-item"><a href="/toshop/index.php/home/Index/index">shop</a></li>
		</ul>
		<ul class="layui-nav layui-layout-right">
			<li class="layui-nav-item">
				<a href="javascript:;">
					<?php echo ($arr["username"]); ?>
				</a>
			</li>
			<li class="layui-nav-item"><a href="downlogin">退了</a></li>
		</ul>
	</div>

	<div class="layui-side layui-bg-black">
		<div class="layui-side-scroll">
			<!-- 左侧导航区域（可配合layui已有的垂直导航） -->
			<ul class="layui-nav layui-nav-tree"  lay-filter="test">
				<li class="layui-nav-item layui-nav-itemed">
					<a class="" href="javascript:;">类别</a>
					<dl class="layui-nav-child">
						<dd><a href="../Kind/kind.html" target="p">类别管理</a></dd>
						<dd><a href="../Kind/region.html" target="p">地区管理</a></dd>
						<dd><a href="../Actor/actor.html" target="p">艺人管理</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item layui-nav-itemed">
					<a class="" href="javascript:;">商品</a>
					<dl class="layui-nav-child">
						<dd><a href="../Product/size.html" target="p">尺寸/颜色</a></dd>
						<dd><a href="../Product/product.html" target="p">商品管理</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item layui-nav-itemed">
					<a class="" href="javascript:;">前台显示</a>
					<dl class="layui-nav-child">
						<dd><a href="../Show/lunbo.html" target="p">轮播图设置</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item layui-nav-itemed">
					<a class="" href="javascript:;">订单</a>
					<dl class="layui-nav-child">
						<dd><a href="../Order/order.html" target="p">订单管理</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item layui-nav-itemed">
					<a class="" href="javascript:;">权限管理</a>
					<dl class="layui-nav-child">
						<dd><a href="../Rbac/user.html" target="p">用户管理</a></dd>
						<dd><a href="../Rbac/role.html" target="p">角色管理</a></dd>
						<dd><a href="../Rbac/node.html" target="p">权限管理</a></dd>
					</dl>
				</li>
			</ul>
		</div>
	</div>

	<div class="layui-body" style="bottom: 0;overflow-y: hidden">
		<iframe  src="statistics.html" name="p" style="width: 100%;height: 100%;border: none"></iframe>
	</div>
</div>
<script src="/toshop/Public/Lib/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
</body>
</html>