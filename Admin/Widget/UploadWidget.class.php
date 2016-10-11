<?php

namespace Admin\Widget;
use Think\Controller;

class UploadWidget extends Controller {
    
    //图片上传(单图)
    public function image($data){
        layout(false);
//        $args = func_get_args();
//        $data = array();
//        foreach($args as $value){
//            $arg = explode(':', $value);
//            $data[$arg[0]] = $arg[1];
//        }
        if(!isset($data['value'])){
            if(!isset($data['size'])){
                $data['size'] = "100x100";
            }
            $data['value'] = "http://placehold.it/{$data['size']}/a2a2a2/ffffff";
        }
        $this->assign('data',$data);
        $this->display('Widget/image');
    }

}