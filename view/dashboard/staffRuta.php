    <?php include 'templates/header.php'; 
    $titlePage = "Rutas";
    $subPage = "Rutas";
    $activeStaff = $activePersonas = "active";
    $openPersonas = " menu-open";
    $listaStaff = $rutaBO->getAllByEmpresa("Ruta");
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
                      <h3 class="card-title">Lista de rutas</h3>
                      <div class="text-right">
                        <a href="addRuta.php?type=Ruta" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Ruta</a>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" id='formDeleteRuta' method='POST'>
                    <input type="hidden" name='deleteRuta' value="1" />
                    <input type="hidden" name='idDelete' id="idDelete" value="" />
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th>Ruta</th>
                                <th>Duracion</th>
                                <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($listaStaff as $staffRuta) { 
                                if($staffRuta["idRuta"] != $currentCompany->getIdRuta()) { ?>
                                    <tr>
                                        <td><?php echo $staffRuta["Ruta"]; ?></td>
                                        <td><?php echo $staffRuta["Direccion"]; ?></td>                                        
                                        <td><button type="button" class="btn btn-danger" onclick="ConfirmDeleteRuta(<?php echo $staffRuta["idRuta"]; ?>);">Eliminar</button></td>
                                    </tr>
                                <?php }
                            } ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                <th>Ruta</th>
                                <th>Duracion</th>
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
