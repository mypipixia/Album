<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12 0012
 * Time: 下午 4:15
 */

namespace Admin\Controller;


use Admin\Model\AuthGroupModel;
use Admin\Model\NodeModel;
use Admin\Model\UserModel;
use Think\Auth;
use Think\Controller;
use Org\Util;

class RbacController extends Controller
{

    function auth($id){
        if (strpos($_SESSION['admin']['rules'],$id) === false){
            $this->error('你没有权限','../Index/statistics');
        }
    }

    public function node(){
        $this->auth('57');
        $node = new NodeModel();
        $arr = $node->selnode();
        $arrlevel = $node->sellevel();
        $arr = Util\Tree::creates($arr);
        Util\Tree::$treelist = array();
        $arrlevel = Util\Tree::creates($arrlevel);
        $this->assign('arr',$arr);
        $this->assign('level',$arrlevel);
        $this->display();
    }

    //权限添加
    public function addnode(){
        $node = new NodeModel();
        $result = $node->addnode();
        if ($result){
            $this->redirect('node');
        }else{
            $this->error('添加失败');
        }
    }

    //角色管理
    public function role(){
        $this->auth('59');
        $role = new AuthGroupModel();
        $arr = $role->selrole();
        $this->assign('arr',$arr);
        $this->display();
    }

    //角色添加
    public function addrole(){
        $data =array(
            'title'=>I('title'),
            'status'=>1
        );
        $role = new AuthGroupModel();
        $result = $role->addrole($data);
        if ($result){
            $this->redirect('role');
        }else{
            $this->error('添加失败');
        }
    }

    //角色删除
    public function delrole(){
        $id = I('id');
        $rule = new AuthGroupModel();
        $resutl = $rule->delrole($id);
        if ($resutl){
            $this->redirect('role');
        }else{
            $this->error('删除失败');
        }
    }

    //角色权限分配
    public function allotnode(){
        $node = new NodeModel();
        $arr = $node->selnode();
        $arr = Util\Tree::creates($arr);
        $this->assign('arr',$arr);

        $id = I('id');
        $this->assign('id',$id);
        $rule = new AuthGroupModel();
        $rulelist = $rule->selid($id);
        $this->assign('rulelist',$rulelist['rules']);
        $this->display();
    }

    //角色权限修改
    public function upnode(){
        $data = array(
            'id'=>I('id'),
            'rules'=>I('rules')
        );
        $rule = new AuthGroupModel();
        $result = $rule->uprule($data);
        $_SESSION['admin']['rules'] = $data['rules'];
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //用户管理
    public function user(){
        $this->auth('58');
        $user = new UserModel();
        $userlist = $user->selu();
        $this->assign('user',$userlist);
        $role = new AuthGroupModel();
        $rolelist = $role->selrole();
        $this->assign('role',$rolelist);
        $this->display();
    }

    //用户添加
    public function adduser(){
        $data = array(
          'username'=>I('username'),
          'userpsw'=>md5(I('userpsw')),
           'logintime'=>time(),
            'status'=>I('status')
        );
        $user= new UserModel();
        $arr['uid'] = $user->adduser($data);
        $arr['group_id'] = I('vid');
        $role = $user->setrole($arr);
        if ($role){
            $this->redirect('user');
        }else{
            $this->error('添加失败');
        }
    }

    //角色分配
    public function autorole(){
        $data = array(
            'uid'=>I('uid'),
            'group_id'=>I('vid')
        );
        $role = new UserModel();
        $result = $role->uprole($data);
        if ($result){
            $this->redirect('user');
        }else{
            $this->error('修改失败');
        }
    }

    //状态
    public function status(){
        $data['id'] = I('id');
        $data['status'] = I('status');
        if ($data['status'] == 1){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }
        $user = new UserModel();
        $result = $user->upstatus($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }

    }
}