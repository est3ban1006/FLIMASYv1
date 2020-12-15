<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Asiento_RutaBO {
    private $asientoRutaDao;
    
    public function __construct($conn) {
        $this->asientoRutaDao = new Asiento_RutaDao($conn);
    }
    
    public function add(Asiento_Ruta $asiento_ruta) {
        $this->asientoRutaDao->add($asiento_ruta);
    }
    
    public function delete($idAsiento_Ruta) {
       return $this->asientoRutaDao->delete($idAsiento_Ruta);
    }
    
    public function getById($idAsiento_Ruta) {
        return $this->asientoRutaDao->getById($idAsiento_Ruta);
    }
    
    public function getAll() {
        return $this->asientoRutaDao->getAll();
    }
    
    public function getAllBySchedule($idSchedule){
        return $this->asientoRutaDao->getAllBySchedule($idSchedule);
    }
    
    public function update(Asiento_Ruta $asiento_ruta) {
        return $this->asientoRutaDao->update($asiento_ruta);
    }
    
    public function exist(Asiento_Ruta $asiento_ruta) {
        return $this->asientoRutaDao->exist($asiento_ruta);
    }
}
