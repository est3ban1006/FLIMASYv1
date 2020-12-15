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