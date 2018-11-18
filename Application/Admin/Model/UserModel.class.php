<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29 0029
 * Time: 下午 8:47
 */

namespace Admin\Model;


use Think\Model;

class UserModel extends Model
{
    //查询用户信息
    public function seluser(){
        $user = M('user');
        $arr = $user->select();
        return $arr;
    }

    public function selu(){
        $user = M('Auth');
        $arr = $user->select();
        return $arr;
    }

    //登录验证
    public function loginSel($data){
        $user = M('Auth');
        $result = $user->where("username='".$data['name']."' and userpsw='".$data['psw']."'")->find();
        return $result;
    }
    //用户添加
    public function adduser($data){
        $user = M('user');
        $result = $user->add($data);
        return $result;
    }
    //用户权限添加
    public function setrole($arr){
        $user = M('auth_group_access');
        $result = $user->add($arr);
        return $result;
    }
    //状态更改
    public function upstatus($data){
        $user = M('user');
        $result = $user->save($data);
        return $result;
    }
    //角色修改
    public function uprole($data){
        $user = M('auth_group_access');
        $result = $user->save($data);
        return $result;
    }
}