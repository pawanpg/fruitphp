      
     
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <?php  date_default_timezone_set("Asia/Kolkata");
         echo "" . date("Y/m/d h:i:sa") . "<br>";?>
        <strong>Copyright &copy; 2018-<?php echo date("Y");?> <a href="<?php echo $url;?>/index.php">Fruit Bazar</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo $url; ?>/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $url; ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo $url; ?>/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo $url; ?>/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $url; ?>/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>