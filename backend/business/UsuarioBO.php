<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioBO
 *
 * @author josue
 */
class UsuarioBO {
    private $usuarioDao;
    
    public function __construct($conn) {
        $this->usuarioDao = new UsuarioDao($conn);
    }
    
    public function add(Usuario $usuario) {
        $this->usuarioDao->add($usuario);
    }
    
    public function delete($idUsuario) {
      return  $this->usuarioDao->delete($idUsuario);
    }
    
    public function getById($idUsuario) {
       return $this->usuarioDao->getById($idUsuario);
    }

    public function getByIdPersona($idPersona) {
      return $this->usuarioDao->getByIdPersona($idPersona);
    }
    
    public function getByUserAndPass($user, $pass){
       return $this->usuarioDao->getByUserAndPass($user, $pass);
    }
    
    public function getAll() {
       return $this->usuarioDao->getAll();
    }
    
    public function getAllByEmpresa($idEmpresa) {
       return $this->usuarioDao->getAllByEmpresa($idEmpresa);
    }
    
    public function update(Usuario $usuario) {
       return $this->usuarioDao->update($usuario);
    }
    
    public function exist(Usuario $usuario) {
       return $this->usuarioDao->exist($usuario);
    }
}
