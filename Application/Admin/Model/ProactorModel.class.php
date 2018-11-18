<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/5 0005
 * Time: 下午 3:31
 */

namespace Admin\Model;


use Think\Model;

class ProactorModel extends Model
{
    //艺人设置
    public function addactor($data){
        $actor = M('proactor');
        $result = $actor->add($data);
        return $result;
    }

    //艺人查找
    public function selpro($id){
        $prosize = M('proactor');
        $arr = $prosize->where('pid='.$id)->select();
        return $arr;
    }

    //艺人删除
    public function delcactor($id){
        $prosize = M('proactor');
        $prosize->where('pid='.$id)->delete();
    }
}