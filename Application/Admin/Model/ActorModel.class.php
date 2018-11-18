<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31 0031
 * Time: 下午 2:38
 */

namespace Admin\Model;
use Think\Model;

class ActorModel extends Model
{
    //添加
    public function addactor($data){
        $actor = M('actor');
        $actor->add($data);
    }
    //查找
    public function sel(){
        $actor = M('ar');
       $arr =  $actor->order('aid')->select();
       return $arr;
    }

    //查重1
    public function selc($name){
        $user = M('actor');
        $result = $user->where("aname='". $name ."'")->select();
        return $result;
    }

    public function selcs($name,$id){
        $user = M('actor');
        $result = $user->where("aname='". $name ."' and aid!='".$id."'")->select();
        return $result;
    }

    //单点删除
    public function dela($id){
        $actor = M('actor');
        $result = $actor->where('aid='.$id)->delete();
        return $result;
    }
    //批量删除
    public function delall($list){
        $user = M('actor');
        $list = implode(',',$list);
        $result = $user->delete($list);
        return $result;
    }
    //是否推荐更新
    public function upisrecommend($data){
        $user = M('actor');
        $result = $user->save($data);
        return $result;
    }



    public function selisrecommend($id,$aband){
        $user = M('ar');
        $arr = $user->where("isrecommend=0 and rid='".$id."' and aband='".$aband."'")->limit(0,8)->select();
        return $arr;
    }

    public function selactors(){
        $user = M('ar');
        $arr = $user->where("isrecommend=0")->limit(0,8)->select();
        return $arr;
    }

    public function selrid($id){
        $user = M('ar');
        $arr = $user->where("isrecommend=0 and rid=".$id)->limit(0,8)->select();
        return $arr;
    }

    public function selnorid($id){
        $user = M('ar');
        $arr = $user->where("isrecommend=1 and rid=".$id)->limit(0,32)->select();
        return $arr;
    }



    public function selnotisre($id,$aband){
        $user = M('ar');
        $arr = $user->where("isrecommend=1 and rid='".$id."' and aband='".$aband."'")->limit(0,32)->select();
        return $arr;
    }

    public function selnotactors(){
        $user = M('ar');
        $arr = $user->where("isrecommend=1")->limit(0,32)->select();
        return $arr;
    }

    public function selaid($aid){
        $user = M('actor');
        $result = $user->where('aid='.$aid)->find();
        return $result;
    }
}