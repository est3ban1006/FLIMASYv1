<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Catalogo_avionBO
 *
 * @author josue
 */
class Catalogo_avionBO {
    private $avionDao;
    
    public function __construct($conn) {
        $this->avionDao = new Catalogo_avionDao($conn);
    }
    
    public function add(Catalogo_avion $catalogo_avion) {
      return  $this->avionDao->add($catalogo_avion);
    }
    
    public function delete($idCatalogo_avion) {
        $this->avionDao->delete($idCatalogo_avion);
    }
    
    public function getById($idCatalogo_avion) {
        return $this->avionDao->getById($idCatalogo_avion);
    }
    
    public function getAll() {
        return $this->avionDao->getAll();
    }
    
    public function getAllByEmpresa($idEmpresa) {
        return $this->avionDao->getAllByEmpresa($idEmpresa);
    }
    
    public function getAllByTipo($idTipo) {
        return $this->avionDao->getAllByTipo($idTipo);
    }
    
    public function update(Catalogo_avion $catalogo_avion) {
        return $this->avionDao->update($catalogo_avion);
    }
    
    public function exist(Catalogo_avion $catalogo_avion) {
        return $this->avionDao->exist($catalogo_avion);
    }    
}
