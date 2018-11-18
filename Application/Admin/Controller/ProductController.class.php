<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 12:33
 */

namespace Admin\Controller;


use Admin\Model\ActorModel;
use Admin\Model\ColorModel;
use Admin\Model\KindModel;
use Admin\Model\ProactorModel;
use Admin\Model\ProcolorModel;
use Admin\Model\ProductModel;
use Admin\Model\ProsizeModel;
use Admin\Model\SizeModel;
use Think\Controller;

class ProductController extends Controller
{
    function auth($id){
        if (strpos($_SESSION['admin']['rules'],$id) === false){
            $this->error('你没有权限','../Index/statistics');
        }
    }

    public function size(){
        $this->auth('49');
        $size = new SizeModel();
        $color = new ColorModel();
        $arrs = $color->selcolor();
        $arr = $size->selsize();
        $this->assign('arr',$arr);
        $this->assign('color',$arrs);
        $this->display();
    }
//尺寸添加
    public function addsize(){
        $size = new SizeModel();
        $result = $size->addsize();
        if ($result){
            $this->redirect('size');
        }else{
            $this->error('添加失败');
        }
    }
    //尺寸删除
    public function delsize(){
        $id = I('id');
        $size = new SizeModel();
        $result = $size->delsize($id);
        if ($result){
            $this->redirect('size');
        }else{
            $this->error('删除失败');
        }
    }

    //颜色添加
    public function addcolor(){
        $color = new ColorModel();
        $result = $color->addcolor();
        if ($result){
            $this->redirect('size');
        }else{
            $this->error('添加失败');
        }
    }
    //颜色的删除
    public function delcolor(){
        $id = I('id');
        $color = new ColorModel();
        $result = $color->delcolor($id);
        if ($result){
            $this->redirect('size');
        }else{
            $this->error('删除失败');
        }
    }

    //商品管理
    public function product(){
        $this->auth('50');
        $User = M('pk'); // 实例化User对象
        if (I('kid')){
            $count = $User->where('kid='.I('kid'))->count();// 查询满足要求的总记录数
            $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $User->where('kid='.I('kid'))->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
        }else if(I('seach')){
            $proname = I('seach');
            $date = array("name like '%$proname%'");
            $count = $User->where($date)->count();// 查询满足要求的总记录数
            $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $User->where($date)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
        }
        else{
            $count = $User->count();// 查询满足要求的总记录数
            $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $User->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
        }
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        //尺寸显示
        $size = new SizeModel();
        $sizelist =  $size->selsize();
        $this->assign('size',$sizelist);
        //颜色显示
        $color = new ColorModel();
        $colorlist = $color->selcolor();
        $this->assign('color',$colorlist);
        //艺人显示
        $actor = new ActorModel();
        $actorlist = $actor->sel();
        $this->assign('actor',$actorlist);

        $kind = new KindModel();
        $kind = $kind->selkinds();
        $this->assign('kind',$kind);
        $this->display();
    }

    //商品添加
    public function addproduct(){
        $product = M('product');
        $data = $product->create();
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728 ;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/product/';
        $info = $upload->uploadOne($_FILES['img']);
        if($info){
            $data['img'] = "Public/Admin/images/product/".$info['savepath'].$info['savename'];
        }
        $data['uptime'] = time();
        $data['sales'] = 0;
        $result = $product->add($data);
        if ($result){
            $this->redirect('product');
        }else{
            $this->error('product');
        }
    }

    //商品的删除
    public function delpro(){
        $this->auth('56');
        $id = I('id');
        $pro = new ProductModel();
        $result = $pro->delpro($id);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }
    //是否在前台显示商品
    public function setisshow(){
        $data['isshow'] = I('isshow');
        $data['id'] = I('id');
        if ($data['isshow'] == 1){
            $data['isshow'] = 0;
        }else{
            $data['isshow'] = 1;
        }
        $pro = new ProductModel();
        $result = $pro->isshow($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

//前台是否推荐商品
    public function setisrecommend(){
        $data['isrecommend'] = I('isrecommend');
        $data['id'] = I('id');
        if ($data['isrecommend'] == 1){
            $data['isrecommend'] = 0;
        }else{
            $data['isrecommend'] = 1;
        }
        $pro = new ProductModel();
        $result = $pro->isshow($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //商品修改
    public function uppro(){
        $pro = M('product');
        $arr = $pro->create();
        $result = $pro->save();
        if ($result){
            $this->success('修改成功');
        }
       else{
            $this->error('修改失败');
       }
    }

    //尺寸设置
    public function setsize(){
        $id = I('id');
        $prosize = new ProsizeModel();
        $prosize->delsize($id);
        $data = I('data');
        $data = json_decode($data);
        $arr = array();
        for ($i=0;$i<count($data);$i++){
            $arr[] = array('pid'=>$id,'sid'=>$data[$i]);
        }
        $result = $prosize->addsize($arr);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //尺寸查找
    public function selsize(){
        $id = I('id');
        $prosize = new ProsizeModel();
        $arr = $prosize->selsize($id);
        $arr = json_encode($arr);
        echo $arr;
    }


    //颜色设置
    public function setcolor(){
        $id = I('id');
        $procolor = new ProcolorModel();
        $procolor->delcolor($id);
        $data = I('data');
        $data = json_decode($data);
        $arr = array();
        for ($i=0;$i<count($data);$i++){
            $arr[] = array('pid'=>$id,'cid'=>$data[$i]);
        }
        $result = $procolor->addcolor($arr);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //颜色查找
    public function selcolor(){
        $id = I('id');
        $procolor = new ProcolorModel();
        $arr = $procolor->selpro($id);
        $arr = json_encode($arr);
        echo $arr;
    }

    //艺人设置
    public function setactor(){
        $actor = new ProactorModel();
        $data['pid'] = I('pid');
        $data['aid'] = I('aid');
        $actor->delcactor($data['pid']);
        $result = $actor->addactor($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }
    //艺人查找
    public function selactor(){
        $id = I('id');
        $procolor = new ProactorModel();
        $arr = $procolor->selpro($id);
        $arr = json_encode($arr);
        echo $arr;
    }
    //图片修改
    public function upimg(){
        $product = M('product');
        $data = $product->create();
        $upload = new \Think\Upload();
        $upload->maxSize  =  3145728 ;
        $upload->exts     =  array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath =  'Public/Admin/images/product/';
        $info = $upload->uploadOne($_FILES['img']);
        if($info){
            $data['img'] = "Public/Admin/images/product/".$info['savepath'].$info['savename'];
        }
        $result = $product->where('id='.$data['id'])->save($data);
        if ($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }
}