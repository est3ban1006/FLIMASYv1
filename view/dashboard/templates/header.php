<?php 
session_start();
$ruta = "../../backend/";
require_once $ruta.'controller/Init.php';
if(empty($_SESSION['idUsuario'])){
    header("Location:../login/loginView.php");
}else{
    $typeAlert = $msgAlert= "";

    #OPCIONES DEL MENU
    $activeStaff = $activeCustomer = $activeIncio = $activeEmpresa = $activePersonas = $activeAirplane = "";
    $activeTipoAvion = $activeAvion = $activeRutas = $activeHorarios = $activeDescuentos = "";
    $openPersonas = $openAirplane = "";

    $currentUser = $usuarioBO->getById($_SESSION['idUsuario']);
    $currentPerson = $personaBO->getById($_SESSION['idPersona']);
    $currentCompany = $empresaBO->getById($_SESSION['idEmpresa']);
}

require_once $ruta.'controller/PersonaController.php';
require_once $ruta.'controller/EmpresaController.php';
require_once $ruta.'controller/Tipo_avionController.php';
require_once $ruta.'controller/Catalogo_avionController.php';
require_once $ruta.'controller/DescuentoController.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FLIMASY - Dashboard</title>
        <link rel="icon" type="image/png" href="../assets/img/airplane.ico"/>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- IonIcons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">

        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

        <!-- 
            RTL version
        -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <form id="formCloseSession" method="POST">
          <input type="hidden" name="closeSession" value="1">
        </form>
