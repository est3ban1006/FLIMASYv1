<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Empresa implements \JsonSerializable {

    private $idEmpresa;
    private $Fecha_creacion;
    private $Activo;
    private $Nombre_empresa;
    private $Vision;
    private $Mision;
    private $Objetivos;
    private $Telefono;
    private $Direccion;
    private $URL_facebook;
    private $URL_instagram;
    private $Logo;
    private $Mostrar_imgDescuento;
    private $Texto_Banner;
    private $Descripcion;
    private $Email;
    private $TextoRedesSociales;
    private $URL_twitter;
    private $URL_Skipe;
    private $URL_linkedin;

    public function __construct() {
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getFecha_creacion() {
        return $this->Fecha_creacion;
    }

    function getActivo() {
        return $this->Activo;
    }

    function getNombre_empresa() {
        return $this->Nombre_empresa;
    }

    function getVision() {
        return $this->Vision;
    }

    function getMision() {
        return $this->Mision;
    }

    function getObjetivos() {
        return $this->Objetivos;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getURL_facebook() {
        return $this->URL_facebook;
    }

    function getURL_instagram() {
        return $this->URL_instagram;
    }

    function getLogo() {
        return $this->Logo;
    }

    function getMostrar_imgDescuento() {
        return $this->Mostrar_imgDescuento;
    }

    function getTexto_Banner() {
        return $this->Texto_Banner;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function getEmail() {
        return $this->Email;
    }

    function getTextoRedesSociales() {
        return $this->TextoRedesSociales;
    }

    function getURL_twitter() {
        return $this->URL_twitter;
    }

    function getURL_Skipe() {
        return $this->URL_Skipe;
    }

    function getURL_linkedin() {
        return $this->URL_linkedin;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setFecha_creacion($Fecha_creacion) {
        $this->Fecha_creacion = $Fecha_creacion;
    }

    function setActivo($Activo) {
        $this->Activo = $Activo;
    }

    function setNombre_empresa($Nombre_empresa) {
        $this->Nombre_empresa = $Nombre_empresa;
    }

    function setVision($Vision) {
        $this->Vision = $Vision;
    }

    function setMision($Mision) {
        $this->Mision = $Mision;
    }

    function setObjetivos($Objetivos) {
        $this->Objetivos = $Objetivos;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    function setURL_facebook($URL_facbook) {
        $this->URL_facebook = $URL_facbook;
    }

    function setURL_instagram($URL_instagram) {
        $this->URL_instagram = $URL_instagram;
    }

    function setLogo($Logo) {
        $this->Logo = $Logo;
    }

    function setMostrar_imgDescuento($Mostrar_imgDescuento) {
        $this->Mostrar_imgDescuento = $Mostrar_imgDescuento;
    }

    function setTexto_Banner($Texto_Banner) {
        $this->Texto_Banner = $Texto_Banner;
    }

    function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setTextoRedesSociales($TextoRedesSociales) {
        $this->TextoRedesSociales = $TextoRedesSociales;
    }

    function setURL_twitter($URL_twitter) {
        $this->URL_twitter = $URL_twitter;
    }

    function setURL_Skipe($URL_Skipe) {
        $this->URL_Skipe = $URL_Skipe;
    }

    function setURL_linkedin($URL_linkedin) {
        $this->URL_linkedin = $URL_linkedin;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
