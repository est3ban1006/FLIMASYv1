<?php
require_once $ruta.'controller/Init.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!empty($_POST['updateCompany'])){
    #PRIMERO OBTENER EL USUARIO CON EL CORREO QUE INGRESO EL USUARIO ACTUAL
    $empresaNombre = $empresaBO->getById($_POST['nombreEmpresa']);
    if($empresaNombre->getIdEmpresa() == $currentCompany->getIdEmpresa() || empty($empresaNombre->getIdEmpresa())){
        #VAMOS ACTUALIZAR LA INFORMACION DE LA EMPRES
        $newEmpresa = new Empresa();
        $newEmpresa->setIdEmpresa($currentCompany->getIdEmpresa());
        $newEmpresa->setNombre_empresa($_POST['nombreEmpresa']);
        if(!empty($_POST['nombreEmpresa'])){
            $newEmpresa->setNombre_empresa($_POST['nombreEmpresa']);
        }else{
            $newEmpresa->setNombre_empresa($currentCompany->getContraseña());
        }
        $newEmpresa->setActivo($currentCompany->getActivo());
        $newEmpresa->setFecha_creacion($currentCompany->getFecha_creacion());
        $empresaBO->update($newEmpresa);
       
        $newEmpresa = new Empresa();
        $newEmpresa->setIdEmpresa($currentCompany->getIdEmpresa());
        $newEmpresa->setNombre_empresa($_POST['nombreEmpresa']);
        $newEmpresa->setVision($_POST['vision']);
        $newEmpresa->setMision($_POST['mision']);
        $newEmpresa->setObjetivos($_POST['objetivos']);
        $newEmpresa->setDescripcion($_POST['descripcion']);
        $newEmpresa->setTexto_Banner($_POST['textoBanner']);
        $newEmpresa->setTextoRedesSociales($_POST['textRedSocial']);
        $newEmpresa->setEmail($_POST['email']);
        $newEmpresa->setURL_facebook($_POST['facebook']);
        $newEmpresa->setURL_instagram($_POST['instagram']);
        $newEmpresa->setURL_twitter($_POST['twitter']);
        $newEmpresa->setURL_Skipe($_POST['skype']);
        $newEmpresa->setURL_linkedin($_POST['linkedin']);
        $newEmpresa->setDireccion($_POST['direccion']);
        $newEmpresa->setTelefono($_POST['telefono']);
        $newEmpresa->setLogo($currentCompany->getLogo());
        $newEmpresa->setMostrar_imgDescuento($currentCompany->getMostrar_imgDescuento());
        $empresaBO->update($newEmpresa);
        $currentCompany = $empresaBO->getById($_SESSION['idEmpresa']);
        $typeAlert=1;
        $msgAlert = "Informacion actualizada exitosamente";
    }else{
        $typeAlert = 2;
        $msgAlert = "El correo ya se encuentra registrado. Por favor utilice otro nombre.";
    }
}