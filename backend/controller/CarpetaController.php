<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$nombreCarpeta = "";
//accion para guardar una carpeta
if(!empty($_POST['addCarpeta'])){
	$file = new Carpeta();
	$file->setIdEmpresa($currentCompany->getIdEmpresa());
	$file->setNombre($_POST['name']);
	$file->setEsBannerDescuento(0);
	$carpetaBO->add($file);
	header("Location: gallery.php");
}

//eliminar carpeta
if(!empty($_POST['deleteCarpeta'])){
	$carpetaBO->delete($_POST['idDelete']);
	$typeAlert = 1;
	$msgAlert = "Carpeta eliminada correctamente";
}

if(!empty($_POST['addFile'])){
	$logo = "";
	$storeFolder = 'C:/xampp/htdocs/FLIMASYv1/view/assets/recurses/files';
    $tamano      = $_FILES["recurso"]['size'];
    $tipo        = $_FILES["recurso"]['type'];
    $error       = $_FILES["recurso"]['error'];
    $archivo     = $_FILES["recurso"]['tmp_name'];
    $tmp         = $_FILES["recurso"]['tmp_name'];
    $path        = $_FILES["recurso"]['name'];
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

    if(!empty($logo)){
    	$recurso = new Recurso();
    	$recurso->setIdCarpeta($_GET['id']);
    	$recurso->setNombre($path);
    	$recurso->setTipo($tipo);
    	$recurso->setTamaño($tamano);
    	$recurso->setRuta($logo);

    	$recursoBO->add($recurso);
    	header("Location: seeFiles.php?id=".$_GET['id']);
    }else{
    	$typeAlert = 2;
    	$msgAlert = "Ocurrio un error al guardar el archivo";
    }
}