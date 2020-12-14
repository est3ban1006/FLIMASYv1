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
        $newPersona->setDireccion($currentPerson->getDireccion());
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
