    <?php include 'templates/header.php'; 
    $titlePage = "Aviones";
    $subPage = "Avioves";
    $activeStaff = $activeAvion = "active";
    $openAvion = " menu-open";
    $listaStaff = $avionBO->getAllByTipo("idTipo_Avion");
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
                  <form class="form-horizontal" id='formDeletePerson' method='POST'>
                    <input type="hidden" name='deleteAvion' value="1" />
                    <input type="hidden" name='idDelete' id="idDelete" value="" />

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Tipo de Avion</th>
                                <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($listaStaff as $staffAvion) { 
                                if($staffAvion["idAvion"] != $currentCompany->getIdTipoAvion()) { ?>
                                    <tr>
                                        <td><?php echo $staffAvion["NombreAvion"]; ?></td>
                                        <td><?php echo $currentCompany->getIdTipoAvion(); ?></td>
                                        <td><button type="button" class="btn btn-danger" onclick="ConfirmDeleteAvion(<?php echo $staffAvion["idAvion"]; ?>);">Eliminar</button></td>
                                    </tr>
                                <?php }
                            } ?>
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
