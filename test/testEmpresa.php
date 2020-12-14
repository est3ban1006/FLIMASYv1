<?php
$ruta = "../backend/";
require_once ("../backend/controller/Init.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$obj_persona = new Persona();
/*$obj_persona->setCedula("8263542");
$obj_persona->setNombre("Mario");
$obj_persona->setApellido1("Fonseca");
$obj_persona->setApellido2("Fonseca");
$obj_persona->setCorreo("Mrioaksjfas");
$obj_persona->setTelefono("786343");
$obj_persona->setDireccion("jhgasjdhksajd");
$obj_persona->setCelular("27364");*/

$operacion = 2; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $personaBO->add($obj_persona);
        echo("<h1>Prueba de agregar exitosa</h1>");
        echo $personaBO->getAll();
    break;

    case 2: //Prueba para modificar en la base de datos
        $obj_persona = $empresaBO->getById(1);
        echo("<h1>Prueba de obtener exitosa</h1>"); echo var_dump($obj_persona);
    break;

    case 3: //Prueba para eliminar en la base de datos
        $personaBO->delete($obj_persona);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $personaConsultada = $personaBO->searchById($obj_persona);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($personaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $personaBO->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
