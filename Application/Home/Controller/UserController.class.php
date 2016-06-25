<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2016/6/5
 * Time: 16:43
 */
namespace Home\Controller;
use Home\Model\UsersModel;
use Think\Controller;
use Think\Page;
class UserController extends Controller
{
    public function info(){
        $user1 = M('users')->find(1);
        $model = new \Think\Model('users');
        $user2= $model->find(2);
        $userAdminList = D('Users')->findAdminCreate();
        //$userAdminModel = new \Home\Model\UsersModel();
        //$userAdminModel->findAdminCreate();
        //$orderlist = M('order')->limit(10);
        $this->assign('user1', $user1);
        $this->assign('user2', $user2);
        $this->assign('order_list',  M('order')->limit(10)->select());
        $this->assign('adminlist', $userAdminList);
        $this->display();

        print_r($user2);
        echo json_encode($user2);
        $this->ajaxReturn($user2);

    }

    public function p(){
        echo phpinfo();
    }

    public function js(){
        if(IS_GET){
            $this->display('info');
            return;
        }
        $result =['success'=>false, 'info'=>'I get!'];
        $user_name = I('user_name');

        $this->ajaxReturn($result);
    }

//    public function js_post(){
//        $result =['success'=>false, 'info'=>'I get!'];
//        $user_name = I('user_name');
//
//        $this->ajaxReturn($result);
//    }

    public function userCenter(){
//        $user_name = $_REQUEST['user_name'];
//        $user = new UsersModel();
//        $user_list = $user->getUsers($user_name);
//        $this->assign('user_list',$user_list);
//        $this->display();

//        $user_name = $_REQUEST['user_name'];
//        $user = new UsersModel();
//        $user_list = $user->getUsers($user_name)['list'];
//        $count = $user->getUsers($user_name)['count'];
//        $this->assign('user_list',$user_list);
//        $page = new Page($count,10);
//        $show = $page->show();
//        $this->assign('page',$show);
//        $this->display();

        $user_name = $_REQUEST['user_name'];
        $user = new UsersModel();
        $p = I('p');
        empty($p) && $p = 1;    //如果p为空就置1
        $user_list = $user->getUserList($user_name, $p);
        $this->assign('user_list',$user_list['rows']);

        $page = new Page($user_list['total'],10, ['user_name'=>$user_name]);//I('get.')传给下一页的数据
        $show = $page->show();
        $this->assign('data', I('request.'));
        $this->assign('page',$show);
        $this->display();
    }
}