<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmpresaDao {

    private $labAdodb;

    function __construct($conn) {
        $this->labAdodb = $conn;
    }

    public function add(Empresa $empresa) {
        try {
            $sql = sprintf("insert into mydb.Empresa (Fecha_creacion, Activo, Nombre_empresa, Vision, Mision, Objetivos, Telefono, Direccion,URL_facebook,URL_instagram,URL_twitter,URL_skype,URL_linkedin,Logo,Mostrar_imgDescuento,Texto_Banner,Descripcion,Email, TextoRedesSociales) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)", 
                    $this->labAdodb->Param("Fecha_creacion"), 
                    $this->labAdodb->Param("Activo"), 
                    $this->labAdodb->Param("Nombre_empresa"), 
                    $this->labAdodb->Param("Vision"), 
                    $this->labAdodb->Param("Mision"), 
                    $this->labAdodb->Param("Objetivos"), 
                    $this->labAdodb->Param("Telefono"), 
                    $this->labAdodb->Param("Direccion"), 
                    $this->labAdodb->Param("URL_facebook"), 
                    $this->labAdodb->Param("URL_instagram"), 
                    $this->labAdodb->Param("URL_twitter"), 
                    $this->labAdodb->Param("URL_skype"), 
                    $this->labAdodb->Param("URL_linkedin"), 
                    $this->labAdodb->Param("Logo"), 
                    $this->labAdodb->Param("Mostrar_imgDescuento"), 
                    $this->labAdodb->Param("Texto_Banner"), 
                    $this->labAdodb->Param("Descripcion"), 
                    $this->labAdodb->Param("Email"), 
                    $this->labAdodb->Param("TextoRedesSociales"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Fecha_creacion"] = $empresa->getFecha_creacion();
            $valores["Activo"] = $empresa->getActivo();
            $valores["Nombre_empresa"] = $empresa->getNombre_empresa();
            $valores["Vision"] = $empresa->getVision();
            $valores["Mision"] = $empresa->getMision();
            $valores["Objetivos"] = $empresa->getObjetivos();
            $valores["Telefono"] = $empresa->getTelefono();
            $valores["Direccion"] = $empresa->getDireccion();
            $valores["URL_facebook"] = $empresa->getURL_facebook();
            $valores["URL_instagram"] = $empresa->getURL_instagram();
            $valores["URL_twitter"] = $empresa->getURL_twitter();
            $valores["URL_skype"] = $empresa->getURL_Skipe();
            $valores["URL_linkedin"] = $empresa->getURL_linkedin();
            $valores["Logo"] = $empresa->getLogo();
            $valores["Mostrar_imgDescuento"] = $empresa->getMostrar_imgDescuento();
            $valores["Texto_Banner"] = $empresa->getTexto_Banner();
            $valores["Descripcion"] = $empresa->getDescripcion();
            $valores["Email"] = $empresa->getEmail();
            $valores["TextoRedesSociales"] = $empresa->getTextoRedesSociales();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar la persona (Error generado en el metodo add de la clase EmpresaDao), error:' . $e->getMessage());
        }
    }

    public function delete($idEmpresa) {
        try {
            $sql = sprintf("delete from mydb.Empresa where idEmpresa = %s", $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idEmpresa"] = $idEmpresa;

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase EmpresaDao), error:' . $e->getMessage());
            return false;
        }
        return true;
    }

    public function getById($idEmpresa) {
        $empresa = array();
        try {
            $sql = sprintf("select * from mydb.Empresa where idEmpresa = %s", $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idEmpresa"] = $idEmpresa;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $empresa = new Empresa();
                $empresa->setIdEmpresa($resultSql->Fields("idEmpresa"));
                $empresa->setFecha_creacion($resultSql->Fields("Fecha_creacion"));
                $empresa->setActivo($resultSql->Fields("Activo"));
                $empresa->setNombre_empresa($resultSql->Fields("Nombre_empresa"));
                $empresa->setVision($resultSql->Fields("Vision"));
                $empresa->setMision($resultSql->Fields("Mision"));
                $empresa->setObjetivos($resultSql->Fields("Objetivos"));
                $empresa->setTelefono($resultSql->Fields("Telefono"));
                $empresa->setDireccion($resultSql->Fields("Direccion"));
                $empresa->setURL_facebook($resultSql->Fields("URL_facebook"));
                $empresa->setURL_instagram($resultSql->Fields("URL_instagram"));
                $empresa->setURL_twitter($resultSql->Fields("URL_twitter"));
                $empresa->setURL_Skipe($resultSql->Fields("URL_skype"));
                $empresa->setURL_linkedin($resultSql->Fields("URL_linkedin"));
                $empresa->setLogo($resultSql->Fields("Logo"));
                $empresa->setMostrar_imgDescuento($resultSql->Fields("Mostrar_imgDescuento"));
                $empresa->setTexto_Banner($resultSql->Fields("Texto_Banner"));
                $empresa->setDescripcion($resultSql->Fields("Descripcion"));
                $empresa->setEmail($resultSql->Fields("Email"));
                $empresa->setTextoRedesSociales($resultSql->Fields("TextoRedesSociales"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo getById de la clase EmpresaDao), error:' . $e->getMessage());
        }
        return $empresa;
    }

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.ruta");
            $resultSql = $this->labAdodb->Execute($sql); 
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase EmpresaDao), error:' . $e->getMessage());
            exit();
        }
    }

    public function update(Empresa $empresa) {
        try {
            $sql = sprintf("update Empresa set 
                        Activo = %s, 
                        Nombre_empresa = %s, 
                        Vision = %s, 
                        Mision = %s, 
                        Objetivos = %s, 
                        Telefono = %s, 
                        Direccion = %s,
                        URL_facebook = %s,
                        URL_instagram = %s,
                        URL_twitter = %s,
                        URL_skype = %s,
                        URL_linkedin = %s,
                        Logo = %s,
                        Mostrar_imgDescuento = %s,
                        Texto_Banner = %s,
                        Descripcion = %s,
                        Email = %s,
                        TextoRedesSociales = %s
                    where idEmpresa = %s", 
                    $this->labAdodb->Param("Activo"), 
                    $this->labAdodb->Param("Nombre_empresa"), 
                    $this->labAdodb->Param("Vision"), 
                    $this->labAdodb->Param("Mision"), 
                    $this->labAdodb->Param("Objetivos"), 
                    $this->labAdodb->Param("Telefono"), 
                    $this->labAdodb->Param("Direccion"), 
                    $this->labAdodb->Param("URL_facebook"), 
                    $this->labAdodb->Param("URL_instagram"),
                    $this->labAdodb->Param("URL_twitter"), 
                    $this->labAdodb->Param("URL_skype"), 
                    $this->labAdodb->Param("URL_linkedin"), 
                    $this->labAdodb->Param("Logo"), 
                    $this->labAdodb->Param("Mostrar_imgDescuento"),
                    $this->labAdodb->Param("Texto_Banner"), 
                    $this->labAdodb->Param("Descripcion"), 
                    $this->labAdodb->Param("Email"), 
                    $this->labAdodb->Param("TextoRedesSociales"), 
                    $this->labAdodb->Param("idEmpresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Activo"] = $empresa->getActivo();
            $valores["Nombre_empresa"] = $empresa->getNombre_empresa();
            $valores["Vision"] = $empresa->getVision();
            $valores["Mision"] = $empresa->getMision();
            $valores["Objetivos"] = $empresa->getObjetivos();
            $valores["Telefono"] = $empresa->getTelefono();
            $valores["Direccion"] = $empresa->getDireccion();
            $valores["URL_facebook"] = $empresa->getURL_facebook();
            $valores["URL_instagram"] = $empresa->getURL_instagram();
            $valores["URL_twitter"] = $empresa->getURL_twitter();
            $valores["URL_skype"] = $empresa->getURL_Skipe();
            $valores["URL_linkedin"] = $empresa->getURL_linkedin();
            $valores["Logo"] = $empresa->getLogo();
            $valores["Mostrar_imgDescuento"] = $empresa->getMostrar_imgDescuento();
            $valores["Texto_Banner"] = $empresa->getTexto_Banner();
            $valores["Descripcion"] = $empresa->getDescripcion();
            $valores["Email"] = $empresa->getEmail(); 
            $valores["TextoRedesSociales"] = $empresa->getTextoRedesSociales(); 
            $valores["idEmpresa"] = $empresa->getIdEmpresa(); 
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase EmpresaDao), error:' . $e->getMessage());
        }
    }

    public function exist(Empresa $empresa) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Empresa where Nombre_empresa = %s ", $this->labAdodb->Param("Nombre_empresa"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre_empresa"] = $empresa->getNombre_empresa();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase EmpresaDao), error:' . $e->getMessage());
        }
    }

}
