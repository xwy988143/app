<?php
namespace Admin\Behaviors;

class RuntimeBehavior extends \Think\Behavior
{
    public function run(&$param)
    {
        G('beginTime', $GLOBALS['_beginTime']);
        G('viewEndTime');
        $load_time = G('beginTime', 'viewEndTime').'s';
        $param = str_replace('{__runtime__}', $load_time, $param);
    }
}