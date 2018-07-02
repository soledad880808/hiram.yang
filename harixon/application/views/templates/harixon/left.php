<div class="main mt20">
    <div class="wrapper clearfix">
        <div class="main-menu">
            <div class="ja-box-ct">
                <h3>菜单</h3>
                <ul class="menu">
                    <?php
                        $current_url = $_SERVER['REQUEST_URI'];
                        $url_ar = explode('?',$current_url);
                        $url_arr = explode('/',$url_ar[0]);
                        $suffix = array_pop($url_arr);
                        $par_active = '';
                        if(!empty($url_ar[1])){
                            $param_ar = explode('&',$url_ar[1]);
                            foreach($param_ar as $key => $value){
                                $par_ar = explode('=',$value);
                                if($par_ar[0] == 'type'){
                                    $par_active = $par_ar[1];
                                }
                            }
                        }
                        foreach($nav as $key => $value){
                            if($value['url'] == ''){
                                continue;
                            }
                            if(isset($value['list']) || isset($value['has_db'])){
                                $is_selected = false;
                                if(in_array($suffix,$value['active'])){
                                    $is_selected = true;
                                }
                                if($is_selected){
                                     echo '<li class="item list-show"><a class="link" href="' . base_url($value['url']) . '">' . $value['name'] . '</a>';
                                }else{
                                     echo '<li class="item list-hide"><a class="link" href="' . base_url($value['url']) . '">' . $value['name'] . '</a>';
                                }
                               
                                echo '<ul>';
                                if(!isset($value['has_db'])){
                                    foreach($value['list'] as $k => $v){
                                        if((!isset($v['active_type']) || $par_active == $v['active_type']) && in_array($suffix,$v['active'])){
                                            echo '<li class="item active"><a class="link" href="' . base_url($v['url']) . '">' . $v['name'] . '</a></li>';
                                        }else{
                                            echo '<li class="item"><a class="link" href="' . base_url($v['url']) . '">' . $v['name'] . '</a></li>';
                                        }  
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
                                        if($par_active == $k && $is_selected){
                                            echo '<li class="item active"><a class="link" href="' . base_url($url) . '?type=' . $k . '">' . $v . '</a></li>';
                                        }else{
                                            echo '<li class="item"><a class="link" href="' . base_url($url) . '?type=' . $k . '">' . $v . '</a></li>';
                                        }  
                                    }
                                }
                               
                                echo '</ul>';
                                echo '</li>';
                            }else{
                                if(in_array($suffix,$value['active'])){
                                    echo '<li class="item active"><a class="link" href="' . base_url($value['url']) . '" class="active">' . $value['name'] . '</a></li>';
                                }else{
                                    echo '<li class="item"><a class="link" href="' . base_url($value['url']) . '">' . $value['name'] . '</a></li>';
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>