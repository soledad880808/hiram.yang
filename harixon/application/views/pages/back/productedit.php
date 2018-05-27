<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>src/ckeditor5/ckeditor.js"></script>
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
                    <label>标题图片<em class="text-red">*</em>：</label>
                    <div class="input-group">
                        <input id="J-titlepic" name="title_pic" type="file" class="form-control" value=""/>
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat J-show-img" value="<?php echo !empty($productdetail) ? $productdetail['title_pic'] : '';?>" type="button">预览</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>内容<em class="text-red">*</em>：</label>
                    <textarea name="content" rows="10" class="editor" id="J-content">
                        <p><?php echo !empty($productdetail) ? $productdetail['content'] : ''?></p>
                    </textarea>
                </div>  
                <div class="form-group">
                    <label>内容<em class="text-red">*</em>：</label>
                    <textarea name="content" rows="10" class="editor" id="J-benefit">
                        <p><?php echo !empty($productdetail) ? $productdetail['benefit'] : ''?></p>
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
                    <label>文件<em class="text-red">*</em>：</label>
                    <input id="J-file" name="product_file" type="file" class="form-control" value=""/>
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
    //window.UEDITOR_HOME_URL = domain;
    //var ue = UE.getEditor('editor');
    ClassicEditor
    .create( document.querySelector( '#J-content' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    ClassicEditor
    .create( document.querySelector( '#J-benefit' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

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
            title = $('#J-title').val(),
            content = $('#J-content').val(),
            benefit = $('#J-benefit').val();
        var param = {
            'title':title,
            'content':content,
            'benefit':benefit
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