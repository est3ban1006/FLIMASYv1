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
                          <th>Monto Total</th>
                          <th>Descuento</th>
                          <th>Tipo Cambio</th>
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
                          <th>Cliente</th>
                          <th>Fecha</th>
                          <th>Ruta</th>
                          <th>Avion</th>
                          <th>Cant Asientos</th>
                          <th>Hora Despliegue</th>
                          <th>Monto Total</th>
                          <th>Descuento</th>
                          <th>Tipo Cambio</th>
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
