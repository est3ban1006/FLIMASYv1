<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Tipo_Avion implements \JsonSerializable{

    private $idTipo_Avion;
    private $Año;
    private $Modelo;
    private $Marca;
    private $Cant_pasajeros;
    private $Cant_filas;
    private $Cant_asientos;
    private $idEmpresa;

    public function __construct() {
    }

    function getIdTipo_Avion() {
        return $this->idTipo_Avion;
    }

    function getAño() {
        return $this->Año;
    }

    function getModelo() {
        return $this->Modelo;
    }

    function getMarca() {
        return $this->Marca;
    }

    function getCant_pasajeros() {
        return $this->Cant_pasajeros;
    }

    function getCant_filas() {
        return $this->Cant_filas;
    }

    function getCant_asientos() {
        return $this->Cant_asientos;
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function setIdTipo_Avion($idTipo_Avion) {
        $this->idTipo_Avion = $idTipo_Avion;
    }

    function setAño($Año) {
        $this->Año = $Año;
    }

    function setModelo($Modelo) {
        $this->Modelo = $Modelo;
    }

    function setMarca($Marca) {
        $this->Marca = $Marca;
    }

    function setCant_pasajeros($Cant_pasajeros) {
        $this->Cant_pasajeros = $Cant_pasajeros;
    }

    function setCant_filas($Cant_filas) {
        $this->Cant_filas = $Cant_filas;
    }

    function setCant_asientos($Cant_asientos) {
        $this->Cant_asientos = $Cant_asientos;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
