<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 2:24
 */

namespace Admin\Model;


use Think\Model;

class ColorModel extends Model
{
    //颜色添加
    public function addcolor(){
        $color = M('color');
        $color->create();
        $result = $color->add();
        return $result;
    }
    //颜色的查询
    public function selcolor(){
        $color = M('color');
        $arr = $color->order('id desc')->select();
        return $arr;
    }
    //颜色删除
    public function delcolor($id){
        $color = M('color');
        $result = $color->where('id='.$id)->delete();
        return $result;
    }
}