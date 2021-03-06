<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="content-type">
    <title>海汭森（上海）工程技术有限公司【官网】</title>
    <meta name="keywords" content="海汭森,线性传感器" />
    <meta name="description" content="海汭森（上海）工程技术有限公司，主要经营技术，注册资本万元，公司是建筑工程业的知名企业，公司坚持诚信、互利，为客户提供最好的服务和最实惠的价格，我公司的办公地址在中国（上海）自由贸易试验区郭守敬路351号2号楼A654-27室，如果您对我们的产品服务有兴趣，请在线咨询或者拨打我们的电话，联系电话是。热诚欢迎各界朋友前来参观、洽谈业务。"
    />
    <link rel="stylesheet" href="<?php echo base_url()?>css/common.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/iconfont.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/product.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/kkpager_blue.css" />
    <script src="<?php echo base_url();?>js/jquery-2.1.3.js"></script>
    <script src="<?php echo base_url();?>js/kkpager.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/fixck.css" />
</head>

<body>
    <div class="header">
        <div class="wrapper">
            <ul class="nav mt20">
                <?php
                    $current_url = current_url();
                    $url_ar = explode('?',$current_url);
                    $url_arr = explode('/',$url_ar[0]);
                    $suffix = array_pop($url_arr);
                    foreach($nav as $key => $value){
                        if(in_array($suffix,$value['active'])){
                            echo '<li><a href="' . base_url($value['url']) . '" class="active">' . $value['name'] . '</a>';
                        }else{
                            echo '<li><a href="' . base_url($value['url']) . '">' . $value['name'] . '</a>';
                        }
                        if(isset($value['list']) || isset($value['has_db'])){
                            echo '<div class="childcontent" style="display: none">';
                            echo '<div class="megacol" style="width:200px"><ul>';
                            if(!isset($value['has_db'])){    
                                foreach($value['list'] as $k => $v){
                                    echo '<li class="mega"><a href="' . base_url($v['url']) . '">' . $v['name'] . '</a></li>';
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
                                    echo '<li class="mega"><a href="' . base_url($url) . '?type=' . $k . '">' . $v . '</a></li>';
                                }
                            } 
                            echo '</ul></div></div>';                      
                        }
                        echo '</li>';
                    }
                ?>
                <div class="logo">
                    <a href="">
                        <img src="<?php echo base_url();?>img/leo_logo_1.png" alt="">
                    </a>
                </div>
            </ul>
        </div>
    </div>
    <div class="banner-sub-page">
        <div class="content wrapper">
            <img src="<?php echo base_url();?>img/05.png" alt="">
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            $(".nav li").hover(function(){
                $(this).find('.childcontent').stop(true, true).slideDown();
            },function(){
                $(this).find('.childcontent').stop(true, true).slideUp();
            })
        });
    </script>