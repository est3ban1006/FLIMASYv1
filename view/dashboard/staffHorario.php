<?php include 'templates/header.php'; 
$titlePage = "Horarios";
$subPage = "Horarios";
$activeHorarios = $activeAirplane = "active";
$openAirplane = " menu-open";

$listaHorarios = array();
$listRutas = $rutaBO->getAllByEmpresa($currentCompany->getIdEmpresa());
foreach ($listRutas as $ruta) {
  $horariosPorRuta = $horariBO->getAllByRuta($ruta['idRuta']);
  foreach ($horariosPorRuta as $hor) {
    array_push($listaHorarios, $hor);
  }
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
                  <h3 class="card-title">Lista de Horarios</h3>
                  <div class="text-right">
                      <a href="addHorario.php" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Horario</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeleteHorario' method='POST'>
                <input type="hidden" name='deleteHorario' value="1" />
                <input type="hidden" name='idDelete' id="idDelete" value="" />

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Ruta</th>
                            <th>Avion</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th>Hora de Despliegue</th>
                            <th>Hora de Llegada</th>
                            <th># Asientos Disponibles</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaHorarios as $staffHorario) { 
                            $ruta = $rutaBO->getById($staffHorario['idRuta']);
                            $avion = $avionBO->getById($staffHorario['idCatalogo_avion']);
                          ?>
                              <tr>
                                  <td><?php echo $ruta->getRuta(); ?></td>
                                  <td><?php echo $avion->getNombre_Avion(); ?></td>
                                  <td><?php echo $staffHorario["Fecha"]; ?></td>
                                  <td><?php echo $staffHorario["Status"]; ?></td>
                                  <td><?php echo $staffHorario["Precio"]; ?></td>
                                  <td><?php echo $staffHorario["HoraDespliegue"]; ?></td>
                                  <td><?php echo $staffHorario["HoraLlegada"]; ?></td>
                                  <td><?php echo $staffHorario["Cant_AsientosDisponibles"]; ?></td>
                                  <td><a type="button" class="btn btn-sm btn-info" href="editHorario.php?id=<?php echo $staffHorario["idHorario_Ruta"]; ?>" title="Editar"><i class="fas fa-edit"></i></a> <a type="button" class="btn btn-sm btn-warning" href="seeAsientos.php?id=<?php echo $staffHorario["idHorario_Ruta"]; ?>" title='Ver asientos'><i class="fa fa-eye"></i></a> <button type="button" title='Eliminar' class="btn btn-sm btn-danger" onclick="ConfirmDeleteHorario(<?php echo $staffHorario["idHorario_Ruta"]; ?>);"><i class="fa fa-trash"></i></button></td>
                              </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Ruta</th>
                            <th>Avion</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th>Hora de Despliegue</th>
                            <th>Hora de Llegada</th>
                            <th># Asientos Disponibles</th>
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

