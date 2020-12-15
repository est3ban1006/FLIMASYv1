<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$idRutaBuscar = 0;
$dateBuscar = "";
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

//POST PARA BUSCAR
if(!empty($_POST['search'])){
	$idRutaBuscar = $_POST['ruta'];
	$dateBuscar = $_POST['fecha'];
	$listaHorarios = array();
	if(empty($_POST['ruta'])){
		$listRutas = $rutaBO->getAllByEmpresa($currentCompany->getIdEmpresa());
	}else{
		$listRutas = array();
		array_push($listRutas, array("idRuta" => $_POST['ruta']));
	}
	foreach ($listRutas as $ruta2) {
	  $horariosPorRuta = $horariBO->getAllByRuta($ruta2['idRuta']); 
	  foreach ($horariosPorRuta as $hor) {
	    if($hor['Cant_AsientosDisponibles'] > 0 && $hor['Fecha'] == $_POST['fecha']){
	      array_push($listaHorarios, $hor);
	    }
	  }
	}
}