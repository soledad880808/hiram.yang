<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>src/ckeditor/ckeditor.js"></script>
<section class="content-header">
    <br/>
    <ol class="breadcrumb">
        <li><a href="<?PHP echo base_url('backmanage/productlist');?>"><i class="fa fa-dashboard"></i>产品列表</a></li>
        <li class="active">添加/编辑</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-body">
            <form role="form" onsubmit="return false">
                <div class="form-group">
                    <label>标题<em class="text-red">*</em>：</label>
                    <input id="J-title" type="text" class="form-control" value="<?php echo !empty($productdetail) ? $productdetail['title'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>作者<em class="text-red">*</em>：</label>
                    <input id="J-creator" type="text" class="form-control" value="<?php echo !empty($productdetail) ? $productdetail['creator'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>版本<em class="text-red">*</em>：</label>
                    <input id="J-version" type="text" class="form-control" value="<?php echo !empty($productdetail) ? $productdetail['version'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>发布时间<em class="text-red">*</em>：</label>
                    <input id="J-published" type="text" class="form-control" value="<?php echo !empty($productdetail['published']) ? date('Y-m-d H:i:s',$productdetail['published']) : '';?>"/>
                </div>
                <div class="form-group">
                    <label>标题图片<em class="text-red">*</em>：</label>
                    <div class="input-group">
                        <input id="J-titlepic" name="title_pic" type="file" class="form-control" value=""/>
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat J-show-img" value="<?php echo !empty($productdetail) ? $productdetail['title_pic'] : '';?>" type="button">预览</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>类型<em class="text-red">*</em>：</label>
                    <select id="J-type" class="form-control">
                    <?php
                        if(!empty($category_conf)){
                            foreach($category_conf as $key => $value){
                                if(!empty($productdetail) && $productdetail['type'] == $key){
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
                    <textarea name="content" rows="10" class="editor" id="content">
                        <?php echo !empty($productdetail) ? $productdetail['content'] : ''?>
                    </textarea>
                </div>  
                <div class="form-group">
                    <label>好处<em class="text-red">*</em>：</label>
                    <textarea name="content" rows="10" class="editor" id="benefit">
                        <?php echo !empty($productdetail) ? $productdetail['benefit'] : ''?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label>资料<em class="text-red">*</em>：</label>
                    <div class="input-group">
                        <input id="J-material" name="material" type="file" class="form-control" value=""/>
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat J-show-img" value="<?php echo !empty($productdetail) ? $productdetail['material'] : '';?>" type="button">预览</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>认证<em class="text-red">*</em>：</label>
                    <div class="input-group">
                        <input id="J-identification" name="identification" type="file" class="form-control" value=""/>
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat J-show-img" value="<?php echo !empty($productdetail) ? $productdetail['identification'] : '';?>" type="button">预览</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>软件<em class="text-red">*</em>：</label>
                    <div class="input-group">
                        <input id="J-software" name="software" type="file" class="form-control" value=""/>
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat J-show-img" value="<?php echo !empty($productdetail) ? $productdetail['software'] : '';?>" type="button">预览</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>普件<em class="text-red">*</em>：</label>
                    <textarea name="content" rows="10" class="editor" id="normal">
                        <?php echo !empty($productdetail) ? $productdetail['normal'] : ''?>
                    </textarea>
                </div>  
                <div class="form-group">
                    <label>链接技术<em class="text-red">*</em>：</label>
                    <textarea name="content" rows="10" class="editor" id="technology">
                        <?php echo !empty($productdetail) ? $productdetail['technology'] : ''?>
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
    var editor = CKEDITOR.replace( 'content' ,{
        filebrowserImageUploadUrl : domain + '/backmanage/uploadproductimg?responseType=json',
        height:300,
    });

    var editor = CKEDITOR.replace( 'benefit' ,{
        filebrowserImageUploadUrl : domain + '/backmanage/uploadproductimg?responseType=json',
        height:300,
    });

    var editor = CKEDITOR.replace( 'normal' ,{
        filebrowserImageUploadUrl : domain + '/backmanage/uploadproductimg?responseType=json',
        height:300,
    });

    var editor = CKEDITOR.replace( 'technology' ,{
        filebrowserImageUploadUrl : domain + '/backmanage/uploadproductimg?responseType=json',
        height:300,
    });

    $('.J-show-img').click(function(){
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
            content = CKEDITOR.instances.content.getData(),
            benefit = CKEDITOR.instances.benefit.getData(),
            normal = CKEDITOR.instances.normal.getData(),
            technology = CKEDITOR.instances.technology.getData();
        var param = {
            'creator':creator,
            'version':version,
            'published':published,
            'title':title,
            'type':type,
            'content':content.replace(/"/g,"||++"),
            'benefit':benefit.replace(/"/g,"||++"),
            'normal':normal.replace(/"/g,"||++"),
            'technology':technology.replace(/"/g,"||++")
        };
        if(id == ''){
            var url = domain + 'backmanage/addproduct';
        }else{
            param.id = id;
            var url = domain + 'backmanage/updateproduct';
        }
        $.ajaxFileUpload({
            url:url,
            data:param,
            fileElementId:'J-titlepic,J-material,J-identification,J-software',
            dataType:'json' ,
            success:function(data,status){
                if(data.code == 1){
                    if(id == ''){
                        location.href = domain + 'backmanage/productlist';
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