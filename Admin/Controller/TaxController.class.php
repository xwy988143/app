<?php
namespace Admin\Controller;

class TaxController extends CommonController {

    public function index()
    {
    	$this->display('index');
    }

    public function list()
    {
    	if ( ID !=1 ) {
    		$map['a_id'] = ID;
    		$data = M('stuff')->where($map)->select();

    		foreach ($data as $key => $value) {
    			$data[$key]['inTax'] = taxCal($value['total_money']);
    		}

    		var_dump($data);
    		exit;
    	}
    	$this->display();
    }
}