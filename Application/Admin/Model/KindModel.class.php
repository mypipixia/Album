<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30 0030
 * Time: 下午 2:12
 */

namespace Admin\Model;


use Think\Model;

class KindModel extends Model
{
    //商品类别的添加
    public function addkinds($data){
        $user = M('kind');
        $result = $user->add($data);
        return $result;
    }

    //商品类别的查找
    public function selkinds(){
        $user = M('kind');
        $arr = $user->select();
        return $arr;
    }

    //商品的类别查重
    public function sels($name){
        $user = M('kind');
        $result = $user->where("kindname='". $name ."'")->select();
        return $result;
    }

    public function seltwo($data){
        $user = M('kind');
        $result = $user->where("kindname='". $data['kindname'] ."' and kindid !='". $data['kindid'] ."'")->select();
        return $result;
    }
    //批量删除
    public function alldel($data){
        $user = M('kind');
        $ids = implode(',',$data);
        $result = $user->delete($ids);
        return $result;
    }

    public function dels($id){
        $user = M('kind');
        $result = $user->where('kindid='.$id)->delete();
        return $result;
    }

    //商品种类的更新
    public function upkinds($data){
        $user = M('kind');
        $result = $user->save($data);
        return $result;
    }
}