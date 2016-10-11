<style>
    b{color:orangered}
</style>
<include file="Include:plugins_ueditor"/>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">我的反馈</h3>
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
                                  <a href="javascript:;" onclick="formSubmit.del(this)" d-id="{$vo['id']}" d-url="{:U('feedbackDel')}" class="pull-right btn-box-tool"><i class="fa fa-trash"></i></a>
                                </span>
                                <span class="description">{$vo['add_time']|date='Y年m月d日 H:i',###}</span>
                            </div>
                            <p><b>处理问题:</b>[{$vo['title']}]{:htmlspecialchars_decode($vo['content'])}</p>
                            <p><b>处理时间:</b>{$vo['reply_time']?date('Y年m月d H:i',$vo['reply_time']):'待处理'}</p>
                            <p><b>处理结果:</b>{:htmlspecialchars_decode($vo['reply'])?htmlspecialchars_decode($vo['reply']):'待处理'}</p>
                        </div>
                    </td>
                </tr>
            </volist>
        </table>
    </div>
</div>

<div class="box">
    <div class="box-body">
        <form id="feedbackAddForm" class="form-horizontal well-lg">
            {:W('Form/select',array(array('label'=>'反馈类型','name'=>'title','data'=>$feedback_class_names,'k'=>'name','v'=>'name')))}
            {:W('Form/ueditor',array(array('label'=>'反馈内容','name'=>'content','toolbars'=>1)))}
        </form>
    </div>
    <div class="box-footer">
        <button type="button" onclick="add()" class="btn btn-default">提交</button>
    </div>
</div>

<script>
    function add(){
        formSubmit.ajax({
            url:"{:U('Admin/Feedback/feedbackAdd')}",
            type:"post",
            data:$("#feedbackAddForm").serialize()
        });
    }
</script>