<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DescuentoBO
 *
 * @author josue
 */
class DescuentoBO {
    private $descuentoDao;
    
    public function __construct($conn) {
        $this->descuentoDao = new DescuentoDao($conn);
    }
    
    public function add(Descuento $descuento) {
        $this->descuentoDao->add($descuento);
    }
    
    public function delete($idDescuento) {
       return $this->descuentoDao->delete($idDescuento);
    }
    
    public function getById($idDescuento) {
        return $this->descuentoDao->getById($idDescuento);
    }
    
    public function getAll() {
        return $this->descuentoDao->getAll();
    }
    
    public function getAllByEmpresa($idEmpresa) {
        return $this->descuentoDao->getAllByEmpresa($idEmpresa);
    }
    
    public function update(Descuento $descuento) {
       return $this->descuentoDao->update($descuento);
    }
    
    public function exist(Descuento $descuento) {
        return $this->descuentoDao->exist($descuento);
    }
}
