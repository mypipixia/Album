<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <link href="/toshop/Public/Home/css/hotshop.css" rel="stylesheet">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        ul li{
            list-style: none;
        }
    </style>
</head>
<body>
<div class="all">
    <main>
        <div id="myCarousel" class="carousel slide" data-interval="2000" data-ride="carousel">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i-1 == 0): ?><li data-target="#myCarousel" data-slide-to="0" class="active"></li><?php else: ?> <li data-target="#myCarousel" data-slide-to="<?php echo ($i-1); ?>"></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == 1): ?><div class="item active"><img src="/toshop/<?php echo ($vo["img"]); ?>" alt="Second slide">
                </div><?php else: ?><div class="item"><img src="/toshop/<?php echo ($vo["img"]); ?>" alt="Second slide">
                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </main>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
                    <div class="header-img">
                        <img src="/toshop/Public/Home/images/index/logo.png" width="15%">
                        <img src="/toshop/Public/Home/images/index/字.png" width="60%">
                    </div>
                </div>
                <div class="col-xs-7">
                    <form rel="search">
                        <div class="input-group header-form ">
                            <input class="form-control" autocomplete="off" id="seach">
                            <span class="input-group-addon btns">
                            <img src="/toshop/Public/Home/images/index/放大镜.png">
                        </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="navs">
                <nav class="navs-left">
                    <a href="../Index/index.html">首页</a>
                    <a href="../Shop/shop.html">商城</a>
                    <a href="#" style="background: linear-gradient(to right,#37238D,#8D3099)">热卖</a>
                    <a href="#">活动</a>
                    <a href="#" class="tokind">分类 <img src="/toshop/Public/Home/images/index/下拉1.png" class="xiala"></a>
                </nav>
                <nav class="navs-right">
                    <a href="#">
                        <img src="/toshop/Public/Home/images/index/国旗.png">&nbsp;&nbsp;&nbsp;<img src="/toshop/Public/Home/images/index/下拉1.png" class="li">
                    </a>
                    <a href="#">
                        <img src="/toshop/Public/Home/images/index/竖3.png">
                    </a>
                    <a href="#">
                        <?php if($user['id'] == null): ?><a href="../Login/login.html">登录</a> <a>/</a> <a href="../Login/login.html">注册</a>
                            <?php else: ?>
                            <a href="../User/user.html"><?php echo ($user['name']); ?></a> <a>/</a> <a href="../Index/down">退了</a><?php endif; ?>
                    </a>
                    <a href="#">
                        <img src="/toshop/Public/Home/images/index/竖3.png">
                    </a>
                    <a href="../Shop/shopcar.html">
                        <img src="/toshop/Public/Home/images/index/车.png">
                        <span class="label">(<?php echo ($num); ?>)</span>
                    </a>
                </nav>
            </div>
        </div>
        <div class="container kinds">
            <ul class="kinds-content clearfix">
                <a href="#"><li>
                    <div class="col-xs-6">
                        预售 >
                    </div>
                    <div class="col-xs-6">
                        <img src="/toshop/Public/Home/images/index/login_01.png" style="max-width: 100%" width="50%">
                    </div>
                </li></a>
                <?php if(is_array($kind)): $i = 0; $__LIST__ = $kind;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="#"><li>
                        <div class="col-xs-6">
                            <?php echo ($vo["kindname"]); ?> >
                        </div>
                        <div class="col-xs-6">
                            <img src="/toshop/<?php echo ($vo["kindimg"]); ?>" style="max-width: 100%" width="50%">
                        </div>
                    </li></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <a href="#"><li>
                    <div class="col-xs-6">
                        特价 >
                    </div>
                    <div class="col-xs-6">
                        <img src="/toshop/Public/Home/images/index/login_06.png" style="max-width: 100%" width="50%">
                    </div>
                </li></a>
                <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="../Index/kind.html?rid=<?php echo ($vo["rid"]); ?>"><li>
                        <div class="col-xs-6">
                            <?php echo ($vo["rname"]); ?> >
                        </div>
                        <div class="col-xs-6">
                            <img src="/toshop/<?php echo ($vo["rimg"]); ?>" style="max-width: 100%" width="50%">
                        </div>
                    </li></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <a href="../Index/kind.html"><li>
                    <div class="col-xs-6">
                        艺人 >
                    </div>
                    <div class="col-xs-6">
                        <img src="/toshop/Public/Home/images/index/login_12.png" style="max-width: 100%" width="50%">
                    </div>
                </li></a>
            </ul>
        </div>
    </header>
    <div class="containers">
        <div class="hot">
            <div class="new-shop">
                <ul>
                    <li class="hot-title">
                        <span>近期热卖<span>HOT</span></span>
                        <span><a href="#">MORE</a></span>
                    </li>
                </ul>
                <div class="hot-img">
                    <div class="hot-left">
                        <ul>
                            <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ho): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ho["id"]); ?>">
                                    <img src="/toshop/<?php echo ($ho["img"]); ?>" width="100%">
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="hot-main">
                        <ul>
                            <?php if(is_array($zb)): $i = 0; $__LIST__ = $zb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zb): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($zb["id"]); ?>">
                                    <img src="/toshop/<?php echo ($zb["img"]); ?>" width="100%" height="100%">
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="hot-left">
                        <ul>
                            <?php if(is_array($zj)): $i = 0; $__LIST__ = $zj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zj): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($zj["id"]); ?>">
                                    <img src="/toshop/<?php echo ($zj["img"]); ?>" width="100%" height="100%">
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="brand">
                <ul>
                    <li class="hot-title">
                        <span>优选品牌<span>TOP</span></span>
                        <span><a href="#">MORE</a></span>
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_03.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_06.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_07.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_08.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_11.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_13.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_15.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_24.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_28.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_29.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_30.png">
                    </li>
                    <li class="brand-img">
                        <img src="/toshop/Public/Home/images/shop/商城_31.png">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-xs-2">
                        <img src="/toshop/Public/Home/images/index/正品logo.png" width="17%">&nbsp;&nbsp;
                        <span class="text-danger">100%</span>&nbsp;&nbsp;&nbsp;<span>正品保证</span>
                    </div>
                    <div class="col-xs-2">
                        <img src="/toshop/Public/Home/images/index/七天logo.png"  width="17%">&nbsp;&nbsp;
                        <span class="text-danger">7天</span>&nbsp;&nbsp;&nbsp;<span>无理由退换货</span>
                    </div>
                    <div class="col-xs-2">
                        <img src="/toshop/Public/Home/images/index/客服logo.png"  width="20%">&nbsp;&nbsp;
                        <span class="text-danger">咨询</span>&nbsp;&nbsp;&nbsp;<span>在线客服</span>
                    </div>
                    <div class="col-xs-2 col-xs-offset-4 text-right">
                        <span>订阅我们</span>&nbsp;&nbsp;&nbsp;
                        <img src="/toshop/Public/Home/images/index/email.png" width="17%">
                    </div>
                </div>
            </div>
            <div class="footer-main">
                <div class="cols">
                    <ul>
                        <li>新手专区</li>
                        <li><a href="#">注册登录</a></li>
                        <li><a href="#">购物结算</a></li>
                        <li><a href="#">下单支付</a></li>
                    </ul>
                </div>
                <div class="cols">
                    <ul>
                        <li>会员中心</li>
                        <li><a href="#">会员福利</a></li>
                        <li><a href="#">账户管理</a></li>
                        <li><a href="#">密码管理</a></li>
                    </ul>
                </div>
                <div class="cols">
                    <ul>
                        <li>购物指南</li>
                        <li><a href="#">发票信息</a></li>
                        <li><a href="#">尺码对照</a></li>
                        <li><a href="#">商品咨询</a></li>
                    </ul>
                </div>
                <div class="cols">
                    <ul>
                        <li>支付方式</li>
                        <li><a href="#">在线支付</a></li>
                        <li><a href="#">货到付款</a></li>
                        <li><a href="#">分期付款</a></li>
                    </ul>
                </div>
                <div class="cols">
                    <ul>
                        <li>配送方式</li>
                        <li><a href="#">配送说明</a></li>
                        <li><a href="#">运费说明</a></li>
                        <li><a href="#">验货签收</a></li>
                    </ul>
                </div>
                <div class="cols">
                    <ul>
                        <li>售后与服务</li>
                        <li><a href="#">退换货通道</a></li>
                        <li><a href="#">投诉与建议</a></li>
                        <li><a href="#">在线客服</a></li>
                    </ul>
                </div>
            </div>
            <p>"版权所有 本站内容未经书面许可,禁止一切形式的转载。 © copyright 2010-2017 福建帮帮科技有限公司. All rights reserved. 京ICP证160379号"</p>
        </div>
        <div class="ac">
            <ul>
                <li>
                    <img src="/toshop/Public/Home/images/index/ac二维码.png" width="80%">
                </li>
                <li>
                    <img src="/toshop/Public/Home/images/index/下载logo.png" width="14%">
                    <span>下载APP</span>
                </li>
                <li>
                    <img src="/toshop/Public/Home/images/index/微博.png" width="14%">
                    <span>关注 Album Castle</span>
                </li>
                <li>
                    <img src="/toshop/Public/Home/images/index/微信.png" width="14%">
                    <span>订阅 Album Castle</span>
                </li>
            </ul>
        </div>
    </footer>
</div>
</body>
</html>
<script>
    $(function () {
        $('.tokind').hover(function () {
            $('.kinds').stop().fadeToggle(500)
        });
        $('.kinds').hover(function () {
            $('.kinds').stop().fadeToggle(500)
        });

        $('.hot-img li').hover(function () {
            let pid = this.dataset['id'];
            $(this).append('   <a href="shopdetail.html?pid='+pid+'" class="all-flag">\n' +
                '                        <a href="shopdetail.html?pid='+pid+'" class="shoping">立即选购</a>\n' +
                '                    </a>')
        },function () {
            $(this).children('.all-flag').remove();
            $(this).children('.shoping').remove();
        });

    })
</script>