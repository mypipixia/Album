<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/10 0010
 * Time: 下午 12:49
 */

namespace Home\Model;


use Think\Model;

class AddressModel extends Model
{
    //添加
    public function addad($data){
        $adr = M('address');
        $result = $adr->add($data);
        return $result;
    }
    //地址查询
    public function seladrr($id){
        $adr = M('address');
        $arr = $adr->where('userid='.$id)->select();
        return $arr;
    }
    //地址删除
    public function delre($id){
        $adr = M('address');
        $result = $adr->where('id='.$id)->delete();
        return $result;
    }
}