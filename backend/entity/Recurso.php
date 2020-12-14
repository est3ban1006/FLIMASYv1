<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Recurso implements \JsonSerializable{

    private $idRecurso;
    private $idCarpeta;   
    private $Nombre;
    private $Tipo;
    private $Tamaño;
    private $Ruta;

    public function __construct() {
    }
    function getIdRecurso() {
        return $this->idRecurso;
    }

    function getIdCarpeta() {
        return $this->idCarpeta;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getTipo() {
        return $this->Tipo;
    }

    function getTamaño() {
        return $this->Tamaño;
    }

    function getRuta() {
        return $this->Ruta;
    }

    function setIdRecurso($idRecurso) {
        $this->idRecurso = $idRecurso;
    }

    function setIdCarpeta($idCarpeta) {
        $this->idCarpeta = $idCarpeta;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }

    function setTamaño($Tamaño) {
        $this->Tamaño = $Tamaño;
    }

    function setRuta($Ruta) {
        $this->Ruta = $Ruta;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
