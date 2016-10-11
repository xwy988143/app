<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="__PUBLIC__/images/admin-default-headimg.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{$_SESSION['admin']['username']}</p>
                <a href="javascript:;"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
            <div class="pull-right info" style="position:relative;left:0;">
                <a href="javascript:;" onclick="updatePassword()" style="font-size: 9px;border: 1px solid #fff;border-radius: 3px;padding: 1px;color: #fff;">修改密码</a>
            </div>
        </div>
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search...">-->
<!--                <span class="input-group-btn">-->
<!--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <ul class="sidebar-menu">
            <volist name="adminmenu" id="vo">
                <li class="treeview {$_GET['menupid']==$vo['id']?'active':''}">
                    <a href="{$vo['href']}" target="{$vo['target']|default='_self'}">
                        <i class="fa {$vo['icon']|default='fa-bug'}"></i> <span>{$vo['title']}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <if condition="$vo['child']">
                        <ul class="treeview-menu">
                            <volist name="vo['child']" id="v">
                                <li class="{$_GET['menuid']==$v['id']?'active':''}"><a href="{:U($v['href'], array('menuid'=>$v['id'],'menupid'=>$vo['id']))}" target="{$v['target']|default='_self'}"><i class="fa fa-angle-double-right"></i> {$v['title']}</a></li>
                            </volist>
                        </ul>
                    </if>
                </li>
            </volist>
        </ul>
    </section>
</aside>

<script>
    function updatePassword(){
        dialog({
            skin: 'min-dialog tips',
            width: 150,
            zIndex: 99999,
            title: '登录密码修改',
            content: '<form name="adminUpdatePassword"><div class="form-group"><input type="text" name="old_password" class="form-control" placeholder="请输入旧密码"></div><div class="form-group"><input type="text" name="new_password" class="form-control" placeholder="请输入新密码"></div><div class="form-group"><input type="text" name="new_password2" class="form-control" placeholder="请确认新密码"></div></form>',
            ok: function(){
                var old_password = $("form[name=adminUpdatePassword] input[name=old_password]").val();
                var new_password = $("form[name=adminUpdatePassword] input[name=new_password]").val();
                var new_password2 = $("form[name=adminUpdatePassword] input[name=new_password2]").val();
                if(new_password != new_password2){
                    msg.autoMessage('两次密码输入不一致');
                    return false;
                }
                $.ajax({
                    url: "{:U('Admin/Login/password')}",
                    type: "post",
                    dataType: "json",
                    data: {old_password:old_password,new_password:new_password},
                    success: function(rs){
                        if(isset(rs.status)){
                            if(rs.status == "success"){
                                msg.autoMessage(rs.info, function(){
                                    window.location.href = rs.url;
                                });
                            }else{
                                msg.autoMessage(rs.info);
                                return false;
                            }
                        }else{
                            msg.autoMessage('数据异常');
                        }
                    },
                    error: function(){
                        msg.autoMessage('网络异常');
                    },
                    beforeSend: function(){
                        loading.show(1);
                    },
                    complete: function(){
                        loading.hide();
                    }
                });
            },
            okValue: "修改",
        }).showModal();
    }
</script>