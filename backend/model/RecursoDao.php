<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RecursoDao {
    private $labAdodb;
    function __construct($conn) {
        $this->labAdodb = $conn;
    }
    
    public function add(Recurso $recurso) {
        try {
            $sql = sprintf("insert into mydb.Recurso (idCarpeta,Nombre, Tipo, Tamaño, Ruta) 
                                          values (%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idCarpeta"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Tipo"),
                    $this->labAdodb->Param("Tamaño"),
                    $this->labAdodb->Param("Ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idCarpeta"]     = $recurso->getIdCarpeta();
            $valores["Nombre"]        = $recurso->getNombre();
            $valores["Tipo"]          = $recurso->getTipo();
            $valores["Tamaño"]        = $recurso->getTamaño();
            $valores["Ruta"]          = $recurso->getRuta();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase RecursoDao), error:'.$e->getMessage());
        }
    }
    
    public function delete($idRecurso) {
        try {
            $sql = sprintf("delete from mydb.Recurso where  idRecurso = %s", $this->labAdodb->Param("idRecurso"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idRecurso"] = $idRecurso;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase RecursoDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idRecurso) {
        $recurso = array();
        try {
            $sql = sprintf("select * from mydb.Recurso where  idRecurso = %s", $this->labAdodb->Param("idRecurso"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRecurso"] = $idRecurso;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $recurso = new Recurso();
                $recurso->setIdRecurso($resultSql->Fields("idRecurso"));
                $recurso->setIdCarpeta($resultSql->Fields("idCarpeta"));
                $recurso->setNombre($resultSql->Fields("Nombre"));
                $recurso->setTipo($resultSql->Fields("Tipo"));
                $recurso->setTamaño($resultSql->Fields("Tamaño"));
                $recurso->setRuta($resultSql->Fields("Ruta"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase RecursoDao), error:' . $e->getMessage());
        }
        return $recurso;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.Recurso");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase RecursoDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllByCarpeta($idCarpeta) {
        try {
            $sql = sprintf("select * from mydb.Recurso WHERE idCarpeta = %s", 
                    $this->labAdodb->Param("idCarpeta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idCarpeta"] = $idCarpeta;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAllByCarpeta de la clase RecursoDao), error:' . $e->getMessage());
        }
    }

    public function update(Recurso $recurso) {
        try {
            $sql = sprintf("update Personas set Nombre = %s, 
                                Tipo = %s, 
                                Tamaño = %s, 
                                Ruta = %s 
                            where idRecurso = %s", 
                    $this->labAdodb->Param("Nombre"), 
                    $this->labAdodb->Param("Tipo"), 
                    $this->labAdodb->Param("Tamaño"), 
                    $this->labAdodb->Param("Ruta"),
                    $this->labAdodb->Param("idRecurso"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre"] = $recurso->getNombre();
            $valores["Tipo"] = $recurso->getTipo();
            $valores["Tamaño"] = $recurso->getTamaño();
            $valores["Ruta"] = $recurso->getRuta();
            $valores["idRecurso"] = $recurso->getIdRecurso();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase RecursoDao), error:' . $e->getMessage());
        }
    }
  
    public function exist(Recurso $recurso) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Recurso where idRecurso = %s ",
                            $this->labAdodb->Param("idRecurso"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRecurso"] = $recurso->getIdRecurso();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase RecursoDao), error:'.$e->getMessage());
        }
    }
}
