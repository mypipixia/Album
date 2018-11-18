<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6 0006
 * Time: 下午 4:19
 */

namespace Home\Controller;


use Admin\Model\KindModel;
use Admin\Model\OrderdetailModel;
use Admin\Model\OrderinfoModel;
use Admin\Model\ProcolorModel;
use Admin\Model\ProductModel;
use Admin\Model\ProsizeModel;
use Admin\Model\RegionModel;
use Home\Model\AddressModel;
use Think\Controller;

class ShopController extends Controller
{
    public function shop(){
        $this->assign('num',count($_SESSION['car']));
        $lunbo = M('lunbo');
        $user = new KindModel();
        $kind = $user->selkinds();
        $res = new RegionModel();
        $res = $res->sel();
        $this->assign('kind',$kind);
        $this->assign('res',$res);
        $this->assign('user',$_SESSION['user']);
        $arr = $lunbo->where('isshow=1')->order('lid')->select();
        $this->assign('arr',$arr);

        $pro = new ProductModel();
        $promp = $pro->selmp();
        $this->assign('promp',$promp);
        $pronewmp = $pro->selnewmp();
        $this->assign('pronewmp',$pronewmp);
        $this->display();
    }

    //商品详情
    public function shopdetail(){
        $this->assign('num',count($_SESSION['car']));
        $user = new KindModel();
        $kind = $user->selkinds();
        $res = new RegionModel();
        $res = $res->sel();
        $this->assign('kind',$kind);
        $this->assign('res',$res);
        $this->assign('user',$_SESSION['user']);
        $pid = I('pid');

        $this->assign('pid',$pid);
        $pro = new ProductModel();
        $pronum = $pro->selpid($pid);
        $this->assign('pronum',$pronum);

        $se = new ProsizeModel();
        $size = $se->selprosize($pid);
        $this->assign('size',$size);

        $co = new ProcolorModel();
        $color = $co->selprocolor($pid);
        $this->assign('color',$color);
        $this->display();
    }
    //购物车页面
    public function shopcar(){
        if (!$_SESSION['user']){
            $this->error('请登录');
        }
        $pro = new ProductModel();
        for ($i=0;$i<count($_SESSION['car']);$i++){
            $da = $_SESSION['car'][$i];
            $arr = $pro->selpid($da['pid']);
            $da['pname'] = $arr['name'];
            $da['price'] = $arr['price'];
            $da['img'] = $arr['img'];
            $da['allprice'] = $da['num'] * $arr['price'];
            $_SESSION['car'][$i] = $da;
        }
        $this->assign('car',$_SESSION['car']);
        $this->assign('user',$_SESSION['user']);
        $this->display();
    }
//删除购物车中的商品
    public function delcar(){
        $index = I('index')-1;
        $car = $_SESSION['car'];
        array_splice($car,$index,1);
        $_SESSION['car'] = $car;
    }
    //修改购物车中的商品数量
    public function upcar(){
           $index = I('index')-1;
           $nums = I('nums');
           $_SESSION['car'][$index]['num'] =$nums;
        $_SESSION['car'][$index]['allprice'] = $nums*$_SESSION['car'][$index]['price'];
    }
    //清空购物车
    public function clearcar(){
            $_SESSION['car'] = array();
            $this->redirect('shopcar');
    }

