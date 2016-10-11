<div class="row">
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Folders</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">系统配置</h3>
            </div>
            <div class="box-body">
                <form action="{:U('Admin/Tool/systemconfig')}" class="form-horizontal well-lg">
                    {:W('Form/select', array(array('label'=>'调试模式','name'=>'debug','value'=>$data['debug'],'data'=>$debug,'k'=>'value','v'=>'name')))}
                    {:W('Form/select', array(array('label'=>'后台验证码','name'=>'verify','value'=>$data['verify'],'data'=>$verify,'k'=>'value','v'=>'name')))}
                </form>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-info" id="submit">提交</button>
            </div>
        </div>
    </div>
</div>

<script>
    formSubmit.submit($('form'), $('#submit'));
</script>