<?php
namespace Admin\Controller;

class FinanceController extends CommonController {

    public function list()
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

    public function read()
    {
        $id = $_GET['id'];
        $map['a_id'] = $id;
        $data = M('stuff')->where($map)->select();
        foreach ($data as $key => $value) {
            $data[$key]['sex'] = $value['sex']=='0'? "女" : "男";
            $data[$key]['total_money'] = $value['profit'] + $value['salary'];
        }
        
        $this->assign('data',$data);
        $this->display('detail');
    }
}