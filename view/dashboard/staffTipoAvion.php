    <?php include 'templates/header.php'; 
    $titlePage = "TipoAvion";
    $subPage = "TipoAvion";
    $activeStaff = $activeAeropuerto = "active";
    $openAeropuerto = " menu-open";
    $listaStaff = $tipoAvionBO->getAllByEmpresa("TipoAvion");
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
                          <a href="addTipoAvion.php?type=TipoAvion" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Tipo de Avion</a>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" id='formDeleteRuta' method='POST'>
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
                            <?php foreach ($listaStaff as $staffTipoAvion) { 
                                if($staffTipoAvion["idTipoAvion"] != $currentCompany->getIdTipoAvion()) { ?>
                                    <tr>
                                        <td><?php echo $staffTipoAvion["Año"]; ?></td>
                                        <td><?php echo $staffTipoAvion["Modelo"]; ?></td> 
                                        <td><?php echo $staffTipoAvion["Marca"]; ?></td> 
                                        <td><?php echo $staffTipoAvion["Cantidad"]; ?></td> 
                                        <td><?php echo $staffTipoAvion["Modelo"]; ?></td> 
                                        <td><?php echo $staffTipoAvion["Modelo"]; ?></td> 
                                        <td><button type="button" class="btn btn-danger" onclick="ConfirmDeleteTipoAvion(<?php echo $staffTipoAvion["idTipoAvion"]; ?>);">Eliminar</button></td>
                                    </tr>
                                <?php }
                            } ?>
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