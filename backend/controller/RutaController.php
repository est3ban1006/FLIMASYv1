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

$newNameRuta = $newDuracionRuta = "";
if(!empty($_POST['addRuta'])){
	$ruta = new Ruta();
	$ruta->setIdEmpresa($currentCompany->getIdEmpresa());
	$ruta->setRuta($_POST['ruta']);
	$ruta->setDuracion($_POST['duracion']);
	$rutaBO->add($ruta);
	header("Location: staffRuta.php");
}