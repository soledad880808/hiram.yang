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
            <p><?PHP echo $_SESSION['name']?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <ul class="sidebar-menu">
        <?php
            foreach($_left as $key => $value){
                if(isset($value['list'])){
                    $html = '';
                    foreach($value['list'] as $k => $v){
                        if(in_array($v['key'],$_auth)){
                            $html .= '<li class="' . $v['active'] . '"><a href="' . site_url($v['url']) .'"><i class="fa fa-circle-o"></i> ' . $v['title'] . '</a></li>';
                        }
                    }
                    if(!empty($html)){
                        echo '<li class="treeview">';
                        echo '<a href="#"><i class="fa fa-dashboard"></i> <span>' . $value['title'] . '</span> <i class="fa fa-angle-left pull-right"></i></a>';
                        echo '<ul class="treeview-menu">';
                        echo $html;
                        echo '</ul></li>';
                    }
                }else{
                    if(in_array($value['key'],$_auth)){
                        echo '<li class="' . $value['active'] . '"><a href="' . site_url($value['url']) . '"><i class="fa fa-circle"></i> <span>' . $value['title'] . '</span></a></li>';    
                    }
                }
            }    
        ?>
    </ul>
</section>
<!-- /.sidebar -->
</aside>
<div class="content-wrapper">
<script>
    $(function(){
        var url = location.href;
        var url_ar = url.split('/');
        var a = '';
        while(a == ''){
            a = url_ar.pop();
        }
        var c = url_ar.pop();
        var a_ar = a.split('?');
        var active = a_ar.shift().replace('#','');
        if($('.' + active)[0]){
            $('.' + active).addClass('active');
            if($('.' + active).parent().hasClass('treeview-menu')){
                $('.' + active).parent().parent().addClass('active');
                $('.' + active).parent().show();
            }
        }
    });
</script>
