<?php include 'templates/header.php'; 
$titlePage = "Administradores";
$subPage = "Administradores";
$activeStaff = $activePersonas = "active";
$openPersonas = " menu-open";
$listaStaff = $personaBO->getAllByRol("Administrador");
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
                  <h3 class="card-title">Lista de Rutas</h3>
                  <div class="text-right">
                    <a href="addPerson.php?type=Administrador" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Rutas</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeleteRuta' method='POST'>
                <input type="hidden" name='deleteRuta' value="1" />
                <input type="hidden" name='idDelete' id="idDelete" value="" />
                
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Correo</th>
                            <th>Cedula</th>
                            <th>Nombre Completo</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th>Fecha Nacimiento</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listaStaff as $staff) { 
                            if($staff["idPersona"] != $currentPerson->getIdPersona()) { ?>
                                <tr>
                                    <td><?php echo $staff["Correo"]; ?></td>
                                    <td><?php echo $staff["Cedula"]; ?></td>
                                    <td><?php echo $staff["Nombre"]." ".$staff["Apellido1"]." ".$staff["Apellido2"]; ?></td>
                                    <td><?php echo $staff["Telefono"]; ?></td>
                                    <td><?php echo $staff["Celular"]; ?></td>
                                    <td><?php echo $staff["FechaNacimiento"]; ?></td>
                                    <td><button type="button" class="btn btn-danger" onclick="ConfirmDeletePerson(<?php echo $staff["idPersona"]; ?>);">Eliminar</button></td>
                                </tr>
                            <?php }
                        } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Correo</th>
                            <th>Cedula</th>
                            <th>Nombre Completo</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th>Fecha Nacimiento</th>
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

