<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ruta implements \JsonSerializable {

    private $idRuta;
    private $idEmpresa;
    private $Ruta;
    private $Duracion;

    public function __construct() {
    }

    function getIdRuta() {
        return $this->idRuta;
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getRuta() {
        return $this->Ruta;
    }

    function getDuracion() {
        return $this->Duracion;
    }

    function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setRuta($Ruta) {
        $this->Ruta = $Ruta;
    }

    function setDuracion($Duracion) {
        $this->Duracion = $Duracion;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
