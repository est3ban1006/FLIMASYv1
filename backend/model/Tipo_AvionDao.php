<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Tipo_AvionDao {
    private $labAdodb;
    function __construct($conn) {
        $this->labAdodb = $conn;
    }
    
    public function add(Tipo_Avion $tipo_avion) {
        try {
            $sql = sprintf(utf8_decode("insert into mydb.Tipo_Avion (Año,Modelo, Marca, Cant_pasajeros, Cant_filas, Cant_asientos, idEmpresa) 
                                          values (%s,%s,%s,%s,%s,%s,%s)"),
                    $this->labAdodb->Param("Año"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Cant_pasajeros"),
                    $this->labAdodb->Param("Cant_filas"),
                    $this->labAdodb->Param("Cant_asientos"),
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Año"]                = $tipo_avion->getAño();
            $valores["Modelo"]             = $tipo_avion->getModelo();
            $valores["Marca"]              = $tipo_avion->getMarca();
            $valores["Cant_pasajeros"]     = $tipo_avion->getCant_pasajeros();
            $valores["Cant_filas"]         = $tipo_avion->getCant_filas();
            $valores["Cant_asientos"]      = $tipo_avion->getCant_asientos();
            $valores["idEmpresa"]      = $tipo_avion->getIdEmpresa();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase Tipo_AvionDao), error:'.$e->getMessage());
        }
    }
    
    public function delete($idTipo_Avion) {
        try {
            $sql = sprintf("delete from mydb.Tipo_Avion where  idTipo_Avion = %s", $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idTipo_Avion"] = $idTipo_Avion;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase Tipo_AvionDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idTipo_Avion) {
        $tipo_avion = array();
        try {
            $sql = sprintf("select * from mydb.Tipo_Avion where  idTipo_Avion = %s", $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idTipo_Avion"] = $idTipo_Avion;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $tipo_avion = new Tipo_Avion();
                $tipo_avion->setIdTipo_Avion($resultSql->Fields("idTipo_Avion"));
                $tipo_avion->setAño($resultSql->Fields("Año"));
                $tipo_avion->setModelo($resultSql->Fields("Modelo"));
                $tipo_avion->setMarca($resultSql->Fields("Marca"));
                $tipo_avion->setCant_pasajeros($resultSql->Fields("Cant_pasajeros"));
                $tipo_avion->setCant_filas($resultSql->Fields("Cant_filas"));
                $tipo_avion->setCant_asientos($resultSql->Fields("Cant_asientos"));
                $tipo_avion->setIdEmpresa($resultSql->Fields("idEmpresa"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase Tipo_AvionDao), error:' . $e->getMessage());
        }
        return $tipo_avion;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Tipo_Avion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Tipo_AvionDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByEmpresa($idEmpresa) {
        try {
            $sql = sprintf("select * from mydb.Tipo_Avion WHERE idEmpresa = %s", 
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idEmpresa"] = $idEmpresa;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByEmpresa de la clase Tipo_AvionDao), error:' . $e->getMessage());
        }
    }

    public function update(Tipo_Avion $tipo_avion) {
        try {
            $sql = sprintf(utf8_decode("update Tipo_Avion set Año = %s, 
                                                Modelo = %s, 
                                                Marca = %s, 
                                                Cant_pasajeros = %s, 
                                                Cant_filas = %s, 
                                                Cant_asientos = %s
                            where idTipo_Avion = %s"), 
                        $this->labAdodb->Param("Año"), 
                        $this->labAdodb->Param("Modelo"), 
                        $this->labAdodb->Param("Marca"), 
                        $this->labAdodb->Param("Cant_pasajeros"),
                        $this->labAdodb->Param("Cant_filas"),
                        $this->labAdodb->Param("Cant_asientos"), 
                        $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Año"] = $tipo_avion->getAño();
            $valores["Modelo"] = $tipo_avion->getModelo();
            $valores["Marca"] = $tipo_avion->getMarca();
            $valores["Cant_pasajeros"] = $tipo_avion->getCant_pasajeros();
            $valores["Cant_filas"] = $tipo_avion->getCant_filas();
            $valores["Cant_asientos"] = $tipo_avion->getCant_asientos();
            $valores["idTipo_Avion"] = $tipo_avion->getIdTipo_Avion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase Tipo_AvionDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Tipo_Avion $tipo_avion) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Tipo_Avion where idTipo_Avion = %s ",
                            $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idTipo_Avion"] = $tipo_avion->getIdTipo_Avion();

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
