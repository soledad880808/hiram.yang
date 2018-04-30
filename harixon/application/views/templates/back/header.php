<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?php echo base_url('images/icon/favicon.ico');?>" type="image/x-icon"></link>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
          <script src="http://cdn.bootcss.co
      <![endif]-->
    <title>销售系统</title>
    <!-- jQuery 2.1.4 -->
    <script src="<?PHP echo base_url();?>dist/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?PHP echo base_url();?>js/public.js?20180403"></script>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/css/skins/_all-skins.min.css">
     <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/iCheck/all.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/fullcalendar/fullcalendar.print.css" media="print">
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/timepicker/bootstrap-timepicker.min.css">
    <script src="<?PHP echo base_url();?>dist/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?PHP echo base_url()?>dist/css/AdminLTE.min.css">
    <script src="<?PHP echo base_url()?>dist/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?PHP echo base_url()?>dist/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?PHP echo base_url()?>dist/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="<?PHP echo base_url()?>dist/plugins/knob/jquery.knob.js"></script>
    <!-- sweetalert -->
    <link rel="stylesheet" href="<?=base_url('css/sweet-alert.css')?>"/>

    <link rel="stylesheet" href="<?=base_url('css/sale.css')?>"/>
    <!-- artDialog -->
    <link rel="stylesheet" href="<?=base_url('dist/skins/default.css')?>" />
	<script>
		var domain = '<?=site_url()?>';
		var base_url='<?=base_url()?>',
			  domain = '<?=site_url()?>',
        TOB = '<?php echo TOB;?>',
        pagesize = 20,
        example_url = domain + 'dist/example/';
		$(function(){
			$('#loginout').click(function(){
				var send_url='<?=site_url('admin_ajax/loginout')?>';
				$.getJSON(send_url,function(obj){
					if(obj.code==1){
						window.location.href=domain+'admin/login';
					}
				});
			});
			$('#changepwd').click(function(){
				artDialog({
                    title: '更改密码',
                    show: true,
                    content: document.getElementById('J-change-pwd'),
                    lock:true,
                    ok: function () {
                        var send_url='<?php echo site_url('admin_ajax/updatePwd');?>';
                        var oldpwd=$('#oldpwd').val();
                        var newpwd=$('#newpwd').val();
                        var newpwd2=$('#newpwd2').val();
                        if(!oldpwd||!newpwd||!newpwd2){
                            alert('密码不能为空');
                            return false;
                        }
                        if(newpwd!=newpwd2){
                            alert('新密码不一致');
                            return false;
                        }
                        public_ajax({'sendType':'POST','cove':0,'sendUrl':send_url,"param":'oldpwd='+oldpwd+'&newpwd='+newpwd+'&newpwd2='+newpwd2},$(this),function(obj){
                            $('#oldpwd').attr('value','');
                            $('#newpwd').attr('value','');
                            $('#newpwd2').attr('value','');
                            if(obj.code==1){
                                alert('更新成功!');
                            }else if(obj.code==2){
                                alert('老密码错误!');
                            }else{
                                alert('更新失败!');
                            }
                        });
                    },
                    cancelVal: '关闭',
                    cancel: true 
                });
			});
            $('#J-remind-menu').click(function(e){
                t = e.target;
                $('#J-remind').on('hide.bs.dropdown', function () {
                    if($(this)[0].contains(t)){
                        $('#J-remind').off('hide.bs.dropdown');
                        return false;
                    }    
                });
            });
            
            $('.J-remind-sel').click(function(){
                var category = $(this).attr('category');
                var header = '';
                switch(category){
                    case '1':
                        var header = '服务到期提醒：';
                        break;
                    case '2':
                        var header = '库存到期提醒：';
                        break;
                }
                $('#J-remind-delbatch').attr('category',category);
                $('#J-remind-header').text(header);
                $('.J-remind-content').hide();
                $('#J-remind-' + category).show();
            });

            $('.J-remind-del').click(function(){
                var id = $(this).attr('value'),
                    url = domain + 'schedule/delRemindById';
                var param = {
                    'id':id
                };
                var remind_obj= $(this).parent().parent();
                ajaxRequest(url,param,function(obj){
                    if(obj.code == 1){
                        $('#J-remind-count').text($('#J-remind-count').text()-1);
                        remind_obj.remove();
                    }else{
                        error(obj.desc);    
                    }         
                });
            });

            $('#J-remind-delbatch').click(function(){
                var category = $(this).attr('category');
                    url = domain + 'schedule/delSelfRemindByCategory';
                var param = {
                    'category':category    
                };
                ajaxRequest(url,param,function(obj){
                    if(obj.code == 1){
                        $('#J-remind-count').text($('#J-remind-count').text() - $('#J-remind-' + category + ' li').length);
                        $('#J-remind-' + category + ' .menu').empty();
                    }else{
                        error(obj.desc);    
                    }
                });
            });

            $('.J-behavior').click(function(){
                var corporation_id = $(this).attr('value');
                location.href = domain + 'statistic/showCustomerBehavior?corporation_id=' + corporation_id;
            });
		});
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
      	<header class="main-header">
        <!-- Logo -->
        <a href="<?PHP echo site_url()?>" class="logo">
         	 <!-- logo for regular state and mobile devices -->
          	<span class="logo-lg">销售系统</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            	<span class="sr-only">Toggle navigation</span>
          	</a>
         	<div class="navbar-custom-menu">
           		<ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
                    <li id="J-remind" class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span id="J-remind-count" class="label label-warning"><?php echo $_remindlist['total']?></span>
                        </a>
                        <ul id="J-remind-menu" class="dropdown-menu">
                            <li class="header"><span id="J-remind-header">服务到期提醒：</span><button class="btn btn-xs btn-danger pull-right" id="J-remind-delbatch" category="1">一键删除</button></li>
                            <li id="J-remind-1" class="J-remind-content">
                                <ul class="menu">
                                    <?php
                                        if(!empty($_remindlist['remindlist'][1])){
                                            foreach($_remindlist['remindlist'][1] as $key => $value){
                                                $str = $value['endtime'] . $value['name'] . '有服务到期'; 
                                                echo '<li title="' . $str . '"><a href="#"><i class="fa fa-times text-gray J-remind-del" value="' . $value['id'] . '"></i><span class="J-behavior" value="' . $value['corporation_id'] . '">' . $str . '</span></a></li>';
                                            }    
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li id="J-remind-2" class="J-remind-content" style="display:none;">
                                <ul class="menu">
                                    <?php
                                        if(!empty($_remindlist['remindlist'][2])){
                                            foreach($_remindlist['remindlist'][2] as $key => $value){
                                                $str = $value['endtime'] . $value['name']; 
                                                echo '<li title="' . $str . '"><a href="#"><i class="fa fa-times text-gray J-remind-del" value="' . $value['id'] . '"></i>' . $str . '</a></li>';
                                            }    
                                        }
                                    ?>
                                </ul>
                            </li>

                            <li class="footer">
                                <ul class="nav nav-tabs pull-right">
                                    <li><a href="#" class="btn btn-xs text-black J-remind-sel" category="2" data-toggle="tab">库容</a></li>
                                    <li class="active"><a href="#" class="btn btn-xs text-black J-remind-sel" category="1" data-toggle="tab">服务</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?PHP echo base_url()?>dist/img/user2.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?PHP echo $_SESSION['name']?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?PHP echo base_url()?>dist/img/user2.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?PHP echo $_SESSION['name'];?>
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
