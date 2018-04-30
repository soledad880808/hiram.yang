<div class="main mt20">
    <div class="wrapper clearfix">
        <div class="main-menu">
            <div class="ja-box-ct">
                <h3>Main Menu</h3>
                <ul class="menu">
                    <?php
                        $current_url = current_url();
                        $url_ar = explode('?',$current_url);
                        $url_arr = explode('/',$url_ar[0]);
                        $suffix = array_pop($url_arr);
                        foreach($nav as $key => $value){
                            if($value['url'] == ''){
                                continue;
                            }
                            if(in_array($suffix,$value['active'])){
                                echo '<li class="item active"><a class="link" href="' . base_url($value['url']) . '" class="active">' . $value['name'] . '</a></li>';
                            }else{
                                echo '<li class="item"><a class="link" href="' . base_url($value['url']) . '">' . $value['name'] . '</a></li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>