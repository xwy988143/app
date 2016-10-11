<div class="form-group {$data['name']}">
    <if condition="$data['label']">
        <label class="col-sm-2 control-label">{$data['label']}</label>
    </if>
    <div class="col-sm-10">
    <textarea name="{$data['name']}" class="form-control {$data['class']}" placeholder="{$data['placeholder']}" rows="{$data['rows']|default='3'}">{$data['value']}</textarea>
    <if condition="$data['remark']">
        <p class="remark">备注:{$data['remark']}</p>
    </if>
    </div>
</div>