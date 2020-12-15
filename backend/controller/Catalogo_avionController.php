<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//ELIMINAR EL AVION
if(!empty($_POST['deleteAvion'])){
	$avionBO->delete($_POST['idDelete']);
	$typeAlert = 1;
	$msgAlert = "Avion eliminado correctamente";
}

$newTipoAvion = $newNameAvion = "";
//POST PARA AGREGAR UN AVION 
if(!empty($_POST['addAvion'])){
	$avion = new Catalogo_avion();
	$avion->setIdEmpresa($currentCompany->getIdEmpresa());
	$avion->setIdTipo_Avion($_POST['tipoAvion']);
	$avion->setNombre_Avion($_POST['nombre']);
	$avion->setFecha_creacion(date('Y-m-d H:i:s'));
	$avion->setActivo(1);
	$avionBO->add($avion);
	header('Location: staffAvion.php');
}

//POST PARA ACTUALIZAR AVION
if(!empty($_POST['updateAvion'])){
	$avion = $avionBO->getById($_GET['id']); 
	$avion->setIdTipo_Avion($_POST['tipoAvion']);
	$avion->setNombre_Avion($_POST['nombre']);
	$avionBO->update($avion);
	$typeAlert = 1;
	$msgAlert = "Informacion actualizada correctamente";
}