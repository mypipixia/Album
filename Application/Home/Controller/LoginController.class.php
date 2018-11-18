<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29 0029
 * Time: 上午 10:35
 */

namespace Home\Controller;
use Home\Model\HomeuserModel;
use Think\Controller;

class LoginController extends ZhenziSmsClient
{

    public function login(){
        $this->display();
    }

    //登录验证
    public function tologin(){
        $name = I('name');
        $psw = md5(I('psw'));
        $user = new HomeuserModel();
        $result = $user->login($name,$psw);
        $_SESSION['user'] = $result;
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //注册
    public function register(){
        $data['name'] = I('name');
        $data['psw'] = md5(I('psw'));
        $data['sex'] = I('sex');
        $data['phone'] = I('phone');
        $user = new HomeuserModel();
        $name = $user->selname($data['name']);
        $phone = $user->selphone($data['phone']);
        if ($name){
            echo 1;
            return;
        }
        if ($phone){
            echo 2;
            return;
        }
        $result = $user->adduser($data);
        if ($result){
            echo 3;
        }else{
            echo 4;
        }

    }


//短信验证码
    public function send_code(){
        $client=new ZhenziSmsClient("http://sms_developer.zhenzikj.com","100035","ZTlkNmRkZjAtYTg3Zi00YzI0LTlmY2YtMTc0OTc3NmRhMjYz");
        $telphone = I('telphone');
        $verify_code = rand(100000, 999999);
        $word="什么都卖".$verify_code."该验证码有效时间为3分钟";
        $result=$client->send($telphone,$word);
        $arr = json_decode($result);
        $arr->k = $verify_code;
        $result = json_encode($arr);
        echo $result;
    }

}