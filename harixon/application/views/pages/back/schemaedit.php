<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>src/ckeditor/ckeditor.js"></script>
<section class="content-header">
    <br/>
    <ol class="breadcrumb">
        <li><a href="<?PHP echo base_url('backmanage/schemalist');?>"><i class="fa fa-dashboard"></i>行业解决方案列表</a></li>
        <li class="active">添加/编辑</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-body">
            <form role="form" onsubmit="return false">
                <div class="form-group">
                    <label>标题<em class="text-red">*</em>：</label>
                    <input id="J-title" type="text" class="form-control" value="<?php echo !empty($schemadetail) ? $schemadetail['title'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>标题图片<em class="text-red">*</em>：</label>
                    <div class="input-group">
                        <input id="J-titlepic" name="title_pic" type="file" class="form-control" value=""/>
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" id="J-show-img" value="<?php echo !empty($schemadetail) ? $schemadetail['title_pic'] : '';?>" type="button">预览</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>内容<em class="text-red">*</em>：</label>
                    <textarea name="content" id="editor">
                        <?php echo !empty($schemadetail) ? $schemadetail['content'] : ''?>
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
<div id="J-img-div" style="display:none;" class="pop-up">
    <div class="row">
        <img id="J-img" src="">
    </div>
</div>
<script>
    CKEDITOR.replace( 'editor' ,{
        filebrowserImageUploadUrl : domain + '/backmanage/uploadschemaimg',
        height:600,
    });

    $('#J-show-img').click(function(){
        var img = $(this).attr('value');
        if(img == ''){
            error('图片不存在');
        }
        $('#J-img').attr('src',img);
        artDialog({
            title: '图片',
            show: true,
            content: $('#J-img-div')[0],
            lock:true,
            ok: true,
            cancel: false
        });
    });

    $('#J-save').click(function(){
        var id = $('#J-id').val(),
            title = $('#J-title').val(),
            content = CKEDITOR.instances.editor.getData();
        var param = {
            'title':title,
            'content':content.replace(/"/g,"||++"),
        };
        if(id == ''){
            var url = domain + 'backmanage/addschema';
        }else{
            param.id = id;
            var url = domain + 'backmanage/updateschema';
        }
        $.ajaxFileUpload({
            url:url,
            data:param,
            fileElementId:'J-titlepic',
            dataType:'json' ,
            success:function(data,status){
                if(data.code == 1){
                    if(id == ''){
                        location.href = domain + 'backmanage/schemalist';
                    }else{
                        success(data.desc);
                    }
                }else{
                    error(data.desc);
                }
            },
            error: function(data, status, e){
                error(e);
            }
        }); 
    });
</script>