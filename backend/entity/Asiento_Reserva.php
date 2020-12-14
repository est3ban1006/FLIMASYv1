<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Asiento_Reserva implements \JsonSerializable{

    private $idAsiento_Reserva;
    private $idReserva;
    private $idAsiento_Avion;
    private $Precio;
    private $Descuento;
    private $Impuesto;
    private $Estado;
    private $Fecha_creacion;

    public function __construct() {
    }

    function getIdAsiento_Reserva() {
        return $this->idAsiento_Reserva;
    }

    function getIdReserva() {
        return $this->idReserva;
    }

    function getIdAsiento_Avion() {
        return $this->idAsiento_Avion;
    }

    function getPrecio() {
        return $this->Precio;
    }

    function getDescuento() {
        return $this->Descuento;
    }

    function getImpuesto() {
        return $this->Impuesto;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getFecha_creacion() {
        return $this->Fecha_creacion;
    }

    function setIdAsiento_Reserva($idAsiento_Reserva) {
        $this->idAsiento_Reserva = $idAsiento_Reserva;
    }

    function setIdReserva($idReserva) {
        $this->idReserva = $idReserva;
    }

    function setIdAsiento_Avion($idAsiento_Avion) {
        $this->idAsiento_Avion = $idAsiento_Avion;
    }

    function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    function setDescuento($Descuento) {
        $this->Descuento = $Descuento;
    }

    function setImpuesto($Impuesto) {
        $this->Impuesto = $Impuesto;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    function setFecha_creacion($Fecha_creacion) {
        $this->Fecha_creacion = $Fecha_creacion;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
