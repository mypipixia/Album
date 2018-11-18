<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/1 0001
 * Time: 下午 3:01
 */

namespace Admin\Controller;
use Think\Controller;

class ShowController extends Controller
{
    public function lunbo(){
        $lunbo = M('lunbo');
        $arr = $lunbo->order('lid')->select();
        $this->assign('arr',$arr);
        $this->display();

    }
    //添加轮播图
    public function addlunbo(){
        $lunbo = M('lunbo');
        $data = $lunbo->create();
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728000;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/lunbo/';
        $info = $upload->uploadOne($_FILES['img']);
        if($info){
            $data['img'] = "Public/Admin/images/lunbo/".$info['savepath'].$info['savename'];
        }
        $result = $lunbo->add($data);
        if ($result){
            $this->redirect('lunbo');
        }else{
            $this->error('添加失败');
        }
    }
    //删除
    public function del(){
        $id = I('lid');
        $user = M('lunbo');
        $result = $user->where('lid='.$id)->delete();
        if ($result){
           echo 1;
        }else{
           echo 0;
        }
    }

    //更新
    public function uplunbo(){
        $user = M('lunbo');
        $arr =  $user->create();
        if ($arr['isshow']==1){
            $arr['isshow'] = 0;
        }else{
            $arr['isshow'] = 1;
        }
        $result = $user->where('lid='.$arr['lid'])->save($arr);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

}