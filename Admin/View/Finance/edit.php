<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">编辑财务信息</h3>
            </div>
            <div class="box-body">
        <form action="{:U('Finance/edit')}" class="form-horizontal well-lg">
            <div class="form-group">
                <label class="col-sm-2 control-label">员工姓名</label>
                <div class="col-xs-5">
                    <label class="form-control">{$data['name']}</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">员工职称</label>
                <div class="col-xs-5">
                    <label class="form-control">{$data['type']}</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">收入</label>
                <div class="col-xs-5">
                <input class="form-control" type="text" name="salary" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">绩效</label>
                <div class="col-xs-5">
                <input class="form-control" type="text" name="profit" required/>
                </div>
            </div>            
                    <input type="hidden" name="id" value="{$data['id']}">
        </form>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-default">提交</button>
            </div>
        </div>
    </div>
</div>
<script>
    formSubmit.submit($('form'), $('button'));
</script>