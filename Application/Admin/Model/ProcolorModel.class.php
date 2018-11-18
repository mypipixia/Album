<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5 0005
 * Time: 下午 2:39
 */

namespace Admin\Model;


use Think\Model;

class ProcolorModel extends Model
{
    //尺寸添加
    public function addcolor($arr)
    {
        $prosize = M('procolor');
        $flag = true;
        for ($i = 0; $i < count($arr); $i++) {
            $result = $prosize->add($arr[$i]);
            if (!$result) {
                $flag = false;
            }
        }
        return $flag;
    }

    //尺寸查找
    public function selpro($id){
        $prosize = M('procolor');
        $arr = $prosize->where('pid='.$id)->select();
        return $arr;
    }

    //尺寸删除
    public function delcolor($id){
        $prosize = M('procolor');
        $prosize->where('pid='.$id)->delete();
    }

    //商品颜色id查找
    public function selprocolor($pid){
        $pro = M('pcolor');
        $arr = $pro->where('pid='.$pid)->select();
        return $arr;
    }
}