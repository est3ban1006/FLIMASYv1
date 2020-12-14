<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Horario_RutaBO
 *
 * @author josue
 */
class Horario_RutaBO {
    private $horarioDao;
    
    public function __construct($conn) {
        $this->horarioDao = new Horario_RutaDao($conn);
    }
    
    public function add(Horario_Ruta $horario_ruta) {
        $this->horarioDao->add($horario_ruta);
    }
    
    public function delete($idHorario_Ruta) {
       return $this->horarioDao->delete($idHorario_Ruta);
    }
    
    public function getById($idHorario_Ruta) {
        return $this->horarioDao->getById($idHorario_Ruta);
    }
    
    public function getAll() {
        return $this->horarioDao->getAll();
    }
    
    public function getAllByRuta($idRuta) {
        return $this->horarioDao->getAllByRuta($idRuta);
    }
    
    public function getAllByAvion($idAvion){
        return $this->horarioDao->getAllByAvion($idAvion);
    }
    
    public function update(Horario_Ruta $horario_ruta) {
        return $this->horarioDao->update($horario_ruta);
    }
    
    public function exist(Horario_Ruta $horario_ruta) {
        return $this->horarioDao->exist($horario_ruta);
    }
}
