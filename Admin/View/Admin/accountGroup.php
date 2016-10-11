<php>
    $array['title'] = '账号分组';//标题
    $array['thead'] = '#,角色,操作';//表头信息
    $array['dataUrl'] = U('Admin/Admin/accountGroup');//数据地址
    $array['addUrl'] = U('Admin/Admin/addGroup');//添加地址
    $array['editUrl'] = U('Admin/Admin/editGroup');//修改地址
    $array['delUrl'] = U('Admin/Admin/delGroup');//删除地址
    $array['buttons'] = 'add,del';
</php>
{:W('table/index', array($array))}
<include file="Include:plugins_tablelist" />
<script>
    $(function(){
        var columns = [
            { "data": function(a){
                return '<input class="ids" value="'+a.id+'" type="checkbox">';
            } },
            { "data": "id" },
            { "data": "name" },
            { "data": function(a){
                return '<div class="btn-group"><a href="{$array['editUrl']}&id='+a.id+'" class="btn btn-default btn-xs"><i class="fa fa-cog"></i></a><a href="javascript:;" onclick="formSubmit.del(this)" d-id="'+ a.id+'" d-url="{$array['delUrl']}" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a></div>';
            } }
        ]
        datatable('#lists', "{$array['dataUrl']}", columns);
    })

    tableButton.add = function(){
        var content = '<form name="accountGroupForm" class="form-horizontal well-lg">\
                           <div class="form-group">\
                                <label class="col-sm-3 control-label">角色</label>\
                                <div class="col-sm-9">\
                                    <input type="text" name="name" class="form-control" />\
                                </div>\
                           </div>\
                        </form>';
        dialog({
            width: 300,
            title: '创建角色',
            content: content,
            ok: function(){
                formSubmit.ajax({
                    url:"{$array['addUrl']}",
                    type:"post",
                    data:$('form[name=accountGroupForm]').serialize()
                });
            },
            cancel: function(){return;},
            okValue: '提交',
            cancelValue: '取消',
            zIndex: 99999
        }).showModal();
    }
</script>