<div class="footer mt20">
        <div class="wrapper clearfix">
        <?php
            foreach($nav as $key => $value){
                if(!empty($value['url'])){
                    echo '<div class="column">';
                    echo '<h3><a style="color:#104A7C" href="' . base_url($value['url']) . '">' . $value['name'] . '</a></h3>';
                    if(isset($value['list']) || isset($value['has_db'])){
                        echo '<ul class="menu">';
                        if(!isset($value['has_db'])){
                            foreach($value['list'] as $k => $v){
                                echo '<li class="item">';
                                echo '<a href="' . base_url($v['url']) . '">' . $v['name'] . '</a>';
                                echo '</li>';
                            }
                        }else{
                            if($value['name'] == '产品中心'){
                                $list = $_product_category;
                                $url = 'product/productlist';
                            }elseif($value['name'] == '行业解决方案'){
                                $list = $_schema_category;
                                $url = 'schema/schemalist';
                            }
                            foreach($list as $k => $v){
                                echo '<li class="item">';
                                echo '<a href="' . base_url($url) . '?type=' . $k . '">' . $v . '</a>';
                                echo '</li>';
                            }
                        }
                        echo '</ul>';
                    }
                    echo '</div>';
                }       
            }
        ?>
        </div>
        <div class="footer-info wrapper">
            <small>Copyright © 2018 海汭森（上海）工程技术有限公司 All Rights Reserved. </small>
        </div>
    </div>
</body>
</html>