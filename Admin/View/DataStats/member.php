<include file="Include:plugins_morris"/>

<div class="col-md-6">
    <!-- LINE CHART -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Line Chart</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart" id="line-chart" style="height: 300px;"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</div><!-- /.col (RIGHT) -->

<script>
    $(function(){
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                {y: '2015-01', item1: 2666},
                {y: '2015-02', item1: 6810},
                {y: '2015-03', item1: 10687},
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['注册数'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });
    });
</script>