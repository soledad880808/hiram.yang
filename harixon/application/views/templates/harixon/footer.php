<div class="footer mt20">
        <div class="wrapper clearfix">
        <?php
            foreach($nav as $key => $value){
                if(!empty($value['url'])){
                    echo '<div class="column">';
                    echo '<h3>' . $value['name'] . '</h3>';
                    if(isset($value['list'])){
                        echo '<ul class="menu">';
                        foreach($value['list'] as $k => $v){
                            echo '<li class="item">';
                            echo '<a href="' . base_url($v['url']) . '">' . $v['name'] . '</a>';
                            echo '</li>';
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