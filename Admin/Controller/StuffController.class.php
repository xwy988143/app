<?php
namespace Admin\Controller;

class StuffController extends CommonController {

    //添加员工信息
    public function addStuff()
    {
        if(IS_POST){
            $data['a_id'] = ID;                         //当前科室的ID
            $stuff = M('stuff');
            $data['type'] = I('type');
            $data['name'] = I('name');
            //$data['salary'] = I('salary');
            $data['profit'] = I('profit');
            $data['sex'] = I('sex');

            $stuff->add($data)? success('添加成功',U('Stuff/listStuff')) : failed('添加失败');

        }else {
            $this->display();
        }
    }
    //根据部门的ID，分别列出所属的员工信息
    public function listStuff()
    {
        if (ID == 1) {
            $stuff = M('stuff');
            $data = $stuff->select();
            foreach ($data as $key => $value) {
                $data[$key]['sex'] = $value['sex']=='0'? "女" : "男";
                $data[$key]['total_money'] = $value['profit'] + $value['salary'];
            }
            $this->assign('data',$data);
            $this->display();
        }else{
            $stuff = M('stuff');
            $conditon['a_id'] = ID;
            $data=$stuff->where($conditon)->select();
            foreach ($data as $key => $value) {
                $data[$key]['sex'] = $value['sex']=='0'? "女" : "男";
                $data[$key]['total_money'] = $value['profit'] + $value['salary'];
            }
            $this->assign('data',$data);
            $this->display();  
        }
    }

    public function deleteStuff()
    {
        if(IS_AJAX){
            $ids = I('post.ids', 0) OR failed('缺少参数id');
            M('stuff')->where(array('id'=>array('in', $ids)))->delete() ? success() : failed();
        }
    }

}