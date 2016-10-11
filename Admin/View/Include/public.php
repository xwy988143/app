<link rel="icon" href="http://{$_SERVER['HTTP_HOST']}/static/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://{$_SERVER['HTTP_HOST']}/static/images/favicon.ico" type="image/x-icon" />
<load href="__PUBLIC__/bootstrap/css/bootstrap.min.css"/>
<load href="__PUBLIC__/plugins/font-awesome/css/font-awesome.min.css"/>
<load href="__PUBLIC__/plugins/iconfont/iconfont.css"/>
<load href="__PUBLIC__/dist/css/AdminLTE.min.css"/>
<load href="__PUBLIC__/dist/css/skins/_all-skins.min.css"/>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<load href="__PUBLIC__/plugins/jQuery/jQuery-2.1.4.min.js"/>
<load href="__PUBLIC__/bootstrap/js/bootstrap.min.js"/>
<load href="__PUBLIC__/dist/js/app.min.js"/>

<load href="__PUBLIC__/plugins/artDialog/css/dialog1.css"/>
<load href="__PUBLIC__/plugins/artDialog/dist/dialog-plus.js"/>

<load href="__PUBLIC__/plugins/iCheck/all.css"/>
<load href="__PUBLIC__/plugins/iCheck/icheck.min.js"/>

<load href="__PUBLIC__/plugins/switch/lc_switch.css"/>
<load href="__PUBLIC__/plugins/switch/lc_switch.min.js"/>

<load href="__PUBLIC__/plugins/webuploader/webuploader.css"/>
<load href="__PUBLIC__/plugins/webuploader/webuploader.custom.js"/>

<script src="__PUBLIC__/plugins/input-mask/jquery.inputmask.js"></script>
<script src="__PUBLIC__/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="__PUBLIC__/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<load href="__PUBLIC__/plugins/daterangepicker/daterangepicker-bs3.css"/>
<load href="__PUBLIC__/plugins/daterangepicker/moment.js"/>
<load href="__PUBLIC__/plugins/daterangepicker/daterangepicker.js"/>

<load href="__PUBLIC__/plugins/jQueryUI/jquery-ui.min.js" />

<load href="__PUBLIC__/common.js"/>

<script>
    var menuMainSidebar = {
        set: function () {
            if ($("body").hasClass("sidebar-collapse")) {
                window.localStorage.setItem("menuMainSidebar", "");
            } else {
                window.localStorage.setItem("menuMainSidebar", "sidebar-collapse");
            }
        },
        get: function () {
            var c = window.localStorage.getItem("menuMainSidebar");
            if (c) {
                $("body").addClass(c);
            }
        }
    }

    $(function () {
        if ($("input").hasClass("switch")) {
            $("input.switch").lc_switch();
        } else {
            $('input[type="checkbox"],input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        }

        $("thead .iCheck-helper").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
                $("input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                $("input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        menuMainSidebar.get();

//        $(document).scroll(function () {
//            var scrollTop = $(document).scrollTop();
//            if (scrollTop > 50) {
//                $(".content-header").addClass('content-header-fixed');
//            } else {
//                $(".content-header").removeClass('content-header-fixed');
//            }
//        });
    });
</script>

<style>
    .box {
        border-top: 0;
        border-radius: 0;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    }

    .box-header, .box-header button {
        background-color: #fff;
        color: #666 !important;
        border-bottom: 3px solid #CDDC39;
    }

    body, p, h3 {
        font-family: Helvetica, 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', Arial, sans-serif !important;
    }

    .box-footer > a {
        font-size: 0.9em;
    }

    .bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
        background-color: #FF9800 !important;
    }

    .alert {
        border: 0;
        margin-bottom: 0;
    }

    .remark {
        color: #E91E63 !important;
        font-size: 0.9em !important;
    }

    .content-header {
        padding: 10px;
        border-bottom: 1px solid #ebebeb;
        background: #fff !important;
    }

    .content-header-fixed {
        position: fixed;
        top: 0;
        left: 230px;
        right: 0;
        z-index: 99999;
        box-shadow: 0 0 5px #888;
        border-bottom:0;
    }

    .sortable-placeholder {
        background-color: #DCE775;
    }
    
    input:focus,select:focus,textarea:focus{
        border-color: #3c8dbc !important;
    }

    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
        background-color: #CDDC39;
        border-color: #CDDC39;
    }

    .btn-custom1{
        background-color: #fff;
        color: #666 !important;
        border-color: #666;
        border-radius: 2px !important;
    }
    
    .btn{
        outline: none;
    }

    .form-horizontal .form-group{
        margin-left:0;
        margin-right:0;
    }
</style>