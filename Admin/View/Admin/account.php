<php>
    $array['title'] = '账号列表';//标题
    $array['thead'] = '账号,角色,状态,操作';//表头信息
    $array['dataUrl'] = U('Admin/Admin/account');//数据地址
    $array['editUrl'] = U('Admin/Admin/editAccount');//修改地址
    $array['delUrl'] = U('Admin/Admin/delAccount');//删除地址
    $array['buttons'] = 'del';
</php>
{:W('table/index', array($array))}
<include file="Include:plugins_tablelist" />
<script>
    $(function(){
        var columns = [
            { "data": function(a){
                return '<input class="ids" value="'+a.id+'" type="checkbox">';
            } },
            { "data": "username" },

            { "data": "admin_group.name" },
           // { "data": "admin_level.level_remark" },

            { "data": "status_lock" },
            { "data": function(a){
                if(a.id == '1'){
                    return '<div class="btn-group"><a href="{$array['editUrl']}&id='+a.id+'" class="btn btn-default btn-xs disabled"><i class="fa fa-edit"></i></a><a href="javascript:;" onclick="formSubmit.del(this)" d-id="'+ a.id+'" d-url="{$array['delUrl']}" class="btn btn-default btn-xs disabled"><i class="fa fa-trash-o"></i></a></div>';
                }else{
                    return '<div class="btn-group"><a href="{$array['editUrl']}&id='+a.id+'" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a><a href="javascript:;" onclick="formSubmit.del(this)" d-id="'+ a.id+'" d-url="{$array['delUrl']}" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a></div>';
                }
            } }
        ]
        datatable('#lists', "{$array['dataUrl']}", columns);
    })
</script>