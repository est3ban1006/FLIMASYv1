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
    $descuentoBO->delete($_POST['idDelete']); 
    $typeAlert = 1;
    $msgAlert = "El usuario ha sido eliminado correctamente";
}