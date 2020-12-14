<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonaController
 *
 * @author josue
 */
//POST ACTUALIZAR PERFIL
if(!empty($_POST['updateProfile'])){
    #PRIMERO OBTENER EL USUARIO CON EL CORREO QUE INGRESO EL USUARIO ACTUAL
    $usuarioCorreo = $personaBO->getByCorreo($_POST['correo']);
    if($usuarioCorreo->getIdPersona() == $currentUser->getIdPersona() || empty($usuarioCorreo->getIdPersona())){
        #VAMOS ACTUALIZAR LA INFORMACION DEL USUARIO
        $newUsuario = new Usuario();
        $newUsuario->setIdUsuario($currentUser->getIdUsuario());
        $newUsuario->setIdEmpresa($currentUser->getIdEmpresa());
        $newUsuario->setIdPersona($currentUser->getIdPersona());
        $newUsuario->setUsuario($_POST['correo']);
        if(!empty($_POST['contraseña'])){
            $newUsuario->setContraseña($_POST['contraseña']);
        }else{
            $newUsuario->setContraseña($currentUser->getContraseña());
        }
        $newUsuario->setActivo($currentUser->getActivo());
        $newUsuario->setFecha_registro($currentUser->getFecha_registro());
        $usuarioBO->update($newUsuario);
       
        $newPersona = new Persona();
        $newPersona->setIdPersona($currentPerson->getIdPersona());
        $newPersona->setCedula($_POST['cedula']);
        $newPersona->setNombre($_POST['nombre']);
        $newPersona->setApellido1($_POST['primerApellido']);
        $newPersona->setApellido2($_POST['segundoApellido']);
        $newPersona->setCorreo($_POST['correo']);
        $newPersona->setTelefono($_POST['telefono']);
        $newPersona->setDireccion($_POST['direccion']);
        $newPersona->setCelular($_POST['celular']);
        $newPersona->setFechaNacimiento($_POST['fechaNacimiento']);
        $personaBO->update($newPersona);
        $currentPerson = $personaBO->getById($_SESSION['idPersona']);
        $typeAlert=1;
        $msgAlert = "Informacion actualizada exitosamente";
    }else{
        $typeAlert = 2;
        $msgAlert = "El correo ya se encuentra registrado. Por favor utilice otro correo.";
    }
}

//POST ELIMINAR USUARIO
if(!empty($_POST['deletePerson']) && !empty($_POST['idDelete'])){
    //PRIMERO ELIMINAR EL USUARIO
    $usuarioEliminar = $usuarioBO->getByIdPersona($_POST['idDelete'])
    if(!empty($usuarioEliminar)){
        $usuarioBO->delete($usuarioEliminar->getIdUsuario());
        $personaBO->delete($_POST['idDelete']);
    }
    $typeAlert = 1;
    $msgAlert = "El usuario ha sido eliminado correctamente";
}

$newUser = $newPass = $confirmPass = $newDir = $newName = $newCedula = $newLastName = $newLastName2 = $newBirth = $newPhone = $newCellPhone = $rol = "";
//POST AGREGAR NUEVA PERSONA
if(!empty($_POST['addPerson'])){
    $newUser = $_POST['correo'];
    $newPass = $confirmPass = $_POST['contraseña'];
    $newDir = $_POST['direccion'];
    $newName = $_POST['nombre'];
    $newLastName = $_POST['primerApellido'];
    $newLastName2 = $_POST['segundoApellido'];
    $newBirth = $_POST['fechaNacimiento'];
    $newPhone = $_POST['telefono'];
    $newCellPhone = $_POST['celular'];
    $newCedula = $_POST['cedula'];
    $rol = $_POST['rol'];
    
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
        $personaObj->setDireccion($newDir);
        $personaObj->setFechaNacimiento($newBirth);
        $personaObj->setNombre($newName);
        $personaObj->setRol($rol);
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

            #REDIRECCIONAR AL DASBOARD Y ENVIAR UN CORREO
            if($rol == "Administrador"){
                header("Location: staff.php");
            }else{
                header("Location: customers.php");
            }
        }else{
            $typeAlert = 2;
            $msgAlert = "Ocurrio un error al guardar la persona";
        }
    }else{
        $typeAlert = 2;
        $msgAlert = "El usuario ya existe. Por favor ingrese un correo diferente.";
    }
}

//ACCION PARA CERRAR LA SWESION
if(!empty($_POST['closeSession'])){
    //RESET VARIABLES DE SESION
    $_SESSION['idUsuario'] = "";
    $_SESSION['idPersona'] = "";
    $_SESSION['idEmpresa'] = "";
    session_unset();

    header("Location: ../website/siteView.php");
}
