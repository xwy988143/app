<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{$title}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <include file="Include:public" />
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <include file="Include:header,Include:left" />
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <a href="javascript:history.go(-1);" class="btn btn-custom1 btn-xs" style="color:#607D8B;"><i class="icon iconfont">&#xf0033;</i></a>
                    <a href="javascript:history.go(1);" class="btn btn-custom1 btn-xs" style="color:#607D8B;"><i class="icon iconfont">&#xe716;</i></a>
                    <a href="javascript:window.location.reload();" class="btn btn-custom1 btn-xs" style="color:#607D8B;"><i class="icon iconfont">&#xe60a;</i></a>
                    <span style="display:inline-block;width:1px;background:#eee;position: relative;top: 2px">&nbsp;</span>
                    <a href="{:U('Admin/Index/index')}" class="btn btn-custom1 btn-xs" style="color:#607D8B;"><i class="fa fa-home"> 首页</i></a>
                    <if condition="ID eq '1'">
                        <a href="{:U('Admin/Tool/systemlog')}" class="btn btn-custom1 btn-xs" style="color:#607D8B;"><i class="fa fa-file-text-o"> 日志</i></a>
                        <a href="javascript:cacheFileDel();" class="btn btn-custom1 btn-xs" style="color:#607D8B;"><i class="fa fa-trash-o"> 缓存</i></a>
                    </if>
                </h1>
<!--                <ol class="breadcrumb">-->
<!--                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
<!--                    <li><a href="#">Tables</a></li>-->
<!--                    <li class="active">Data tables</li>-->
<!--                </ol>-->
            </section>
            <section class="content">
                {__CONTENT__}
            </section>
        </div>
        <include file="Include:footer" />
    </div>

    <script>
        var cacheFileDel = function(){
            $.getJSON("{:U('Admin/Tool/cacheFileDel')}", null, function(res){
                msg.autoMessage(res.info);
            });
        }
    </script>
</body>
</html>