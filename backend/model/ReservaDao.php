<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReservaDao {

    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    public function add(Reserva $reserva) {
        try {
            $sql = sprintf("insert into mydb.Reserva (idPersona,DiaReserva, Monto_total, Estado, Descuento, Impuesto, Fecha_creacion) 
                                          values (%s,%s,%s,%s,%s,%s,%s)", 
                    $this->labAdodb->Param("idReserva"), 
                    $this->labAdodb->Param("idPersona"), 
                    $this->labAdodb->Param("DiaReserva"), 
                    $this->labAdodb->Param("Monto_total"), 
                    $this->labAdodb->Param("Estado"), 
                    $this->labAdodb->Param("Descuento"), 
                    $this->labAdodb->Param("Impuesto"), 
                    $this->labAdodb->Param("Fecha_creacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idPersona"] = $reserva->getIdPersona();
            $valores["DiaReserva"] = $reserva->getDiaReserva();
            $valores["Monto_total"] = $reserva->getMonto_total();
            $valores["Estado"] = $reserva->getEstado();
            $valores["Descuento"] = $reserva->getDescuento();
            $valores["Impuesto"] = $reserva->getImpuesto();
            $valores["Fecha_creacion"] = $reserva->getFecha_creacion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase ReservaDao), error:' . $e->getMessage());
        }
    }

    public function delete($idReserva) {
        try {
            $sql = sprintf("delete from mydb.Reserva where  idReserva = %s", $this->labAdodb->Param("idReserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idReserva"] = $idReserva;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase ReservaDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idReserva) {
        $reserva = array();
        try {
            $sql = sprintf("select * from mydb.Reserva where idReserva = %s", $this->labAdodb->Param("idReserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idReserva"] = $idReserva;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $reserva = new Reserva();
                $reserva->setIdReserva($resultSql->Fields("idReserva"));
                $reserva->setIdPersona($resultSql->Fields("idPersona"));
                $reserva->setDiaReserva($resultSql->Fields("DiaReserva"));
                $reserva->setMonto_total($resultSql->Fields("Monto_total"));
                $reserva->setEstado($resultSql->Fields("Estado"));
                $reserva->setDescuento($resultSql->Fields("Descuento"));
                $reserva->setImpuesto($resultSql->Fields("Impuesto"));
                $reserva->setFecha_creacion($resultSql->Fields("Fecha_creacion"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase ReservaDao), error:' . $e->getMessage());
        }
        return $reserva;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Reserva");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase ReservaDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByPersona($idPersona) {
        try {
            $sql = sprintf("select * from mydb.Reserva WHERE idPersona = %s", 
                    $this->labAdodb->Param("idPersona"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idPersona"] = $idPersona;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByPersona de la clase ReservaDao), error:' . $e->getMessage());
        }
    }

    public function update(Reserva $reserva) {
        try {
            $sql = sprintf("update Reserva set DiaReserva = %s, 
                                Monto_total = %s, 
                                Estado = %s, 
                                Descuento = %s, 
                                Impuesto = %s
                            where idReserva = %s", 
                    $this->labAdodb->Param("DiaReserva"), 
                    $this->labAdodb->Param("Monto_total"), 
                    $this->labAdodb->Param("Estado"), 
                    $this->labAdodb->Param("Descuento"),
                    $this->labAdodb->Param("Impuesto"), 
                    $this->labAdodb->Param("idReserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["DiaReserva"] = $reserva->getDiaReserva();
            $valores["Monto_total"] = $reserva->getMonto_total();
            $valores["Estado"] = $reserva->getEstado();
            $valores["Descuento"] = $reserva->getDescuento();
            $valores["Impuesto"] = $reserva->getImpuesto();
            $valores["idReserva"] = $reserva->getIdReserva();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase ReservaDao), error:' . $e->getMessage());
        }
    }

    public function exist(Reserva $reserva) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Reserva where idReserva = %s ", $this->labAdodb->Param("idReserva"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idReserva"] = $reserva->getIdReserva();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase ReservaDao), error:' . $e->getMessage());
        }
    }

}
