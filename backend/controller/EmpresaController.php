<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//POST DE ACTUALIZAR INFORMACION DE LA MPRESA
if(!empty($_POST['updateEmpresa'])){
	$check = 0;
	if(!empty($_POST['imgdescuento'])){
		$check = 1;
	}

	$logo = "";
	$storeFolder = 'C:/xampp/htdocs/FLIMASYv1/view/assets/recurses/company';
    $tamano      = $_FILES["logo"]['size'];
    $tipo        = $_FILES["logo"]['type'];
    $error       = $_FILES["logo"]['error'];
    $archivo     = $_FILES["logo"]['tmp_name'];
    $tmp         = $_FILES["logo"]['tmp_name'];
    $path        = $_FILES["logo"]['name'];
    $ext         = pathinfo($path, PATHINFO_EXTENSION);
    $prefijo     = substr(md5(uniqid(rand())), 0, 10);
    if ($archivo != "") {
        $destino    = $prefijo . "." . $ext;
        $targetPath = $storeFolder . DIRECTORY_SEPARATOR.$currentCompany->getIdEmpresa()."/";

        if(!file_exists($targetPath)){
        	mkdir($targetPath);
        }

        $targetFile = $targetPath . $destino;
        if (move_uploaded_file($tmp, $targetFile)) {
        	$logo = $targetFile;
        }
    }

	$empresaObj = new Empresa();
	$empresaObj->setIdEmpresa($currentCompany->getIdEmpresa());
	$empresaObj->setFecha_creacion($currentCompany->getFecha_creacion());
	$empresaObj->setActivo($currentCompany->getActivo());
	$empresaObj->setNombre_empresa($_POST['nombreEmpresa']);
	$empresaObj->setVision($_POST['vision']);
	$empresaObj->setMision($_POST['mision']);
	$empresaObj->setObjetivos($_POST['objetivos']);
	$empresaObj->setTelefono($_POST['telefono']);
	$empresaObj->setURL_facebook($_POST['facebook']);
	$empresaObj->setURL_instagram($_POST['instagram']);
	$empresaObj->setLogo($logo);
	$empresaObj->setMostrar_imgDescuento($check);
	$empresaObj->setTexto_Banner($_POST['textoBanner']);
	$empresaObj->setDescripcion($_POST['direccion']);
	$empresaObj->setEmail($_POST['email']);
	$empresaObj->setTextoRedesSociales($_POST['textRedSocial']);
	$empresaObj->setURL_twitter($_POST['twitter']);
	$empresaObj->setURL_Skipe($_POST['skype']);
	$empresaObj->setURL_linkedin($_POST['linkedin']);
	$empresaBO->update($empresaObj);

	$currentCompany = $empresaBO->getById($empresaObj->getIdEmpresa());
	$typeAlert = 1;
	$msgAlert = "Informacion de la empresa actualizada correctamente";
}