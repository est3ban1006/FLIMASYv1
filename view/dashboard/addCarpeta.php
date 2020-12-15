<?php include 'templates/header.php'; 
$titlePage = "Nueva Carpeta";
$subPage = "Nueva Carpeta";
$activeGaleria = "active";
?>
<div class="wrapper">

  <?php include 'templates/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php include 'templates/breadcumb.php'; ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <!-- Horizontal Form -->
            <div class="card card-info col-lg-12">
              <div class="card-header">
                  <h3 class="card-title">Completar la informaci&oacute;n</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formAddCarpeta' method='POST' onsubmit="return ValidateFormAddCarpeta();">
                <input type="hidden" name='addCarpeta' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 50%;">
                                <div class="form-group ">
                                    <label for="ruta" class="col-form-label">Nombre</label><br>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Carpeta" value="<?php echo $nombreCarpeta;?>">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info">Guardar informacion</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'templates/footer.php'; ?>
