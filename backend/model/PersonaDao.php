<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonaDao
 *
 * @author josue
 */
class PersonaDao {

    private $labAdodb;

    function __construct($conn) {
        $this->labAdodb = $conn;
    }

    public function add(Persona $persona) {
        try {
            $sql = sprintf("insert into mydb.Persona (Cedula,Nombre, Apellido1, Apellido2, Correo, Telefono, Direccion, Celular, Rol, FechaNacimiento) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)", $this->labAdodb->Param("idPersona"), $this->labAdodb->Param("Cedula"), $this->labAdodb->Param("Nombre"), $this->labAdodb->Param("Apellido1"), $this->labAdodb->Param("Apellido2"), $this->labAdodb->Param("Correo"), $this->labAdodb->Param("Telefono"), $this->labAdodb->Param("Direccion"), $this->labAdodb->Param("Celular"), $this->labAdodb->Param("Rol"), $this->labAdodb->Param("FechaNacimiento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Cedula"] = $persona->getCedula();
            $valores["Nombre"] = $persona->getNombre();
            $valores["Apellido1"] = $persona->getApellido1();
            $valores["Apellido2"] = $persona->getApellido2();
            $valores["Correo"] = $persona->getCorreo();
            $valores["Telefono"] = $persona->getTelefono();
            $valores["Direccion"] = $persona->getDireccion();
            $valores["Celular"] = $persona->getCelular();
            $valores["Rol"] = $persona->getRol();
            $valores["FechaNacimiento"] = $persona->getFechaNacimiento();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase PersonasDao), error:' . $e->getMessage());
        }
    }

    public function delete($idPersona) {
        try {
            $sql = sprintf("delete from mydb.Persona where  idPersona = %s", $this->labAdodb->Param("idPersona"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idPersona"] = $idPersona;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonaDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idPersona) {
        $persona = new Persona();
        try {
            $resultSql = $this->labAdodb->getRow("select * from mydb.Persona WHERE idPersona = ".$idPersona); 
            if (!empty($resultSql)) {
                $persona->setIdPersona($resultSql["idPersona"]);
                $persona->setNombre($resultSql["Nombre"]);
                $persona->setApellido1($resultSql["Apellido1"]);
                $persona->setApellido2($resultSql["Apellido2"]);
                $persona->setCedula($resultSql["Cedula"]);
                $persona->setCelular($resultSql["Celular"]);
                $persona->setCorreo($resultSql["Correo"]);
                $persona->setDireccion($resultSql["Direccion"]);
                $persona->setRol($resultSql["Rol"]);
                $persona->setTelefono($resultSql["Telefono"]);
                $persona->setFechaNacimiento($resultSql["FechaNacimiento"]);
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase PersonaDao), error:' . $e->getMessage());
        }
        return $persona;
    }
    
    public function getByCorreo($correo) {
        $persona = new Persona();
        try {
           $sql = sprintf("select * from mydb.Persona where  Correo = %s", $this->labAdodb->Param("Correo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Correo"] = $correo;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $persona->setIdPersona($resultSql->Fields("idPersona"));
                $persona->setNombre($resultSql->Fields("Nombre"));
                $persona->setApellido1($resultSql->Fields("Apellido1"));
                $persona->setApellido2($resultSql->Fields("Apellido2"));
                $persona->setCedula($resultSql->Fields("Cedula"));
                $persona->setCelular($resultSql->Fields("Celular"));
                $persona->setCorreo($resultSql->Fields("Correo"));
                $persona->setDireccion($resultSql->Fields("Direccion"));
                $persona->setRol($resultSql->Fields("Rol"));
                $persona->setTelefono($resultSql->Fields("Telefono"));
                $persona->setFechaNacimiento($resultSql->Fields("FechaNacimiento"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getByCorreo de la clase PersonaDao), error:' . $e->getMessage());
        }
        return $persona;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Persona");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonaDao), error:' . $e->getMessage());
        }
    }

    public function update(Persona $persona) {
        try {
            $sql = sprintf("update Persona set Nombre = %s, 
                                                Apellido1 = %s, 
                                                Apellido2 = %s, 
                                                Correo = %s, 
                                                Cedula = %s, 
                                                Telefono = %s, 
                                                Celular = %s, 
                                                Direccion = %s, 
                                                FechaNacimiento = %s 
                            where idPersona = %s", $this->labAdodb->Param("Nombre"), $this->labAdodb->Param("Apellido1"), $this->labAdodb->Param("Apellido2"), $this->labAdodb->Param("Correo"), $this->labAdodb->Param("Cedula"), $this->labAdodb->Param("Telefono"), $this->labAdodb->Param("Celular"), $this->labAdodb->Param("Direccion"), $this->labAdodb->Param("FechaNacimiento"), $this->labAdodb->Param("idPersona"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre"] = $persona->getNombre();
            $valores["Apellido1"] = $persona->getApellido1();
            $valores["Apellido2"] = $persona->getApellido2();
            $valores["Correo"] = $persona->getCorreo();
            $valores["Cedula"] = $persona->getCedula();
            $valores["Telefono"] = $persona->getTelefono();
            $valores["Celular"] = $persona->getCelular();
            $valores["Direccion"] = $persona->getDireccion();
            $valores["FechaNacimiento"] = $persona->getFechaNacimiento();
            $valores["idPersona"] = $persona->getIdPersona();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonaDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Persona $persona) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Persona where Correo = %s ",
                            $this->labAdodb->Param("Correo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Correo"] = $persona->getCorreo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonaDao), error:'.$e->getMessage());
        }
    }
}
