<?php include 'templates/header.php'; 
$titlePage = "Editar Horario";
$subPage = "Editar Horario";
$activeHorarios = $activeAirplane = "active";
$openAirplane = " menu-open";
$horario = $horariBO->getById($_GET['id']); 
$rutas = $rutaBO->getAllByEmpresa($currentCompany->getIdEmpresa());
$aviones = $avionBO->getAllByEmpresa($currentCompany->getIdEmpresa());
$descuentos = $descuentoBO->getAllByEmpresa($currentCompany->getIdEmpresa());
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
              <form class="form-horizontal" id='formUpdateHorario' method='POST' onsubmit="return ValidateFormUpdateHorario();">
                <input type="hidden" name='updateHorario' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 50%;">
                                <div class="form-group">
                                  <label>Ruta</label>
                                  <select class="form-control" id="ruta" name="ruta">
                                    <option value="">Seleccion una opcion</option>
                                    <?php foreach ($rutas as $ruta) { ?>
                                        <option value="<?php echo $ruta['idRuta'];?>" <?php if($horario->getIdRuta() == $ruta['idRuta']){echo "selected";}?>><?php echo $ruta['Ruta']." (".$ruta['Duracion']."
                                        )";?> </option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group ">
                                    <label for="fecha" class="col-form-label">Fecha</label><br>
                                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="<?php echo $horario->getFecha();?>">
                                </div> 
                                <div class="form-group ">
                                    <label for="precio" class="col-form-label">Precio ($)</label><br>
                                    <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio" value="<?php echo $horario->getPrecio();?>">
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Avion</label>
                                    <select class="form-control" id="avion" name="avion">
                                      <option value="">Seleccion una opcion</option>
                                      <?php foreach ($aviones as $avion) { ?>
                                          <option value="<?php echo $avion['idCatalogo_avion'];?>" <?php if($horario->getIdCatalogo_avion() == $avion['idCatalogo_avion']){echo "selected";}?>><?php echo $avion['NombreAvion'];?> </option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                <div class="form-group ">
                                    <label for="horaDespliegue" class="col-form-label">Hora de Despliegue</label><br>
                                    <input type="time" class="form-control" name="horaDespliegue" id="horaDespliegue" placeholder="Hora de Despliegue"  value="<?php echo $horario->getHoraDespliegue();?>">
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
