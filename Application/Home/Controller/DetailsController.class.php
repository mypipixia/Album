<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 上午 10:20
 */

namespace Home\Controller;


use Admin\Model\ActorModel;
use Admin\Model\KindModel;
use Admin\Model\ProductModel;
use Admin\Model\RegionModel;
use Think\Controller;

class DetailsController extends Controller
{
    public function details(){
        $user = new KindModel();
        $kind = $user->selkinds();
        $res = new RegionModel();
        $res = $res->sel();
        $this->assign('kind',$kind);
        $this->assign('res',$res);
        $this->assign('user',$_SESSION['user']);
        $this->assign('num',count($_SESSION['car']));
        $aid = I('aid');
        $user = new ActorModel();
        $actor = $user->selaid($aid);
        $this->assign('actor',$actor);
        $hotpro = new ProductModel();
        $hn = $hotpro->setnh($aid);
        $zj = $hotpro->setzj($aid);
        $xz = $hotpro->setxz($aid);
        $zb = $hotpro->setzb($aid);
        $this->assign('zj',$zj);
        $this->assign('hn',$hn);
        $this->assign('xz',$xz);
        $this->assign('zb',$zb);
        $this->display();
    }
}