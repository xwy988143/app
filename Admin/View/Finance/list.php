<php>
    $array['title'] = '科室列表';//标题
    $array['thead'] = '科室账号,操作';//表头信息
    $array['dataUrl'] = U('Admin/Finance/list');//数据地址
    $array['readUrl'] = U('Admin/Finance/read');//详情地址
    $array['editUrl'] = U('Admin/Finance/edit');//修改地址
    $array['delUrl'] = U('Admin/Finance/del');//删除地址
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
            { "data": "status_lock" },
            { "data": function(a){
                if(a.id == '1'){
                    return '<div class="btn-group"><a href="{$array['editUrl']}&id='+a.id+'" class="btn btn-default btn-xs disabled"><i class="fa fa-edit"></i></a><a href="javascript:;" onclick="formSubmit.del(this)" d-id="'+ a.id+'" d-url="{$array['delUrl']}" class="btn btn-default btn-xs disabled"><i class="fa fa-trash-o"></i></a></div>';
                }else{
            return '<div class="btn-group"><a href="{$array['readUrl']}&id='+a.id+'" class="btn btn-default btn-xs">详情</a><a href="{$array['editUrl']}&id='+a.id+'" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a><a href="javascript:;" onclick="formSubmit.del(this)" d-id="'+ a.id+'" d-url="{$array['delUrl']}" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a></div>';
                }
            } }
        ]
        datatable('#lists', "{$array['dataUrl']}", columns);
    })
</script>