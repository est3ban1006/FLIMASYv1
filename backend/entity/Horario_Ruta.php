<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Horario_Ruta implements \JsonSerializable{

    private $idHorario_Ruta;
    private $idRuta;
    private $idCatalogo_avion;
    private $Fecha;
    private $HoraDespliegue;
    private $HoraLlegada;
    private $Fecha_creacion;
    private $Status;
    private $Precio;
    private $Cant_AsientosDisponibles;

    public function __construct() {
    }

    function getIdHorario_Ruta() {
        return $this->idHorario_Ruta;
    }

    function getIdRuta() {
        return $this->idRuta;
    }

    function getIdCatalogo_avion() {
        return $this->idCatalogo_avion;
    }

    function getFecha() {
        return $this->Fecha;
    }

    function getHoraDespliegue() {
        return $this->HoraDespliegue;
    }

    function getHoraLlegada() {
        return $this->HoraLlegada;
    }

    function getFecha_creacion() {
        return $this->Fecha_creacion;
    }

    function getStatus() {
        return $this->Status;
    }

    function getPrecio() {
        return $this->Precio;
    }

    function getCant_AsientosDisponibles() {
        return $this->Cant_AsientosDisponibles;
    }

    function setIdHorario_Ruta($idHorario_Ruta) {
        $this->idHorario_Ruta = $idHorario_Ruta;
    }

    function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }

    function setIdCatalogo_avion($idCatalogo_avion) {
        $this->idCatalogo_avion = $idCatalogo_avion;
    }

    function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    function setHoraDespliegue($HoraDespliegue) {
        $this->HoraDespliegue = $HoraDespliegue;
    }

    function setHoraLlegada($HoraLlegada) {
        $this->HoraLlegada = $HoraLlegada;
    }

    function setFecha_creacion($Fecha_creacion) {
        $this->Fecha_creacion = $Fecha_creacion;
    }

    function setStatus($Status) {
        $this->Status = $Status;
    }

    function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    function setCant_AsientosDisponibles($Cant_AsientosDisponibles) {
        $this->Cant_AsientosDisponibles = $Cant_AsientosDisponibles;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
