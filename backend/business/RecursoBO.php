<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecursoBO
 *
 * @author josue
 */
class RecursoBO {
    private $recursoDao;
    
    public function __construct($conn) {
        $this->recursoDao = new RecursoDao($conn);
    }
    
    public function add(Recurso $recurso) {
        $this->recursoDao->add($recurso);
    }
    
    public function delete($idRecurso) {
       return $this->recursoDao->delete($idRecurso);
    }
    
    public function getById($idRecurso) {
       return $this->recursoDao->getById($idRecurso);
    }
    
    public function getAll() {
       return $this->recursoDao->getAll();
    }
    
    public function getAllByCarpeta($idCarpeta) {
       return $this->recursoDao->getAllByCarpeta($idCarpeta);
    }
    
    public function update(Recurso $recurso) {
       return $this->recursoDao->update($recurso);
    }
    
    public function exist(Recurso $recurso) {
       return $this->recursoDao->exist($recurso);
    }
}
