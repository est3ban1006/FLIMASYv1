<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//GUARDAR RESERVA CLIENTE
if(!empty($_POST['addReserva'])){
	$horario = $horariBO->getById($_GET['id']);
	$avion = $avionBO->getById($horario->getIdCatalogo_avion());
	$rutaObj = $rutaBO->getById($horario->getIdRuta());
	$tipoAvion = $tipoAvionBO->getById($avion->getIdTipo_Avion());

	//PRIMERO GUARDAR LA RESERVA
	$reserva = new Reserva();
	$reserva->setIdPersona($currentPerson->getIdPersona());
	$reserva->setDiaReserva($horario->getFecha());
	$reserva->setMonto_total($_POST['totalPago']);
	$reserva->setEstado("Pendiente a cancelar");
	$reserva->setDescuento($_POST['descuento']);
	$reserva->setImpuesto(0);
	$reserva->setFecha_creacion(date('Y-m-d H:i:s'));
	$reservaBO->add($reserva);

	$reserva = $reservaBO->getLastByPersona($currentPerson->getIdPersona());

	if(!empty($reserva)){
		//DESPUES AGREGAR LOS ASIENTOS DE LA RESERVA
		$arr = explode(";", $_POST['idAsientos']);
		$count = 0;
		foreach ($arr as $key) {
			if(!empty($key)){ 
				$asiento = $asientoRutaBO->getById($key);
				$count++;
				$montoDescuento = 0;
                if($asiento->getIdDescuento() != 0){
                  //TRAER EL DESCUENTO
                  $descuento = $descuentoBO->getById($asiento->getIdDescuento());
                  if(!empty($descuento)){
                    $montoDescuento = $asiento->getPrecio() / $descuento->getPorcentaje();
                  }
                }

				$asientoReserva = new Asiento_Reserva();
				$asientoReserva->setIdReserva($reserva->getIdReserva());
				$asientoReserva->setIdAsiento_Avion($asiento->getIdAsiento_Ruta());
				$asientoReserva->setPrecio($asiento->getPrecio());
				$asientoReserva->setDescuento($montoDescuento);
				$asientoReserva->setImpuesto(0);
				$asientoReserva->setEstado("Reservado");
				$asientoReserva->setFecha_creacion(date('Y-m-d H:i:s'));
				$asientoReservaBO->add($asientoReserva);

				#ACTUALIZAR EL ASIENTO RUTA PORQUE YA ESTA RESERVADO
				$asiento->setEstado("Reservado");
				$asientoRutaBO->update($asiento);
			}
		}
		$horario->setCant_AsientosDisponibles($horario->getCant_AsientosDisponibles()-$count);
		$horariBO->update($horario);
		header("Location: reservaciones.php");
	}else{
		$typeAlert = 2;
		$msgAlert = "Ocurrio un error al guardar la reserva";
	}
}