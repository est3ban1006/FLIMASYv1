<?php include 'templates/header.php'; 
$titlePage = "Empresa";
$subPage = "Empresa";
$activeEmpresa = "active";
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
                  <h3 class="card-title">Actualizar mi informaci&oacute;n</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formUpdateProfile' method='POST' onsubmit="return ValidateFormUpdatePerson();">
                <input type="hidden" name='updateEmpresa' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="nombreEmpresa" class="col-form-label">Nombre de la Empresa</label><br>
                                    <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa" placeholder="Nombre de la Empresa" value="<?php echo $currentCompany->getNombre_empresa();?>">
                                </div>
                                <div class="form-group">
                                    <label for="vision" class="col-form-label">Vision</label><br>
                                    <textarea type="text" class="form-control" name="vision" id="vision" placeholder="Vision" value="<?php echo $currentCompany->getVision();?>"></textarea>
                                </div>
                                <div class="form-group ">
                                    <label for="mision" class="col-form-label">Mision</label><br>
                                    <textarea type="text" class="form-control" name="mision" id="mision" placeholder="Mision" value="<?php echo $currentCompany->getMision();?>"></textarea>
                                </div>
                                <div class="form-group ">
                                    <label for="objetivos" class="col-form-label">Objetivos</label><br>
                                    <input type="text" class="form-control" name="objetivos" id="objetivos" placeholder="Objetivos"  value="<?php echo $currentCompany->getObjetivos();?>">
                                </div>                       
                                <div class="form-group ">
                                    <label for="telefono" class="col-form-label">Telefono</label><br>
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono"  value="<?php echo $currentCompany->getTelefono();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="direccion" class="col-form-label">Direccion</label><br>
                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion"  value="<?php echo $currentCompany->getDireccion();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="logo" class="col-form-label">Logo</label><br>
                                    <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo"  value="<?php echo $currentCompany->getLogo();?>">
                                </div>
                                </div>
                                <div class="form-group ">
                                    <label for="descripcion" class="col-form-label">Descripcion</label><br>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion"  value="<?php echo $currentCompany->getDescripcion();?>">
                                </div>
                                <div class="form-group custom-checkbox">
                                    <label for="imgdescuento" class="col-form-label">Imagen de Descuento</label><br>
                                    <input type="checkbox" class="form-control" name="imgdescuento" id="imgdescuento" placeholder="Imagen de Descuento"  value="<?php echo $currentCompany->getMostrar_imgDescuento();?>">
                                </div>               
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="cedula" class="col-form-label">Cedula</label><br>
                                    <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula"  value="<?php echo $currentCompany->getCedula();?>">
                                </div>   
                                <div class="form-group ">
                                    <label for="telefono" class="col-form-label">Telefono</label><br>
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono"  value="<?php echo $currentPerson->getTelefono();?>">
                                </div>   
                                <div class="form-group ">
                                    <label for="celular" class="col-form-label">Celular</label><br>
                                    <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular"  value="<?php echo $currentPerson->getCelular();?>">
                                </div>
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="correo" class="col-form-label">Correo</label><br>
                                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo"  value="<?php echo $currentPerson->getCorreo();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="contraseña" class="col-form-label">Nueva Contraseña</label><br>
                                    <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña"  value="">
                                </div>
                                <div class="form-group ">
                                    <label for="confirmpass" class="col-form-label">Confirmar Contraseña</label><br>
                                    <input type="password" class="form-control" name="confirmpass" id="confirmpass" placeholder="Confirmar Contraseña"  value="">
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