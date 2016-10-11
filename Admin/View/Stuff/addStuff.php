<include file="Include:plugins_ueditor"/>
<section class="content-header">
    <h1>添加员工信息<small> Infomation</small></h1>
</section>
<!-- Main content -->

<div class="box box-info">

    <!-- form start -->
    <form class="form-horizontal" action="{:U('Stuff/addStuff')}">
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">职位类型</label>
                <div class="col-xs-3">
                    <select name="type" class="form-control">
                        <option value="主任医生">主任医生</option>
                        <option value="医生">医生</option>
                        <option value="护士">护士</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">员工姓名</label>
                <div class="col-xs-5">
                    <div class="input-group">
                        <input type="text" name="name"  class="form-control" maxlength="25">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-xs-3">
                    <div class="input-group">
                        <input type="radio" name="sex" value="1"/>男
                        <input type="radio" name="sex" value="0"/>女
                    </div>
                </div>
            </div>
<!--            <div class="form-group">-->
<!--                <label class="col-sm-2 control-label">工资</label>-->
<!--                <div class="col-xs-5">-->
<!--                    <div class="input-group">-->
<!--                        <input type="text" name="salary"  class="form-control" maxlength="25">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="form-group">
                <label class="col-sm-2 control-label">绩效数据</label>
                <div class="col-xs-5">
                    <div class="input-group">
                        <input type="text" name="profit"  class="form-control" maxlength="25">
                    </div>
                </div>
            </div>


        </div><!-- /.box-body -->
        <div class="box-footer">
            <button type="button" class="btn btn-info btn-flat" >添加</button>
        </div><!-- /.box-footer -->
    </form>
</div>

<!-- <div id="names" style="display:none;">{$names}</div> -->
<script>
    formSubmit.submit($('form'), $('button'));
</script>