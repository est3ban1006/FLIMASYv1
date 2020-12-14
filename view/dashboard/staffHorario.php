    <?php include 'templates/header.php'; 
    $titlePage = "Horarios";
    $subPage = "Horarios";
    $activeStaff = $activeAvion = "active";
    $openHorario = " menu-open";
    $listaStaff = $horariBO->getAllByAvion("Horarios");
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
                          <a href="addHorario.php.php?type=Horarios" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Horario</a>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" id='formDeletePerson' method='POST'>
                    <input type="hidden" name='deleteHorario' value="1" />
                    <input type="hidden" name='idDelete' id="idDelete" value="" />

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th>Fecha</th>
                                <th>Status</th>
                                <th>Precio</th>
                                <th>Hora de Despliegue</th>
                                <th>Hora de Llegada</th>
                                <th>Cantidad de Asientos Disponibles</th>
                                <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($listaStaff as $staffHorario) { 
                                if($staffHorario["idHorario"] != $currentCompany->getAllByAvion()) { ?>
                                    <tr>
                                        <td><?php echo $staffAvion["Fecha"]; ?></td>
                                        <td><?php echo $staffAvion["Nombre"]; ?></td>
                                        <td><?php echo $staffAvion["Nombre"]; ?></td>
                                        <td><?php echo $staffAvion["Nombre"]; ?></td>
                                        <td><?php echo $staffAvion["Nombre"]; ?></td>
                                        <td><?php echo $currentCompany->getIdTipoAvion(); ?></td>
                                        <td><button type="button" class="btn btn-danger" onclick="ConfirmDeleteAvion(<?php echo $staffAvion["idAvion"]; ?>);">Eliminar</button></td>
                                    </tr>
                                <?php }
                            } ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                <th>Fecha</th>
                                <th>Status</th>
                                <th>Precio</th>
                                <th>Hora de Despliegue</th>
                                <th>Hora de Llegada</th>
                                <th>Cantidad de Asientos Disponibles</th>
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

