<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Asiento_Ruta implements \JsonSerializable {

    private $idAsiento_Ruta;
    private $idRuta;
    private $idDescuento;
    private $NumeroAsiento;
    private $Fecha_creacion;
    private $Precio;
    private $Estado;

    public function __construct() {
    }

    function getIdAsiento_Ruta() {
        return $this->idAsiento_Ruta;
    }

    function getIdRuta() {
        return $this->idRuta;
    }

    function getIdDescuento() {
        return $this->idDescuento;
    }

    function getNumeroAsiento() {
        return $this->NumeroAsiento;
    }

    function getFecha_creacion() {
        return $this->Fecha_creacion;
    }

    function getPrecio() {
        return $this->Precio;
    }

    function getEstado() {
        return $this->Estado;
    }

    function setIdAsiento_Ruta($idAsiento_Ruta) {
        $this->idAsiento_Ruta = $idAsiento_Ruta;
    }

    function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }

    function setIdDescuento($idDescuento) {
        $this->idDescuento = $idDescuento;
    }

    function setNumeroAsiento($NumeroAsiento) {
        $this->NumeroAsiento = $NumeroAsiento;
    }

    function setFecha_creacion($Fecha_creacion) {
        $this->Fecha_creacion = $Fecha_creacion;
    }

    function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
