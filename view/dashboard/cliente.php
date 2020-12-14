<?php include 'templates/header.php'; 
$titlePage = "Inicio";
$subPage = "Cliente";
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
                <input type="hidden" name='updateProfile' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="nombre" class="col-form-label">Nombre</label><br>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $currentPerson->getNombre();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="primerApellido" class="col-form-label">Primer Apellido</label><br>
                                    <input type="text" class="form-control" name="primerApellido" id="primerApellido" placeholder="Primer Apellido"  value="<?php echo $currentPerson->getApellido1();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="segundoApellido" class="col-form-label">Segundo Apellido</label><br>
                                    <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" placeholder="Segundo Apellido"  value="<?php echo $currentPerson->getApellido2();?>">
                                </div>                       

                                <div class="form-group ">
                                    <label for="fechaNacimiento" class="col-form-label">Fecha Nacimiento</label><br>
                                    <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" placeholder="Fecha Nacimiento"  value="<?php echo $currentPerson->getFechaNacimiento();?>">
                                </div>
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="cedula" class="col-form-label">Cedula</label><br>
                                    <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula"  value="<?php echo $currentPerson->getCedula();?>">
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
