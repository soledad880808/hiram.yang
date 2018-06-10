<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>src/ckeditor/ckeditor.js"></script>
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
                <div>
                    <label>类型<em class="text-red">*</em>：</label>
                    <select id="J-type" class="form-control">
                    <?php
                        foreach($news_type_conf as $key => $value){
                            if($key == $newsdetail['type']){
                                echo '<option value="' . $key . '" selected>' . $value . '</option>';
                            }else{
                                echo '<option value="' . $key . '">' . $value . '</option>';
                            }
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>内容<em class="text-red">*</em>：</label>
                    <textarea name="content" id="editor">
                        <?php echo !empty($newsdetail) ? $newsdetail['content'] : ''?>
                    </textarea>
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
    var editor = CKEDITOR.replace( 'editor' ,{
        filebrowserImageUploadUrl : domain + '/backmanage/uploadnewsimg?responseType=json',
        height:600,
    });

    $('#J-save').click(function(){
        var id = $('#J-id').val(),
            title = $('#J-title').val(),
            content = CKEDITOR.instances.editor.getData(),
            type = $('#J-type').val(),
            url = domain + 'backmanage/changenews';
        var param = {
            'id':id,
            'title':title,
            'content':content,
            'type':type
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