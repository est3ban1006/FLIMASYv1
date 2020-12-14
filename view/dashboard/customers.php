<?php include 'templates/header.php'; 
$titlePage = "Clientes";
$subPage = "Clientes";
$activeCustomers = $activePersonas = "active";
$openPersonas = " menu-open";
$listaCustomers = $personaBO->getAllByRol("Cliente");
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
                  <h3 class="card-title">Lista de clientes</h3>
                  <div class="text-right">
                    <a href="addPerson.php?type=Cliente" class="btn btn-default text-info"><i class="fa fa-plus"></i> Agregar Usuario</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id='formDeletePerson' method='POST'>
                <input type="hidden" name='deletePerson' value="1" />
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
                        <?php foreach ($listaCustomers as $customer) { 
                            if($customer["idPersona"] != $currentPerson->getIdPersona()) { ?>
                                <tr>
                                    <td><?php echo $customer["Correo"]; ?></td>
                                    <td><?php echo $customer["Cedula"]; ?></td>
                                    <td><?php echo $customer["Nombre"]." ".$customer["Apellido1"]." ".$customer["Apellido2"]; ?></td>
                                    <td><?php echo $customer["Telefono"]; ?></td>
                                    <td><?php echo $customer["Celular"]; ?></td>
                                    <td><?php echo $customer["FechaNacimiento"]; ?></td>
                                    <td><button type="button" class="btn btn-danger" onclick="ConfirmDeletePerson(<?php echo $customer["idPersona"]; ?>);">Eliminar</button></td>
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
