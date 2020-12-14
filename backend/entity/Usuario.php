<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario implements \JsonSerializable{

    private $idUsuario;
    private $idPersona;
    private $Usuario;
    private $Contraseña;
    private $Activo;
    private $Fecha_registro;
    private $idEmpresa;
    
    public function __construct() {
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdPersona() {
        return $this->idPersona;
    }

    function getUsuario() {
        return $this->Usuario;
    }

    function getContraseña() {
        return $this->Contraseña;
    }

    function getActivo() {
        return $this->Activo;
    }

    function getFecha_registro() {
        return $this->Fecha_registro;
    }
    
    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    function setContraseña($Contraseña) {
        $this->Contraseña = $Contraseña;
    }

    function setActivo($Activo) {
        $this->Activo = $Activo;
    }

    function setFecha_registro($Fecha_registro) {
        $this->Fecha_registro = $Fecha_registro;
    }
    
    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
