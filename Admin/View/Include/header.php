<include file="Include:loading" />
<header class="main-header">
    <a href="{:U('Admin/Index/index')}" class="logo">
        <span class="logo-mini"><b>A</b>LT</span>
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" onclick="menuMainSidebar.set()">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown tasks-menu">
                    <a href="{:U('Admin/Login/loginout')}">
                        <i class="fa fa-sign-out"></i>
                        退出登陆
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>