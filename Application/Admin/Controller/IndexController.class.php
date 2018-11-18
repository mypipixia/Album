<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if ($_SESSION['admin'] == null){
            $this->error('请登录','../Login/login.html');
        }
        $this->assign('arr',$_SESSION['admin']);
        $this->display();
    }

    public function downlogin(){
        unset($_SESSION['admin']);
        $this->redirect('Login/login');
    }

    public function statistics(){
        $this->display();
    }
}