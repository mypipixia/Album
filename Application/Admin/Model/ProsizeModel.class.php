<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5 0005
 * Time: 上午 9:39
 */

namespace Admin\Model;


use Think\Model;

class ProsizeModel extends Model
{
    //尺寸添加
    public function addsize($arr)
    {
        $prosize = M('prosize');
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
    public function selsize($id){
        $prosize = M('prosize');
        $arr = $prosize->where('pid='.$id)->select();
        return $arr;
    }

    //尺寸删除
    public function delsize($id){
        $prosize = M('prosize');
        $arr = $prosize->where('pid='.$id)->delete();
    }

    //尺寸商品查找
    public function selprosize($pid){
        $prosize = M('psize');
        $arr = $prosize->where('pid='.$pid)->select();
        return $arr;
    }
}