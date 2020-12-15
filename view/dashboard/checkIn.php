<?php include 'templates/header.php'; 
$titlePage = "Reservan Asiento";
$subPage = "Reservan Asiento";
$activeVuelos = "active";
$listaAsientos = $asientoRutaBO->getAllBySchedule($_GET['id']);
$horario = $horariBO->getById($_GET['id']);
$avion = $avionBO->getById($horario->getIdCatalogo_avion());
$ruta = $rutaBO->getById($horario->getIdRuta());
$tipoAvion = $tipoAvionBO->getById($avion->getIdTipo_Avion());

$filas = $tipoAvion->getCant_filas();
$asientosPoFila = $tipoAvion->getCant_pasajeros();
$pasillosTotal = 3;
$asientosPasillo1 = 3;
$asientosPasillo2 = $tipoAvion->getCant_pasajeros() - $asientosPasillo1;

$counterFilas = $counterPasillos = $counterAsientos =  $counterAsientosPorTD = 1;
if($asientosPoFila == 8){
  $asientosPasillo1 = $asientosPasillo2 = 4;
}else if($asientosPoFila == 9){
  $pasillosTotal = 5;
  $asientosPasillo2 = $asientosPasillo1;
}
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
                  <h3 class="card-title">Lista de asientos para <?php echo $ruta->getRuta()." ".$avion->getNombre_Avion()." ".$horario->getFecha()." ".$horario->getHoraDespliegue();?></h3>
                    <div class="text-right">
                      <a href="vuelos.php" class="btn btn-default text-info">Regresar a vuelos</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formAddReserva' method='POST' onsubmit="return ValidateFormAddReserva();">
                <input type="hidden" name='addReserva' value="1" />
                <input type="hidden" name="idAsientos" id="idAsientos" value="">
                <div class="card-body">
                    <table class='table'>
                        <td style="width: 55%"></td>
                        <td style="width: 45%">
                          <table style="width: 100%">
                            <?php while($counterFilas <= $filas) { ?>
                              <tr>
                                <?php while ($counterPasillos <= $pasillosTotal) { 
                                  if(($counterPasillos % 2) == 0){ ?>
                                    <td style="width: 10%; background-image: url('../assets/img/road.png'); background-size: 100%; padding-top: 0px; padding-bottom: 0px;"></td>
                                  <?php } else{  ?>
                                    <td <?php if($counterPasillos== 1){ ?> class='text-right' <?php }?>>
                                      <?php
                                      $validacion = ($asientosPasillo1);
                                      if($counterPasillos != 1){
                                        $validacion = ($asientosPasillo2);
                                      }
                                      while($counterAsientosPorTD <= $validacion && $counterAsientos <= $tipoAvion->getCant_asientos()){
                                        $class = "btn-default";
                                        $method = "";

                                        if($listaAsientos[$counterAsientos-1]['Estado'] != "Disponible"){
                                          $class = "btn-danger";
                                          $method = "SetReserva(".$listaAsientos[$counterAsientos-1]['idAsiento_Ruta'].");";
                                        }
                                        ?>
                                        <button type='button' id="asientoReserva<?php echo $listaAsientos[$counterAsientos-1]['idAsiento_Ruta'];?>" class="btn <?php echo $class; ?> btn-sm"><img src="../assets/img/asiento.png" onclick="<?php echo $method; ?>" style="width: 15px;"></button>
                                      <?php $counterAsientosPorTD++;
                                        $counterAsientos++;
                                      }
                                      $counterAsientosPorTD = 1;?>
                                    </td>
                                  <?php }
                                  $counterPasillos++; ?>
                                <?php }
                                $counterPasillos = 1; ?>
                              </tr>
                            <?php $counterFilas++;
                            } ?>
                          </table>
                        </td>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info">Guardar reserva</button>
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