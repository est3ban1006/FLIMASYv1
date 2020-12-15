<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//POST ELIMINAR RUTA
if(!empty($_POST['deleteRuta'])){
	$rutaBO->delete($_POST['idDelete']);
	$typeAlert = 1;
	$msgAlert = "Ruta eliminada correctamente";
}
 //POST AGREGAR RUTA
$newNameRuta = $newDuracionRuta = "";
if(!empty($_POST['addRuta'])){
	$rutaObj = new Ruta();
	$rutaObj->setIdEmpresa($currentCompany->getIdEmpresa());
	$rutaObj->setRuta($_POST['ruta']);
	$rutaObj->setDuracion($_POST['duracion']);
	$rutaBO->add($rutaObj);
	header("Location: staffRuta.php");
}

//POST ACTUALIZAR 
if(!empty($_POST['updateRuta'])){
	$rutaObj = new Ruta();
	$rutaObj->setIdRuta($_GET['id']);
	$rutaObj->setIdEmpresa($currentCompany->getIdEmpresa());
	$rutaObj->setRuta($_POST['ruta']);
	$rutaObj->setDuracion($_POST['duracion']);
	$rutaBO->update($rutaObj);

	$typeAlert = 1;
	$msgAlert = "Ruta actualizada correctamente";
}