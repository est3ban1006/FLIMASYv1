<?php include 'templates/header.php'; 
$titlePage = "Nuevo Descuento";
$subPage = "Nuevo Descuento";
$activeStaff = $activeAvion = "active";
$openHorario = " menu-open";
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
              <form class="form-horizontal" id='formAddPerson' method='POST' onsubmit="return ValidateFormAddDescuento();">
                <input type="hidden" name='addDescuento' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="nombre" class="col-form-label">Nombre</label><br>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $newName;?>">
                                </div>
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="porcentaje" class="col-form-label">Porcentaje</label><br>
                                    <input type="number" class="form-control" step="any" name="porcentaje" id="porcentaje" placeholder="Porcentaje" value="<?php echo $newName;?>">
                                </div>
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="valor" class="col-form-label">Valor</label><br>
                                    <input type="number" class="form-control" step="any" name="valor" id="valor" placeholder="Valor" value="<?php echo $newName;?>">
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
