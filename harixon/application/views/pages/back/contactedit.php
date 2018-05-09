<section class="content-header">
    <h1>
        <small>编辑联系方式</small>
    </h1>
</section>
<section class="content">
    <div class="box">
        <div class="box-body">
            <form role="form" onsubmit="return false">
                <div class="form-group">
                    <label>地址<em class="text-red">*</em>：</label>
                    <input id="J-address" type="text" class="form-control" value="<?php echo !empty($contactinfo) ? $contactinfo['address'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>电话<em class="text-red">*</em>：</label>
                    <input id="J-phone" type="text" class="form-control" value="<?php echo !empty($contactinfo) ? $contactinfo['phone'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>手机<em class="text-red">*</em>：</label>
                    <input id="J-mobile" type="text" class="form-control" value="<?php echo !empty($contactinfo) ? $contactinfo['mobile'] : '';?>"/>
                </div>
                <div class="form-group">
                    <label>邮箱<em class="text-red">*</em>：</label>
                    <input id="J-email" type="text" class="form-control" value="<?php echo !empty($contactinfo) ? $contactinfo['email'] : '';?>"/>
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
    $('#J-save').click(function(){
        var address = $('#J-address').val(),
            phone = $('#J-phone').val(),
            mobile = $('#J-mobile').val(),
            email = $('#J-email').val(),
            url = domain + 'backmanage/changecontact';
        var param = {
            'address':address,
            'phone':phone,
            'mobile':mobile,
            'email':email
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