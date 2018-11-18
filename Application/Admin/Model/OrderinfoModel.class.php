<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/11 0011
 * Time: 上午 11:21
 */

namespace Admin\Model;


use Think\Model;

class OrderinfoModel extends Model
{
    //添加
    public function addorder($data){
        $order = M('orderinfo');
        $result = $order->add($data);
        return $result;
    }
    //查找未支付
    public function selnotpay($id){
        $order = M('addresspay');
        $arr = $order->where('userid='.$id.' and ispay=0')->order('oderid desc')->select();
        return $arr;
    }

    //支付修改
    public function topay($id,$data){
        $order = M('orderinfo');
        $result = $order->where('oderid='.$id)->save($data);
        return $result;
    }
    //待发货
    public function issend($id){
        $order = M('addresspay');
        $result = $order->where('userid='.$id.' and isdeliver=0 and ispay=1')->select();
        return $result;
    }
    //待收货
    public function send($id){
        $order = M('addresspay');
        $result = $order->where('userid='.$id.' and isdeliver=1 and ispay=1 and isget = 0')->select();
        return $result;
    }

    //已收货
    public function homeisget($id){
        $order = M('addresspay');
        $result = $order->where('userid='.$id.' and isget=1')->select();
        return $result;
    }

    //所有待发货
    public function tosend(){
        $order = M('addresspay');
        $result = $order->where('isdeliver=0 and ispay=1 ')->select();
        return $result;
    }

    //所有已发货
    public function adminsend(){
        $order = M('addresspay');
        $result = $order->where('isdeliver=1 and ispay=1 and isget = 0')->select();
        return $result;
    }

    //所有已签收
    public function isget(){
        $order = M('addresspay');
        $result = $order->where('isget = 1')->select();
        return $result;
    }

    //发货
    public function isdeliver($data){
        $order = M('orderinfo');
        $result = $order->save($data);
        return $result;
    }

    //删除订单
    public function delorder($id){
        $order = M('orderinfo');
        $result = $order->where('oderid='.$id)->delete();
        return $result;
    }

}