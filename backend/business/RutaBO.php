<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RutaBO
 *
 * @author josue
 */
class RutaBO {
    private $rutaDao;
    
    public function __construct($conn) {
        $this->rutaDao = new RutaDao($conn);
    }
    
    public function add(Ruta $ruta) {
        $this->rutaDao->add($ruta);
    }
    
    public function delete($idRuta) {
       return $this->rutaDao->delete($idRuta);
    }
    
    public function getById($idRuta) {
       return $this->rutaDao->getById($idRuta);
    }
    
    public function getAll() {
      return  $this->rutaDao->getAll();
    }
    
    public function getAllByEmpresa($idEmpresa) {
       return $this->rutaDao->getAllByEmpresa($idEmpresa);
    }
    
    public function update(Asiento_Reserva $asiento_reserva) {
       return $this->rutaDao->update($asiento_reserva);
    }
    
    public function exist(Ruta $ruta) {
       return $this->rutaDao->exist($ruta);
    }
}
