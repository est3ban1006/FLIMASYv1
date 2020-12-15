<?php include 'templates/header.php'; 
$titlePage = "Nuevo Horario";
$subPage = "Nuevo Horario";
$activeHorarios = $activeAirplane = "active";
$openAirplane = " menu-open";
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
              <form class="form-horizontal" id='formAddHorario' method='POST' onsubmit="return ValidateFormAddHorario();">
                <input type="hidden" name='addHorario' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 50%;">
                                <div class="form-group">
                                  <label>Ruta</label>
                                  <select class="form-control" id="ruta" name="ruta">
                                    <option value="">Seleccion una opcion</option>
                                    <?php foreach ($rutas as $ruta) { ?>
                                        <option value="<?php echo $ruta['idRuta'];?>" <?php if($newRutaHorario == $ruta['idRuta']){echo "selected";}?>><?php echo $ruta['Ruta']." (".$ruta['Duracion']."
                                        )";?> </option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group ">
                                    <label for="fecha" class="col-form-label">Fecha</label><br>
                                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="<?php echo $newDateHorario;?>">
                                </div> 
                                <div class="form-group ">
                                    <label for="precio" class="col-form-label">Precio ($)</label><br>
                                    <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio" value="<?php echo $newPrecioHorario;?>">
                                </div> 
                                <div class="form-group">
                                  <label>Descuento</label>
                                  <select class="form-control" id="descuento" name="descuento">
                                    <option value="">Seleccion una opcion</option>
                                    <?php foreach ($descuentos as $descuento) { ?>
                                        <option value="<?php echo $descuento['idDescuento'];?>" <?php if($newDescuentoHorario == $descuento['idDescuento']){echo "selected";}?>><?php echo $descuento['Nombre'];?> </option>
                                    <?php } ?>
                                  </select>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label>Avion</label>
                                    <select class="form-control" id="avion" name="avion">
                                      <option value="">Seleccion una opcion</option>
                                      <?php foreach ($aviones as $avion) { ?>
                                          <option value="<?php echo $avion['idCatalogo_avion'];?>" <?php if($newAvionHorario == $avion['idCatalogo_avion']){echo "selected";}?>><?php echo $avion['NombreAvion'];?> </option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                <div class="form-group ">
                                    <label for="horaDespliegue" class="col-form-label">Hora de Despliegue</label><br>
                                    <input type="time" class="form-control" name="horaDespliegue" id="horaDespliegue" placeholder="Hora de Despliegue"  value="<?php echo $newHoraDespliegueHorario;?>">
                                </div>
                                <div class="form-group ">
                                    <label for="cantAsientosDispo" class="col-form-label">Cantidad de Asientos Disponibles</label><br>
                                    <input type="number" class="form-control" name="cantAsientosDispo" id="cantAsientosDispo" min="1" placeholder="Cantidad de Asientos Disponibles"  value="<?php echo $cantAsientosHorario;?>">
                                </div>
                                <div class="form-group ">
                                    <label for="cantAsientosDescuento" class="col-form-label">Cantidad de Asientos con descuento</label><br>
                                    <input type="number" class="form-control" name="cantAsientosDescuento" id="cantAsientosDescuento" placeholder="Cantidad de Asientos con Descuento"  value="<?php echo $cantAsientosDescuento;?>">
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
