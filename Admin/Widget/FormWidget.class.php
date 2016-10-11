<?php

namespace Admin\Widget;
use Think\Controller;

class FormWidget extends Controller {
    
    public function _initialize(){
        layout(false);
    }

    //输入框
    public function input($data){
        //$this->getArgs(func_get_args());
        $this->assign('data',$data);
        $this->display('Widget/input');
    }
    
    //文本框
    public function textarea($data){
        $this->assign('data',$data);
        $this->display('Widget/textarea');
    }
    
    //下拉框
    public function select($data){
        $this->assign('data',$data);
        $this->display('Widget/select');
    }
    
    //单选
    public function radio($data){
        $this->assign('data',$data);
        $this->display('Widget/radio');
    }

    //多选
    public function checkbox($data){
        $this->assign('data',$data);
        $this->display('Widget/checkbox');
    }

    //ueditor
    public function ueditor($data){
        $this->assign('data',$data);
        $this->display('Widget/ueditor');
    }
    
    private function getArgs($args){
        $data = array();
        foreach($args as $value){
            $arg = explode('::', $value);
            $data[$arg[0]] = $arg[1];
        }
        $this->assign('data',$data);
    }

}