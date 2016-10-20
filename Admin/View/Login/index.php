<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登录</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <include file="Include:public"/>
    <style>
        .password-forgot{
            position: relative;
            top: 10px;
            left: 255px;
        }
    </style>
</head>

<body class="hold-transition login-page">
<include file="Include:loading" />
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:;"><b>登录</b></a>
    </div>
    <div class="login-box-body">
        <form class="login">
            <div class="form-group has-feedback">
                <input type="text" name="username" value="{$username}" class="form-control" placeholder="账号">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" value="{$password}" class="form-control" placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
<!--             <if condition="$GLOBALS['systemconfig']['verify']">
                <div class="form-group input-group" style="width:100%">
                    <input type="text" name="verify" class="form-control" placeholder="验证码" style="border-right:0">
                    <span class="input-group-addon" style="padding:0;border:0;width:100px;"><img src="{:U('Admin/Login/verify')}" style="width:100%;height:34px;border:1px solid #d2d6de;" onclick="this.src='{:U('Admin/Login/verify')}'" id="code" /></span>
                </div>
            </if> -->
            <button type="button" class="btn btn-primary btn-block btn-flat">登陆</button>
        </form>
        <a href="{:U('passwordForgot')}" class="password-forgot">忘记密码?</a>
    </div>
</div>
<script>
    formSubmit.submit($(".login"), $('button'), function(r){
        if(typeof(r.status) && r.status=='success') window.location.href = r.url;
        $("#code").attr('src', "{:U('Admin/Login/verify')}");
    });

    $("body").keydown(function () {
        if (event.keyCode == "13") {
            $('button').click();
        }
    });
</script>
</body>

</html>