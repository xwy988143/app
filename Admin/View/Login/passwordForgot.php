<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>密码重置</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <include file="Include:public"/>
    <style>
        .password-forgot{
            position: relative;
            top: 10px;
            left: 290px;
        }
    </style>
</head>

<body class="hold-transition login-page">
<include file="Include:loading" />
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:;"><b>密码重置</b></a>
    </div>
    <div class="login-box-body">
        <form class="login">
            <div class="form-group input-group" style="width:100%">
                <input type="text" name="tel" class="form-control" style="border-right:0;" placeholder="手机号">
                <span onclick="sendSmsCode(this)" class="input-group-addon" style="padding:0;border:0;width:100px;background:#3C8DBC;color:#fff;cursor:pointer;">发送验证码</span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="code" class="form-control" placeholder="验证码">
                <span class="glyphicon glyphicon-subtitles form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="新密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password2" class="form-control" placeholder="确认密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <button type="button" class="btn btn-primary btn-block btn-flat">提交</button>
        </form>
        <a href="{:U('index')}" class="password-forgot">登录</a>
    </div>
</div>
<script>
    var tel,time,timer;
    formSubmit.submit($(".login"), $('button'));

    $("body").keydown(function () {
        if (event.keyCode == "13") {
            $('button').click();
        }
    });

    function sendSmsCode(t){
        if(time > 0){
            return;
        }
        tel = $("input[name=tel]").val();
        if(tel == ''){
            msg.autoMessage('请输入手机号');
            return;
        }

        $.ajax({
            url: "{:U('Admin/Api/sendSmsCode')}",
            type: "post",
            dataType: "json",
            data: {tel:tel},
            success: function(res){
                time = 60;
                timer = setInterval(function(){
                    time--;
                    if(time <= 0){
                        clearInterval(timer);
                        $(t).text('发送验证码');
                    }else{
                        $(t).text(time+'s');
                    }
                }, 1000);
                console.log(res);
            },
            error: function(error){
                msg.autoMessage(error.responseJSON.info);
            }
        });
    }
</script>
</body>

</html>