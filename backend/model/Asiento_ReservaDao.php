<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Asiento_ReservaDao {

    private $labAdodb;

    function __construct($conn) {
        $this->labAdodb = $conn;
    }

    public function add(Asiento_Reserva $asiento_reserva) {
        try {
            $sql = sprintf("insert into mydb.Asiento_Reserva (idReserva,idAsiento_Avion, Precio, Descuento, Impuesto, Estado, Fecha_creacion) 
                                          values (%s,%s,%s,%s,%s,%s,%s)", 
                    $this->labAdodb->Param("idReserva"), 
                    $this->labAdodb->Param("idAsiento_Avion"), 
                    $this->labAdodb->Param("Precio"), 
                    $this->labAdodb->Param("Descuento"), 
                    $this->labAdodb->Param("Impuesto"), 
                    $this->labAdodb->Param("Estado"), 
                    $this->labAdodb->Param("Fecha_creacion"));

            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReserva"] = $asiento_reserva->getIdReserva();
            $valores["idAsiento_Avion"] = $asiento_reserva->getIdAsiento_Avion();
            $valores["Precio"] = $asiento_reserva->getPrecio();
            $valores["Descuento"] = $asiento_reserva->getDescuento();
            $valores["Impuesto"] = $asiento_reserva->getImpuesto();
            $valores["Estado"] = $asiento_reserva->getEstado();
            $valores["Fecha_creacion"] = $asiento_reserva->getFecha_creacion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el asiento reserva (Error generado en el metodo add de la clase Asiento_ReservaDao), error:' . $e->getMessage());
        }
    }

    public function delete($idAsiento_Reserva) {
        try {
            $sql = sprintf("delete from mydb.Asiento_Reserva where idAsiento_Reserva = %s", 
                    $this->labAdodb->Param("idAsiento_Reserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idAsiento_Reserva"] = $idAsiento_Reserva;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase Asiento_ReservaDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idAsiento_Reserva) {
        $asiento_reserva = array();
        try {
            $sql = sprintf("select * from mydb.Asiento_Reserva where idAsiento_Reserva = %s", 
                    $this->labAdodb->Param("idAsiento_Reserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idAsiento_Reserva"] = $idAsiento_Reserva;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $asiento_reserva = new Asiento_Reserva();
                $asiento_reserva->setIdAsiento_Reserva($resultSql->Fields("idAsiento_Reserva"));
                $asiento_reserva->setIdReserva($resultSql->Fields("idReserva"));
                $asiento_reserva->setIdAsiento_Avion($resultSql->Fields("idAsiento_Avion"));
                $asiento_reserva->setPrecio($resultSql->Fields("Precio"));
                $asiento_reserva->setDescuento($resultSql->Fields("Descuento"));
                $asiento_reserva->setImpuesto($resultSql->Fields("Impuesto"));
                $asiento_reserva->setEstado($resultSql->Fields("Estado"));
                $asiento_reserva->setFecha_creacion($resultSql->Fields("Fecha_creacion"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase PersonaDao), error:' . $e->getMessage());
        }
        return $asiento_reserva;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Asiento_Reserva");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Asiento_ReservaDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByReserva($idReserva) {
        try {
            $sql = sprintf("select * from mydb.Asiento_Reserva WHERE $idReserva = %s", 
                    $this->labAdodb->Param("$idReserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["$idReserva"] = $idReserva;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Asiento_ReservaDao), error:' . $e->getMessage());
        }
    }

    public function update(Asiento_Reserva $asiento_reserva) {
        try {
            $sql = sprintf("update Asiento_Reserva set Precio = %s, 
                                Descuento = %s, 
                                Impuesto = %s, 
                                Estado = %s
                            where idAsiento_Reserva = %s", 
                    $this->labAdodb->Param("Precio"), 
                    $this->labAdodb->Param("Descuento"), 
                    $this->labAdodb->Param("Impuesto"), 
                    $this->labAdodb->Param("Estado"), 
                    $this->labAdodb->Param("idAsiento_Reserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Precio"] = $asiento_reserva->getPrecio();
            $valores["Descuento"] = $asiento_reserva->getDescuento();
            $valores["Impuesto"] = $asiento_reserva->getImpuesto();
            $valores["Estado"] = $asiento_reserva->getEstado();
            $valores["idAsiento_Reserva"] = $asiento_reserva->getIdAsiento_Reserva();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase Asiento_ReservaDao), error:' . $e->getMessage());
        }
    }

    public function existById(Asiento_Reserva $asiento_reserva) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Asiento_Reserva where idAsiento_Reserva= %s ", 
                    $this->labAdodb->Param("idAsiento_Reserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idAsiento_Reserva"] = $asiento_reserva->getIdAsiento_Reserva();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase Asiento_ReservaDao), error:' . $e->getMessage());
        }
    }

}
