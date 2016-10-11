<php>
     $array['title'] = '公告列表';//标题
    $array['thead'] = '标题,添加时间,操作';//表头信息
    $array['dataUrl'] = U('Admin/Publish/lists');//数据地址
    $array['editUrl'] = U('Admin/Publish/edit');//修改地址
    $array['delUrl'] = U('Admin/Publish/delete');//删除地址
    $array['readUrl'] = U('Admin/Publish/read');//阅读地址
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
            { "data": "title" },
            { "data": "addtime" },
            { "data": function(a){ 
            
            return '<div class="btn-group"><a href="{$array['readUrl']}&id='+a.id+'" class="btn btn-default btn-xs">阅读</a><a href="{$array['editUrl']}&id='+a.id+'" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a><a href="javascript:;" onclick="formSubmit.del(this)" d-id="'+ a.id+'" d-url="{$array['delUrl']}" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a></div>';            } }
           
        ]
        datatable('#lists', "{$array['dataUrl']}", columns);
    })
</script>