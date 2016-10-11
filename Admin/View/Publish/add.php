<include file="Include:plugins_ueditor"/>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">发布公告</h3>
                <div class="box-tools">
                    <a href="javascript:;" onclick="PublishClassConfig()" class="btn btn-box-tool"><i class="fa fa-cogs"></i> 分类管理</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{:U('Publish/add')}" class="form-horizontal well-lg">                    
                    {:W('Form/select',array(array('label'=>'分类名称','name'=>'class_name','value'=>$data['class_name'],'data'=>$pub_class_names,'k'=>'name','v'=>'name')))}
                    {:W('Form/input',array(array('label'=>'标题','name'=>'title','value'=>'')))}
                    {:W('Form/ueditor',array(array('label'=>'内容','name'=>'content','value'=>'')))}                   
                </form>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-default">提交</button>
            </div>
        </div>
    </div>
</div>
<!-- <div id="names" style="display:none;">{$names}</div> -->
<script>
    formSubmit.submit($('form'), $('button'));

    function PublishClassConfig(){
        var content = '<textarea name="pub_class_names" class="form-control" placeholder="一行一个" rows="3">'+$("#names").text()+'</textarea>'
        dialog({
            width: 300,
            title: '公告分类',
            content: content,
            ok: function(){
                formSubmit.ajax({
                    url:"{:U('PubClassConfig')}",
                    type:"post",
                    data:{pub_class_names:$('textarea[name=pub_class_names]').val()}
                });
            },
            cancel: function(){return;},
            okValue: '保存',
            cancelValue: '取消',
            zIndex: 99999
        }).showModal();
    }
</script>