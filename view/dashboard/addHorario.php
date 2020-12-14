<?php include 'templates/header.php'; 
$titlePage = "Nuevo Horario";
$subPage = "Nuevo Horario";
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
              <form class="form-horizontal" id='formAddPerson' method='POST' onsubmit="return ValidateFormUpdateHorario();">
                <input type="hidden" name='addHorario' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="fecha" class="col-form-label">Fecha</label><br>
                                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="<?php echo $currentPerson->getNombre();?>">
                                </div> 
                                <div class="form-group ">
                                    <label for="status" class="col-form-label">Status</label><br>
                                    <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $currentPerson->getNombre();?>">
                                </div> 
                                <div class="form-group ">
                                    <label for="precio" class="col-form-label">Precio</label><br>
                                    <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" value="<?php echo $currentPerson->getNombre();?>">
                                </div> 
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="horaDespliegue" class="col-form-label">Hora de Despliegue</label><br>
                                    <input type="text" class="form-control" name="horaDespliegue" id="horaDespliegue" placeholder="Hora de Despliegue"  value="<?php echo $currentPerson->getApellido2();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="horaLlegada" class="col-form-label">Hora de Llegada</label><br>
                                    <input type="text" class="form-control" name="horaLlegada" id="horaLlegada" placeholder="Hora de Llegada"  value="<?php echo $currentPerson->getApellido2();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="cantAsientosDispo" class="col-form-label">Cantidad de Asientos Disponibles</label><br>
                                    <input type="text" class="form-control" name="cantAsientosDispo" id="cantAsientosDispo" placeholder="Cantidad de Asientos Disponibles"  value="<?php echo $currentPerson->getApellido2();?>">
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
