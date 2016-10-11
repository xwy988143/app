<?php
namespace Admin\Controller;

class AdminController extends CommonController {
    //后台账号列表
    public function account(){
        if(IS_AJAX){
            $page = get_page_val();
            $where = "username like '%{$page['keyword']}%'";
            $result = D('Admin')->getList($where, "{$page['page']},{$page['pageSize']}", 'id desc');
            foreach($result['list'] as $key=>$value){
                if($value['id'] == '1'){
                    $result['list'][$key]['tel'] = '未知';
                    $result['list'][$key]['money'] = '无';
                    $result['list'][$key]['money_lock'] = '无';
                    $result['list'][$key]['sex'] = '未知';
                    $result['list'][$key]['admin_group'] = array('name'=>'超级管理员');
                    $result['list'][$key]['admin_level'] = array('level_remark'=>'无');
                }
            }
            $lists = set_page_val(array('count'=>$result['count'],'lists'=>$result['list']));
            return_json($lists);
        }else{
            $this->display();
        }
    }
    
    //添加后台账号
    public function addAccount(){
        if(IS_POST){
            $db = D('Admin');
            if (!$db->create()){
                failed($db->getError());
            }else{
                $db->add();
                success('success', U('account'));
            }
        }else{
            $this->assign('group', $this->getAccountGroup());
            $this->assign('level', $this->getAccountLevel());
            $this->display();
        }
    }
    
    //修改后台账号
    public function editAccount(){
        if(IS_POST){
            $id = I('post.id', 0) OR failed('缺少参数id');
            if($id == '1') failed('faker!');
            $db = D('Admin');
            if (!$db->create()){
                failed($db->getError());
            }else{
                $db->where(array('id'=>$id))->save();
                success('success');
            }
        }else{
            $id = I('id');
            $this->assign('data', M('admin')->where(array('id'=>$id))->find());
            $this->assign('group', $this->getAccountGroup());
            $this->assign('level', $this->getAccountLevel());
            $this->display('addAccount');
        }
    }
    
    //删除后台账号
    public function delAccount(){
        if(IS_AJAX){
            $ids = I('post.ids', 0) OR failed('缺少参数id');
            if($ids=='1' || in_array(1, $ids)) failed('faker!');
            M('admin')->where(array('id'=>array('in', $ids)))->delete() ? success() : failed();
        }
    }
    
    //分组
    public function accountGroup(){
        if(IS_AJAX){
            $page = get_page_val();
            $where = "name like '%{$page['keyword']}%'";
            $count = M('admin_group')->where($where)->count();
            $rs = M('admin_group')->where($where)->limit($page['page'], $page['pageSize'])->order('id DESC')->select();
            $lists = set_page_val(array('count'=>$count,'lists'=>$rs));
            return_json($lists);
        }else{
            $this->display();
        }
    }
    
    //添加分组
    public function addGroup(){
        if(IS_AJAX){
            $insert['name'] = I('post.name') OR failed('缺少参数name');
            M('admin_group')->add($insert) ? success() : failed();
        }
    }
    
    //修改分组
    public function editGroup(){
        if(IS_POST){
            $id = I('post.id', 0);
            $_POST['rule'][] = 'index-index';
            $update['rule'] = implode(',', I('post.rule'));
            M('admin_group')->where(array('id'=>$id))->save($update) ? success() : failed();
        }else{
            $id = I('id');
            $this->assign('data', M('admin_group')->where(array('id'=>$id))->find());
            $this->assign('rule', C('adminrule'));
            $this->display();
        }
    }
    
    //删除分组
    public function delGroup(){
        if(IS_AJAX){
            $ids = I('post.ids', 0) OR failed('缺少参数id');
            M('admin_group')->where(array('id'=>array('in', $ids)))->delete() ? success() : failed();
        }
    }
    
    //获取账号分组数据
    private function getAccountGroup(){
        return M('admin_group')->order('id asc')->select();
    }

    //获取账号等级数据
    private function getAccountLevel(){
        return M('admin_level')->order('level_name asc')->select();
    }

    //账号等级
    public function level(){
        if(IS_AJAX){
            $page = get_page_val();
            $where = "level_name like '%{$page['keyword']}%' OR level_remark like '%{$page['keyword']}%'";
            $count = M('admin_level')->where($where)->count();
            $rs = M('admin_level')->where($where)->limit($page['page'], $page['pageSize'])->order('level_name ASC')->select();
            $lists = set_page_val(array('count'=>$count,'lists'=>$rs));
            return_json($lists);
        }else{
            $this->display();
        }
    }

    //添加账号等级
    public function levelAdd(){
        if(IS_POST){
            $insert['level_name'] = I('post.level_name') OR failed('请输入等级名称');
            $insert['level_remark'] = I('post.level_remark') OR failed('请输入等级备注');
            $insert['gubi'] = I('post.gubi') OR failed('请输入股币值');
            M('admin_level')->add($insert) ? success('', U('level')) : failed();
        }else{
            $this->display();
        }
    }

    //更新账号等级
    public function levelEdit(){
        if(IS_POST){
            $level_id = I('post.level_id', 0) OR failed('缺少参数level_id');
            $update['level_name'] = I('post.level_name') OR failed('请输入等级名称');
            $update['level_remark'] = I('post.level_remark') OR failed('请输入等级备注');
            $update['gubi'] = I('post.gubi') OR failed('请输入股币值');
            M('admin_level')->where(array('level_id'=>$level_id))->save($update) ? success() : failed();
        }else{
            $level_id = I('get.level_id', 0) OR failed('缺少参数level_id');
            $data = M('admin_level')->find($level_id);
            $this->assign('data', $data);
            $this->display('levelAdd');
        }
    }

    //删除账号等级
    public function levelDel(){
        if(IS_AJAX){
            $ids = I('post.ids', 0) OR failed('缺少参数id');
            if(M('admin')->where(array('level_id'=>array('in', $ids)))->count() > 0) failed('等级已配置给会员,无法删除!');
            M('admin_level')->where(array('level_id'=>array('in', $ids)))->delete() ? success() : failed();
        }
    }

}