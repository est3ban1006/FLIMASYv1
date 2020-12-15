<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Catalogo_avionDao {
    private $labAdodb;
    function __construct($conn) {
        $this->labAdodb = $conn;
    }
    
    public function add(Catalogo_avion $catalogo_avion) {
        try {
            $sql = sprintf("insert into mydb.Catalogo_avion (idEmpresa,idTipo_Avion, NombreAvion, Fecha_creacion, Activo) 
                                          values (%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idEmpresa"),
                    $this->labAdodb->Param("idTipo_Avion"),
                    $this->labAdodb->Param("NombreAvion"),
                    $this->labAdodb->Param("Fecha_creacion"),
                    $this->labAdodb->Param("Activo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idEmpresa"]                 = $catalogo_avion->getIdEmpresa();
            $valores["idTipo_Avion"]              = $catalogo_avion->getIdTipo_Avion();
            $valores["NombreAvion"]               = $catalogo_avion->getNombre_Avion();
            $valores["Fecha_creacion"]            = $catalogo_avion->getFecha_creacion();
            $valores["Activo"]                    = $catalogo_avion->getActivo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase Catalogo_AvionDao), error:'.$e->getMessage());
        }
    }
        public function delete($idCatalogo_avion) {
        try {
            $sql = sprintf("delete from mydb.Catalogo_avion where idCatalogo_avion = %s", 
                    $this->labAdodb->Param("idCatalogo_avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idCatalogo_avion"] = $idCatalogo_avion;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase Catalogo_AvionDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idCatalogo_avion) {
        $catalogo_avion = array();
        try {
            $sql = sprintf("select * from mydb.Catalogo_avion where idCatalogo_avion = %s", 
                    $this->labAdodb->Param("idCatalogo_avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idCatalogo_avion"] = $idCatalogo_avion;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $catalogo_avion = new Catalogo_avion();
                $catalogo_avion->setIdCatalogo_avion($resultSql->Fields("idCatalogo_avion"));
                $catalogo_avion->setIdEmpresa($resultSql->Fields("idEmpresa"));
                $catalogo_avion->setIdTipo_Avion($resultSql->Fields("idTipo_Avion"));
                $catalogo_avion->setNombre_Avion($resultSql->Fields("NombreAvion"));
                $catalogo_avion->setFecha_creacion($resultSql->Fields("Fecha_creacion"));
                $catalogo_avion->setActivo($resultSql->Fields("Activo"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase Catalogo_AvionDao), error:' . $e->getMessage());
        }
        return $catalogo_avion;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Catalogo_avion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Catalogo_AvionDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByEmpresa($idEmpresa) {
        try {
            $sql = sprintf("select * from mydb.Catalogo_avion WHERE idEmpresa = %s", 
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idEmpresa"] = $idEmpresa;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByEmpresa de la clase Catalogo_AvionDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByTipo($idTipo) {
        try {
            $sql = sprintf("select * from mydb.Catalogo_avion WHERE idTipo_Avion = %s", 
                    $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idTipo_Avion"] = $idTipo;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByTipo de la clase Catalogo_AvionDao), error:' . $e->getMessage());
        }
    }

    public function update(Catalogo_avion $catalogo_avion) {
        try {
            $sql = sprintf("update Catalogo_avion set NombreAvion = %s, 
                                                Activo = %s
                            where idCatalogo_avion = %s", 
                    $this->labAdodb->Param("NombreAvion"), 
                    $this->labAdodb->Param("Activo"), 
                    $this->labAdodb->Param("idCatalogo_avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["NombreAvion"] = $catalogo_avion->getNombre_Avion();
            $valores["Activo"] = $catalogo_avion->getActivo();
            $valores["idCatalogo_avion"] = $catalogo_avion->getIdCatalogo_avion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase Catalogo_AvionDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Catalogo_avion $catalogo_avion) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Catalogo_avion where NombreAvion = %s ",
                            $this->labAdodb->Param("NombreAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["NombreAvion"] = $catalogo_avion->getNombre_Avion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase Catalogo_AvionDao), error:'.$e->getMessage());
        }
    }
}
