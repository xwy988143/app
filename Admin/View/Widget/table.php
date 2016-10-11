<style>
    .box tr > th:first-child{width:39px;}
    .box tr > th:first-child,.box tr > td:first-child{text-align:center}
    tbody .btn-group>.btn{width:35px;}
    .box table.dataTable thead > tr > th:first-child{padding-left:0 !important;padding-right:0 !important}
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <if condition="$data['title']">
                <div class="box-header">
                    <h3 class="box-title">{$data['title']}</h3>
                </div>
            </if>
            <div class="box-body">
                <table id="lists" class="table table-hover">
                    <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <volist name="data['thead']" id="vo">
                            <th>{$vo}</th>
                        </volist>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="{:count($data['thead'])+1}" style="text-align: left;">
                            <div class="btn-group">
                                <if condition="in_array('add', explode(',', $data['buttons']))">
                                    <button type="button" class="btn btn-default btn-sm" onclick="tableButton.add()">添加</button>
                                </if>
                                <if condition="in_array('del', explode(',', $data['buttons']))">
                                    <button type="button" class="btn btn-default btn-sm" d-url="{$data['delUrl']}" onclick="formSubmit.dels(this)">批量删除</button>
                                </if>
                                <if condition="in_array('sort', explode(',', $data['buttons']))">
                                    <button type="button" class="btn btn-default btn-sm" d-url="{$data['sortUrl']}" onclick="formSubmit.sort(this)">排序</button>
                                </if>
                            </div>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>