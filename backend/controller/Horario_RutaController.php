<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$newAvionHorario = $newRutaHorario = $newDateHorario = $newPrecioHorario = $newHoraDespliegueHorario = $cantAsientosHorario = $cantAsientosDescuento = $newDescuentoHorario = "";

//POST PARA AGREGAR UN HORARIO
if(!empty($_POST['addHorario'])){
	$newAvionHorario = $_POST['avion'];
	$newRutaHorario = $_POST['ruta'];
	$newDateHorario = $_POST['fecha'];
	$newPrecioHorario = $_POST['precio'];
	$newHoraDespliegueHorario = $_POST['horaDespliegue'];
	$cantAsientosHorario = $_POST['cantAsientosDispo'];
	$cantAsientosDescuento = $_POST['cantAsientosDescuento'];
	$newDescuentoHorario = $_POST['descuento'];

	$date1 = new DateTime(date('Y-m-d'));
	$date2 =new DateTime($newDateHorario);

	if($date1 < $date2){
		$ruta = $rutaBO->getById($_POST['ruta']);
		$date1 = new DateTime(date('H:i:s', strtotime($_POST['horaDespliegue'])));
		$arrDuracion = explode(":", $ruta->getDuracion()); 
		$date1->modify($arrDuracion[0]." hours");
		$date1->modify($arrDuracion[1]." minutes");
		$date1->modify($arrDuracion[2]." seconds"); 

		$horario = new Horario_Ruta();
		$horario->setIdRuta($_POST['ruta']);
		$horario->setIdCatalogo_avion($_POST['avion']);
		$horario->setFecha($_POST['fecha']);
		$horario->setHoraDespliegue($_POST['horaDespliegue']);
		$horario->setHoraLlegada($date1->format("H:i:s"));
		$horario->setFecha_creacion(date('Y-m-d H:i:s'));
		$horario->setStatus("Programado");
		$horario->setPrecio($_POST['precio']);
		$horario->setCant_AsientosDisponibles($_POST['cantAsientosDispo']);
		//GUARDAR EL HORARIO
		$horariBO->add($horario);
		//OBTENER ULTIMO HORARIO AGREGADO
		$horario = $horariBO->getLastByRuta($_POST['ruta']);

		$cantDescuento = 0;
		$idDescuento = $_POST['descuento'];
		if(!empty($idDescuento)){
			$cantDescuento = $_POST['cantAsientosDescuento'];
		}

		$counter = 1;
		while ($counter <= $cantAsientosHorario) {
			if($counter > $cantDescuento){
				$idDescuento = 0;
			}

			#AGREGAR LOS ASIENTOS HORARIOS POR CADA ASIENTO DISPONIBLE
			$asiento = new Asiento_Ruta();
			$asiento->setIdRuta($horario->getIdHorario_Ruta());
			$asiento->setIdDescuento($idDescuento);
			$asiento->setNumeroAsiento($counter);
			$asiento->setFecha_creacion(date('Y-m-d H:i:s'));
			$asiento->setPrecio($newPrecioHorario);
			$asiento->setEstado("Disponible");
			$asientoRutaBO->add($asiento);
			$counter++;
		}

		header("Location: staffHorario.php");
	}else{
		$typeAlert = 2;
		$msgAlert = "La fecha debe ser mayor a hoy";
	}
}

//POST PARA ELIMINAR UN RECORD
if(!empty($_POST['deleteHorario'])){
	//PRIMERO OBTENER TODOS LOS ASIENTOS DEL HORARIO Y DESPUES ELIMINO LOS ASIENTO RESERVA
	$asientos = $asientoRutaBO->getAllBySchedule($_POST['idDelete']);
	foreach ($asientos as $asiento) {
		#OBTENER TODOS LOS ASIENTOS RESERVA DE ESE ASIENTO
		$asientosReserva = $asientoReservaBO->getAllByAsientoRuta($asiento['idAsiento_Ruta']);
		foreach ($asientosReserva as $key) {
			#ELIMINAR
			$asientoReservaBO->delete($key['idAsiento_Reserva']);
		}

		#AHORA ELIMINAR EL ASIENTO
		$asientoRutaBO->delete($asiento['idAsiento_Ruta']);
	}
	#ahora eliminar el horario
	$horariBO->delete($_POST['idDelete']);
	$typeAlert = 1;
	$msgAlert = 'Horario eliminado correctamente';
}

//POST PARA ELIMINAR UN ASIENTO 
if(!empty($_POST['deleteAsientoRuta'])){
	//OBTENER EL ASIENTO Y OBTENER EL HORARIO
	$asiento = $asientoRutaBO->getById($_POST['idDelete']);
	$horario = $horariBO->getById($asiento->getIdRuta());

	#ELIMINAR LOS ASIENTOS RESERVA DE ESE ASIETNO
	$asientosReserva = $asientoReservaBO->getAllByAsientoRuta($asiento->getIdAsiento_Ruta());
	foreach ($asientosReserva as $key) {
		#ELIMINAR
		$asientoReservaBO->delete($key['idAsiento_Reserva']);
	}

	#AHORA ELIMINAR EL ASIENTO
	$asientoRutaBO->delete($_POST['idDelete']);
	if($asiento->getEstado() == "Disponible"){
		$cant = $horario->getCant_AsientosDisponibles() - 1;
		#ACTUALIZAR LA CANTIDAD DE ASIENTOS DE HORARIO 
		$horario->setCant_AsientosDisponibles($cant);
		$horariBO->update($horario);
	}
	$typeAlert = 1;
	$msgAlert = "Asiento eliminado correctamente";
}

//POST PARA ACTAIZAR INFORMACION 
if(!empty($_POST['updateHorario'])){
	$horario = $horariBO->getById($_GET['id']);
	$horario->setIdRuta($_POST['ruta']);
	$horario->setIdCatalogo_avion($_POST['avion']);
	$horario->setFecha($_POST['fecha']);
	$horario->setHoraDespliegue($_POST['horaDespliegue']);
	$horario->setPrecio($_POST['precio']);

	$ruta = $rutaBO->getById($_POST['ruta']);
	$date1 = new DateTime(date('H:i:s', strtotime($_POST['horaDespliegue'])));
	$arrDuracion = explode(":", $ruta->getDuracion()); 
	$date1->modify($arrDuracion[0]." hours");
	$date1->modify($arrDuracion[1]." minutes");
	$date1->modify($arrDuracion[2]." seconds"); 

	$horario->setHoraLlegada($date1->format("H:i:s"));
	$horariBO->update($horario);

	#ACTUALIZAR EL PRECIO DE CADA UNO DE LOS ASIENTOS
	$asientos = $asientoRutaBO->getAllBySchedule($_GET['id']);
	foreach ($asientos as $key) {
		$asiento = $asientoRutaBO->getById($key['idAsiento_Ruta']);
		$asiento->setPrecio($_POST['precio']);
		$asientoRutaBO->update($asiento);
	}

	$typeAlert = 1;
	$msgAlert = "Informacion actualizada correctamente";
}