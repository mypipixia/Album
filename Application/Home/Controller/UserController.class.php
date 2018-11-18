<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8 0008
 * Time: 下午 3:33
 */

namespace Home\Controller;


use Admin\Model\OrderdetailModel;
use Admin\Model\OrderinfoModel;
use Home\Model\AddressModel;
use Home\Model\HomeuserModel;
use Think\Controller;

class UserController extends Controller
{
    public function user(){
        $this->assign('num',count($_SESSION['car']));
        $this->assign('user',$_SESSION['user']);
        $this->display();
    }
    //用户信息
    public function userinfo(){
        $this->assign('user',$_SESSION['user']);
        $this->display();
    }
    //头像设置
    public function userlogo(){
        $this->assign('user',$_SESSION['user']);
        $this->display();
    }
    //地址
    public function register(){
        $this->assign('user',$_SESSION['user']);
        $regi = new AddressModel();
        $arr = $regi->seladrr($_SESSION['user']['id']);
        $this->assign('arr',$arr);
        $this->display();
    }
    //待支付
    public function notpay(){
        $id = $_SESSION['user']['id'];
        $order = new OrderinfoModel();
        $arr = $order->selnotpay($id);
        $this->assign('arr',$arr);
        $this->display();
    }

    //待支付详情查找
    public function tonotpaydetails(){
        $orderid = I('orderid');
        $order = new OrderdetailModel();
        $arr = $order->selde($orderid);
        $arr =  json_encode($arr);
        echo $arr;
    }
    //待发货
    public function paysend(){
        $id = $_SESSION['user']['id'];
        $order = new OrderinfoModel();
        $arr = $order->issend($id);
        $this->assign('arr',$arr);
        $this->display();
    }
    //待收货
    public function send(){
        $id = $_SESSION['user']['id'];
        $order = new OrderinfoModel();
        $arr = $order->send($id);
        $this->assign('arr',$arr);
        $this->display();
    }
    //评价
    public function isget(){
        $id = $_SESSION['user']['id'];
        $order = new OrderinfoModel();
        $arr = $order->homeisget($id);
        $this->assign('arr',$arr);
        $this->display();
    }

    //取消订单
    public function cancel(){
        $id = I('orderid');
        $order = new OrderinfoModel();
        $result = $order->delorder($id);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }


    //信息修改
    public function upuserinfo(){
        $pro = M('homeuser');
        $arr = $pro->create();
        $result = $pro->save($arr);
        $user = $pro->where('id='.$arr['id'])->find();
        $_SESSION['user'] = $user;
           if ($result){
               echo 1;
           }
    }
    //头像修改
    public function upheading(){
        $data['id'] = I('id');
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728 ;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Home/images/user/';
        $info = $upload->uploadOne($_FILES['headimg']);
        if($info){
            $data['headimg'] = "Public/Home/images/user/".$info['savepath'].$info['savename'];
        }
        $pro = M('homeuser');
        $pro->save($data);

        $user = $pro->where('id='.$data['id'])->find();
        $_SESSION['user'] = $user;
        $this->redirect('userlogo');
    }
    //添加地址
    public function address(){
        $data['consignee'] = I('name');
        $data['userid'] = I('userid');
        $data['address'] = I('address');
        $data['phone'] = I('phone');
        $adr = new AddressModel();
        $result = $adr->addad($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }
    //删除地址
    public function delre(){
        $id = I('id');
        $res = new AddressModel();
        $result = $res->delre($id);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //支付状态修改
    public function topays(){
        $oid = I('oid');
        $data['ispay'] = 1;
        $order = new OrderinfoModel();
        $result = $order->topay($oid,$data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //确认收货
    public function truesend(){
        $data['oderid'] = I('orderid');
        $data['isget'] = 1;
        $order = new OrderinfoModel();
        $result = $order->isdeliver($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}