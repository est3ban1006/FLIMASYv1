<?php include 'templates/header.php'; 
$titlePage = "Aviones";
$subPage = "Avioves";
$activeAvion = $activeAirplane = "active";
$openAirplane = " menu-open";
$listaAviones = $avionBO->getAllByEmpresa($currentCompany->getIdEmpresa());
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
                  <h3 class="card-title">Lista de Aviones</h3>
                  <div class="text-right">
                    <a href="addAvion.php?type=Avion" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Avion</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeleteAvion' method='POST'>
                <input type="hidden" name='deleteAvion' value="1" />
                <input type="hidden" name='idDelete' id="idDelete" value="" />
                <br>
                <div class="col-lg-12">
                  <h5 class="text-info">Los aviones con horario asignado no pueden eliminarse.</h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Tipo de Avion</th>
                            <th>Nombre</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaAviones as $staffAvion) { 
                            $tipo = $tipoAvionBO->getById($staffAvion['idTipo_Avion']);
                            $horarios = $horariBO->getAllByAvion($staffAvion[0]);
                            $counter = 0;
                            foreach ($horarios as $key => $value) {
                              $counter++;
                            } ?>
                            <tr>
                                <td><?php echo $tipo->getDetailTipoAvion(); ?></td>
                                <td><?php echo $staffAvion["NombreAvion"]; ?></td>
                                <td><a type="button" class="btn btn-sm btn-info" href="editAvion.php?id=<?php echo $staffAvion[0]; ?>" >Editar</a> <?php if ($counter == 0){ ?><button type="button" class="btn btn-danger" onclick="ConfirmDeleteAvion(<?php echo $staffAvion[0]; ?>);">Eliminar</button><?php } ?></td>
                            </tr>
                        <?php }  ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Nombre</th>
                            <th>Tipo de Avion</th>
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
