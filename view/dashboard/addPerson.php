<?php include 'templates/header.php'; 
$titlePage = "Nuevo Usuario";
$subPage = "Nuevo Usuario";
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
              <form class="form-horizontal" id='formAddPerson' method='POST' onsubmit="return ValidateFormAddPerson();">
                <input type="hidden" name='addPerson' value="1" />
                <div class="card-body">
                    <table class='table'>
                        <tr>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="nombre" class="col-form-label">Nombre</label><br>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $newName;?>">
                                </div>
                                <div class="form-group ">
                                    <label for="primerApellido" class="col-form-label">Primer Apellido</label><br>
                                    <input type="text" class="form-control" name="primerApellido" id="primerApellido" placeholder="Primer Apellido"  value="<?php echo $newLastName;?>">
                                </div>
                                <div class="form-group ">
                                    <label for="segundoApellido" class="col-form-label">Segundo Apellido</label><br>
                                    <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" placeholder="Segundo Apellido"  value="<?php echo $newLastName2;?>">
                                </div>                       

                                <div class="form-group ">
                                    <label for="fechaNacimiento" class="col-form-label">Fecha Nacimiento</label><br>
                                    <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" placeholder="Fecha Nacimiento"  value="<?php echo $newBirth;?>">
                                </div>
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="cedula" class="col-form-label">Cedula</label><br>
                                    <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula"  value="<?php echo $newCedula;?>">
                                </div>   
                                <div class="form-group ">
                                    <label for="telefono" class="col-form-label">Telefono</label><br>
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono"  value="<?php echo $newPhone;?>">
                                </div>   
                                <div class="form-group ">
                                    <label for="celular" class="col-form-label">Celular</label><br>
                                    <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular"  value="<?php echo $newCellPhone;?>">
                                </div>
                                <div class="form-group ">
                                    <label for="celular" class="col-form-label">Rol</label><br>
                                    <input type="text" readonly class="form-control" name="rol" id="rol" placeholder="Celular"  value="<?php echo $_GET['type'];?>">
                                </div>
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="correo" class="col-form-label">Correo</label><br>
                                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo"  value="<?php echo $newUser;?>">
                                </div>
                                <div class="form-group ">
                                    <label for="contraseña" class="col-form-label">Contraseña</label><br>
                                    <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña"  value="<?php echo $newPass;?>">
                                </div>
                                <div class="form-group ">
                                    <label for="confirmpass" class="col-form-label">Confirmar Contraseña</label><br>
                                    <input type="password" class="form-control" name="confirmpass" id="confirmpass" placeholder="Confirmar Contraseña"  value="<?php echo $newPass;?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="form-group ">
                                    <input type="hidden" class="form-control" name="direccion" id="direccion" value="<?php echo $newDir;?>">
                                    <label class="col-form-label">Direcci&oacute;n</label><br>
                                    <div id="map" style="width: 100%; height: 250px;"></div>
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

<script type="text/javascript">
    $(document).ready(function(){
        <?php if(!empty($newDir)) {
            $arrPos = explode(",", $newDir); ?>
            coords = {
                lng: <?php echo $arrPos[1];?>,
                lat: <?php echo $arrPos[0];?>
            }; 
            setMapa(coords);
        <?php }else{ ?>
            navigator.geolocation.getCurrentPosition(function(position) {
                coords = {
                    lng: position.coords.longitude,
                    lat: position.coords.latitude
                }; 
                setMapa(coords); //pasamos las coordenadas al metodo para crear el mapa
            }, function(error) {
                console.log(error);
            });   
        <?php } ?>
    });
</script>
</script>