    //商品加入购物车
    public function toshopcar(){
        if ($_SESSION['user']){
            $pid = I('pid');
            $colorname = I('colorname');
            $sizename = I('sizename');
            $num = I('num');
            $car = null;
            $flag = true;
            if (isset($_SESSION['car'])){
                $car = $_SESSION['car'];
            }else{
                $car = array();
            }

            if (count($car) == 0){
                $data = array('pid'=>$pid,'colorname'=>$colorname,'sizename'=>$sizename,'num'=>$num);
                $car[] = $data;
            }else{
                for ($i=0;$i<count($car);$i++){
                    $da = $car[$i];
                    if($da['pid'] == $pid && $da['colorname'] ==$colorname && $da['sizename'] == $sizename){
                        $flag = false;
                        $car[$i]['num'] +=$num;
                        break;
                    }
                }

                if ($flag){
                    $data = array('pid'=>$pid,'colorname'=>$colorname,'sizename'=>$sizename,'num'=>$num);
                    $car[] = $data;
                }
            }

            $_SESSION['car'] = $car;
            if ($_SESSION['car']){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 3;
        }
    }


    //结算
    public function statement(){
        $regi = new AddressModel();
        $arr = $regi->seladrr($_SESSION['user']['id']);
        $allnum = 0;
        $allmoney = 0;
        foreach ($_SESSION['pay'] as $i=>$v){
            $allnum += $v['num'];
            $allmoney += $v['allprice'];
        }
        $this->assign('allnum',$allnum);
        $this->assign('allmoney',$allmoney);
        $this->assign('arr',$arr);
        $this->assign('pay',$_SESSION['pay']);
        $this->display();
    }

    //结算方法
    public function topay(){
        $arr = I('pid');
        $arr = json_decode($arr);
        $car = $_SESSION['car'];
        $pays = array();
        $as = array();
        $a = count($car);
        for ($j=0;$j<count($arr);$j++){
            for($i=0;$i<$a;$i++){
                if ($arr[$j] == $car[$i]['pid']){
                    $pays[] = $car[$i];
                    unset($car[$i]);
                }
            }
        }
        foreach($car as $i=>$v){
            $as[] = $v;
        }
        $_SESSION['pay'] = $pays;
        $_SESSION['car'] = $as;
        if ($_SESSION['pay']){
            echo 1;
        }else{
            echo 0;
        }
    }

    //取消支付的方法
    public function notpay(){
        $data['oderid'] = time();
        $data['ispay'] = 0;
        $data['orderdate'] = time();
        $data['ordermoney'] = 0;
        $data['productnum'] = 0;
        $data['userid'] = $_SESSION['user']['id'];
       foreach ($_SESSION['pay'] as $i=>$v){
           $data['ordermoney'] += $v['allprice'];
           $data['productnum'] +=$v['num'];
           $arr[$i]['orderid'] = $data['oderid'];
           $arr[$i]['buycount'] = $v['allprice'];
           $arr[$i]['buynum'] = $v['num'];
           $arr[$i]['pid'] = $v['pid'];
           if ($v['colorname']){
               $arr[$i]['colorname'] = $v['colorname'];
               $arr[$i]['sizename'] = $v['sizename'];
           }else{
               $arr[$i]['colorname'] = '无';
               $arr[$i]['sizename'] = '无';
           }
       }
        $data['isdeliver'] = 0;
        $data['addressid'] = I('addressid');
        $order = new OrderinfoModel();
        $order->addorder($data);
        $_SESSION['pay'] =array();

        $del = new OrderdetailModel();
        $result = $del->adddetail($arr);
        $_SESSION['pay'] = array();
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //确认支付的方法
    public function pay(){
        $data['oderid'] = time();
        $data['ispay'] = 1;
        $data['orderdate'] = time();
        $data['ordermoney'] = 0;
        $data['productnum'] = 0;
        $data['userid'] = $_SESSION['user']['id'];
        foreach ($_SESSION['pay'] as $i=>$v){
            $data['ordermoney'] += $v['allprice'];
            $data['productnum'] +=$v['num'];

            $arr[$i]['orderid'] = $data['oderid'];
            $arr[$i]['buycount'] = $v['allprice'];
            $arr[$i]['buynum'] = $v['num'];
            $arr[$i]['pid'] = $v['pid'];
            if ($v['colorname']){
                $arr[$i]['colorname'] = $v['colorname'];
                $arr[$i]['sizename'] = $v['sizename'];
            }else{
                $arr[$i]['colorname'] = '无';
                $arr[$i]['sizename'] = '无';
            }
        }
        $data['isdeliver'] = 0;
        $data['addressid'] = I('addressid');
        $order = new OrderinfoModel();
        $order->addorder($data);
        $_SESSION['pay'] =array();

        $del = new OrderdetailModel();
        $result = $del->adddetail($arr);
        $_SESSION['pay'] = array();
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //立即购买
    public function rightpay(){
        if($_SESSION['user']){
            $pid = I('pid');
            $colorname = I('colorname');
            $sizename = I('sizename');
            $num = I('num');
            $pay = array();
            $pro = new ProductModel();
            $product = $pro->selpid($pid);
            $allprice = $num*$product['price'];
            $data = array(
                'pid'=>$pid,
                'colorname'=>$colorname,
                'sizename'=>$sizename,
                'num'=>$num,
                'pname'=>$product['name'],
                'price'=>$product['price'],
                'img'=>$product['img'],
                'allprice'=>$allprice
            );
            $_SESSION['pay'] = array();
            $_SESSION['pay'][] = $data;
            if ($data){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 2;
        }
    }

    //热卖
    public function hotshop(){
        $lunbo = M('lunbo');
        $user = new KindModel();
        $kind = $user->selkinds();
        $res = new RegionModel();
        $res = $res->sel();
        $pro = new ProductModel();
        $hotxz = $pro->hotxz();
        $this->assign('hot',$hotxz);

        $hotzb = $pro->hotzb();
        $this->assign('zb',$hotzb);

        $hotzj = $pro->hotzj();
        $this->assign('zj',$hotzj);

        $this->assign('kind',$kind);
        $this->assign('res',$res);
        $this->assign('user',$_SESSION['user']);
        $this->assign('num',count($_SESSION['car']));
        $arr = $lunbo->where('isshow=1')->order('lid')->select();
        $this->assign('arr',$arr);
        $this->display();
    }
}