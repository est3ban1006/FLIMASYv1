<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonaBO
 *
 * @author josue
 */
class PersonaBO {
    private $personaDao;
    
    public function __construct($conn) {
        $this->personaDao = new PersonaDao($conn);
    }
    
    public function add(Persona $persona) {
        $this->personaDao->add($persona);
    }
    
    public function delete($idPersona) {
       return $this->personaDao->delete($idPersona);
    }
    
    public function getById($idPersona) {
        return $this->personaDao->getById($idPersona);
    }
    
    public function getByCorreo($correo) {
        return $this->personaDao->getByCorreo($correo);
    }
    
    public function getAll() {
        return $this->personaDao->getAll();
    }
    
    public function update(Persona $persona) {
        return $this->personaDao->update($persona);
    }
    
    public function exist(Persona $persona) {
        return $this->personaDao->exist($persona);
    }
}
