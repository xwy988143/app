<div id="loading" class="loading">
    <div class="info">
        <span><i class="fa fa-cog fa-spin"></i> 正在加载</span>
    </div>
    <div class="mask"></div>
</div>
<style>
    .loading{
        display: none;
    }
    .loading .info{
        position: fixed;
        left:0;
        right:0;
        top:50%;
        text-align: center;
        z-index: 9997;
    }
    .loading .info span{
        display: inline-block;
        width:100px;
        height:30px;
        line-height: 30px;
        border: 1px solid #CDDC39;
        color: #CDDC39;
        border-radius: 2px;
        position: relative;
        top:-100px;
    }
    .loading .mask{
        position: fixed;
        left:0;
        top:0;
        right:0;
        bottom:0;
        background: #000;
        z-index: 9996;
        opacity: 0.6;
        filter:alpha(opacity=0.6);
    }
</style>