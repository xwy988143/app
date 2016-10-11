<div class="form-group {$data['name']}">
    <if condition="$data['label']">
        <label class="col-sm-2 control-label">{$data['label']|default='图片'}</label>
    </if>
    <div class="col-sm-10">
    <div id="fileList{$data['id']|default='1'}" class="uploader-list" style="margin-bottom:5px;">
        <div><img src="{$data['value']}" onerror="this.src='/static/images/admin-default-img.png'" style="max-width:100px"><input type="hidden" name="{$data['name']}" value="{$data['value']}"></div>
    </div>
    <div id="filePicker{$data['id']|default='1'}"><i class="fa fa-image"></i> 选择图片</div>
        <p class="remark">{$data['remark']}</p>
    </div>
</div>
<script>
    // 文件上传
    jQuery(function () {
        var $ = jQuery,
            $list = $('#fileList{$data[\'id\']|default=\'1\'}');

        // 初始化Web Uploader
        var uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            auto: true,
            server: '{:U(\'Admin/Upload/receive\')}',
            pick:'#filePicker{$data[\'id\']|default=\'1\'}',
            fileVal:'file',
            // 只允许选择图片文件。
            accept:{
                title: 'Images',
                extensions:'gif,jpg,jpeg,bmp,png',
                mimeTypes:'image/*'
            }
        });

        uploader.on('uploadSuccess', function (file, response) {
            if(response.code > 0){
                msg.autoMessage(response.info);
                return false;
            }
            $list.html('<div style="border:1px solid #ccc;display:inline-block;border-radius:5px;padding:3px;background-color:#fff;box-shadow:0 1px 2px rgba(0,0,0,0.075);"><img src="' + response.url + '" style="height:100px"><input type="hidden" name="{$data['name']}" value="'+response.url+'"></div>');
        });

    });
</script>