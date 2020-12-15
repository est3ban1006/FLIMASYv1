<?php include 'templates/header.php'; 
$titlePage = "Editar Avion";
$subPage = "Editar Avion";
$activeAvion = $activeAirplane = "active";
$openAirplane = " menu-open";
$avion = $avionBO->getById($_GET['id']); 
$tipos = $tipoAvionBO->getAllByEmpresa($currentCompany->getIdEmpresa());
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
              <form class="form-horizontal" id='formUpdateAvion' method='POST' onsubmit="return ValidateFormUpdateAvion();">
                <input type="hidden" name='updateAvion' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 50%;">
                              <div class="form-group">
                                <label>Tipo de Avion</label>
                                <select class="form-control" id="tipoAvion" name="tipoAvion">
                                  <option value="">Seleccion una opcion</option>
                                  <?php foreach ($tipos as $tipo) { ?>
                                      <option value="<?php echo $tipo['idTipo_Avion'];?>" <?php if($avion->getIdTipo_Avion() ==$tipo['idTipo_Avion']){echo "selected";}?>><?php echo $tipo[2]." - ".$tipo['Modelo']." ".$tipo['Marca'];?> </option>
                                  <?php } ?>
                                </select>
                              </div>
                            </td>
                            <td style="width: 50%;">
                                <div class="form-group ">
                                    <label for="nombre" class="col-form-label">Nombre</label><br>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $avion->getNombre_Avion();?>">
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
