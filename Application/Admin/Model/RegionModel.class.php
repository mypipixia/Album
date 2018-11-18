<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31 0031
 * Time: 下午 12:21
 */

namespace Admin\Model;
use Think\Model;
class RegionModel extends Model
{
    public function sel(){
        $user = M('region');
        $arr = $user->select();
        return $arr;
    }

    //地区表的添加
    public function adds($data){
        $user = M('region');
        $user->add($data);
    }

    //查重
    public function selp($name){
        $user = M('region');
        $arr = $user->where("rname='". $name ."'")->select();
        return $arr;
    }

    //删除
    public function dels($id){
        $user = M('region');
        $arr = $user->where("rid='". $id ."'")->delete();
        return $arr;
    }

    //批量删除
    public function alldel($data){
        $user = M('region');
        $ids = implode(',',$data);
        $result = $user->delete($ids);
        return $result;
    }
    //更新
    public function uprs($data){
        $user = M('region');
        $result = $user->save($data);
        return $result;
    }

    public function seltwo($data){
        $user = M('region');
        $result = $user->where("rname='". $data['rname'] ."' and rid !='". $data['rid'] ."'")->select();
        return $result;
    }
}