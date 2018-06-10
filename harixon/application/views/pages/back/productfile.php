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
                    <label>文件<em class="text-red">*</em>：</label>
                    <input id="J-file"  name="file[]" type="file" class="form-control" multiple="multiple"/>
                </div>
            </form>
            <table class="table table-bordered table-striped" style="table-layout:fixed">
                <thead>
                    <tr>
                        <th>文件名称</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP
                    if(!empty($productdetail['file'])){
                        $file_ar = unserialize($productdetail['file']);
                        foreach($file_ar as $key => $value){
                            echo '<tr>';
                            echo '<td>' . $value['filename'] . '</td>';
                            echo '<td>' . ($value['is_deleted'] == 1 ? '删除' : '正常') . '</td>';
                            echo '<td><a href="javascript:void(0)" class="J-recover" data-id="' . $key . '">恢复</a>|<a href="javascript:void(0)" class="J-del" data-id="' . $key . '">删除</a></td>';
                        }
                    }
                ?>
                </tbody>
            </table>
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
    $('#J-save').click(function(){
        var id = $('#J-id').val(),
            url = domain + 'backmanage/uploadproductfile';
        var param = {
            'id':id
        };
        $.ajaxFileUpload({
            url:url,
            data:param,
            fileElementId:'J-file',
            dataType:'json',
            success:function(data,status){
                if(data.code == 1){
                    location.reload();
                }else{
                    error(data.desc);
                }
            },
            error: function(data, status, e){
                error(e);
            }
        }); 
    });

    $('.J-recover').click(function(){
        var id = $('#J-id').val(),
            file_id = $(this).data('id'),
            url = domain + 'backmanage/changeproductfile';
        var param = {
            'id':id,
            'file_id':file_id,
            'type':1
        };
        sconfirm('确认恢复该文件？',function(){
            ajaxRequest(url,param,function(obj){
                if(obj.code == 1){
                    location.reload();
                }else{
                    error(obj.desc);
                }
            });
        });
    });

    $('.J-del').click(function(){
        var id = $('#J-id').val(),
            file_id = $(this).data('id'),
            url = domain + 'backmanage/changeproductfile';
        var param = {
            'id':id,
            'file_id':file_id,
            'type':2
        };
        sconfirm('确认删除该文件？',function(){
            ajaxRequest(url,param,function(obj){
                if(obj.code == 1){
                    location.reload();
                }else{
                    error(obj.desc);
                }
            });
        });
    });
</script>