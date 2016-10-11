<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{$data?'更新后台登陆账号':'创建后台登陆账号'}</h3>
            </div>
            <div class="box-body">
                <form action="<if condition='$data'>{:U('Admin/Admin/editAccount')}<else />{:U('Admin/Admin/addAccount')}</if>" class="form-horizontal well-lg">

                    {:W('Form/radio',array(array('label'=>'状态','name'=>'status_lock','value'=>$data['status_lock'],'data'=>array(array('id'=>1,'name'=>'锁定'),array('id'=>0,'name'=>'正常')),'k'=>'id','v'=>'name')))}
                    {:W('Form/input',array(array('label'=>'登陆账号','name'=>'username','value'=>$data['username'],'placeholder'=>'请输入登陆账号','remark'=>'账号不能修改')))}
                    {:W('Form/input',array(array('label'=>'登陆密码','name'=>'password','placeholder'=>$data?'留空则不修改':'请输入登陆密码')))}
                    {:W('Form/select', array(array('label'=>'角色','name'=>'group_id','value'=>$data['group_id'],'data'=>$group,'k'=>'id','v'=>'name')))}
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