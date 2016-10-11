<?php
namespace Test\Controller;
use Think\Controller;
//use Think\Model\MongoModel;
class IndexController extends Controller {
    public function index(){
        echo phpinfo();exit;
        //$Model = new MongoModel("test");
        $result = M('test')->select();
        dump($result);
    }
}