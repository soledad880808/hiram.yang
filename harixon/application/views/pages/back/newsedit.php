<!--script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>src/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>src/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>src/ueditor/lang/zh-cn/zh-cn.js"></script-->
<link rel="stylesheet" href="<?php echo base_url();?>dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="<?php echo base_url();?>dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<section class="content-header">
    <br/>
    <ol class="breadcrumb">
        <li><a href="<?PHP echo base_url('backmanage/newslist');?>"><i class="fa fa-dashboard"></i>新闻列表</a></li>
        <li class="active">添加/编辑</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-body">
            <form role="form" onsubmit="return false">
                <div class="form-group">
                    <label>标题<em class="text-red">*</em>：</label>
                    <input id="J-title" type="text" class="form-control" value="<?php echo !empty($newsdetail) ? $newsdetail['title'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>内容<em class="text-red">*</em>：</label>
                    <!--script id="editor" type="text/plain" style="width:100%;height:500px;"></script-->
                    <textarea id="J-content" name="editor1" rows="10" class="form-control"><?php echo !empty($newsdetail) ? $newsdetail['content'] : ''?></textarea>

                </div>           
            </form>
        </div>
        <div class="box-footer">
            <div class="col-xs-3">
                <button id="J-save" class="btn btn-info">保存</button>
            </div>
        </div>
    </div>
</section>
<input id="J-id" type="hidden" value="<?php echo $id;?>">
<script>
    $(function(){
        $("#J-content").wysihtml5();
    });
    //window.UEDITOR_HOME_URL = domain;
    //var ue = UE.getEditor('editor');
    $('#J-save').click(function(){
        var id = $('#J-id').val(),
            title = $('#J-title').val(),
            content = $('#J-content').val(),
            url = domain + 'backmanage/changenews';
        var param = {
            'id':id,
            'title':title,
            'content':content
        };
        ajaxRequest(url,param,function(obj){
            if(obj.code == 1){
                location.href = domain + 'backmanage/newsedit?id=' + obj.id;
            }else{
                error(obj.desc);
            }
        });
    });
</script>