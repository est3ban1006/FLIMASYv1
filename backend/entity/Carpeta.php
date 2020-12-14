<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Carpeta implements \JsonSerializable{

    private $idCarpeta;
    private $idEmpresa;
    private $Nombre;
    private $EsBannerDescuento;

    public function __construct() {
    }

    function getIdCarpeta() {
        return $this->idCarpeta;
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getEsBannerDescuento() {
        return $this->EsBannerDescuento;
    }

    function setIdCarpeta($idCarpeta) {
        $this->idCarpeta = $idCarpeta;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setEsBannerDescuento($EsBannerDescuento) {
        $this->EsBannerDescuento = $EsBannerDescuento;
    }
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
