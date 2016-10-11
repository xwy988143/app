<style>
    .box{margin-bottom:0;border-bottom:1px solid #fff;}
    .box:last-child{border-bottom:0}
    form .box{box-shadow:none}
    form .box .box-title{font-size:15px}
</style>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">更新分组信息</h3>
            </div>
            <div class="box-body">
                <form action="{:U('Admin/Admin/editGroup')}" class="form-horizontal well-lg">
                    <volist name="rule" id="vo">
                        <div class="box box-solid" aria-expanded="false">
                            <div class="box-header with-border" style="background-color:#fff">
                                <h3 class="box-title">{$vo['name']}</h3>
                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <ul class="nav">
                                    <volist name="vo['data']" id="v">
                                        <li class="col-xs-2 pull-left" style="margin-top: 10px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><input name="rule[]" type="checkbox" value="{$vo['controller']}-{$v['action']}" <if condition="in_array($vo['controller'].'-'.$v['action'], explode(',', $data['rule']))">checked</if>> {$v['name']}</li>
                                    </volist>
                                </ul>
                            </div>
                        </div>
                    </volist>
                    <input type="hidden" name="id" value="{$data['id']}">
                </form>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-default submit">提交</button>
            </div>
        </div>
    </div>
</div>
<script>
    formSubmit.submit($('form'), $('button.submit'));
</script>