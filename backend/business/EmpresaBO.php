<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpresaBO
 *
 * @author josue
 */
class EmpresaBO {
    private $empresaDao;
    
    public function __construct($conn) {
        $this->empresaDao = new EmpresaDao($conn);
    }
    
    public function add(Empresa $empresa) {
       return $this->empresaDao->add($empresa);
    }
    
    public function delete($idEmpresa) {
        $this->empresaDao->delete($idEmpresa);
    }
    
    public function getById($idEmpresa) {
        return $this->empresaDao->getById($idEmpresa);
    }
    
    public function getAll() {
        return $this->empresaDao->getAll();
    }
    
    public function update(Empresa $empresa) {
        return $this->empresaDao->update($empresa);
    }
    
    public function exist(Empresa $empresa) {
        return $this->empresaDao->exist($empresa);
    }
}
