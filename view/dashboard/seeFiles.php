<?php include 'templates/header.php'; 
$titlePage = "Recursos";
$subPage = "Recursos";
$activeGaleria = "active";
$carpeta = $carpetaBO->getById($_GET['id']);
$listaArchivos = $recursoBO->getAllByCarpeta($_GET['id']);
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
                  <h3 class="card-title">Lista de recursos de <?php echo $carpeta->getNombre();?></h3>
                  <div class="text-right">
                    <a href="addFile.php?id=<?php echo $_GET['id'];?>" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Recurso</a> <a href="gallery.php" class="btn btn-default text-info">Regresar a Galeria</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeleteRecurso' method='POST'>
                <input type="hidden" name='deleteRecurso' value="1" />
                <input type="hidden" name='idDelete' id="idDelete" value="" />
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Tamano</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaArchivos as $file) { ?>
                            <tr>
                                <td><?php echo $file["Nombre"]; ?></td>
                                <td><?php echo $file["Tipo"]; ?></td>      
                                <td><?php echo $file[3]; ?></td>    
                                <td><button type="button" class="btn btn-danger" onclick="ConfirmDeleteArchivo(<?php echo $file[0]; ?>);">Eliminar</button></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Tamano</th>
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
