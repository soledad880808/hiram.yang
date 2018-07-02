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
                    <label>作者<em class="text-red">*</em>：</label>
                    <input id="J-creator" type="text" class="form-control" value="<?php echo !empty($schemadetail) ? $schemadetail['creator'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>版本<em class="text-red">*</em>：</label>
                    <input id="J-version" type="text" class="form-control" value="<?php echo !empty($schemadetail) ? $schemadetail['version'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>发布时间<em class="text-red">*</em>：</label>
                    <input id="J-published" type="text" class="form-control" value="<?php echo !empty($schemadetail['published']) ? date('Y-m-d H:i:s',$schemadetail['published']) : '';?>"/>
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
                    <label>类型<em class="text-red">*</em>：</label>
                    <select id="J-type" class="form-control">
                    <?php
                        if(!empty($category_conf)){
                            foreach($category_conf as $key => $value){
                                if(!empty($schemadetail) && $schemadetail['type'] == $key){
                                    echo '<option value="' . $key . '"" selected>' . $value . '</option>';
                                }else{
                                    echo '<option value="' . $key . '"">' . $value . '</option>';
                                }
                            }
                        }
                    ?>
                    </select>
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
    $(function(){
        $('#J-published').datepicker({format:'yyyy-mm-dd'});
    });

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
            creator = $('#J-creator').val(),
            version = $('#J-version').val(),
            published = $('#J-published').val(),
            title = $('#J-title').val(),
            type = $('#J-type').val(),
            content = CKEDITOR.instances.editor.getData();
        var param = {
            'creator':creator,
            'version':version,
            'published':published,
            'title':title,
            'type':type,
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