<?php 
//error_reporting(e_all);
$view = "login";
$ruta = "../../backend/";
require_once $ruta.'controller/Init.php';
require_once $ruta.'controller/UsuarioController.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="../assets/img/airplane.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->

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
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100"  id="formLogin" <?php if(!empty($_POST['register'])){ echo "style='display:none;'"; }?>>
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="images/travel.png" alt="IMG">
                    </div>
                    <form class="login100-form validate-form" method="POST">
                        <input type="hidden" name="login" id="login" value="1">
                        <a href="../website/siteView.php">
                            <span class="login100-form-title">
                                FLIMASY<br>Iniciar Sesion
                            </span>
                        </a>

                        <div class="wrap-input100 validate-input" data-validate = "Correo valido es requerido: ex@abc.xyz">
                            <input class="input100" type="text" name="email" id="email" value="<?php echo $user;?>" placeholder="Correo">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Contraseña es requerida">
                            <input class="input100" type="password" name="pass" id='pass' value="<?php echo $pass;?>" placeholder="Clave">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Entrar
                            </button>
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Olvid&eacute;
                            </span>
                            <a class="txt2" href="#">
                                Usuario / Contraseña?
                            </a>
                        </div>

                        <div class="text-center p-t-120">
                            <a class="txt2" href="#" onclick="ShowForm(2);">
                                Crear mi Cuenta
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="wrap-login100" id="formRegister" <?php if(empty($_POST['register'])){ echo "style='display:none;'"; }?>>
                    <form class="login100-form validate-form2" method="POST" style="width: 100%">
                        <input type="hidden" name="register" id="register" value="0">
                        <table style="width: 100%;">
                            <tr>
                                <td colspan="2">
                                    <a href="../website/siteView.php">
                                        <span class="login100-form-title">
                                            FLIMASY<br>Registrarse
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">
                                    <div class="wrap-input100 validate-input2" data-validate = "Cedula es requerido">
                                        <input class="input100" type="text" name="cedulaNew" id="cedulaNew"  value="<?php echo $newCedula;?>" placeholder="Cedula">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-card" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input2" data-validate = "Nombre es requerido">
                                        <input class="input100" type="text" name="name" id="name"  value="<?php echo $newName;?>" placeholder="Nombre">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input2" data-validate = "Primer Apellido es requerido">
                                        <input class="input100" type="text" name="lastNameNew" id="lastNameNew"  value="<?php echo $newLastName;?>" placeholder="Primer Apellido">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input2" data-validate = "Segundo Apellido es requerido">
                                        <input class="input100" type="text" name="lastName2New" id="lastName2New"  value="<?php echo $newLastName2;?>" placeholder="Segundo Apellido">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input2" data-validate = "Fecha de Nacimiento es requerido">
                                        <input class="input100" type="date" name="birthNew"  value="<?php echo $newBirth;?>" placeholder="Fecha Nacimiento">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div class="wrap-input100 validate-input2" data-validate = "Telefono es requerido">
                                        <input class="input100" type="number" name="phoneNew"  value="<?php echo $newPhone;?>" placeholder="Telefono">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input2" data-validate = "Celular es requerido">
                                        <input class="input100" type="number" name="cellPhoneNew"  value="<?php echo $newCellPhone;?>" placeholder="Celular">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input2" data-validate = "Correo valido es requerido: ex@abc.xyz">
                                        <input class="input100" type="text" name="emailNew" id="emailNew"  value="<?php echo $newUser;?>" placeholder="Correo">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input2" data-validate = "Contraseña es requerida">
                                        <input class="input100" type="password" name="passNew" id="passNew" value="<?php echo $newPass;?>" placeholder="Clave">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="wrap-input100 validate-input2" data-validate = "Contraseña es requerida">
                                        <input class="input100" type="password" name="confirmPassNew" id="confirmPassNew" value="<?php echo $confirmPass;?>" placeholder="Confirmar Clave">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" class="form-control" name="direccion" id="direccion" value="<?php echo $newDir;?>">
                                    <label class="col-form-label">Direcci&oacute;n</label><br>
                                    <div id="map" style="width: 100%; height: 250px;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn" type="submit">
                                            Registrarme
                                        </button>
                                    </div>
                                    <div class="text-center p-t-20">
                                        <a class="txt2" href="#" onclick="ShowForm(1);">
                                            Iniciar Sesion
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </table>      
                    </form>
                </div>
            </div>
        </div>

        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

        <?php if(!empty($typeAlert)){
            if($typeAlert == 1){
                echo "<script>alertify.success('".$msgAlert."');</script>";
            }else if($typeAlert == 2){
                echo "<script>alertify.error('".$msgAlert."');</script>";
            }
        }?>
    </body>
</html>