<?php include 'templates/header.php'; 
$titlePage = "Editar Tipo de Avion";
$subPage = "Editar Tipo de Avion";
$activeTipoAvion = $activeAirplane = "active";
$openAirplane = " menu-open";
$tipo = $tipoAvionBO->getById($_GET['id']); 
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
                  <h3 class="card-title">Completar la informaci&oacute;n</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formAddPerson' method='POST' onsubmit="return ValidateFormUpdateTipoAvion();">
                <input type="hidden" name='updateTipoAvion' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="año" class="col-form-label">Año</label><br>
                                    <input type="number" class="form-control" name="año" id="año" placeholder="Año" value="<?php echo $tipo->getAño();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="modelo" class="col-form-label">Modelo</label><br>
                                    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo"  value="<?php echo $tipo->getModelo();?>">
                                </div>
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="marca" class="col-form-label">Marca</label><br>
                                    <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca"  value="<?php echo $tipo->getMarca();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="cantFilas" class="col-form-label">Cantidad de Filas</label><br>
                                    <input type="number" min="2" max="3" class="form-control" name="cantFilas" id="cantFilas" placeholder="Cantidad de Filas"  value="<?php echo $tipo->getCant_filas();?>">
                                </div>   
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="cantAsientos" class="col-form-label">Cantidad de asientos por fila</label><br>
                                    <input type="number" class="form-control" name="cantAsientos" id="cantAsientos" placeholder="Cantidad de Asientos" min="6" max="9" value="<?php echo $tipo->getCant_asientos();?>">
                                </div> 
                                <div class="form-group ">
                                    <label for="cantpasajeros" class="col-form-label">Cantidad de Pasajeros</label><br>
                                    <input type="number" class="form-control" name="cantpasajeros" id="cantpasajeros" placeholder="Cantidad de Pasajeros"  value="<?php echo $tipo->getCant_pasajeros();?>">
                                </div> 
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info">Guardar informacion</button>
                </div>
                <!-- /.card-footer -->
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
