        <div class="main-content contact-wrapper">
            <p class="title">联系我们</p>
            <p class="item"><?php echo $contactinfo['coname']?></p>
            <p class="item"><?php echo $contactinfo['address']?></p>
            <p class="item"><i class="iconfont icon-phone"></i> 电话：<?php echo $contactinfo['phone']?></p>
            <p class="item"><i class="iconfont icon-phone1"></i>手机：<?php echo $contactinfo['mobile']?></p>
            <p class="item"><i class="iconfont icon-email"></i>邮箱：<?php echo $contactinfo['email']?></p>
            <div id="container"></div>
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
<script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=L1ghFUE7i2jYseGEWfYohcwfI4M2VqDq"></script>
<script type="text/javascript">
    var map = new BMap.Map('container');
    // 创建地图实例
    var point = new BMap.Point(<?php echo $contactinfo['x_coordinate']?>, <?php echo $contactinfo['y_coordinate']?>);
    // 创建点坐标
    map.centerAndZoom(point, 15);
    //map.enableScrollWheelZoom(true); 
    var marker = new BMap.Marker(point);        // 创建标注    
    map.addOverlay(marker); 
    // 初始化地图， 设置中心点坐标和地图级别
</script>