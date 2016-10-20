<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    
    public function _initialize(){
        $GLOBALS['systemconfig'] = F('systemconfig');
    }
    
    //登陆
    public function index()
    {
        if (IS_POST) {
            if(!isset($_SESSION['login_error_number'])) $_SESSION['login_error_number'] = 0;
            if($_SESSION['login_error_number'] >= 3 && TIME<strtotime('+1 minute', $_SESSION['login_error_lock_time'])){
                failed(strtotime('+1 minute', $_SESSION['login_error_lock_time'])-TIME.'秒后再试');
            }

            $username = I('post.username') OR failed('请输入账号');
            $password = I('post.password') OR failed('请输入密码');
            
            //验证码
            // if($GLOBALS['systemconfig']['verify']){
            //     $code = I('post.verify') OR failed('请输入验证码');
            //     $verify = new \Think\Verify();
            //     if ($verify->check($code) === false) failed('验证码错误');
            // }

            $password = password_md5($password);

            $where['username'] = $username;
            $where['password'] = $password;
            if ($result = M('admin')->where($where)->find()) {
                $_SESSION['has_login'] = true;
                $_SESSION['admin_id'] = $result['id'];
                $_SESSION['admin'] = $result;
                success('登陆成功', U('Admin/Index/index'));
            } else {
                $_SESSION['login_error_number'] = $_SESSION['login_error_number']+1;
                $_SESSION['login_error_lock_time'] = TIME;
                if($_SESSION['login_error_number'] >= 3 && TIME<strtotime('+1 minute', $_SESSION['login_error_lock_time'])){
                    failed(strtotime('+1 minute', $_SESSION['login_error_lock_time'])-TIME.'秒后再试');
                }
                failed('账号或密码错误');
            }
        } else {
            $this->display();
        }
    }

    //修改密码
    public function password(){
        if(IS_POST){
            $old_password = I('post.old_password');
            $new_password = I('post.new_password');

            $data['password'] = password_md5($new_password);
            D('Admin')->where(array('username'=>$_SESSION['admin']['username'],'password'=>password_md5($old_password)))->save($data) ? success('success', U('loginout')) : failed();
        }
    }

    //退出登陆
    public function loginout()
    {
        session_unset();
        session_destroy();
        redirect(U('index'));
    }

    //验证码
    public function verify()
    {
        $config['expire'] = 300;
        $config['length'] = 3;
        $config['codeSet'] = 'abcdefg';
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    //找回密码
    public function passwordForgot(){
        if(IS_POST){
            $tel = I('post.tel', 0) OR failed('请输入手机号');
            $code = I('post.code', 0) OR failed('请输入短信验证码');
            $password = I('post.password') OR failed('请输入新密码');
            $password2 = I('post.password2');

            if($tel != session('tel') || $code != session('code')) failed('验证码错误');
            if($password != $password2) failed('两次密码不一致');

            $data['password'] = password_md5($password);
            D('Admin')->where(array('tel'=>$tel))->save($data) ? success('success', U('loginout')) : failed();
        }else{
            $this->display();
        }
    }
    
}