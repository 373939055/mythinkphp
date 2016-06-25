<?php
namespace Home\Controller;
    use Think\Controller;

class IndexController extends Controller {
    private $do;
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        //echo "Hello";
        $this->display();
    }

    public function main(){
//        echo 'Hello';
//        $user = M('Users');
//        $user->startTrans();  //开始事务
//        try{
//            $affect = $user->where('user_id=1')->save(['real_name'=>'111']);
//            echo 'Af:' . dump($affect);
//
//            $data = [];
//            $user_id = $user->add($data);
//            if(empty($user_id)){
//            //    throw new \Exception('add user fail', 0);
//            }
//
//            $user->commit();  //提交事务
//            dump($user_id);
//        }catch(\Exception $e){
//            $user->rollback();    //回滚
//            dump($e->getMessage());
//        }
        dump(phpinfo());

    }

    public function left(){
        $this->display();
    }

    public function top(){
        echo "Hello!";
    }

    public function setDo($val){
        $this->do = $val;
    }


}