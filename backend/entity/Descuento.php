<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Descuento implements \JsonSerializable{

    private $idDescuento;
    private $idEmpresa;
    private $Nombre;
    private $Porcentaje;
    private $Valor;

    public function __construct() {
    }

    function getIdDescuento() {
        return $this->idDescuento;
    }
    
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getPorcentaje() {
        return $this->Porcentaje;
    }
    
    function getValor() {
        return $this->Valor;
    }

    function setIdDescuento($idDescuento) {
        $this->idDescuento = $idDescuento;
    }
    
    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    
    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setPorcentaje($Porcentaje) {
        $this->Porcentaje = $Porcentaje;
    }
    
    function setValor($Valor) {
        $this->Valor = $Valor;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
