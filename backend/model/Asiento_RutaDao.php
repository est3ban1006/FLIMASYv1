<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Asiento_RutaDao {
    private $labAdodb;
    function __construct($conn) {
        $this->labAdodb = $conn;
    }
    
    public function add(Asiento_Ruta $asiento_ruta) {
        try {
            $sql = sprintf("insert into mydb.Asiento_Ruta (idRuta,idDescuento, NumeroAsiento, Fecha_creacion, Precio, Estado) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idRuta"),
                    $this->labAdodb->Param("idDescuento"),
                    $this->labAdodb->Param("NumeroAsiento"),
                    $this->labAdodb->Param("Fecha_creacion"),
                    $this->labAdodb->Param("Precio"),
                    $this->labAdodb->Param("Estado"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();

            $valores["idRuta"]                  = $asiento_ruta->getIdRuta();
            $valores["idDescuento"]             = $asiento_ruta->getIdDescuento();
            $valores["NumeroAsiento"]           = $asiento_ruta->getNumeroAsiento();
            $valores["Fecha_creacion"]          = $asiento_ruta->getFecha_creacion();
            $valores["Precio"]                  = $asiento_ruta->getPrecio();
            $valores["Estado"]                  = $asiento_ruta->getEstado();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el asiento  ruta (Error generado en el metodo add de la clase Asiento_RutaDao), error:'.$e->getMessage());
        }
    }
    
    public function delete($idAsiento_Ruta) {
        try {
            $sql = sprintf("delete from mydb.Asiento_Ruta where idAsiento_Ruta = %s", 
                    $this->labAdodb->Param("idAsiento_Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idAsiento_Ruta"] = $idAsiento_Ruta;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase Asiento_RutaDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idAsiento_Ruta) {
        $asiento_ruta = array();
        try {
            $sql = sprintf("select * from mydb.Asiento_Ruta where idAsiento_Ruta = %s", 
                    $this->labAdodb->Param("idAsiento_Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idAsiento_Ruta"] = $idAsiento_Ruta;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $asiento_ruta = new Asiento_Ruta();
                $asiento_ruta->setIdAsiento_Ruta($resultSql->Fields("idAsiento_Ruta"));
                $asiento_ruta->setIdRuta($resultSql->Fields("idRuta"));
                $asiento_ruta->setIdDescuento($resultSql->Fields("idDescuento"));
                $asiento_ruta->setNumeroAsiento($resultSql->Fields("NumeroAsiento"));
                $asiento_ruta->setFecha_creacion($resultSql->Fields("Fecha_creacion"));
                $asiento_ruta->setPrecio($resultSql->Fields("Precio"));
                $asiento_ruta->setEstado($resultSql->Fields("Estado"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase PersonaDao), error:' . $e->getMessage());
        }
        return $asiento_ruta;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Asiento_Ruta");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Asiento_RutaDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllBySchedule($idSchedule) {
        try {
            $sql = sprintf("select * from mydb.Asiento_Ruta WHERE idRuta = %s", 
                    $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idRuta"] = $idSchedule;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Asiento_RutaDao), error:' . $e->getMessage());
        }
    }

    public function update(Asiento_Ruta $asiento_ruta) {
        try {
            $sql = sprintf("update Asiento_Ruta set NumeroAsiento = %s, 
                                                Precio = %s, 
                                                Estado = %s 
                            where idAsiento_Ruta = %s", 
                    $this->labAdodb->Param("NumeroAsiento"), 
                    $this->labAdodb->Param("Precio"), 
                    $this->labAdodb->Param("Estado"), 
                    $this->labAdodb->Param("idAsiento_Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["NumeroAsiento"] = $asiento_ruta->getNumeroAsiento();
            $valores["Precio"] = $asiento_ruta->getPrecio();
            $valores["Estado"] = $asiento_ruta->getEstado();
            $valores["idAsiento_Ruta"] = $asiento_ruta->getIdAsiento_Ruta();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase Asiento_RutaDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Asiento_Ruta $asiento_ruta) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Asiento_Ruta where idAsiento_Ruta = %s ",
                            $this->labAdodb->Param("idAsiento_Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idAsiento_Ruta"] = $asiento_ruta->getIdAsiento_Ruta();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase Asiento_RutaDao), error:'.$e->getMessage());
        }
    }
}
