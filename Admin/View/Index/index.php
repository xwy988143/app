<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">系统信息</h3>
            </div>
            <div class="box-body">
                <div style="background-color:#fff;padding:10px;">
                    <p><span>操作系统</span>{:PHP_OS}</p>
                    <p><span>运行环境</span>{$_SERVER["SERVER_SOFTWARE"]}</p>
                    <p><span>PHP运行方式</span>{:php_sapi_name()}</p>
                    <p><span>MYSQL版本</span></p>
                    <p><span>产品名称</span>后台管理系统 v1.0</p>
                    <p><span>用户类型</span>授权用户</p>
                    <p><span>剩余空间</span>{:round((@disk_free_space(".") / (1024 * 1024)))}M</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .box-body span{color:#666;display:inline-block;width:100px;text-align: right;margin-right:30px;}
</style>