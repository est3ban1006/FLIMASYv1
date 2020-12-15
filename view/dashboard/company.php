<?php include 'templates/header.php'; 
$titlePage = "Inicio";
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
                  <h3 class="card-title">Actualizar informacion de mi empresa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formUpdateCompany' method='POST' enctype="multipart/form-data" role="form" onsubmit="return ValidateFormUpdateEmpresa();">
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
                                    <textarea type="text" class="form-control" name="vision" id="vision" placeholder="Vision" value=""><?php echo $currentCompany->getVision();?></textarea>
                                </div>
                                <div class="form-group ">
                                    <label for="mision" class="col-form-label">Mision</label><br>
                                    <textarea type="text" class="form-control" name="mision" id="mision" placeholder="Mision" value=""><?php echo $currentCompany->getMision();?></textarea>
                                </div>
                                <div class="form-group ">
                                    <label for="objetivos" class="col-form-label">Objetivos</label><br>
                                    <textarea type="text" class="form-control" name="objetivos" id="objetivos" placeholder="Objetivos" value=""><?php echo $currentCompany->getObjetivos();?></textarea>
                                </div>
                                <div class="form-group ">
                                    <label for="descripcion" class="col-form-label">Descripcion</label><br>
                                    <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value=""><?php echo $currentCompany->getDescripcion();?></textarea>
                                </div>                                          
                            </td>
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="textoBanner" class="col-form-label">Texto Banner</label><br>
                                    <textarea type="text" class="form-control" name="textoBanner" id="textoBanner" placeholder="Texto Banner" value=""><?php echo $currentCompany->getTexto_Banner();?></textarea>
                                </div>  
                                <div class="form-group ">
                                    <label for="textRedSocial" class="col-form-label">Texto de las Redes Sociales</label><br>
                                    <input type="text" class="form-control" name="textRedSocial" id="textRedSocial" placeholder="Texto de las Redes Sociales"  value="<?php echo $currentCompany->getTextoRedesSociales();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="email" class="col-form-label">Email</label><br>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"  value="<?php echo $currentCompany->getEmail();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="facebook" class="col-form-label">URL de Facebook</label><br>
                                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="URL de Facebook"  value="<?php echo $currentCompany->getURL_facebook();?>">
                                </div>   
                                <div class="form-group ">
                                    <label for="instagram" class="col-form-label">URL de Instagram</label><br>
                                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="URL de Instagram"  value="<?php echo $currentCompany->getURL_instagram();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="twitter" class="col-form-label">URL de Twitter</label><br>
                                    <input type="text" class="form-control" name="twitter" id="twitter" placeholder="URL de Twitter"  value="<?php echo $currentCompany->getURL_twitter();?>">
                                </div>
                            </td>
                            
                            <td style="width: 33%;">
                                <div class="form-group ">
                                    <label for="skype" class="col-form-label">URL de Skype</label><br>
                                    <input type="text" class="form-control" name="skype" id="skype" placeholder="URL de Skype"  value="<?php echo $currentCompany->getURL_Skipe();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="linkedin" class="col-form-label">URL de Linkedin</label><br>
                                    <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="URL de Linkedin"  value="<?php echo $currentCompany->getURL_linkedin();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="direccion" class="col-form-label">Direccion</label><br>
                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion"  value="<?php echo $currentCompany->getDireccion();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="telefono" class="col-form-label">Telefono</label><br>
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono"  value="<?php echo $currentCompany->getTelefono();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="logo" class="col-form-label">Logo</label><br>
                                    <input type="file" class="form-control" name="logo" accept="image/*" id="logo" placeholder="Logo"  value="<?php echo $currentCompany->getLogo();?>">
                                </div>
                                <div class="form-group ">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                      <input type="checkbox" <?php if($currentCompany->getMostrar_imgDescuento() == 1){ echo "checked"; }?> class="custom-control-input" name="imgdescuento" id="imgdescuento">
                                      <label class="custom-control-label" for="imgdescuento">Habilitar imagenes descuento</label>
                                    </div>
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
