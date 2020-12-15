<?php include 'templates/header.php'; 
$titlePage = "Rutas";
$subPage = "Rutas";
$activeHorarios = $activeAirplane = "active";
$openAirplane = " menu-open";
$listaAsientos = $asientoRutaBO->getAllBySchedule($_GET['id']);
$horario = $horariBO->getById($_GET['id']);
$avion = $avionBO->getById($horario->getIdCatalogo_avion());
$ruta = $rutaBO->getById($horario->getIdRuta());
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
                    <a href="staffHorario.php" class="btn btn-default text-info">Regresar a Horarios</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeleteAsientoRuta' method='POST'>
                <input type="hidden" name='deleteAsientoRuta' value="1" />
                <input type="hidden" name='idDelete' id="idDelete" value="" />
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th># Asiento</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Descuento</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaAsientos as $asient) { 
                          $nombreDescuento = "";
                          if($asient['idDescuento'] != 0){
                            $descuento = $descuentoBO->getById($asient['idDescuento']);
                            if(!empty($descuento)){
                              $nombreDescuento = $descuento->getNombre()." (".$descuento->getPorcentaje()."%)";
                            }
                          }
                          ?>
                            <tr>
                                <td><?php echo $asient["NumeroAsiento"]; ?></td>
                                <td><?php echo $asient["Precio"]; ?></td>      
                                <td><?php echo $asient["Estado"]; ?></td>    
                                <td><?php echo $nombreDescuento; ?></td>                                       
                                <td><button type="button" class="btn btn-sm btn-danger" onclick="ConfirmDeleteAsientoRuta(<?php echo $asient["idAsiento_Ruta"]; ?>);">Eliminar</button></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th># Asiento</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Descuento</th>
                            <th></th>
                          </tr>
                      </tfoot>
                  </table>
                </div>
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

<script type="text/javascript">
  jQuery(document).ready(function () {
    initTable("#example1");
  });
</script>
