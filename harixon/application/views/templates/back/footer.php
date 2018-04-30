    </div>
    </body>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2012-<?PHP echo date('Y')?> <a href="http://www.harixon.com">harixon</a>.</strong> All rights reserved.
    </footer>
     <!-- jQuery UI 1.11.4 -->
    <script src="<?PHP echo base_url();?>dist/js/jquery-ui-1.11.4.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?PHP echo base_url();?>dist/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?PHP echo base_url();?>dist/js/app.min.js"></script>
     <!-- iCheck 1.0.1 -->
    <script src="<?PHP echo base_url()?>dist/plugins/iCheck/icheck.min.js"></script>
    <!-- fullCalendar 2.2.5-->
    <script src="<?PHP echo base_url()?>dist/js/moment.min.js"></script>
    <script src="<?PHP echo base_url()?>dist/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?PHP echo base_url()?>dist/plugins/fullcalendar/zh-cn.js"></script>
    <script src="<?PHP echo base_url()?>dist/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?PHP echo base_url()?>dist/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- datepicker zh-CN -->
    <script src="<?PHP echo base_url()?>dist/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <!-- SlimScroll -->
    <script src="<?PHP echo base_url()?>dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <script src="<?PHP echo base_url()?>dist/plugins/select2/select2.full.min.js"></script>
    <!-- sweetalert -->
    <script src="<?=base_url('js/sweet-alert.min.js')?>"></script>
    <!-- artDialog -->
    <script src="<?=base_url('js/artDialog.source.js')?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?PHP echo base_url()?>dist/js/demo.js"></script>

    <script src="<?PHP echo base_url()?>js/ajaxfileupload.js"></script>
    <script src="<?PHP echo base_url()?>js/echarts.js"></script> 
    
</html>
<script>
    $(function(){
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
    });
</script>