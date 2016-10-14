<?php
namespace Admin\Controller;

class TaxController extends CommonController {

    public function index()
    {
    	$this->display('index');
    }

    public function list()
    {
    	if ( ID !=1 ) 
        {
    		$map['a_id'] = ID;
    		$data = M('stuff')->where($map)->select();
    		foreach ($data as $key => $value) {
                $data[$key]['sex'] = $value['sex']=='0'? "女" : "男";
    			$data[$key]['tax'] = taxCal($value['total_money']);
            }
            $this->assign('data',$data);
    	}else{
            $msg = "请登录具体科室查看详情，谢谢！";
            $this->assign('msg',$msg);
        }
    	$this->display();
    }

    public function allList()
    {
         if(IS_AJAX){
            $page = get_page_val();
            $where = "username like '%{$page['keyword']}%'";
            $result = D('Admin')->getList($where, "{$page['page']},{$page['pageSize']}", 'id desc');
            $lists = set_page_val(array('count'=>$result['count'],'lists'=>$result['list']));
            return_json($lists);
        }else{
            $this->display();
        } 
    }

}