<?php 
include 'templates/header.php'; 
$titlePage = "Inicio";
$activeInicio = "active";
$rutas = $rutaBO->getAllByEmpresa($currentCompany->getIdEmpresa());
?>
<div class="wrapper">

  <?php include 'templates/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php include 'templates/breadcumb.php'; ?>

    <!-- Main  -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <?php if($currentPerson->getRol() == "Administrador") {?>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Online Store Visitors</h3>
                    <a href="javascript:void(0);">View Report</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">820</span>
                      <span>Visitors Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 12.5%
                      </span>
                      <span class="text-muted">Since last week</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This Week
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Last Week
                    </span>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Sales</h3>
                    <a href="javascript:void(0);">View Report</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">$18,230.00</span>
                      <span>Sales Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 33.1%
                      </span>
                      <span class="text-muted">Since last month</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This year
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Last year
                    </span>
                  </div>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="col-lg-12">
              <form class="form-horizontal" id='formSearch' method='POST' onsubmit="return ValidateSearch();">
                <input type="hidden" name='search' value="1" />
                <div class="col-lg-12">
                  <div class="card">
                    <table class='table'>
                      <tr>
                        <td style="width: 40%;">
                          <div class="form-group">
                            <label>Ruta</label>
                            <select class="form-control" id="ruta" name="ruta">
                              <option value="">Seleccion una opcion</option>
                              <?php foreach ($rutas as $ruta) { ?>
                                  <option value="<?php echo $ruta['idRuta'];?>" <?php if($idRutaBuscar ==$ruta['idRuta']){echo "selected";}?>><?php echo $ruta['Ruta'];?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </td>
                        <td style="width: 40%;">
                          <div class="form-group ">
                              <label for="fecha" class="col-form-label">Fecha</label><br>
                              <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="<?php echo $dateBuscar;?>">
                          </div>
                        </td>
                        <td style="width: 40%; vertical-align: middle;">
                          <button type="submit" class="btn btn-info">Buscar</button>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <?php if(!empty($_POST['search'])){?>
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th style="width: 15%;">Ruta</th>
                              <th style="width: 15%;">Avion</th>
                              <th>Fecha</th>
                              <th>Estado</th>
                              <th>Precio</th>
                              <th style="width: 5%;">Hora de Despliegue</th>
                              <th style="width: 5%;">Hora de Llegada</th>
                              <th style="width: 5%;"># Asientos Disponibles</th>
                              <th style="width: 13%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($listaHorarios as $staffHorario) { 
                              $ruta = $rutaBO->getById($staffHorario['idRuta']);
                              $avion = $avionBO->getById($staffHorario['idCatalogo_avion']);
                            ?>
                                <tr>
                                    <td><?php echo $ruta->getRuta(); ?></td>
                                    <td><?php echo $avion->getNombre_Avion(); ?></td>
                                    <td><?php echo $staffHorario["Fecha"]; ?></td>
                                    <td><?php echo $staffHorario["Status"]; ?></td>
                                    <td><?php echo $staffHorario["Precio"]; ?></td>
                                    <td><?php echo $staffHorario["HoraDespliegue"]; ?></td>
                                    <td><?php echo $staffHorario["HoraLlegada"]; ?></td>
                                    <td><?php echo $staffHorario["Cant_AsientosDisponibles"]; ?></td>
                                    <td><a type="button" class="btn btn-sm btn-info" href="checkIn.php?id=<?php echo $staffHorario["idHorario_Ruta"]; ?>" title="Editar">Reservar</a></td>
                                </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>Ruta</th>
                              <th>Avion</th>
                              <th>Fecha</th>
                              <th>Estado</th>
                              <th>Precio</th>
                              <th>Hora de Despliegue</th>
                              <th>Hora de Llegada</th>
                              <th># Asientos Disponibles</th>
                              <th></th>
                            </tr>
                        </tfoot>
                    </table>
                  </div>
                <?php } ?>
              </form>
            </div>
          <?php } ?>
          <!-- /.col-md-6 -->
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