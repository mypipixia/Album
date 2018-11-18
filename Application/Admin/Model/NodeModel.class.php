<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12 0012
 * Time: 下午 4:28
 */

namespace Admin\Model;


use Think\Model;

class NodeModel extends Model
{
    //权限添加
    public function addnode(){
        $node = M('node');
        $node->create();
        $result = $node->add();
        return $result;
    }
    //类别的查找
    public function selnode(){
        $node = M('node');
        $arr =  $node->order('id desc')->select();
        return $arr;
    }
    //等级查找
    public function sellevel(){
        $node = M('node');
        $arr =  $node->where('level != 3')->select();
        return $arr;
    }
    //删除操作
    public function delnode($id){
        $node = M('node');
        $result = $node->where('id='.$id)->delect();
        return $result;
    }
    //层级删除
    public function delpid($id){
        $node = M('node');
        $result = $node->where('pid='.$id)->delect();
        return $result;
    }
}