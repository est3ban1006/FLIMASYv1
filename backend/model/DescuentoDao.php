<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DescuentoDao {
    private $labAdodb;
    function __construct($conn) {
        $this->labAdodb = $conn;
    }
    
    public function add(Descuento $descuento) {
        try {
            $sql = sprintf("insert into mydb.Descuento (Nombre,Porcentaje, Valor) 
                                          values (%s,%s, %s)",
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Porcentaje"),
                    $this->labAdodb->Param("Valor"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Valor"]        = $descuento->getValor();
            $valores["Nombre"]             = $descuento->getNombre();
            $valores["Porcentaje"]         = $descuento->getPorcentaje();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el descuento(Error generado en el metodo add de la clase DescuentoDao), error:'.$e->getMessage());
        }
    }
   
    public function delete($idDescuento) {
        try {
            $sql = sprintf("delete from mydb.Descuento where idDescuento = %s", $this->labAdodb->Param("idDescuento"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idDescuento"] = $idDescuento;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase DescuentoDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idDescuento) {
        $descuento = array();
        try {
            $sql = sprintf("select * from mydb.Descuento where  idDescuento = %s", $this->labAdodb->Param("idDescuento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idDescuento"] = $idDescuento;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $descuento = new Descuento();
                $descuento->setIdDescuento($resultSql->Fields("idDescuento"));
                $descuento->setNombre($resultSql->Fields("Nombre"));
                $descuento->setPorcentaje($resultSql->Fields("Porcentaje"));
                $descuento->setValor($resultSql->Fields("Valor"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase DescuentoDao), error:' . $e->getMessage());
        }
        return $descuento;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Descuento");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase DescuentoDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByEmpresa($idEmpresa) {
        try {
            $sql = sprintf("select * from mydb.Descuento WHERE idEmpresa = %s", 
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idEmpresa"] = $idEmpresa;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByEmpresa de la clase DescuentoDao), error:' . $e->getMessage());
        }
    }

    public function update(Descuento $descuento) {
        try {
            $sql = sprintf("update Descuento set Nombre = %s, 
                                                Porcentaje = %s, 
                                                Valor = %s
                            where idDescuento = %s", 
                    $this->labAdodb->Param("Nombre"), 
                    $this->labAdodb->Param("Porcentaje"), 
                    $this->labAdodb->Param("Valor"), 
                    $this->labAdodb->Param("idDescuento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre"] = $descuento->getNombre();
            $valores["Pocentaje"] = $descuento->getPorcentaje();
            $valores["Valor"] = $descuento->getValor();
            $valores["idDescuento"] = $descuento->getIdDescuento();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase DescuentoDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Descuento $descuento) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Descuento where Nombre = %s ",
                            $this->labAdodb->Param("Nombre"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre"] = $descuento->getNombre();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase DescuentoDao), error:'.$e->getMessage());
        }
    }
}