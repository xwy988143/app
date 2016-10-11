<footer class="main-footer">
    <div class="pull-right hidden-xs">{__runtime__}</div>
    <strong>Copyright &copy; 2015 <a href="http://www.okd100.com" target="_blank">欧科达科技</a>.</strong> All rights reserved.
</footer>

<style>
    .socket-message{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 230px;
        background: #8BC34A;
        color: #fff;
        padding: 10px;
        padding-right:30px;
        -webkit-box-shadow:inset 0 0 10px #CDDC39;
        -moz-box-shadow:inset 0 0 10px #CDDC39;
        box-shadow:inset 0 0 10px #CDDC39;
        word-wrap: break-word;
        white-space: -moz-pre-wrap;
        z-index:999;
    }
    .socket-message p{
        text-align: justify;
    }
    .socket-message .close{
        position: absolute;
        right: 10px;
        top: 5px;
    }
</style>
<!--websocket-->
<script src='//cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
<script>
    $(document).ready(function () {
//        var user = "{$_SESSION['admin']['username']}";
//        // 连接服务端
//        var socket = io('http://112.124.116.14:2120');
//        // 连接后登录
//        socket.on('connect', function(){
//            socket.emit('login', user);
//        });
//        // 后端推送来消息时
//        socket.on('new_msg', function(msg){
//            if(msg != null){
//                msg = msg.split("|");
//                if(msg[0] == user || msg[0] == 'all'){
//                    var myDate = new Date();
//                    var nowtime = myDate.getHours()+':'+myDate.getMinutes()+':'+myDate.getSeconds();
//                    var message = '<div class="socket-message"><span class="close" onclick="socketMessageClose(this)"><i class="fa fa-close"></i></span><p><i class="fa fa-clock-o"></i> '+nowtime+'<br />'+msg[1]+'</p></div>';
//                    $("body").append(message);
//                    socketMessageAudio();
//                }
//            }
//        });
    });
    
    function socketMessageClose(t){
        $(t).parents(".socket-message").animate({height:0,opacity:0}, 500, function(){
            $(t).parents(".socket-message").remove();
        });
    }
    
    var audioPlayStatus = false;
    function socketMessageAudio(){
        if(audioPlayStatus == true){
            return false;
        }
        audioPlayStatus = true;
        var audio = document.createElement('audio');
        audio.controls = true;
        audio.src = '__PUBLIC__/message.mp3';
        audio.play();
        audio.onended = function(){
            audioPlayStatus = false;
        }
    }
</script>