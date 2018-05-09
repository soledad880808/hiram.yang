    </div>
    </body>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; <?PHP echo date('Y')?> <a href="http://www.harixon.com">harixon</a>.</strong> All rights reserved.
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
    <!-- SlimScroll -->
    <script src="<?PHP echo base_url()?>dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- datepicker -->
    <script src="<?PHP echo base_url()?>dist/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- datepicker zh-CN -->
    <script src="<?PHP echo base_url()?>dist/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <!-- sweetalert -->
    <script src="<?=base_url('js/sweet-alert.min.js')?>"></script>
    <!-- artDialog -->
    <script src="<?=base_url('js/artDialog.source.js')?>"></script>
    <script src="<?PHP echo base_url()?>js/ajaxfileupload.js"></script> 
</html>