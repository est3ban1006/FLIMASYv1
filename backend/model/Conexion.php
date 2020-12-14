<?php
require_once($ruta."model/adodb5/adodb.inc.php");
include $ruta.'model/adodb5/adodb-exceptions.inc.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author josue
 */
class Conexion {
    private $conn;//objeto de conexion con la base de datos    
    
    public function __construct() {
        //se crea el objeto con la conexión de la base de datos
        //según los datos del servidor de mysql
        $driver = 'mysqli';
        $this->conn = newAdoConnection($driver);
        $this->conn->setCharset('utf8');
        $this->conn->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        //los cados de conexión   host,       user,   pass,   basedatos
    $this->conn->Connect("localhost", "root", "1006", "mydb");   
        
        //si se desea hacer debug del SQL que se genera en la base de datos
        //dependiendo del error es necesario ver si es un error directamente
        //en la base de datos
        $this->conn->debug=false;
    }
    
    function getConn() {
        return $this->conn;
    }
}
