<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Asiento_ReservaBO
 *
 * @author josue
 */
class Asiento_ReservaBO {
    private $asientoReservaDao;
    
    public function __construct($conn) {
        $this->asientoReservaDao = new Asiento_ReservaDao($conn);
    }
    
    public function add(Asiento_Reserva $asiento_reserva) {
        $this->asientoReservaDao->add($asiento_reserva);
    }
    
    public function delete($idAsiento_Reserva) {
       return $this->asientoReservaDao->delete($idAsiento_Reserva);
    }
    
    public function getById($idAsiento_Reserva) {
        return $this->asientoReservaDao->getById($idAsiento_Reserva);
    }
    
    public function getAll() {
        return $this->asientoReservaDao->getAll();
    }
    
    public function getAllByReserva($idReserva) {
       return $this->asientoReservaDao->getAllByReserva($idReserva);
    }
    
    public function update(Asiento_Reserva $asiento_reserva) {
        return $this->asientoReservaDao->update($asiento_reserva);
    }
    
    public function existById(Asiento_Reserva $asiento_reserva) {
        return $this->asientoReservaDao->existById($asiento_reserva);
    }
}
