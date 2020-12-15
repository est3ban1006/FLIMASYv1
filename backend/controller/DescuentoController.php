<?php

if (!empty($_POST['addDescuento'])){
    $descuentoObj= new Descuento();
    $descuentoObj->setIdEmpresa($currentCompany->getIdEmpresa());
    $descuentoObj->setNombre($_POST['nombre']);
    $descuentoObj->setPorcentaje($_POST['porcentaje']);
    $descuentoObj->setValor($_POST['valor']);       
    $descuentoBO->add($descuentoObj);
    header("location: staffDescuento.php");
}

if(!empty($_POST['deleteDescuento'])){
    #OBTENER LOS ASIENTOS CON ESE DESCUENTO Y ELIMINARLOS 
    $asientos = $asientoRutaBO->getAllByDescuento($_POST['idDelete']);
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

    $descuentoBO->delete($_POST['idDelete']); 
    $typeAlert = 1;
    $msgAlert = "El usuario ha sido eliminado correctamente";
}

//POST ACTUALIZAR
if(!empty($_POST['updateDescuento'])){
    $descuento = $descuentoBO->getById($_GET['id']);
    $descuento->setNombre($_POST['nombre']);
    $descuento->setPorcentaje($_POST['porcentaje']);
    $descuento->setValor($_POST['valor']);
    $descuentoBO->update($descuento);
    $typeAlert = 1;
    $msgAlert = "Informacion actualizada correctamente";
}