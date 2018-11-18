<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/11 0011
 * Time: 上午 11:34
 */

namespace Admin\Model;


use Think\Model;

class OrderdetailModel extends Model
{
    //添加
    public function adddetail($data){
        $detail = M('orderdetail');
        foreach ($data as $i=>$v){
          $result =  $detail->add($v);
        }
        return $result;
    }

    //详情查找
    public function selde($id){
        $detail = M('prode');
        $arr = $detail->where('orderid='.$id)->select();
        return $arr;
    }
}