<?php include 'templates/header.php'; 
$titlePage = "Factura";
$subPage = "Factura";
$activeRes = "active";
$reserva = $reservaBO->getById($_GET['id']);
$person = $personaBO->getById($reserva->getIdPersona());
$asientos = $asientoReservaBO->getAllByReserva($reserva->getIdReserva());

$counter = 0;
$fechaText = $rutaText = $avionText = $horaSalida = $horoaLLegada = $duracionText = "";
foreach ($asientos as $key) {
  //TRAER LA RUTA Y EL AVION9
  $asientoAvion = $asientoRutaBO->getById($key['idAsiento_Avion']);
  $horario = $horariBO->getById($asientoAvion->getIdRuta());
  $ruta = $rutaBO->getById($horario->getIdRuta());
  $avion = $avionBO->getById($horario->getIdCatalogo_avion());

  $fechaText = $horario->getFecha();
  $rutaText = $ruta->getRuta();
  $avionText = $avion->getNombre_Avion();
  $horaSalida = $horario->getHoraDespliegue();
  $horoaLLegada = $horario->getHoraLlegada();
  $duracionText = $ruta->getDuracion();
  break;
}

$numeroInvoice = "000".$_GET['id'];
if($_GET['id'] > 9){
  $numeroInvoice = "00".$_GET['id'];
}elseif($_GET['id'] > 99){
  $numeroInvoice = "0".$_GET['id'];
}if($_GET['id'] > 999){
  $numeroInvoice = $_GET['id'];
}
$count = 0;
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
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class=" fas fa-plane"></i> <?php echo $currentCompany->getNombre_empresa(); ?>.
                    <small class="float-right">Date: <?php echo $reserva->getFecha_creacion();?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  De
                  <address>
                    <strong><?php echo $currentCompany->getNombre_empresa(); ?>.</strong><br>
                    <?php echo $currentCompany->getDireccion(); ?><br>
                    Telefono: <?php echo $currentCompany->getTelefono(); ?><br>
                    Correo: <?php echo $currentCompany->getEmail(); ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Para
                  <address>
                    <strong><?php echo $person->getFullName();?> </strong><br>
                    Cedula: <?php echo $person->getCedula();?><br>
                    Telefono: <?php echo $person->getTelefono();?><br>
                    Correo: <?php echo $person->getCorreo();?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?php echo $numeroInvoice;?></b><br>
                  <br>
                  <b>Fecha vuelo:</b> <?php echo $reserva->getDiaReserva();?><br>
                  <b>Vuelo:</b> <?php echo $avion->getNombre_avion();?><br>
                  <b>Ruta:</b>  <?php echo $ruta->getRuta();?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Numero Asiento</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($asientos as $asiento) { 
                        $count++;
                        $asientoAvion = $asientoRutaBO->getById($asiento['idAsiento_Avion']);?>
                        <tr>
                          <td><?php echo $count;?></td>
                          <td><?php echo $asientoAvion->getNumeroAsiento();?></td>
                          <td><?php echo $asiento['Precio'];?></td>
                          <td><?php echo $asiento['Descuento'];?></td>
                          <td><?php echo $asiento['Precio']-$asiento['Descuento'];?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Metodos de Pago:</p>
                  <img src="dist/img/credit/visa.png" alt="Visa">
                  <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="dist/img/credit/american-express.png" alt="American Express">
                  <img src="dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                  <!--<button type="button" class="btn btn-warning float-right">Consultar Precio en Colones
                  </button>-->
                  <p class="text-muted well well-sm shadow-none" id="tipoCambioP" style="margin-top: 10px;">

                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Desglose de pago</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$<?php echo $reserva->getMonto_total()+$reserva->getDescuento();?></td>
                      </tr>
                      <tr>
                        <th>Descuento</th>
                        <td>$<?php echo $reserva->getDescuento();?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$<?php echo $reserva->getMonto_total();?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Realizar Pago
                  </button>
                  <button type="button" onclick="window.print();" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Imprimir
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
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

    consultarTipoCambio();  
  });
</script>

.