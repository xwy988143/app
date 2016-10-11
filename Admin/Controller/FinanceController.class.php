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

    public function edit()
    {
        if (IS_POST) {

            $map['id'] = $_POST['id'];
            $data['salary'] = I('post.salary');
            $data['profit'] = I('post.profit');
            $res = M('stuff')->where($map)->save($data);
            if ($res) {
                success();
            }else{
                failed();
            }
        }else{

            $id = $_GET['id'];
            $map['id'] = $id;
            $stuff = M('stuff')->where($map)->find();
            foreach ($stuff as $key => $value) {
                $data[$key]['sex'] = $value['sex']=='0'? "女" : "男";
                //$data[$key]['total_money'] = $value['profit'] + $value['salary'];
            }
            $this->assign('data',$stuff);
            $this->display('edit');
        }
    }
}