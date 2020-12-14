<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Reserva implements \JsonSerializable {

    private $idReserva;
    private $idPersona;
    private $DiaReserva;
    private $Monto_total;
    private $Estado;
    private $Descuento;
    private $Impuesto;
    private $Fecha_creacion;

    public function __construct() {
    }

    function getIdReserva() {
        return $this->idReserva;
    }

    function getIdPersona() {
        return $this->idPersona;
    }

    function getDiaReserva() {
        return $this->DiaReserva;
    }

    function getMonto_total() {
        return $this->Monto_total;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getDescuento() {
        return $this->Descuento;
    }

    function getImpuesto() {
        return $this->Impuesto;
    }

    function getFecha_creacion() {
        return $this->Fecha_creacion;
    }

    function setIdReserva($idReserva) {
        $this->idReserva = $idReserva;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    function setDiaReserva($DiaReserva) {
        $this->DiaReserva = $DiaReserva;
    }

    function setMonto_total($Monto_total) {
        $this->Monto_total = $Monto_total;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    function setDescuento($Descuento) {
        $this->Descuento = $Descuento;
    }

    function setImpuesto($Impuesto) {
        $this->Impuesto = $Impuesto;
    }

    function setFecha_creacion($Fecha_creacion) {
        $this->Fecha_creacion = $Fecha_creacion;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
