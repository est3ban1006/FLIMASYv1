<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CarpetaDao {
    private $conn;
    function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function add(Carpeta $carpeta) {
        try {
            $sql = sprintf("insert into mydb.Carpeta (idEmpresa,Nombre, EsBannerDescuento) 
                                          values (%s,%s,%s)",
                    $this->labAdodb->Param("idEmpresa"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("EsBannerDescuento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idEmpresa"]             = $carpeta->getIdEmpresa();
            $valores["Nombre"]                = $carpeta->getNombre();
            $valores["EsBannerDescuento"]     = $carpeta->getEsBannerDescuento();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la carpeta(Error generado en el metodo add de la clase CarpetaDao), error:'.$e->getMessage());
        }
    }
    
    public function delete($idCarpeta) {
        try {
            $sql = sprintf("delete from mydb.Carpeta where idCarpeta = %s", $this->labAdodb->Param("idCarpeta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idCarpeta"] = $idCarpeta;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase CarpetaDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idCarpeta) {
        $carpeta = array();
        try {
            $sql = sprintf("select * from mydb.Carpeta where  idCarpeta = %s", $this->labAdodb->Param("idCarpeta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idCarpeta"] = $idCarpeta;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $carpeta = new Carpeta();
                $carpeta->setIdCarpeta($resultSql->Fields("idCarpeta"));
                $carpeta->setIdEmpresa($resultSql->Fields("idEmpresa"));
                $carpeta->setNombre($resultSql->Fields("Nombre"));
                $carpeta->setEsBannerDescuento($resultSql->Fields("EsBannerDescuento"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase CarpetaDao), error:' . $e->getMessage());
        }
        return $carpeta;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Carpeta");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase CarpetaDAO), error:' . $e->getMessage());
        }
    }
    
    public function getAllByEmpresa($idEmpresa) {
        try {
            $sql = sprintf("select * from mydb.Carpeta WHERE idEmpresa = %s", 
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idEmpresa"] = $idEmpresa;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByEmpresa de la clase CarpetaDao), error:' . $e->getMessage());
        }
    }

    public function update(Carpeta $carpeta) {
        try {
            $sql = sprintf("update Carpeta set Nombre = %s, 
                                EsBannerDescuento = %s
                            where idCarpeta = %s", 
                    $this->labAdodb->Param("Nombre"), 
                    $this->labAdodb->Param("EsBannerDescuento"), 
                    $this->labAdodb->Param("idCarpeta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre"] = $carpeta->getNombre();
            $valores["EsBannerDescuento"] = $carpeta->getEsBannerDescuento();
            $valores["idCarpeta"] = $carpeta->getIdCarpeta();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase CarpetaDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Carpeta $carpeta) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Carpeta where Nombre = %s ",
                            $this->labAdodb->Param("Nombre"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre"] = $carpeta->getNombre();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase CarpetaDao), error:'.$e->getMessage());
        }
    }
}
