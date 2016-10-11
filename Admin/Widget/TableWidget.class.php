<?php

namespace Admin\Widget;
use Think\Controller;

class TableWidget extends Controller {

    public function index($data){
        layout(false);
        $data['thead'] = explode(',', $data['thead']);
        $this->assign('data',$data);
        $this->display('Widget/table');
    }
    
}