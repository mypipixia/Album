<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12 0012
 * Time: 上午 9:53
 */

namespace Admin\Controller;


use Admin\Model\OrderdetailModel;
use Admin\Model\OrderinfoModel;
use Admin\Model\ProductModel;
use Think\Controller;

class OrderController extends Controller
{

    function auth($id){
        if (strpos($_SESSION['admin']['rules'],$id) === false){
            $this->error('你没有权限','../Index/statistics');
        }
    }

    public function order(){
        $this->auth('51');
        $order = new OrderinfoModel();
        $arr = $order->tosend();
        $this->assign('arr',$arr);

        $arrs = $order->adminsend();
        $this->assign('arrs',$arrs);

        $isget= $order->isget();
        $this->assign('isget',$isget);
        $this->display();
    }

    //发货
    public function send(){
        $this->auth('55');
        $data['oderid'] = I('orderid');
        $data['isdeliver'] = 1;
        $order = new OrderinfoModel();
        $result = $order->isdeliver($data);
        $orders = new OrderdetailModel();
        $product = new ProductModel();
        $arr = $orders->selde($data['oderid']);
        foreach ($arr as $i=>$v){
            $pro = $product->selpids($v['pid']);
            $as['id'] = $v['pid'];
            $as['sales'] = $v['buynum'] + $pro['sales'];
            if (($pro['num']-$v['buynum'])>0){
                $as['num'] =$pro['num']-$v['buynum'];
            }else {
                $as['num'] = 0;
            }
            $product->uppro($as);
        }
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function tonotpaydetails(){
        $orderid = I('orderid');
        $order = new OrderdetailModel();
        $arr = $order->selde($orderid);
        $arr =  json_encode($arr);
        echo $arr;
    }
}