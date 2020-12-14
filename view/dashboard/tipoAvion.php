<?php include 'templates/header.php'; 
$titlePage = "Inicio";
$subPage = "Tipo de Aviones";
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
                                    <label for="modelo" class="col-form-label">Modelo</label><br>
                                    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="<?php echo $currentPerson->getNombre();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="marca" class="col-form-label">Marca</label><br>
                                    <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca"  value="<?php echo $currentPerson->getApellido1();?>">
                                </div>                                
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="cantFilas" class="col-form-label">Cantidad de Filas</label><br>
                                    <input type="text" class="form-control" name="cantFilas" id="cantFilas" placeholder="Cantidad de Filas"  value="<?php echo $currentPerson->getApellido2();?>">
                                </div>                       
                                <div class="form-group ">
                                    <label for="cantAasientos" class="col-form-label">Cantidad de Asientos</label><br>
                                    <input type="text" class="form-control" name="cantAasientos" id="cantAasientos" placeholder="Fecha Nacimiento"  value="<?php echo $currentPerson->getFechaNacimiento();?>">
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

