        <div class="main-content">
            <div class="product-header">
                <div class="left">
                    <h1>LMR 48 SSI 直线位移传感器</h1>
                    <img src="<?php echo $productdetail['title_pic']?>" alt="">
                </div>
                <div class="right">
                    <div class="introduction-box">
                        <p>产品特性</p>
                        <ul>
                            <li>+传感器整体集成于液压缸内</li>
                            <li>+非接触无磨损的测量系统</li>
                            <li>+可调节测量范围</li>
                            <li>+可同时输出位置和速度</li>
                        </ul>
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
                    <div class="detail">
    					<p>+传感器整体集成于液压缸内<br/>
    					+非接触无磨损的测量系统<br/>
    					+可调节测量范围<br/>
    					+可同时输出位置和速度</li></p>
                    </div>
                    <div class="detail" style="display:none">
                        <p><img src="<?php echo $productdetail['material']?>" style="width:100%" alt=""></p>
                    </div>
                    <div class="detail" style="display:none">
                        <p><img src="<?php echo $productdetail['material']?>" style="width:100%" alt=""></p>
                    </div>
                    <div class="detail" style="display:none">
                        <p><img src="<?php echo $productdetail['software']?>" style="width:100%" alt=""></p>
                    </div>
                    <div class="detail" style="display:none">
                        <p>普件</p>
                    </div>
                    <div class="detail" style="display:none">
                        <p>接插件链接技术</p>
                    </div>
                    <div class="detail" style="display:none">
                            <p>文件</p>
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