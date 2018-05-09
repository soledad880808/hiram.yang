<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?PHP echo base_url();?>dist/img/user2.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>管理员</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <ul class="sidebar-menu">
        <?php
            $current_url = current_url();
            $url_ar = explode('?',$current_url);
            $url_arr = explode('/',$url_ar[0]);
            $suffix = array_pop($url_arr);
            foreach($_back_left as $key => $value){
                if(in_array($suffix,$value['active'])){
                    echo '<li class="active"><a href="' . site_url($value['url']) . '"><i class="fa fa-circle"></i> <span>' . $value['name'] . '</span></a></li>';
                }else{
                    echo '<li><a href="' . site_url($value['url']) . '"><i class="fa fa-circle"></i> <span>' . $value['name'] . '</span></a></li>';
                }
                   
            }    
        ?>
    </ul>
</section>
<!-- /.sidebar -->
</aside>
<div class="content-wrapper">