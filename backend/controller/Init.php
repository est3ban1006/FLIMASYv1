<?php
include($ruta."entity/Asiento_Reserva.php");
include($ruta."entity/Asiento_Ruta.php");
include($ruta."entity/Carpeta.php");
include($ruta."entity/Catalogo_avion.php");
include($ruta."entity/Descuento.php");
include($ruta."entity/Empresa.php");
include($ruta."entity/Horario_Ruta.php");
include($ruta."entity/Persona.php");
include($ruta."entity/Recurso.php");
include($ruta."entity/Reserva.php");
include($ruta."entity/Ruta.php");
include($ruta."entity/Tipo_Avion.php");
include($ruta."entity/Usuario.php");
include($ruta."model/Conexion.php");
include($ruta."model/Asiento_ReservaDao.php");
include($ruta."model/Asiento_RutaDao.php");
include($ruta."model/CarpetaDao.php");
include($ruta."model/Catalogo_avionDao.php");
include($ruta."model/DescuentoDao.php");
include($ruta."model/EmpresaDao.php");
include($ruta."model/Horario_RutaDao.php");
include($ruta."model/PersonaDao.php");
include($ruta."model/ReservaDao.php");
include($ruta."model/RecursoDao.php");
include($ruta."model/RutaDao.php");
include($ruta."model/Tipo_AvionDao.php");
include($ruta."model/UsuarioDao.php");
include($ruta."business/Asiento_ReservaBO.php");
include($ruta."business/Asiento_RutaBO.php");
include($ruta."business/CarpetaBO.php");
include($ruta."business/Catalogo_avionBO.php");
include($ruta."business/DescuentoBO.php");
include($ruta."business/EmpresaBO.php");
include($ruta."business/Horario_RutaBO.php");
include($ruta."business/PersonaBO.php");
include($ruta."business/RecursoBO.php");
include($ruta."business/ReservaBO.php");
include($ruta."business/RutaBO.php");
include($ruta."business/Tipo_AvionBO.php");
include($ruta."business/UsuarioBO.php");

global $conn;
$conn = new Conexion();
$asientoReservaBO = new Asiento_ReservaBO($conn->getConn());
$asientoRutaBO = new Asiento_RutaBO($conn->getConn());
$carpetaBO = new CarpetaBO($conn->getConn());
$avionBO = new Catalogo_avionBO($conn->getConn());
$descuentoBO = new DescuentoBO($conn->getConn());
$empresaBO = new EmpresaBO($conn->getConn());
$horariBO = new Horario_RutaBO($conn->getConn());
$personaBO = new PersonaBO($conn->getConn());
$recursoBO = new RecursoBO($conn->getConn());
$reservaBO = new ReservaBO($conn->getConn());
$rutaBO = new RutaBO($conn->getConn());
$tipoAvionBO = new Tipo_AvionBO($conn->getConn());
$usuarioBO = new UsuarioBO($conn->getConn());

$empresaObj = array();
$empresaObj = $empresaBO->getById(1);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

