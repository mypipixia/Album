<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 3:45
 */

namespace Admin\Model;
use Think\Model;

class ProductModel extends Model
{
    //商品的添加
    public function addproduct(){
        $product = M('product');
        $product->create();
        $result = $product->add();
        return $result;
    }
    //商品的删除
    public function delpro($id){
        $pro = M('product');
        $result=$pro->where('id='.$id)->delete();
        return $result;
    }
    //商品的查找
    public function selpids($id){
        $pro = M('product');
        $result=$pro->where('id='.$id)->find();
        return $result;
    }
    //商品的更新
    public function uppro($data){
        $pro = M('product');
        $result=$pro->save($data);
        return $result;
    }
    //设置商品的显示
    public function isshow($data){
        $pro = M('product');
        $result = $pro->save($data);
        return $result;
    }
    //最新专辑查询
    public function setnew(){
        $pro = M('product');
        $result = $pro->where('kid=35 and isshow=1')->limit('0','3')->order('uptime desc')->select();
        return $result;
    }

    //hot碟片查询
    public function sethot(){
        $pro = M('product');
        $result = $pro->where('kid=35 and isshow=1 and sales>300')->order('uptime desc')->select();
        return $result;
    }


    //新品和热销查询
    public function setnh($aid){
        $pro = M('ap');
        $result = $pro->where("isshow=1 and sales>300 and aid='".$aid."'")->limit(0,8)->order('uptime desc')->select();
        return $result;
    }
    //艺人专辑查询
    public function setzj($aid){
        $pro = M('ap');
        $result = $pro->where("aid='".$aid."' and isshow=1 and kid=35")->limit(0,8)->order('uptime desc')->select();
        return $result;
    }
    //艺人写真查询
    public function setxz($aid){
        $pro = M('ap');
        $result = $pro->where("aid='".$aid."' and isshow=1 and kid=27")->limit(0,8)->order('uptime desc')->select();
        return $result;
    }
    //艺人周边查询
    public function setzb($aid){
        $pro = M('ap');
        $result = $pro->where("aid='".$aid."' and isshow=1 and kid=28")->limit(0,8)->order('uptime desc')->select();
        return $result;
    }

    //热销门票查询
    public function selmp(){
        $pro = M('pk');
        $result = $pro->where('kid=29 and sales>300')->limit(0,8)->order('uptime desc')->select();
        return $result;
    }

    //new门票查询
    public function selnewmp(){
        $pro = M('pk');
        $result = $pro->where('kid=29')->limit(0,5)->order('uptime desc')->select();
        return $result;
    }

    //根据商品ID查商品信息
    public function selpid($pid){
        $pro = M('product');
        $arr = $pro->where('id='.$pid)->find();
        return $arr;

    }

    //热卖门票
    public function hotxz(){
        $pro = M('product');
        $result = $pro->where('kid=27 and isshow=1')->limit(0,6)->order('uptime desc')->select();
        return $result;
    }
    //热卖周边
    public function hotzb(){
        $pro = M('product');
        $result = $pro->where('kid=28 and isshow=1')->limit(0,6)->order('uptime desc')->select();
        return $result;
    }

    //热卖专辑
    public function hotzj(){
        $pro = M('product');
        $result = $pro->where('kid=35 and isshow=1')->limit(0,6)->order('uptime desc')->select();
        return $result;
    }
}