<?php include 'templates/header.php'; 
$titlePage = "Inicio";
$subPage = "Rutas";
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
                                    <label for="ruta" class="col-form-label">Ruta</label><br>
                                    <input type="text" class="form-control" name="ruta" id="ruta" placeholder="Ruta" value="<?php echo $currentPerson->getNombre();?>">
                                </div>                              
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="duracion" class="col-form-label">Duracion</label><br>
                                    <input type="text" class="form-control" name="duracion" id="duracion" placeholder="Duracion"  value="<?php echo $currentPerson->getApellido2();?>">
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
