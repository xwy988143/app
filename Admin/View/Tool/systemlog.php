<style>
    .box tr > th:first-child {
        width: 39px;
    }

    .box tr > th:first-child, .box tr > td:first-child {
        text-align: center
    }

    tbody .btn-group > .btn {
        width: 35px;
    }

    .box table.dataTable thead > tr > th:first-child {
        padding-left: 0 !important;
        padding-right: 0 !important
    }
    
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">系统日志</h3>
            </div>
            <div class="box-body">
                <table id="lists" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>文件名称</th>
                        <th>类型</th>
                        <th>时间</th>
                        <th>大小</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    <volist name="file_list" id="vo">
                        <tr sort="{$vo['filename']}">
                            <td><input class="ids" value="{$vo['fileurl']}" type="checkbox"></td>
                            <td>{$vo['filename']}</td>
                            <td>{$vo['filetype']}</td>
                            <td>{$vo['datetime']}</td>
                            <td>{$vo['filesize']}</td>
                            <td>
                                <div class="btn-group">
                                    <if condition="!$vo['is_dir']">
                                        <a href="javascript:;" onclick="formSubmit.del(this)" d-id="{$vo['fileurl']}" d-url="{:U('Admin/Tool/systemlog', array('act'=>'del'))}" class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i></a>
                                    </if>
                                </div>
                            </td>
                        </tr>
                    </volist>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="6" style="text-align: left;">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" d-url="{:U('Admin/Tool/systemlog', array('act'=>'del'))}"
                                        onclick="formSubmit.dels(this)">批量删除
                                </button>
                            </div>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<include file="Include:plugins_tablelist"/>
<script>
    $('#lists').DataTable({
        "bSort": false,
        columnDefs: [{
            orderable: false,
            targets: [0, 1, 5]
        }],
        "iDisplayLength": 10,
        "aLengthMenu": [10, 30, 100],
        "bStateSave": true,
        "bProcessing": true,
        "oLanguage": {
            "sProcessing": "正在加载...",
            "oPaginate": {"sFirst": "首页", "sPrevious": "上一页", "sNext": "下一页", "sLast": "尾页"},
            "sZeroRecords": "无数据",
            "sInfo": "显示 _START_ - _END_ 共 _TOTAL_ 条数据",
            "sLengthMenu": "显示 _MENU_ 条数据",
            "sSearch": "搜索"
        },
        "fnDrawCallback": function () {
            $('tbody input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        }
    });
</script>