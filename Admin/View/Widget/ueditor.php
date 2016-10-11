<div class="form-group">
    <if condition="$data['label']">
        <label class="col-sm-2 control-label">{$data['label']}</label>
    </if>
    <div class="col-sm-10">
        <script id="container_{$data['name']}" name="{$data['name']}" type="text/plain">{$data['value']}</script>
        <if condition="$data['remark']">
            <p class="remark">备注:{$data['remark']}</p>
        </if>
    </div>
</div>
<script>
    $(function(){
        switch("{$data['toolbars']|default=0}"){
            //简单工具栏
            case '1':
                window.UEDITOR_CONFIG.toolbars = [
                    ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload','insertimage']
                ];
                break;
            //全部工具栏
            default:
                window.UEDITOR_CONFIG.toolbars = [[
                    'fullscreen', 'source', '|', 'undo', 'redo', '|', 'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'cleardoc', '|',
                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                    'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|', 'indent', '|',
                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
                    'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                    'simpleupload', 'insertimage', 'emotion', 'attachment', 'pagebreak', 'template', 'background', '|',
                    'horizontal', 'spechars', 'snapscreen', 'wordimage', '|',
                    'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|', 'preview', 'drafts'
                ]];
                break;
        }
        UE.getEditor('container_{$data['name']}', {serverUrl: "{:U('Admin/Upload/ueditor')}"});
    });
</script>