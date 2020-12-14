<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if($view == "login"){
    #NO SE HA INICIADO SESION
    if(empty($_SESSION['idUsuario'])){
        $typeAlert = $msgAlert = $user = $pass = $newUser = $newPass = $confirmPass = $newDir = $newName = $newCedula = $newLastName = $newLastName2 = $newBirth = $newPhone = $newCellPhone = "";
        if(!empty($_POST['login'])){
            $user = $_POST['email'];
            $pass = $_POST['pass'];
            #VALIDATE DATA
            $userObj = $usuarioBO->getByUserAndPass($_POST['email'], $_POST['pass']);
            if(empty($userObj->getIdUsuario())){
                $typeAlert = 2;
                $msgAlert = "Usuario y/o contraseña incorrecto(s)";
            }else{
                $_SESSION['idUsuario'] = $userObj->getIdUsuario();
                $_SESSION['idPersona'] = $userObj->getIdPersona();
                $_SESSION['idEmpresa'] = $userObj->getIdEmpresa();
                $typeAlert = 1;
                $msgAlert = "LOGUEADO CORRECTAENTE";
                header("Location:../dashboard/index.php");
            }
        }

        if(!empty($_POST['register'])){
            $newUser = $_POST['emailNew'];
            $newPass = $confirmPass = $_POST['passNew'];
            $newDir = $_POST['passNew'];
            $newName = $_POST['name'];
            $newLastName = $_POST['lastNameNew'];
            $newLastName2 = $_POST['lastName2New'];
            $newBirth = $_POST['birthNew'];
            $newPhone = $_POST['phoneNew'];
            $newCellPhone = $_POST['cellPhoneNew'];
            $newCedula = $_POST['cedulaNew'];
            
            #PRIMERO VALIDAR QUE EL CORREO NO EXISTA
            $usuarioObj = new Usuario();
            $usuarioObj->setUsuario($newUser);
            if(!$usuarioBO->exist($usuarioObj)){
                #SE DEBE DE CREAR A LA PERSONA PARA DESPUES ASOCIARLA CON EL USUARIO
                $personaObj = new Persona();
                $personaObj->setApellido1($newLastName);
                $personaObj->setApellido2($newLastName2);
                $personaObj->setCedula($newCedula);
                $personaObj->setCelular($newCellPhone);
                $personaObj->setCorreo($newUser);
                $personaObj->setDireccion("EMPTY");
                $personaObj->setFechaNacimiento($newBirth);
                $personaObj->setNombre($newName);
                $personaObj->setRol("Cliente");
                $personaObj->setTelefono($newPhone);
                
                $personaBO->add($personaObj);
                
                $personaObj = $personaBO->getByCorreo($newUser);
                
                if(!empty($personaObj->getIdPersona())){
                    #AHORA DEBO DE AGREGAR EL USUARIO
                    $usuarioObj->setActivo(1);
                    $usuarioObj->setContraseña($newPass);
                    $usuarioObj->setFecha_registro(date('Y-m-d H:i:s'));
                    $usuarioObj->setIdPersona($personaObj->getIdPersona());
                    $usuarioObj->setIdEmpresa($empresaObj->getIdEmpresa());
                    $usuarioBO->add($usuarioObj);
                    
                    $_SESSION['idUsuario'] = $userObj->getIdUsuario();
                    $_SESSION['idPersona'] = $userObj->getIdPersona();
                    $_SESSION['idEmpresa'] = $userObj->getIdEmpresa();

                    #REDIRECCIONAR AL DASBOARD Y ENVIAR UN CORREO
                    header("Location:../dashboard/index.php");
                }else{
                    $typeAlert = 2;
                    $msgAlert = "Ocurrio un error al guardar la persona";
                }
            }else{
                $typeAlert = 2;
                $msgAlert = "El usuario ya existe. Por favor ingrese un correo diferente.";
            }
        }
    }else{
         header("Location:../dashboard/index.php");
    }
}