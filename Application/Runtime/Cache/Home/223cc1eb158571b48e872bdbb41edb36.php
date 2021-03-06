<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品购买</title>
    <link href="/toshop/Public/Lib/css/bootstrap.css" rel="stylesheet">
    <link href="/toshop/Public/Home/css/shopdetail.css" rel="stylesheet">
    <script src="/toshop/Public/Lib/js/jquery-1.10.2.min.js"></script>
    <script src="/toshop/Public/Lib/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/toshop/Public/Lib/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="all">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="modal-body text-center contents" style="color: orangered">加入购物车成功</h3>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>


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
                    <a href="../Shop/hotshop.html">热卖</a>
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
                    <a href="shopcar.html">
                        <img src="/toshop/Public/Home/images/index/车.png">
                        <span class="label">(<?php echo ($num); ?>)</span>
                    </a>
                </nav>
            </div>
        </div>
    </header>
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
    <main class="main">
        <div class="main-left">
            <div class="left-top-img">
                <img src="/toshop/<?php echo ($pronum["img"]); ?>" width="100%">
            </div>
            <ul class="left-bottom-img">
                <li>
                    <img src="/toshop/<?php echo ($pronum["img"]); ?>">
                </li>
            </ul>
        </div>
        <div class="main-right">
            <p><?php echo ($pronum["name"]); ?></p>
            <div class="main-right-info">
                <ul>
                    <li>
                        <a href="">去领卷</a>
                    </li>
                    <li>
                        <span>价&nbsp&nbsp&nbsp&nbsp&nbsp格:</span>
                        <span>￥<?php echo ($pronum["price"]); ?></span>
                    </li>
                    <li>
                        <span>运&nbsp&nbsp&nbsp&nbsp&nbsp费:</span>
                        <span>免邮</span>
                    </li>
                    <li>
                        <span>进&nbsp口&nbsp税:</span>
                        <span>这次就不收了</span><a href="">总价规则</a>
                    </li>
                </ul>
            </div>
            <ul class="main-right-sales">
                <li>
                    <span>月销量</span><span><?php echo ($pronum["sales"]); ?></span>
                </li>
                <li>
                    <span>累计评价</span><span>1989</span>
                </li>
            </ul>

            <ul class="main-right-color">
                <li>颜&nbsp&nbsp&nbsp&nbsp色:</li>
                <?php if($color == null): ?><li data-name="无">无</li>
                    <?php else: ?>
                    <?php if(is_array($color)): $i = 0; $__LIST__ = $color;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li style="border:1px solid <?php echo ($c["ename"]); ?>" data-color="<?php echo ($c["ename"]); ?>" data-name="<?php echo ($c["colorname"]); ?>" data-che="1"></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
            <ul class="main-right-size">
                <li>大&nbsp&nbsp&nbsp&nbsp小:</li>
                <?php if($size == null): ?><li style="border: none;width: 0">无</li>
                    <?php else: ?>
                    <?php if(is_array($size)): $i = 0; $__LIST__ = $size;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><li data-che="1"><?php echo ($s["sizename"]); ?></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
            <div class="main-right-num">
                <p>数&nbsp&nbsp&nbsp&nbsp量:</p>
                <div class="setnum">
                    <span class="nums">1</span>
                    <span class="add"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
                    <span class="sub"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <span>件</span>
                </div>
            </div>
            <div class="main-btn">
                <a style="cursor: pointer" class="rightpay">立即购买</a>
                <a style="cursor: pointer" class="gocar"><i class="fa fa-shopping-cart" aria-hidden="true"></i>加入购物车</a>
            </div>
        </div>
        <div class="main--footer">
            <img src="/toshop/Public/Home/images/shopdetail/ed.png" width="100%">
        </div>
    </main>
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
        //立即支付
        $('.rightpay').click(function () {
            let pid = <?php echo ($pid); ?>;
            let colorlist = $('.main-right-color li:not(:first-child)');
            let sizelist = $('.main-right-size li:not(:first-child)');
            var colorname = '无';
            var sizename = '无';
            let num = parseInt($('.main-right-num .nums').text());
            colorlist.each(function (i,e) {
                if (e.dataset['che'] == 0){
                    colorname = e.dataset['name'];
                }
            });
            sizelist.each(function (i,e) {
                if (e.dataset['che'] == 0){
                    sizename = e.innerText;
                }
            });
            $.ajax({
                type:'post',
                url:'rightpay',
                data:{
                    pid:pid,
                    colorname:colorname,
                    sizename:sizename,
                    num:num
                },
                success(msg){
                   if (msg==1){
                        window.location = 'statement'
                   }else if(msg==2){
                       $('.contents').text('请登录');
                       $('#myModal').modal('show');
                   }else {
                       $('.contents').text('添加失败');
                       $('#myModal').modal('show');
                   }
                }
            })


        });


        $('.gocar').click(function (e) {
            let pid = <?php echo ($pid); ?>;
            let colorlist = $('.main-right-color li:not(:first-child)');
            let sizelist = $('.main-right-size li:not(:first-child)');
            var colorname = '无';
            var sizename = '无';
            let num = parseInt($('.main-right-num .nums').text());
            colorlist.each(function (i,e) {
                if (e.dataset['che'] == 0){
                    colorname = e.dataset['name'];
                }
            });
            sizelist.each(function (i,e) {
                if (e.dataset['che'] == 0){
                    sizename = e.innerText;
                }
            });

            $.ajax({
                type:'post',
                url:'toshopcar',
                data:{
                    pid:pid,
                    colorname:colorname,
                    sizename:sizename,
                    num:num
                },
                success(msg){
                    if (msg==1){
                        $('.contents').text('成功加入购物车');
                        $('#myModal').modal('show');
                    }else if (msg==3) {
                        $('.contents').text('请登录');
                        $('#myModal').modal('show');
                    }
                }
            })
        });

        //图片放大
        let colors = $('.main-right-color li:nth-of-type(2)')[0].dataset['color'];
        $('.main-right-color li:nth-of-type(2)').css({
            background:colors
        });
        $('.main-right-color li:nth-of-type(2)')[0].dataset['che'] = 0;
        $('.main-right-size li:nth-of-type(2)')[0].dataset['che'] =0;
        $('.left-bottom-img li img').mouseenter(function () {
            $('.left-top-img img').attr('src',$(this).attr('src'))
        });
        //颜色选择
        $('.main-right-color li:not(:first-child)').click(function () {
            let color = this.dataset['color'];
            $('.main-right-color li:not(:first-child)').css({
                background:'none'
            });
            $('.main-right-color li:not(:first-child)').each(function (i,e) {
                e.dataset['che'] = 1;
            });
            $(this).css({
                background:color
            });
            this.dataset['che'] = 0;

        });
        //尺寸选择
        $('.main-right-size li:not(:first-child)').click(function () {
            $('.main-right-size li:not(:first-child)').css({
                border:"solid 1px #d4d4d4"
            });
            $('.main-right-size li:not(:first-child)').each(function (i,e) {
                e.dataset['che'] = 1;
            });
            $(this).css({
                border:'1px solid red'
            });
            this.dataset['che'] = 0;
        });
        //数量加减控制
        $('.add').click(function () {
            let num = parseInt($('.nums').text());
            num++;
            $('.nums').text(num)
        });
        $('.sub').click(function () {
            let num = parseInt($('.nums').text());
            if (num<2){
                return
            }
            num--;
            $('.nums').text(num)
        });

        $('.tokind').hover(function () {
            $('.kinds').stop().fadeToggle(500)
        });
        $('.kinds').hover(function () {
            $('.kinds').stop().fadeToggle(500)
        });

    })
</script>