<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 1:47
 */

namespace Admin\Model;


use Think\Model;

class SizeModel extends Model
{
    //尺寸添加
    public function addsize(){
        $size = M('size');
        $size->create();
        $result = $size->add();
        return $result;
    }

    //尺寸查询
    public function selsize(){
        $size = M('size');
        $arr = $size->order('id desc')->select();
        return $arr;
    }

    //删除尺寸
    public function delsize($id){
        $size = M('size');
        $result = $size->where('id='.$id)->delete();
        return $result;
    }

}
