<?php

return array(
    //Runtime页面加载时间行为
    'view_filter' => array('Admin\\Behaviors\\RuntimeBehavior'),
    //ClearLog清除15天前日志文件
    'app_end' => array('Admin\\Behaviors\\ClearLogBehavior'),
);