<?php include 'templates/header.php'; 
$titlePage = "Tipo de Avion";
$subPage = "Tipo de Avion";
$activeTipoAvion = $activeAirplane = "active";
$openAirplane = " menu-open";
$listaTipos = $tipoAvionBO->getAllByEmpresa($currentCompany->getIdEmpresa());
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
                  <h3 class="card-title">Lista de Tipos de Aviones</h3>
                  <div class="text-right">
                      <a href="addTipoAvion.php" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Tipo de Avion</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeleteTipoAvion' method='POST'>
                <br>
                <div class="col-lg-12">
                  <h5 class="text-info">Los registros que no tengan la opcion de eliminar es porque ya tienen aviones relacionados.</h5>
                </div>
                <input type="hidden" name='deleteTipoAvion' value="1" />
                <input type="hidden" name='idDelete' id="idDelete" value="" />
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Año</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Cantidad de Filas</th>
                            <th>Cantidad de Pasajeros</th>
                            <th>Cantidad de Asientos</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaTipos as $tipo) { 
                            $aviones = $avionBO->getAllByTipo($tipo[0]);
                            $countAviones = 0;
                            foreach ($aviones as $key => $value) {
                              $countAviones++;
                            } 
                          ?>
                            <tr>
                                <td><?php echo $tipo[2]; ?></td>
                                <td><?php echo $tipo["Modelo"]; ?></td> 
                                <td><?php echo $tipo["Marca"]; ?></td> 
                                <td><?php echo $tipo["Cant_pasajeros"]; ?></td> 
                                <td><?php echo $tipo["Cant_filas"]; ?></td> 
                                <td><?php echo $tipo["Cant_asientos"]; ?></td> 
                                <td><a href="editTipoAvion.php?id=<?php echo $tipo["idTipo_Avion"]; ?>" type="button" class="btn btn-sm btn-info">Editar</a> 
                                  <?php if(($countAviones) == 0){ ?>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="ConfirmDeleteTipoAvion(<?php echo $tipo["idTipo_Avion"]; ?>);">Eliminar</button></td>
                                  <?php } ?>
                            </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Año</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Cantidad de Filas</th>
                            <th>Cantidad de Pasajeros</th>
                            <th>Cantidad de Asientos</th>
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