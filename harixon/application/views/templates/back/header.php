<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link rel="shortcut icon" href="<?php echo base_url('images/icon/favicon.ico');?>" type="image/x-icon"></link>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
          <script src="http://cdn.bootcss.co
      <![endif]-->
    <title>harixon</title>
    <!-- jQuery 2.1.4 -->
    <script src="<?PHP echo base_url();?>dist/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?PHP echo base_url();?>js/public.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/css/skins/_all-skins.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/css/font-awesome.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/datepicker/datepicker3.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/css/AdminLTE.min.css">
    <!-- sweetalert -->
    <link rel="stylesheet" href="<?=base_url('css/sweet-alert.css')?>"/>
    <!-- artDialog -->
    <link rel="stylesheet" href="<?=base_url('dist/skins/default.css')?>" />
    <script>
        var domain = '<?php echo base_url();?>';
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
      	<header class="main-header">
        <!-- Logo -->
        <a href="<?PHP echo site_url()?>" class="logo">
         	 <!-- logo for regular state and mobile devices -->
          	<span class="logo-lg">harixon</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            	<span class="sr-only">Toggle navigation</span>
          	</a>
         	<div class="navbar-custom-menu">
           		<ul class="nav navbar-nav">

              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?PHP echo base_url()?>dist/img/user2.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">管理员</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?PHP echo base_url()?>dist/img/user2.jpg" class="img-circle" alt="User Image">
                    <p>
                      管理员
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" id="changepwd" class="btn btn-default btn-flat">修改密码</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" id="loginout" class="btn btn-default btn-flat">退出</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!--li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li-->
            </ul>
          </div>
        </nav>
      </header>
<div class="pop-up" style="display:none" id="J-change-pwd">
    <div class="form-horizontal">
		<div class="form-group">
			<input type="password" class="form-control" id='oldpwd' placeholder="旧密码"/>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" id='newpwd' placeholder="新密码"/>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" id='newpwd2' placeholder="再次输入新密码"/>
		</div>
    </div>
</div>
