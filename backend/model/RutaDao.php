<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RutaDao {
    private $labAdodb;
    function __construct($conn) {
        $this->labAdodb = $conn;
    }
    
    public function add(Ruta $ruta) {
        try {
            $sql = sprintf("insert into mydb.Ruta (idEmpresa,Ruta, Duracion) 
                                          values (%s,%s,%s)",
                    $this->labAdodb->Param("idEmpresa"),
                    $this->labAdodb->Param("Ruta"),
                    $this->labAdodb->Param("Duracion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idEmpresa"]       = $ruta->getIdEmpresa();
            $valores["Ruta"]            = $ruta->getRuta();
            $valores["Duracion"]        = $ruta->getDuracion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase RutaDao), error:'.$e->getMessage());
        }
    }
    
    public function delete($idRuta) {
        try {
            $sql = sprintf("delete from mydb.Ruta where  idRuta = %s", $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idRuta"] = $idRuta;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase RutaDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idRuta) {
        $ruta = array();
        try {
            $sql = sprintf("select * from mydb.Ruta where  idRuta = %s", $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRuta"] = $idRuta;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $ruta = new Ruta();
                $ruta->setIdRuta($resultSql->Fields("idRuta"));
                $ruta->setIdEmpresa($resultSql->Fields("idEmpresa"));
                $ruta->setRuta($resultSql->Fields("Ruta"));
                $ruta->setDuracion($resultSql->Fields("Duracion"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase RutaDao), error:' . $e->getMessage());
        }
        return $ruta;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Ruta");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase RutaDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByEmpresa($idEmpresa) {
        try {
            $sql = sprintf("select * from mydb.Ruta WHERE idEmpresa = %s", 
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idEmpresa"] = $idEmpresa;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByEmpresa de la clase RutaDao), error:' . $e->getMessage());
        }
    }
    
    public function update(Ruta $ruta) {
        try {
            $sql = sprintf("update Ruta set Ruta = %s, Duracion = %s 
                            where idRuta = %s", 
                        $this->labAdodb->Param("Ruta"),
                        $this->labAdodb->Param("Duracion"), 
                        $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Ruta"] = $ruta->getNombre();
            $valores["Duracion"] = $ruta->getApellido1();
            $valores["idRuta"] = $ruta->getApellido2();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase RutaDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Ruta $ruta) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Ruta where idRuta = %s ",
                            $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRuta"] = $ruta->getIdRuta();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase RutaDao), error:'.$e->getMessage());
        }
    }
}
