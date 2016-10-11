<style>
    .box tr > th:first-child{width:39px;}
    .box tr > th:first-child,.box tr > td:first-child{text-align:center}
    tbody .btn-group>.btn{width:35px;}
    .box table.dataTable thead > tr > th:first-child{padding-left:0 !important;padding-right:0 !important}
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
                <div class="box-header">
                    <h3 class="box-title">员工列表</h3>
                </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>姓名</td>
                            <td>职务</td>
                            <td>性别</td>
                            <td>绩效</td>
                            <td>工资</td>
                            <td>收入</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <volist name="data" id="vo">
                        <tr>
                            <td>{$vo.name}</td>
                            <td>{$vo.type}</td>
                            <td>{$vo.sex}</td>
                            <td>{$vo.profit}</td>   
                            <td>{$vo.salary}</td>   
                            <td>{$vo.total_money}</td>
                            <td></td>
                        </tr>
                        </volist>
                    </tbody>
                </table>
                <a href="javascript:;" onclick="formSubmit.dels(this)" d-url="{:U('Stuff/Delete')}" class="btn btn-default btn-xs" />批量删除</a>
            </div>
        </div>
    </div>
</div>