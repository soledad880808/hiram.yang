        <div class="main-content contact-wrapper">
            <p class="title">联系我们</p>
            <p class="item">上海博程电子科技有限公司</p>
            <p class="item">上海市杨浦区赤峰路65号同济科技园1号楼208室 200092</p>
            <p class="item"><i class="iconfont icon-phone"></i> 电话：+86(21)55893777, +86(21)55893086</p>
            <p class="item"><i class="iconfont icon-phone1"></i>手机：+86(21)55893000</p>
            <p class="item"><i class="iconfont icon-email"></i>邮箱：info@prochen.com</p>
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
    var point = new BMap.Point(121.507045, 31.285765);
    // 创建点坐标
    map.centerAndZoom(point, 15);
    //map.enableScrollWheelZoom(true); 
    var marker = new BMap.Marker(point);        // 创建标注    
    map.addOverlay(marker); 
    // 初始化地图， 设置中心点坐标和地图级别
</script>