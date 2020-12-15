<?php include 'templates/header.php'; 
$titlePage = "Galeria";
$subPage = "Galeria";
$activeGaleria = "active";
$carpetas = $carpetaBO->getAllByEmpresa($currentCompany->getIdEmpresa());
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
                  <h3 class="card-title">Lista de Carpetas</h3>
                  <div class="text-right">
                    <a href="addCarpeta.php" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Carpeta</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeleteCarpeta' method='POST'>
                <input type="hidden" name='deleteCarpeta' value="1" />
                <input type="hidden" name='idDelete' id="idDelete" value="" />
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($carpetas as $carpeta) { 
                            $recursos = $recursoBO->getAllByCarpeta($carpeta[0]);
                            $counter = 0;
                            foreach ($recursos as $key => $value) {
                              $counter++;
                            } ?>
                            <tr>
                                <td><?php echo $carpeta['Nombre']; ?></td>
                                <td><?php echo $counter; ?></td>
                                <td><a type="button" class="btn btn-sm btn-info" href="seeFiles.php?id=<?php echo $carpeta[0]; ?>" >Archivos</a> <?php if ($carpeta[0] != 1){ ?><button type="button" class="btn btn-danger" onclick="ConfirmDeleteCarpeta(<?php echo $carpeta[0]; ?>);">Eliminar</button><?php } ?></td>
                            </tr>
                        <?php }  ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
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
