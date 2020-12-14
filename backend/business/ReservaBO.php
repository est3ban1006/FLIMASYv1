<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReservaBO
 *
 * @author josue
 */
class ReservaBO {
    private $reservaDao;
    
    public function __construct($conn) {
        $this->reservaDao = new ReservaDao($conn);
    }
    
    public function add(Reserva $reserva) {
        $this->reservaDao->add($reserva);
    }
    
    public function delete($idReserva) {
       return $this->reservaDao->delete($idReserva);
    }
    
    public function getById($idReserva) {
       return $this->reservaDao->getById($idReserva);
    }
    
    public function getAll() {
       return $this->reservaDao->getAll();
    }
    
    public function getAllByPersona($idPersona) {
       return $this->reservaDao->getAllByPersona($idPersona);
    }
    
    public function update(Reserva $reserva) {
       return $this->reservaDao->update($reserva);
    }
    
    public function exist(Reserva $reserva) {
       return $this->reservaDao->exist($reserva);
    }
}
