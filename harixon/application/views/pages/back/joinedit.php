<script type="text/javascript" charset="utf-8" src="<?php echo base_url()?>src/ckeditor/ckeditor.js"></script>
<section class="content-header">
    <h1>
        <small>编辑加入我们</small>
    </h1>
</section>
<section class="content">
    <div class="box">
        <div class="box-body">
            <form role="form" onsubmit="return false">
                <div class="form-group">
                    <label>内容<em class="text-red">*</em>：</label>
                    <textarea name="content" id="editor">
                        <?php echo !empty($joininfo) ? $joininfo['content'] : ''?>
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
<script>
    var editor = CKEDITOR.replace( 'editor' ,{
        filebrowserImageUploadUrl : domain + '/backmanage/uploadjoinimg?responseType=json',
        height:600,
    });

    $('#J-save').click(function(){
        var content = CKEDITOR.instances.editor.getData(),
            url = domain + 'backmanage/changejoin';
        var param = {
            'content':content,
        };
        ajaxRequest(url,param,function(obj){
            if(obj.code == 1){
                success(obj.desc);
            }else{
                error(obj.desc);
            }
        });
    });
</script>