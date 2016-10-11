<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">[{$data['class_name']}] {$data['title']}</h3>
                <div class="box-tools">
                    <span>发布时间: {$data['addtime']|date='Y-m-d',###}</span>
                </div>
            </div>
            <div class="box-body">
                {$data['content']}
            </div>
        </div>
    </div>
</div>