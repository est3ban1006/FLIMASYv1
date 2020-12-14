<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tipo_AvionBO
 *
 * @author josue
 */
class Tipo_AvionBO {
    private $tipoAvionDao;
    
    public function __construct($conn) {
        $this->tipoAvionDao = new Tipo_AvionDao($conn);
    }
    
    public function add(Tipo_Avion $tipo_avion) {
        $this->tipoAvionDao->add($tipo_avion);
    }
    
    public function delete($idTipo_Avion) {
       return $this->tipoAvionDao->delete($idTipo_Avion);
    }
    
    public function getById($idTipo_Avion) {
       return $this->tipoAvionDao->getById($idTipo_Avion);
    }
    
    public function getAll() {
       return $this->tipoAvionDao->getAll();
    }
    
    public function getAllByEmpresa($idEmpresa) {
       return $this->tipoAvionDao->getAllByEmpresa($idEmpresa);
    }
    
    public function update(Tipo_Avion $tipo_avion) {
       return $this->tipoAvionDao->update($tipo_avion);
    }
    
    public function exist(Tipo_Avion $tipo_avion) {
       return $this->tipoAvionDao->exist($tipo_avion);
    }
}
