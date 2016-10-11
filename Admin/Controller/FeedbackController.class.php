<?php
namespace Admin\Controller;

//问题反馈

class FeedbackController extends CommonController
{
    //反馈分类配置
    public function feedbackClassConfig(){
        if(IS_POST){
            $data = I('post.feedback_class_names');
            $data = textarea($data);
            F('feedback_class_names', $data);
            success();
        }
    }

    //处理反馈
    public function feedback()
    {
        if (IS_POST) {
            $id = I('post.id', 0) OR failed('缺少参数id');
            $reply = I('post.reply', '') OR failed('请输入回复内容');

            $update = array(
                'status' => 1,
                'reply' => $reply,
                'reply_time' => TIME
            );
            M('feedback')->where("`id`=" . $id)->save($update) ? success() : failed();
        } else {
            $result = M('feedback f')
                ->join('__ADMIN__ a ON a.id=f.aid')
                ->field('f.*,a.username,a.headimg')
                ->where('f.`status`=0')
                ->order('f.id desc')
                ->select();
            $this->assign('data', $result);
            $this->assign('names', str_replace(',', "\n", F('feedback_class_names')));
            $this->display();
        }
    }

    //反馈历史
    public function feedbackHistory(){
        $aid = I('get.aid', 0) OR failed('缺少参数aid');
        $result = M('feedback f')
            ->join('__ADMIN__ a ON a.id=f.aid')
            ->field('f.*,a.username,a.headimg')
            ->where('f.`aid`='.$aid.' and f.`status`=1')
            ->order('add_time desc,id desc')
            ->select();
        $this->assign('data', $result);
        $this->display();
    }

    //我的反馈
    public function feedbackMy(){
        $result = M('feedback f')
            ->join('__ADMIN__ a ON a.id=f.aid')
            ->field('f.*,a.username,a.headimg')
            ->where('f.`aid`='.ID)
            ->order('add_time desc')
            ->select();
        $this->assign('data', $result);

        $names = F('feedback_class_names');
        foreach(explode(',', $names) as $value){
            $feedback_class_names[]['name'] = $value;
        }
        $this->assign('feedback_class_names', $feedback_class_names);

        $this->display();
    }

    //提交反馈
    public function feedbackAdd(){
        if(IS_POST){
            $insert['aid'] = ID;
            $insert['title'] = I('post.title') OR failed('请选择反馈类型');
            $insert['content'] = I('post.content') OR failed('请填写反馈内容');
            $insert['add_time'] = TIME;
            M('feedback')->add($insert) ? success('提交成功') : failed('提交失败');
        }
    }

    //删除反馈
    public function feedbackDel(){
        if(IS_POST){
            $ids = I('post.ids', 0 ) OR failed('缺少参数id');
            M('feedback')->where(array('id'=>array('IN', $ids)))->delete() ? success() : failed();
        }
    }
}