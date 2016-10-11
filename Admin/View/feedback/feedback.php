<include file="Include:plugins_ueditor"/>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">问题反馈</h3>
        <div class="box-tools">
            <a href="javascript:;" onclick="feedbackClassConfig()" class="btn btn-box-tool"><i class="fa fa-cogs"></i> 反馈分类</a>
        </div>
    </div>
    <div class="box-body no-padding">
        <table class="table ">
            {:checkListEmpty($data, 1, '暂无问题')}
            <volist name="data" id="vo">
                <tr>
                    <td>
                        <div class="post clearfix">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{$vo['headimg']}" onerror="this.src='/static/images/admin-default-headimg.png'"/>
                                <span class="username">
                                  <a href="javascript:;">{$vo['name']}</a>
                                  <a href="{:U('feedbackHistory', array('aid'=>$vo['aid']))}" target="_blank">[历史反馈]</a>
                                  <a href="javascript:;" onclick="formSubmit.del(this)" d-id="{$vo['id']}" d-url="{:U('feedbackDel')}" class="pull-right btn-box-tool"><i class="fa fa-trash"></i></a>
                                </span>
                                <span class="description">{$vo['add_time']|date='Y年m月d日 H:i',###}</span>
                            </div>
                            <div class="col-sm-12">
                                <p><b>[{$vo['title']}]</b>{:htmlspecialchars_decode($vo['content'])}</p>
                            </div>

                            <form class="form-horizontal" id="feedback{$vo['id']}">
                                <div class="form-group margin-bottom-none">
                                    <div class="col-sm-10">
                                        {:W('Form/ueditor',array(array('name'=>'reply','toolbars'=>1)))}
                                        <input type="hidden" name="id" value="{$vo['id']}">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-danger pull-right btn-block btn-sm" onclick="replys({$vo['id']})">回复</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            </volist>
        </table>
    </div>
</div>
<div id="names" style="display:none;">{$names}</div>
<script>
function replys(id){
    dataSubmit.ajax({
        url: "{:U('feedback')}",
        data: $("#feedback"+id).serialize()
    });
}

function feedbackClassConfig(){
    var content = '<textarea name="feedback_class_names" class="form-control" placeholder="一行一个" rows="3">'+$("#names").text()+'</textarea>'
    dialog({
        width: 300,
        title: '反馈分类',
        content: content,
        ok: function(){
            formSubmit.ajax({
                url:"{:U('feedbackClassConfig')}",
                type:"post",
                data:{feedback_class_names:$('textarea[name=feedback_class_names]').val()}
            });
        },
        cancel: function(){return;},
        okValue: '保存',
        cancelValue: '取消',
        zIndex: 99999
    }).showModal();
}
</script>