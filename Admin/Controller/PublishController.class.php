<?php
namespace Admin\Controller;

class PublishController extends CommonController {

    public function PubClassConfig(){
        if(IS_POST){
            $data = I('post.pub_class_names');
            $data = textarea($data);
            F('pub_class_names', $data);
            success();
        }
    }

    public function NoticeClassConfig(){
        if(IS_POST){
            $data = I('post.notice_class_names');
            $data = textarea($data);
            F('notice_class_names', $data);
            success();
        }
    }

    //公告列表
    public function lists(){
        if(IS_AJAX){
            $page = get_page_val();
            $where = "title LIKE '%{$page['keyword']}%'";
            $count = M('announce')->where($where)->count();
            $rs = M('announce')->where($where)->limit($page['page'], $page['pageSize'])->order('addtime DESC')->select();

            foreach ($rs as $key => $value) {
                $rs[$key]['addtime'] = date('Y-m-d', $value['addtime']);
                $rs[$key]['status']=$value['status']=='0'?"未读":"已读";
            }
            $ann = set_page_val(array('count'=>$count,'lists'=>$rs));
            return_json($ann); 
        }else{
            $this->display();
        }
    }

    //发布公告
    public function add(){
        if (IS_POST) {
            $data['title']=I('post.title');
            $data['content']=I('post.content');

            $data['addtime']=TIME;
            $data['updatetime']=0;
            M('announce')->add($data) ? success('发布成功') : failed();
        }else{
            $this->display();
        }
    }

    //阅读公告
    public function read(){
        $id = I('get.id', 0) OR failed('缺少参数id');

        $result = M('announce')->where("id=$id")->find();
        $result['content'] = htmlspecialchars_decode($result['content']);

        $this->assign('data', $result);
        $this->display();
    }

    //修改公告
    public function edit(){
        if(IS_POST){
            $id = I('post.id');
            $map['id']=$id;
            //$update1['class_name'] = I('post.class_name');
            $update1['title'] = I('post.title');
            $update1['content'] = I('post.content');
            $update1['updatetime'] = TIME;
            M('announce')->where($map)->save($update1)? success('修改成功',U('lists')) : failed();
        }else{
            $id = I('get.id', 0) OR failed('缺少参数id');
            $result = M('announce')->where("id=$id")->find();
            $result['content'] = htmlspecialchars_decode($result['content']);
            $this->assign('data', $result);

            $names = F('pub_class_names');
            foreach(explode(',', $names) as $value){
                $help_class_names[]['name'] = $value;
            }
            $this->assign('pub_class_names', $pub_class_names);
            $this->assign('names', str_replace(',', "\n", $names));
            $this->display('edit');
        }
    }

    //删除公告
    public function delete(){
        $ids = I('post.ids', 0) OR failed('缺少参数id');
        M('announce')->where(array('id'=>array('in', $ids)))->delete() ? success() : failed();
    }
    
    //通知列表
    public function notice(){
        if(IS_AJAX){
            if(ID==1){
                $page = get_page_val();
                $where = "title LIKE '%{$page['keyword']}%'";
                $count = M('notice')->where($where)->count();
                $rs = M('notice')->where($where)->limit($page['page'], $page['pageSize'])->order('addtime DESC')->select();

                foreach ($rs as $key => $value) {
                    $rs[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
                    $rs[$key]['status']=$value['status']=='0'?"未读":"已读";
                }
                $result = set_page_val(array('count'=>$count,'lists'=>$rs));
                return_json($result);
            }else{
                $userid=ID;
                $page = get_page_val();
                $where = "title LIKE '%{$page['keyword']}%' AND aid=$userid";
                $count = M('notice')->where($where)->count();
                $rs = M('notice')->where($where)->limit($page['page'], $page['pageSize'])->order('addtime DESC')->select();

                foreach ($rs as $key => $value) {
                    $rs[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
                    $rs[$key]['status']=$value['status']=='0'?"未读":"已读";
                }
                $result = set_page_val(array('count'=>$count,'lists'=>$rs));
                return_json($result);
            }

        }else{
            $this->display();
        }
    }

    //添加通知
    public function noticeAdd(){
        if (IS_POST) {
            //$data['class_name'] = I('post.class_name');
            $data['title']=I('post.title');
            $data['content']=I('post.content');
            $data['aid']=I('aid');
            $data['status']=0;
            $data['addtime']=TIME;
            M('notice')->add($data) ? success('发布成功') : failed();
        }else{
            $user=M('admin');
            $data=$user->select();
            $this->assign('data',$data);
            $this->display();
        }        
    }

    //阅读通知
    public function readNotice(){
        if(ID==1){
            $id = I('get.id', 0) OR failed('缺少参数id');
            $result = M('notice')->where("id=$id")->find();
            $result['content'] = htmlspecialchars_decode($result['content']);
            $this->assign('data', $result);
            $this->display();
        }else{
            $userid=ID;
            $id = I('get.id', 0) OR failed('缺少参数id');
            $result = M('notice')->where("id=$id")->find();
            $result['content'] = htmlspecialchars_decode($result['content']);
            $data['status']=1;
            M('notice')->where("aid=$userid AND id=$id")->save($data);
            $this->assign('data', $result);
            $this->display();
        }        
    }

    //删除通知
    public function delNotice(){
      $ids = I('post.ids', 0) OR failed('缺少参数id');
      M('announce')->where(array('id'=>array('in', $ids)))->delete() ? success() : failed();  
    }

}