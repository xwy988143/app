<?php
return array(
    'adminmenu' => array(
        array('id'=>'1','title'=>'账号','icon'=>'fa-user-secret','href'=>'#','child'=>array(
            array('id'=>'1','title'=>'创建账号','href'=>'Admin/Admin/addAccount'),
            array('id'=>'2','title'=>'账号列表','href'=>'Admin/Admin/account'),

            array('id'=>'4','title'=>'角色','href'=>'Admin/Admin/accountGroup'),
        )),
        array('id'=>'2','title'=>'系统工具','icon'=>'fa-wrench','href'=>'#','child'=>array(
            array('id'=>'1','title'=>'系统配置','href'=>'Admin/Tool/systemconfig'),
            array('id'=>'2','title'=>'系统日志','href'=>'Admin/Tool/systemlog'),
            array('id'=>'3','title'=>'附件管理','href'=>'Admin/Tool/uploadfile'),
        )),

        array('id'=>'3','title'=>'员工信息','icon'=>'fa-wrench','href'=>'#','child'=>array(
            array('id'=>'1','title'=>'输入信息','href'=>'Admin/Stuff/addStuff'),
            array('id'=>'2','title'=>'员工列表','href'=>'Admin/Stuff/listStuff'),
        )),
        array('id'=>'4','title'=>'财务管理','icon'=>'fa-wrench','href'=>'#','child'=>array(
            array('id'=>'1','title'=>'编辑信息','href'=>'Admin/Finance/add'),
            array('id'=>'1','title'=>'显示信息','href'=>'Admin/Finance/list'),
        )),
        array('id'=>'5','title'=>'信息管理','icon'=>'fa-lightbulb-o','href'=>'#','child'=>array(
                array('id'=>'1','title'=>'公告列表','href'=>'Admin/Publish/lists'),
                array('id'=>'5','title'=>'公告发布','href'=>'Admin/Publish/add'),
                array('id'=>'2','title'=>'通知','href'=>'Admin/Publish/notice'),
                array('id'=>'6','title'=>'发布通知','href'=>'Admin/Publish/noticeAdd'),
                array('id'=>'3','title'=>'问题反馈','href'=>'Admin/Feedback/feedback'),
                array('id'=>'4','title'=>'我的反馈','href'=>'Admin/Feedback/feedbackMy'),
        )),
    )
);