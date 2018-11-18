<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 上午 8:59
 */

namespace Home\Model;


use Think\Model;

class HomeuserModel extends Model
{

    //登录验证
    public function login($name,$psw){
        $user = M('homeuser');
        $result = $user->where("name='".$name."' and psw='".$psw."'")->find();
        return $result;
    }

    //用户添加
    public function adduser($data){
        $user = M('homeuser');
        $result = $user->add($data);
        return $result;
    }

    //电话查重
    public function selphone($phone){
        $user = M('homeuser');
        $result = $user->where('phone='.$phone)->find();
        return $result;
    }

    //用户名查重
    public function selname($name){
        $user = M('homeuser');
        $result = $user->where("name='".$name."'")->find();
        return $result;
    }
}