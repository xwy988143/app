<?php
namespace Admin\Behaviors;

class ClearLogBehavior extends \Think\Behavior
{
    public function run(&$param)
    {
        //每日清理15天前日志
        $today = F('today_clear_log');
        $nowTime = date('Ymd', TIME);
        if ($today != $nowTime) {
            $time = strtotime('-15 day', TIME);
            delFileUnderDir(RUNTIME_PATH . 'Logs/', $time);
            F('today_clear_log', $nowTime);
        }
    }
}