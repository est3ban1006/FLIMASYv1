            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
              <strong>Copyright &copy; <?php echo date('Y');?> <a href="http://localhost/FLIMASY_v1/view/website/siteView.php">FLIMASY</a>.</strong>
              Todos los derechos reservados.
              <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.1
              </div>
            </footer>
          </div>
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE -->
        <script src="dist/js/adminlte.js"></script>
        <script src="dist/js/functions.js"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard3.js"></script>

        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="plugins/jszip/jszip.min.js"></script>
        <script src="plugins/pdfmake/pdfmake.min.js"></script>
        <script src="plugins/pdfmake/vfs_fonts.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
        
        <?php if(!empty($typeAlert)){
            if($typeAlert == 1){
                echo "<script>alertify.success('".$msgAlert."');</script>";
            }else if($typeAlert == 2){
                echo "<script>alertify.error('".$msgAlert."');</script>";
            }
        }?>
    </body>
</html>