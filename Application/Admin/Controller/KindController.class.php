<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30 0030
 * Time: 下午 1:41
 */

namespace Admin\Controller;
use Admin\Model\KindModel;
use Admin\Model\RegionModel;
use Admin\Model\UserModel;
use Think\Controller;

class KindController extends Controller
{
    function auth($id){
        if (strpos($_SESSION['admin']['rules'],$id) === false){
            $this->error('你没有权限','../Index/statistics');
        }
    }

    public function toaddkind(){
        $this->auth('52');
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728 ;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/kindimg/';
        $info = $upload->uploadOne($_FILES['kindimgs']);
        if($info){
            $data['kindimg'] = "Public/Admin/images/kindimg/".$info['savepath'].$info['savename'];
        }
        $data['kindname'] = I('kindname');
        $data['kindtitle'] = I('kindtitle');
        $user = new KindModel();
        $user->addkinds($data);
        $this->redirect('kind');
    }

    public function chac(){
        $name = I('kindname');
        $user = new KindModel();
        $arr = $user->sels($name);
        if ($arr){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function kind(){
        $this->auth('46');
        $User = M('kind'); // 实例化User对象
        $count = $User->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->limit($Page->firstRow.','.$Page->listRows)->order('kindid')->select();
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    //批量删除
    public function alldelkind(){
        $this->auth('53');
        $data = I('data');
        $data = json_decode($data);
        $user = new KindModel();
        $result = $user->alldel($data);
        if ($result){
            echo 1;
        }else{
           echo 0;
        }
     }

     public function del(){
        $this->auth('53');
        $id = I('id');
        $user = new KindModel();
        $result = $user->dels($id);
        if ($result){
           echo 1;
        }else{
            echo 0;
        }
     }

     //商品种类的更新
    public function upkind(){
        $this->auth('54');
        $data['kindid'] = I('kindid');
        $data['kindname'] = I('kindname');
        $data['kindtitle'] = I('kindtitle');
        $data['kindimg'] = I('kindimg');
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/kindimg/';
        $info = $upload->uploadOne($_FILES['kindimgs']);
        if($info){
            $data['kindimg'] = "Public/Admin/images/kindimg/".$info['savepath'].$info['savename'];
        }
        $user = new  KindModel();
        $result = $user->upkinds($data);
        $this->redirect('kind');
    }

    //类别名重复鉴定
    public function kindname(){
        $data['kindname'] = I("kindname");
        $data['kindid'] = I('kindid');
        $user = new KindModel();
        $result = $user->seltwo($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //地区管理
    public function region(){
        $this->auth('47');
        $user = new RegionModel();
        $arr = $user->sel();
        $this->assign('arr',$arr);
        $this->display();
    }

    public function addregion(){
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728 ;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/rimg/';
        $info = $upload->uploadOne($_FILES['rimgs']);
        if($info){
            $data['rimg'] = "Public/Admin/images/rimg/".$info['savepath'].$info['savename'];
        }
        $data['rname'] = I('rname');
        $user = new RegionModel();
        $user->add($data);
        $this->redirect('region');
    }

    public function selp(){
        $name = I('rname');
        $user = new RegionModel();
        $arr = $user->selp($name);
        if ($arr){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function rname(){
        $data['rname'] = I("rname");
        $data['rid'] = I('rid');
        $user = new RegionModel();
        $result = $user->seltwo($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function delr(){
        $id = I('id');
        $user =new RegionModel();
        $user->dels($id);
        $this->redirect('region');
    }

    public function alldelr(){
        $data = I('data');
        $data = json_decode($data);
        $user = new RegionModel();
        $result = $user->alldel($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function upregion(){
        $data['rid'] = I('rid');
        $data['rname'] = I('rname');
        $data['rinfo'] = I('rinfo');
        $data['rimg'] = I('rimg');
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728 ;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/rimg/';
        $info = $upload->uploadOne($_FILES['rimgs']);
        if($info){
            $data['rimg'] = "Public/Admin/images/rimg/".$info['savepath'].$info['savename'];
        }
        $user = new RegionModel();
        $result = $user->uprs($data);
        $this->redirect('region');
    }
}