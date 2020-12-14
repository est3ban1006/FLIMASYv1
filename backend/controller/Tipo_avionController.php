<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$newAno = $newModel = $newMarca = $cantFilas = $newPasajeros = $newCantAsientos = "";

//POST SAVE NEW TIPO AVION 
if(!empty($_POST['addTipoAvion'])){
	$tipoObj = new Tipo_Avion();
	$tipoObj->setAño($_POST['año']);
	$tipoObj->setModelo($_POST['modelo']);
	$tipoObj->setMarca($_POST['marca']);
	$tipoObj->setCant_pasajeros($_POST['cantpasajeros']);
	$tipoObj->setCant_filas($_POST['cantFilas']);
	$tipoObj->setCant_asientos($_POST['cantAsientos']);
	$tipoObj->setIdEmpresa($currentCompany->getIdEmpresa());

	$tipoAvionBO->add($tipoObj);
	header("Location: staffTipoAvion.php");
}

//POST PARA ELIMINAR UN TIPO DE AVION 
if(!empty($_POST['deleteTipoAvion'])){
	$tipoAvionBO->delete($_POST['idDelete']);
	$typeAlert = 1;
	$msgAlert = "Tipo de avion borrado correctamente";
}

//POST PARA ACTUALZIAR UN TIPO DE AVION 
if(!empty($_POST['updateTipoAvion'])){
	$tipoObj = new Tipo_Avion();
	$tipoObj->setIdTipo_Avion($_GET['id']);
	$tipoObj->setAño($_POST['año']);
	$tipoObj->setModelo($_POST['modelo']);
	$tipoObj->setMarca($_POST['marca']);
	$tipoObj->setCant_pasajeros($_POST['cantpasajeros']);
	$tipoObj->setCant_filas($_POST['cantFilas']);
	$tipoObj->setCant_asientos($_POST['cantAsientos']);
	$tipoObj->setIdEmpresa($currentCompany->getIdEmpresa());

	$tipoAvionBO->update($tipoObj);
	$typeAlert = 1;
	$msgAlert = "Informacion actualizada correctamente";
}