<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Horario_RutaDao {
    private $labAdodb;
    function __construct($conn) {
        $this->labAdodb = $conn;
    }
    
    public function add(Horario_Ruta $horario_ruta) {
        try {
            $sql = sprintf("insert into mydb.Horario_Ruta (idRuta,idCatalogo_avion, Fecha, HoraDespliegue, HoraLlegada, Fecha_creacion, Status, Precio, Cant_AsientosDisponibles) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idRuta"),
                    $this->labAdodb->Param("idCatalogo_avion"),
                    $this->labAdodb->Param("Fecha"),
                    $this->labAdodb->Param("HoraDespliegue"),
                    $this->labAdodb->Param("HoraLlegada"),
                    $this->labAdodb->Param("Fecha_creacion"),
                    $this->labAdodb->Param("Status"),
                    $this->labAdodb->Param("Precio"),
                    $this->labAdodb->Param("Cant_AsientosDisponibles"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRuta"]                      = $horario_ruta->getIdRuta();
            $valores["idCatalogo_avion"]            = $horario_ruta->getIdCatalogo_avion();
            $valores["Fecha"]                       = $horario_ruta->getFecha();
            $valores["HoraDespliegue"]              = $horario_ruta->getHoraDespliegue();
            $valores["HoraLlegada"]                 = $horario_ruta->getHoraLlegada();
            $valores["Fecha_creacion"]              = $horario_ruta->getFecha_creacion();
            $valores["Status"]                      = $horario_ruta->getStatus();
            $valores["Precio"]                      = $horario_ruta->getPrecio();
            $valores["Cant_AsientosDisponibles"]    = $horario_ruta->getCant_AsientosDisponibles();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase Horario_RutaDao), error:'.$e->getMessage());
        }
    }
    
    public function delete($idHorario_Ruta) {
        try {
            $sql = sprintf("delete from mydb.Horario_Ruta where  idHorario_Ruta = %s", $this->labAdodb->Param("Horario_Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["Horario_Ruta"] = $idHorario_Ruta;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase Horario_RutaDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idHorario_Ruta) {
        $horario_ruta = array();
        try {
            $sql = sprintf("select * from mydb.Horario_Ruta where idHorario_Ruta = %s", $this->labAdodb->Param("idHorario_Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idHorario_Ruta"] = $idHorario_Ruta;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $horario_ruta = new Horario_Ruta();
                $horario_ruta->setIdHorario_Ruta($resultSql->Fields("idHorario_Ruta"));
                $horario_ruta->setIdRuta($resultSql->Fields("idRuta"));
                $horario_ruta->setIdCatalogo_avion($resultSql->Fields("idCatalogo_avion"));
                $horario_ruta->setFecha($resultSql->Fields("Fecha"));
                $horario_ruta->setHoraDespliegue($resultSql->Fields("HoraDespliegue"));
                $horario_ruta->setHoraLlegada($resultSql->Fields("HoraLlegada"));
                $horario_ruta->setFecha_creacion($resultSql->Fields("Fecha_creacion"));
                $horario_ruta->setStatus($resultSql->Fields("Status"));
                $horario_ruta->setPrecio($resultSql->Fields("Precio"));
                $horario_ruta->setCant_AsientosDisponibles($resultSql->Fields("Cant_AsientosDisponibles"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase Horario_RutaDao), error:' . $e->getMessage());
        }
        return $horario_ruta;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Horario_Ruta");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Horario_RutaDao), error:' . $e->getMessage());
        }
    }

    public function getLastByRuta($idRuta) {
        try {
            $sql = sprintf("select * from mydb.Horario_Ruta WHERE idRuta = %s ORDER BY idHorario_Ruta DESC LIMIT 1", 
                    $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idRuta"] = $idRuta;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $horario_ruta = new Horario_Ruta();
                $horario_ruta->setIdHorario_Ruta($resultSql->Fields("idHorario_Ruta"));
                $horario_ruta->setIdRuta($resultSql->Fields("idRuta"));
                $horario_ruta->setIdCatalogo_avion($resultSql->Fields("idCatalogo_avion"));
                $horario_ruta->setFecha($resultSql->Fields("Fecha"));
                $horario_ruta->setHoraDespliegue($resultSql->Fields("HoraDespliegue"));
                $horario_ruta->setHoraLlegada($resultSql->Fields("HoraLlegada"));
                $horario_ruta->setFecha_creacion($resultSql->Fields("Fecha_creacion"));
                $horario_ruta->setStatus($resultSql->Fields("Status"));
                $horario_ruta->setPrecio($resultSql->Fields("Precio"));
                $horario_ruta->setCant_AsientosDisponibles($resultSql->Fields("Cant_AsientosDisponibles"));
                return $horario_ruta;
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByRuta de la clase Horario_RutaDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByRuta($idRuta) {
        try {
            $sql = sprintf("select * from mydb.Horario_Ruta WHERE idRuta = %s", 
                    $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idRuta"] = $idRuta;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByRuta de la clase Horario_RutaDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByAvion($idAvion) {
        try {
            $sql = sprintf("select * from mydb.Horario_Ruta WHERE idCatalogo_avion = %s", 
                    $this->labAdodb->Param("idCatalogo_avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idCatalogo_avion"] = $idAvion;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByAvion de la clase Horario_RutaDao), error:' . $e->getMessage());
        }
    }

    public function update(Horario_Ruta $horario_ruta) {
        try {
            $sql = sprintf("update Horario_Ruta set Fecha = %s, 
                                                HoraDespliegue = %s, 
                                                HoraLlegada = %s, 
                                                Status = %s, 
                                                Precio = %s, 
                                                Cant_AsientosDisponibles = %s
                            where idHorario_Ruta = %s", 
                    $this->labAdodb->Param("Fecha"), 
                    $this->labAdodb->Param("HoraDespliegue"), 
                    $this->labAdodb->Param("HoraLlegada"), 
                    $this->labAdodb->Param("Status"), 
                    $this->labAdodb->Param("Precio"), 
                    $this->labAdodb->Param("Cant_AsientosDisponibles"), 
                    $this->labAdodb->Param("idHorario_Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Fecha"] = $horario_ruta->getFecha();
            $valores["HoraDespliegue"] = $horario_ruta->getHoraDespliegue();
            $valores["HoraLlegada"] = $horario_ruta->getHoraLlegada();
            $valores["Status"] = $horario_ruta->getStatus();
            $valores["Precio"] = $horario_ruta->getPrecio();
            $valores["Cant_AsientosDisponibles"] = $horario_ruta->getCant_AsientosDisponibles();
            $valores["idHorario_Ruta"] = $horario_ruta->getIdHorario_Ruta();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase Horario_RutaDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Horario_Ruta $horario_ruta) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Horario_Ruta where idHorario_Ruta = %s ",
                            $this->labAdodb->Param("idHorario_Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idHorario_Ruta"] = $horario_ruta->getIdHorario_Ruta();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase Horario_RutaDao), error:'.$e->getMessage());
        }
    }
}
