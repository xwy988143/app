<div class="form-group {$data['name']}">
    <if condition="$data['label']">
        <label class="col-sm-2 control-label">{$data['label']}</label>
    </if>
    <div class="col-sm-10">
    <input type="{$data['type']|default='text'}" name="{$data['name']}" value="{$data['value']}" class="form-control {$data['class']}" id="{$data['id']}" placeholder="{$data['placeholder']}" {$data['off']?'disabled':''} required>
    <if condition="$data['remark']">
    <p class="remark">备注:{$data['remark']}</p>
    </if>
    </div>
</div>