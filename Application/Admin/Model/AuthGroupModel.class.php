<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/13 0013
 * Time: 上午 10:54
 */

namespace Admin\Model;


use Think\Model;

class AuthGroupModel extends Model
{
    //角色查找
    public function selrole(){
        $role = M('auth_group');
        $arr = $role->select();
        return $arr;
    }
    //角色添加
    public function addrole($data){
        $role = M('auth_group');
        $result = $role->add($data);
        return $result;
    }
    //角色删除
    public function delrole($id){
        $role = M('auth_group');
        $result = $role->where('id='.$id)->delete();
        return $result;
    }
    //角色查找
    public function selid($id){
        $role = M('auth_group');
        $result = $role->where('id='.$id)->find();
        return $result;
    }

    //权限更新
    public function uprule($data){
        $role = M('auth_group');
        $result = $role->save($data);
        return $result;
    }
}