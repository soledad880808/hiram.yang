        <div class="main-content">
            <div class="product-header">
                <div class="left">
                    <h1>LMR 48 SSI 直线位移传感器</h1>
                    <img src="<?php echo $productdetail['title_pic']?>" alt="">
                </div>
                <div class="right">
                    <div class="introduction-box">
                        <p>产品特性</p>
                        <div class="fixck"><?php echo $productdetail['content'];?></div>
                    </div>
                </div>
            </div>
            <div class="product-details">
                <div class="left-menu">
                    <ul>
                        <li class="item active">优点和好处</li>
                        <li class="item">参考资料</li>
                        <li class="item">认证</li>
                        <li class="item">软件/cad/step</li>
                        <li class="item">普件</li>
                        <li class="item">接插件链接技术</li>
                        <li class="item">文件</li>
                    </ul>
                </div>
                <div class="right-details">
                    <div class="detail fixck">
    					<?php echo $productdetail['benefit'];?>
                    </div>
                    <div class="detail" style="display:none">
                        <p><img src="<?php echo $productdetail['material']?>" style="width:100%" alt=""></p>
                    </div>
                    <div class="detail" style="display:none">
                        <p><img src="<?php echo $productdetail['identification']?>" style="width:100%" alt=""></p>
                    </div>
                    <div class="detail" style="display:none">
                        <p><img src="<?php echo $productdetail['software']?>" style="width:100%" alt=""></p>
                    </div>
                    <div class="detail fixck" style="display:none">
                        <?php echo $productdetail['normal'];?>
                    </div>
                    <div class="detail fixck" style="display:none">
                        <?php echo $productdetail['technology'];?>
                    </div>
                    <div class="detail" style="display:none">
                        <p>
                        <?php
                            if(!empty($productdetail['file'])){
                                $file_ar = unserialize($productdetail['file']);
                                foreach($file_ar as $key => $value){
                                    if($value['is_deleted'] == 0){
                                        echo '<img style="width:30px;height:30px" src=' . base_url('img/file.jpg') . '><a href="' . base_url('product/downloadfile?storename=' . $value['storename'] . '&filename='. $value['filename']) . '">' . $value['filename'] . '</a><br/>';
                                    }  
                                }
                            }
                        ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .contact-wrapper{
        color: #888;
    }
    .contact-wrapper p.title{
        font-size: 36px;
        color: #313131;
    }
    .contact-wrapper .item{
        margin-top: 15px;
        font-size: 14px;
    }
    .contact-wrapper .item .iconfont{
        margin-right: 10px;
    }
    .contact-wrapper .item .icon-phone{
        margin-right: 6px;
    }
    #container{height: 400px; margin-top: 20px;}
</style>
<script>
    $(function(){
        let item  = $('.product-details .left-menu').find('.item');
        let detail = $('.right-details .detail');
        item.click(function(){
            let index = item.index(this);
            item.removeClass('active');
            detail.hide();
            $(this).addClass('active');
            detail.eq(index).show();
        })
    })
</script>