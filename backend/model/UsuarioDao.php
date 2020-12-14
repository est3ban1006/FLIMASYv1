<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioDao {

    private $labAdodb;

    function __construct($conn) {
        $this->labAdodb = $conn;
    }

    public function add(Usuario $usuario) {
        try {
            $sql = sprintf("insert into mydb.Usuario (idPersona,Usuario, Contraseña, Activo, Fecha_registro, idEmpresa) 
                                          values (%s,%s,%s,%s,%s,%s)", 
                    $this->labAdodb->Param("idUsuario"), 
                    $this->labAdodb->Param("idPersona"), 
                    $this->labAdodb->Param("Usuario"), 
                    $this->labAdodb->Param("Contraseña"), 
                    $this->labAdodb->Param("Activo"), 
                    $this->labAdodb->Param("Fecha_registro"), 
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idPersona"] = $usuario->getIdPersona();
            $valores["Usuario"] = $usuario->getUsuario();
            $valores["Contraseña"] = md5($usuario->getContraseña());
            $valores["Activo"] = $usuario->getActivo();
            $valores["Fecha_registro"] = $usuario->getFecha_registro();
            $valores["idEmpresa"] = $usuario->getIdEmpresa();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase UsuarioDao), error:' . $e->getMessage());
        }
    }

    public function delete($idUsuario) {
        try {
            $sql = sprintf("delete from mydb.Usuario where  idUsuario = %s", $this->labAdodb->Param("idUsuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idUsuario"] = $idUsuario;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase UsuarioDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idUsuario) {
        $usuario = array();
        try {
            $sql = sprintf("select * from mydb.Usuario where  idUsuario = %s", $this->labAdodb->Param("idUsuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idUsuario"] = $idUsuario;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($resultSql->Fields("idUsuario"));
                $usuario->setIdPersona($resultSql->Fields("idPersona"));
                $usuario->setUsuario($resultSql->Fields("Usuario"));
                $usuario->setContraseña($resultSql->Fields("Contraseña"));
                $usuario->setActivo($resultSql->Fields("Activo"));
                $usuario->setFecha_registro($resultSql->Fields("Fecha_registro"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase UsuarioDao), error:' . $e->getMessage());
        }
        return $usuario;
    }
    
    public function getByUserAndPass($user, $pass) {
        $usuario = array();
        try {
            $sql = sprintf("select * from mydb.Usuario where Usuario = %s AND Contraseña = %s ", 
                    $this->labAdodb->Param("Usuario"),
                    $this->labAdodb->Param("Contraseña"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Usuario"] = $user;
            $valores["Contraseña"] = md5($pass);
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($resultSql->Fields("idUsuario"));
                $usuario->setIdPersona($resultSql->Fields("idPersona"));
                $usuario->setIdEmpresa($resultSql->Fields("idEmpresa"));
                $usuario->setUsuario($resultSql->Fields("Usuario"));
                $usuario->setContraseña($resultSql->Fields("Contraseña"));
                $usuario->setActivo($resultSql->Fields("Activo"));
                $usuario->setFecha_registro($resultSql->Fields("Fecha_registro"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase UsuarioDao), error:' . $e->getMessage());
        }
        return $usuario;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Usuario");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase UsuarioDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByEmpresa($idEmpresa) {
        try {
            $sql = sprintf("select * from mydb.Usuario WHERE idEmpresa = %s", 
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idEmpresa"] = $idEmpresa;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByEmpresa de la clase UsuarioDao), error:' . $e->getMessage());
        }
    }

    public function update(Usuario $usuario) {
        try {
            $sql = sprintf("update Usuario set Usuario = %s, 
                                                Contraseña = %s, 
                                                Activo = %s
                            where idUsuario = %s", 
                    $this->labAdodb->Param("Usuario"), 
                    $this->labAdodb->Param("Contraseña"), 
                    $this->labAdodb->Param("Activo"), 
                    $this->labAdodb->Param("idUsuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Usuario"] = $usuario->getUsuario();
            $valores["Contraseña"] = $usuario->getContraseña();
            $valores["Activo"] = $usuario->getActivo();
            $valores["idUsuario"] = $usuario->getIdUsuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UsuarioDao), error:' . $e->getMessage());
        }
    }

    public function exist(Usuario $usuario) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Usuario where Usuario = %s ", $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Usuario"] = $usuario->getUsuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase UsuarioDao), error:' . $e->getMessage());
        }
    }

}
