<div class="main mt20">
    <div class="wrapper clearfix">
        <div class="main-menu">
            <div class="ja-box-ct">
                <h3>Main Menu</h3>
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
                            if(isset($value['list'])){
                                echo '<li class="item"><a class="link" href="javascript:void(0)">' . $value['name'] . '</a>';
                                echo '<ul>';
                                foreach($value['list'] as $k => $v){
                                    if($par_active == $v['active_type']){
                                        echo '<li class="item active"><a class="link" href="' . base_url($v['url']) . '">' . $v['name'] . '</a></li>';
                                    }else{
                                        echo '<li class="item"><a class="link" href="' . base_url($v['url']) . '">' . $v['name'] . '</a></li>';
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