<?php include 'templates/header.php'; 
$titlePage = "Descuentos";
$subPage = "Descuentos";
$activeDescuentos = $activeAirplane = "active";
$openAirplane = " menu-open";
$listaDescuento = $descuentoBO->getAllByEmpresa($currentCompany->getIdEmpresa());
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
                  <h3 class="card-title">Lista de Descuentos</h3>
                  <div class="text-right">
                      <a href="addDescuento.php?type=Descuentos" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Descuento</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeleteDescuento' method='POST'>
                <input type="hidden" name='deleteDescuento' value="1" />
                <input type="hidden" name='idDelete' id="idDelete" value="" />

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Porcentaje</th>
                            <th>Valor</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaDescuento as $staffDescuento) { 
                          ?>
                              <tr>
                                  <td><?php echo $staffDescuento["Nombre"]; ?></td>
                                  <td><?php echo $staffDescuento["Porcentaje"]; ?></td>
                                  <td><?php echo $staffDescuento["Valor"]; ?></td>
                                  <td><button type="button" class="btn btn-danger" onclick="ConfirmDeleteDescuento(<?php echo $staffDescuento["idDescuento"]; ?>);">Eliminar</button></td>
                              </tr>
                          <?php }
                         ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Nombre</th>
                            <th>Porcentaje</th>
                            <th>Valor</th>
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


