<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2016/6/5
 * Time: 17:12
 */
namespace Home\Model;
use Think\Model;
class UsersModel extends Model{
    public function findAdminCreate(){
        return $this->where('register_source=%d', [3])->select();
    }

    public function getUsers($user_name='', $page, $pagesize=10){
//        if($user_name == ''){
//            return $this->select();
//        }
//        else{
//            $where['user_name'] = array('like','%'.$user_name.'%');
//            return $this->where($where)->select();
//        }
        $userinfo = '';
        if($user_name == ''){
            $userinfo['list'] = $this->page($_GET['p'].',10')->select();
            $userinfo['count'] = $this->count();
            return $userinfo;
        }
        else{
            $where['user_name'] = array('like','%'.$user_name.'%');
            $userinfo['list'] = $this->where($where)->page($_GET['p'].',10')->select();
            $userinfo['count'] = $this->where($where)->count();
            return $userinfo;
        }
    }
    public function getUserList($user_name='', $page, $pagesize=10){
        $result = ['rows'=>[], 'total'=>0];
        $where = [];
        $user_name = trim($user_name); // 去掉空格
        $user_name != '' && $where['user_name'] = ['like', '%' . $user_name .'%'];
        $result['total'] = $this->where($where)->count();
        $result['rows'] = $this->where($where)->page("$page,$pagesize")->select();
        return $result;
    }
}