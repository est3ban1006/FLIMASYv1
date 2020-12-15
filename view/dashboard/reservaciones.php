<?php include 'templates/header.php'; 
$titlePage = "Reservaciones";
$subPage = "Reservaciones";
$activeRes = "active";
$reservas = $reservaBO->getAll();
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
                  <h3 class="card-title">Lista de Reservaciones</h3>
                  <div class="text-right">
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Cliente</th>
                          <th>Fecha</th>
                          <th>Ruta</th>
                          <th>Avion</th>
                          <th>Cant Asientos</th>
                          <th>Hora Despliegue</th>
                          <th>Hora Llegada</th>
                          <th>Duracion</th>
                          <th>Monto Total</th>
                          <th>Descuento</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($reservas as $reserva) { 
                          $person = $personaBO->getById($reserva['idPersona']);
                          $asientos = $asientoReservaBO->getAllByReserva($reserva['idReserva']);
                          
                          $counter = 0;
                          $fechaText = $rutaText = $avionText = $horaSalida = $horoaLLegada = $duracionText = "";
                          foreach ($asientos as $key) {
                            if($counter == 0){
                              //TRAER LA RUTA Y EL AVION9
                              $asientoAvion = $asientoRutaBO->getById($key['idAsiento_Avion']);
                              $horario = $horariBO->getById($asientoAvion['idRuta']);
                              $ruta = $rutaBO->getById($horario->getIdRuta());
                              $avion = $avionBO->getById($horario->getIdCatalogo_avion());

                              $fechaText = $horario->getFecha();
                              $rutaText = $ruta->getRuta();
                              $avionText = $avion->getNombre_Avion();
                              $horaSalida = $horario->getHoraDespliegue();
                              $horoaLLegada = $horario->getHoraLlegada();
                              $duracionText = $ruta->getDuracion();
                            }
                            $counter++;
                          } ?>
                          <tr>
                              <td><?php echo $persona->getFullName(); ?></td>
                              <td><?php echo $fechaText; ?></td>
                              <td><?php echo $avionText; ?></td>
                              <td><?php echo $counter; ?></td>
                              <td><?php echo $horaSalida; ?></td>
                              <td><?php echo $horoaLLegada; ?></td>
                              <td><?php echo $duracionText; ?></td>
                              <td><?php echo $reserva['Monto_total']; ?></td>
                              <td><?php echo $reserva['Monto_total']; ?></td>
                              <td><?php echo $reserva['Descuento']; ?></td>
                              <td><a type="button" class="btn btn-sm btn-info" href="generateInvoice.php?id=<?php echo $reserva[0]; ?>" >Factura</a></td>
                          </tr>
                      <?php }  ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>Cliente</th>
                          <th>Fecha</th>
                          <th>Ruta</th>
                          <th>Avion</th>
                          <th>Cant Asientos</th>
                          <th>Hora Despliegue</th>
                          <th>Hora Llegada</th>
                          <th>Duracion</th>
                          <th>Monto Total</th>
                          <th>Descuento</th>
                          <th></th>
                        </tr>
                    </tfoot>
                  </table>
              </div>
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

<script type="text/javascript">
  jQuery(document).ready(function () {
    initTable("#example1");
  });
</script>
