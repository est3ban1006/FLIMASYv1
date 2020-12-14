<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Persona implements \JsonSerializable{
    private $idPersona;
    private $Cedula;
    private $Nombre;
    private $Apellido1;
    private $Apellido2;
    private $Correo;
    private $Telefono;
    private $Direccion;
    private $Celular;
    private $Rol;
    private $FechaNacimiento;
    
    public function __construct() {
    }
    function getIdPersona() {
        return $this->idPersona;
    }

    function getCedula() {
        return $this->Cedula;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellido1() {
        return $this->Apellido1;
    }

    function getApellido2() {
        return $this->Apellido2;
    }
    
    function getFullName(){
        return $this->Nombre." ".$this->Apellido1." ".$this->Apellido2;
    }

    function getCorreo() {
        return $this->Correo;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getCelular() {
        return $this->Celular;
    }

    function getRol() {
        return $this->Rol;
    }
    
    public function getFechaNacimiento() {
        return $this->FechaNacimiento;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    function setCedula($Cedula) {
        $this->Cedula = $Cedula;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setApellido1($Apellido1) {
        $this->Apellido1 = $Apellido1;
    }

    function setApellido2($Apellido2) {
        $this->Apellido2 = $Apellido2;
    }

    function setCorreo($Correo) {
        $this->Correo = $Correo;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    function setCelular($Celular) {
        $this->Celular = $Celular;
    }

    function setRol($Rol) {
        $this->Rol = $Rol;
    }
    
    public function setFechaNacimiento($FechaNacimiento) {
        $this->FechaNacimiento = $FechaNacimiento;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}