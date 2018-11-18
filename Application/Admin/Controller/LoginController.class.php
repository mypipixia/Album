<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29 0029
 * Time: 上午 9:33
 */

namespace Admin\Controller;
use Admin\Model\UserModel;
use Think\Controller;

class LoginController extends Controller
{
    public function login(){
        $this->display();
    }


    //进行登录验证
    public function tologin(){
        $data['psw'] = md5(I('password'));
        $data['name'] = I('username');
        $user = new UserModel();
        $result = $user->loginSel($data);
        $_SESSION['admin'] = $result;
        if ($result){
            if ($result['status']==0){
                echo 0;
            }else{
                echo 1;
            }
        }else{
            echo 2;
        }
    }
}