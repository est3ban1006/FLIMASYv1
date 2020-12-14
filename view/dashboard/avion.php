<?php include 'templates/header.php'; 
$titlePage = "Inicio";
$subPage = "Descuentos";
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
                  <h3 class="card-title">Actualizar mi informaci&oacute;n</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formUpdateProfile' method='POST' onsubmit="return ValidateFormUpdatePerson();">
                <input type="hidden" name='updateProfile' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="nombreAvion" class="col-form-label">Nombre del Avion</label><br>
                                    <input type="text" class="form-control" name="nombreAvion" id="nombreAvion" placeholder="Nombre del Avion" value="<?php echo $currentPerson->getNombre();?>">
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