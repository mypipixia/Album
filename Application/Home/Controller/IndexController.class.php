<?php
namespace Home\Controller;
use Admin\Model\ActorModel;
use Admin\Model\KindModel;
use Admin\Model\ProductModel;
use Admin\Model\RegionModel;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $lunbo = M('lunbo');
        $user = new KindModel();
        $kind = $user->selkinds();
        $res = new RegionModel();
        $res = $res->sel();
        $product = new ProductModel();
        //新碟
        $prolist = $product->setnew();
        //热卖
        $prohot = $product->sethot();
        $this->assign('hot',$prohot);
        $this->assign('prolist',$prolist);
        $this->assign('kind',$kind);
        $this->assign('res',$res);
        $this->assign('user',$_SESSION['user']);
        $this->assign('num',count($_SESSION['car']));
        $arr = $lunbo->where('isshow=1')->order('lid')->select();
        $this->assign('arr',$arr);
        $this->display();
    }

    //注销登录
    public function down(){
        unset($_SESSION['user']);
        $this->redirect('index');
    }

    public function kind(){
        $this->assign('num',count($_SESSION['car']));
        $actor = new ActorModel();
        if (I('rid') && I('rband')){
            $rid = I('rid');
            $rband = I('rband');
            $actorlist = $actor->selisrecommend($rid,$rband);
            $notactorlist = $actor->selnotisre($rid,$rband);
        }else if (I('rid')){
            $rid = I('rid');
            $actorlist = $actor->selrid($rid);
            $notactorlist = $actor->selnorid($rid);
        }else{
            $actorlist = $actor->selactors();
            $notactorlist = $actor->selnotactors();
        }
        $lunbo = M('lunbo');
        $user = new KindModel();
        $kind = $user->selkinds();
        $res = new RegionModel();
        $res = $res->sel();
        $this->assign('kind',$kind);
        $this->assign('actor',$actorlist);
        $this->assign('notactor',$notactorlist);
        $this->assign('res',$res);
        $this->assign('user',$_SESSION['user']);
        $arr = $lunbo->where('isshow=1')->order('lid')->select();
        $this->assign('arr',$arr);
        $this->display();
    }
}