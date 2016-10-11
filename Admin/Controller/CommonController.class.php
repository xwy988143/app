<?php
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller
{
    protected function _initialize()
    {
        layout('Layout/public');
        $GLOBALS['systemconfig'] = F('systemconfig');
        $this->has_login()->menu()->rule();
    }

    protected function has_login()
    {
        if ($_SESSION['has_login'] === true) {
            define('ID', $_SESSION['admin_id']);
            return $this;
        } else {
            $this->redirect('Admin/Login/index');
        }
    }

    protected function menu()
    {
        $menu = C('adminmenu');

        if ($_SESSION['admin']['id'] != '1'){
            $groupRule = $this->groupRule();
            foreach($menu as $key=>$value){
                foreach($value['child'] as $k=>$v){
                    $hrefArray = explode('/', strtolower($v['href']));
                    if(!in_array($hrefArray[1].'-'.$hrefArray[2], $groupRule)) unset($menu[$key]['child'][$k]);
                }
                if(count($menu[$key]['child']) === 0) unset($menu[$key]);
            }
        }
        
        $this->assign('adminmenu', $menu);
        return $this;
    }

    protected function rule()
    {
        if ($_SESSION['admin']['id'] == '1') return $this;
        $current = strtolower(CONTROLLER_NAME . '-' . ACTION_NAME);
        if (in_array($current, $this->groupRule())) {
            return $this;
        } else {
            IS_AJAX ? failed('你没有权限!') : $this->error('你没有权限!');
        }
    }
    
    protected function groupRule(){
        $group = M('admin_group')->find($_SESSION['admin']['group_id']);
        $group['rule'] = strtolower($group['rule']);
        $groupRule = explode(',', $group['rule']);
        return $groupRule;
    }

    protected function _empty()
    {
        echo 'action error!';
        exit;
    }
}