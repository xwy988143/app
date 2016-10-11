<style>
    b{color:orangered}
</style>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">历史反馈</h3>
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
                            <p><b>处理时间:</b>{$vo['reply_time']|date='Y年m月d日 H:i',###}</p>
                            <p><b>处理结果:</b>{:htmlspecialchars_decode($vo['reply'])}</p>
                        </div>
                    </td>
                </tr>
            </volist>
        </table>
    </div>
</div>