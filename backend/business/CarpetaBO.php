<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarpetaBO
 *
 * @author josue
 */
class CarpetaBO {
    private $carpetaDao;

    public function __construct($conn) {
        $this->carpetaDao = new CarpetaDao($conn);
    }    
    
    public function add(Carpeta $carpeta){
        $this->carpetaDao->add($carpeta);
    }
    
    public function delete($idCarpeta){
       return $this->carpetaDao->delete($idCarpeta);
    }    
    
    public function getById($idCarpeta){
        return$this->carpetaDao->getById($idCarpeta);
    }
    
    public function getAll(){
        return $this->carpetaDao->getAll();
    }
    
    public function getAllByEmpresa($idEmpresa){
        return $this->carpetaDao->getAllByEmpresa($idEmpresa);
    }
    
    public function update(Carpeta $carpeta){
        return $this->carpetaDao->update($carpeta);
    }
    
    public function exist(Carpeta $carpeta){
        return $this->carpetaDao->exist($carpeta);
    }
}
