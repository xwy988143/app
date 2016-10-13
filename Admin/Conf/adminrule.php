<?php
return array(
    'adminrule' => array(
        array('name'=>'后台账号','controller'=>'admin','data'=>array(
            array('name'=>'账号列表','action'=>'account'),
            array('name'=>'添加账号','action'=>'addAccount'),
            array('name'=>'修改账号','action'=>'editAccount'),
            array('name'=>'删除账号','action'=>'delAccount'),
            array('name'=>'分组','action'=>'accountGroup'),
            array('name'=>'添加分组','action'=>'addGroup'),
            array('name'=>'修改分组','action'=>'editGroup'),
            array('name'=>'删除分组','action'=>'delGroup'),

        )),
        array('name'=>'问题反馈','controller'=>'feedback','data'=>array(
            array('name'=>'分类配置','action'=>'feedbackClassConfig'),
            array('name'=>'处理反馈','action'=>'feedback'),
            array('name'=>'历史反馈','action'=>'feedbackHistory'),
            array('name'=>'删除反馈','action'=>'feedbackDel'),
            array('name'=>'我的反馈','action'=>'feedbackMy'),
            array('name'=>'提交反馈','action'=>'feedbackAdd'),
        )),
        array('name'=>'员工数据','controller'=>'Stuff','data'=>array(
            array('name'=>'编辑员工信息','action'=>'addStuff'),
            array('name'=>'显示员工信息','action'=>'listStuff'),
            array('name'=>'删除员工信息','action'=>'deleteStuff'),
        )),
        array('name'=>'帮助中心','controller'=>'help','data'=>array(
            array('name'=>'分类配置','action'=>'helpClassConfig'),
            array('name'=>'发布文档','action'=>'helpAdd'),
            array('name'=>'更新文档','action'=>'helpEdit'),
            array('name'=>'删除文档','action'=>'helpDel'),
            array('name'=>'文档列表','action'=>'help'),
            array('name'=>'文档阅读','action'=>'helpRead'),
            array('name'=>'发布文化','action'=>'culAdd'),
            array('name'=>'企业文化','action'=>'culRead'),
            array('name'=>'企业文化','action'=>'culEdit'),
            array('name'=>'企业规章','action'=>'ruleRead'),
            array('name'=>'发布规章','action'=>'ruleAdd'),
        )),
        array('name'=>'信息发布','controller'=>'Publish','data'=>array(
            array('name'=>'公告列表','action'=>'lists'),
            array('name'=>'公告发布','action'=>'add'),
            array('name'=>'公告修改','action'=>'edit'),
            array('name'=>'公告删除','action'=>'delete'),
            array('name'=>'公告阅读','action'=>'read'),
            array('name'=>'通知','action'=>'notice'),
            array('name'=>'通知阅读','action'=>'readNotice'),
            array('name'=>'通知删除','action'=>'delNotice'),
        )),
        array('name'=>'财务功能','controller'=>'Finance','data'=>array(
            array('name'=>'编辑员工信息','action'=>'add'),
            array('name'=>'显示员工信息','action'=>'list'),
            array('name'=>'员工详情','action'=>'read'),
            array('name'=>'修改详情','action'=>'edit'),
        )),
        array('name'=>'税务统计','controller'=>'Tax','data'=>array(
            array('name'=>'税务信息','action'=>'index'),
            array('name'=>'科室个税信息','action'=>'list'),
        )),
    )
);