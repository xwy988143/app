<div class="form-group">
    <if condition="$data['label']">
        <label class="col-sm-2 control-label">{$data['label']}</label>
    </if>
    <div class="col-sm-10">
    <select name="{$data['name']}" id="{$data['id']}" class="form-control {$data['class']}" {$data['off']?'disabled':''}>
        <volist name="data['data']" id="vo">
            <option value="{$vo[$data['k']]}" {$vo[$data['k']]==$data['value']?'selected':''}>{$vo[$data['v']]}</option>
        </volist>
    </select>
    <if condition="$data['remark']">
        <p class="remark">备注:{$data['remark']}</p>
    </if>
    </div>
</div>