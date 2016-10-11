<div class="form-group {$data['name']}">
    <if condition="$data['label']">
        <label class="col-sm-2 control-label">{$data['label']}</label>
    </if>
    <div class="col-sm-10">
        <volist name="data[data]" id="vo">
        <div>
            <input type="radio" name="{$data['name']}" value="{$vo[$data['k']]}" class="form-control {$data['class']}" {$vo[$data['k']]==$data['value']?'checked':''} {$data['off']?'disabled':''}>
            <label>{$vo[$data['v']]}</label>
        </div>
        </volist>
    <if condition="$data['remark']">
        <p class="remark">备注:{$data['remark']}</p>
    </if>
    </div>
</div>