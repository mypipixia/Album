<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31 0031
 * Time: 下午 2:26
 */

namespace Admin\Controller;
use Admin\Model\ActorModel;
use Admin\Model\RegionModel;
use Think\Controller;

class ActorController extends Controller
{
    function auth($id){
        if (strpos($_SESSION['admin']['rules'],$id) === false){
            $this->error('你没有权限','../Index/statistics');
        }
    }

    public function actor(){
        $this->auth('48');
        $User = M('actor'); // 实例化User对象
        $count = $User->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->limit($Page->firstRow.','.$Page->listRows)->order('aid')->select();
        $this->assign('data',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $region = new RegionModel();
        $arr = $region->sel();
        $this->assign('arr',$arr);
        $this->display();
    }

    public function addactor(){
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728 ;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/aimg/';
        $info = $upload->uploadOne($_FILES['logo']);
        if($info){
            $data['alogo'] = "Public/Admin/images/aimg/".$info['savepath'].$info['savename'];
        }
        $data['aname'] = I('aname');
        $data['ainfo'] = I('ainfo');
        $data['rid'] = I('rid');
        $data['aband'] = I('aband');
        $data['isrecommend'] = I('isrecommend');
        $actor = new ActorModel();
        $actor->addactor($data);
        $this->redirect('actor');
    }

    //单点删除
    public function dela(){
        $id = I('id');
        $actor = new ActorModel();
        $result = $actor->dela($id);
        $this->redirect('actor');
    }

    //更新
    public function upactor(){
        $user = M('actor');
        $arr = $user->create();
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/aimg/';
        $info = $upload->uploadOne($_FILES['logo']);
        if($info){
            $arr['alogo'] = "Public/Admin/images/aimg/".$info['savepath'].$info['savename'];
        }
        $result = $user->save($arr);
        if ($result){
            $this->redirect('actor');
        }else{
            $this->error('修改失败');
        }
    }

    public function isrecommend(){
        $data['aid'] = I('aid');
        $data['isrecommend'] = I('isrecommend');
        if ($data['isrecommend'] == 1){
            $data['isrecommend'] = 0;
        }else{
            $data['isrecommend'] = 1;
        }
        $user = new ActorModel();
        $result = $user->upisrecommend($data);
    }

    //批量删除
    public function delall(){
        $list = I('list');
        $list = json_decode($list);
        $user = new ActorModel();
        $result = $user->delall($list);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //查重
//    public function selc(){
//        $name = I('name');
//        $user = new ActorModel();
//        $result = $user->selc($name);
//        if ($result){
//            echo 1;
//        }else{
//            echo 0;
//        }
//    }
//
//    public function selcs(){
//        $name = I('name');
//        $id = I('id');
//        $user = new ActorModel();
//        $result = $user->selcs($name,$id);
//        if ($result){
//            echo 1;
//        }else{
//            echo 0;
//        }
//    }

}