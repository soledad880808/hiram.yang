<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>src/ckeditor/ckeditor.js"></script>
<section class="content-header">
    <br/>
    <ol class="breadcrumb">
        <li><a href="<?PHP echo base_url('backmanage/schemacategory');?>"><i class="fa fa-dashboard"></i>行业解决方案分组列表</a></li>
        <li class="active">添加/编辑</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-body">
            <form role="form" onsubmit="return false">
                <div class="form-group">
                    <label>排序<em class="text-red">*</em>：</label>
                    <input id="J-order" type="text" class="form-control" value="<?php echo !empty($schemadetail) ? $schemadetail['order'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>分组名称<em class="text-red">*</em>：</label>
                    <input id="J-name" type="text" class="form-control" value="<?php echo !empty($schemadetail) ? $schemadetail['name'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>分组缩略图<em class="text-red">*</em>：</label>
                    <div class="input-group">
                        <input id="J-pic" name="category_pic" type="file" class="form-control" value=""/>
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" id="J-show-img" value="<?php echo !empty($schemadetail) ? $schemadetail['pic'] : '';?>" type="button">预览</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>分组简介<em class="text-red">*</em>：</label>
                    <textarea class="form-control" rows=6"" name="content" id="J-describe"><?php echo !empty($schemadetail) ? $schemadetail['describe'] : ''?></textarea>
                </div> 
                <div class="form-group">
                    <label>是否首页推荐<em class="text-red">*</em>：</label>
                    <select id="J-index" class="form-control">
                    <?php
                        if($schemadetail['is_index'] == 1){
                            echo '<option value="0">否</option>';
                            echo '<option value="1" selected>是</option>';
                        }else{
                            echo '<option value="0" selected>否</option>';
                            echo '<option value="1">是</option>';
                        }
                    ?>
                    </select>
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
            order = $('#J-order').val(),
            name = $('#J-name').val(),
            describe = $('#J-describe').val(),
            index = $('#J-index').val(),
            url = domain + 'backmanage/changeschemacategroy';
        var param = {
            'id':id,
            'order':order,
            'name':name,
            'describe':describe,
            'is_index':index
        };
        if(id == ''){
            var url = domain + 'backmanage/addschemacategory';
        }else{
            param.id = id;
            var url = domain + 'backmanage/updateschemacategory';
        }
        $.ajaxFileUpload({
            url:url,
            data:param,
            fileElementId:'J-pic',
            dataType:'json' ,
            success:function(data,status){
                if(data.code == 1){
                    if(id == ''){
                        location.href = domain + 'backmanage/schemacategory';
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