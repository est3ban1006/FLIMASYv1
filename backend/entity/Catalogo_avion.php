<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Catalogo_avion implements \JsonSerializable {

    private $idCatalogo_avion;
    private $idEmpresa;
    private $idTipo_Avion;
    private $Nombre_Avion;
    private $Fecha_creacion;
    private $Activo;

    public function __construct() {
    }

    function getIdCatalogo_avion() {
        return $this->idCatalogo_avion;
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getIdTipo_Avion() {
        return $this->idTipo_Avion;
    }

    function getNombre_Avion() {
        return $this->Nombre_Avion;
    }

    function getFecha_creacion() {
        return $this->Fecha_creacion;
    }

    function getActivo() {
        return $this->Activo;
    }

    function setIdCatalogo_avion($idCatalogo_avion) {
        $this->idCatalogo_avion = $idCatalogo_avion;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setIdTipo_Avion($idTipo_Avion) {
        $this->idTipo_Avion = $idTipo_Avion;
    }

    function setNombre_Avion($Nombre_Avion) {
        $this->Nombre_Avion = $Nombre_Avion;
    }

    function setFecha_creacion($Fecha_creacion) {
        $this->Fecha_creacion = $Fecha_creacion;
    }

    function setActivo($Activo) {
        $this->Activo = $Activo;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
