/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function ValidateFormUpdatePerson() {
    var flag = true;

    if ($.trim($('#nombre').val()) === "") {
        flag = false;
        $('#nombre').css('border', '1px solid red');
    } else {
        $('#nombre').css('border', '1px solid gray');
    }
    if ($.trim($('#primerApellido').val()) === "") {
        flag = false;
        $('#primerApellido').css('border', '1px solid red');
    } else {
        $('#primerApellido').css('border', '1px solid gray');
    }
    if ($.trim($('#segundoApellido').val()) === "") {
        flag = false;
        $('#segundoApellido').css('border', '1px solid red');
    } else {
        $('#segundoApellido').css('border', '1px solid gray');
    }
    if ($.trim($('#fechaNacimiento').val()) === "") {
        flag = false;
        $('#fechaNacimiento').css('border', '1px solid red');
    } else {
        $('#fechaNacimiento').css('border', '1px solid gray');
    }
    if ($.trim($('#cedula').val()) === "") {
        flag = false;
        $('#cedula').css('border', '1px solid red');
    } else {
        $('#cedula').css('border', '1px solid gray');
    }
    if ($.trim($('#telefono').val()) === "") {
        flag = false;
        $('#telefono').css('border', '1px solid red');
    } else {
        $('#telefono').css('border', '1px solid gray');
    }
    if ($.trim($('#celular').val()) === "") {
        flag = false;
        $('#celular').css('border', '1px solid red');
    } else {
        $('#celular').css('border', '1px solid gray');
    }
    if ($.trim($('#correo').val()) === "") {
        flag = false;
        $('#correo').css('border', '1px solid red');
    } else {
        $('#correo').css('border', '1px solid gray');
    }
    if ($.trim($('#contraseña').val()) !== $.trim($('#confirmpass').val())) {
        flag = false;
        $('#contraseña').css('border', '1px solid red');
        $('#confirmpass').css('border', '1px solid red');
        alertify.error("Las contraseñas deben ser identicas");
    } else {
        $('#contraseña').css('border', '1px solid gray');
        $('#confirmpass').css('border', '1px solid gray');
    }

    if (flag) {

    } else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }

    return flag;


}
function ValidateFormUpdateEmpresa() {
    var flag = true;

    if ($.trim($('#nombreEmpresa').val()) === "") {
        flag = false;
        $('#nombreEmpresa').css('border', '1px solid red');
    } else {
        $('#nombreEmpresa').css('border', '1px solid gray');
    }
    if ($.trim($('#vision').val()) === "") {
        flag = false;
        $('#vision').css('border', '1px solid red');
    } else {
        $('#vision').css('border', '1px solid gray');
    }
    if ($.trim($('#mision').val()) === "") {
        flag = false;
        $('#mision').css('border', '1px solid red');
    } else {
        $('#mision').css('border', '1px solid gray');
    }
    if ($.trim($('#objetivos').val()) === "") {
        flag = false;
        $('#objetivos').css('border', '1px solid red');
    } else {
        $('#objetivos').css('border', '1px solid gray');
    }
    if ($.trim($('#descripcion').val()) === "") {
        flag = false;
        $('#descripcion').css('border', '1px solid red');
    } else {
        $('#descripcion').css('border', '1px solid gray');
    }
    if ($.trim($('#textoBanner').val()) === "") {
        flag = false;
        $('#textoBanner').css('border', '1px solid red');
    } else {
        $('#textoBanner').css('border', '1px solid gray');
    }
    if ($.trim($('#textRedSocial').val()) === "") {
        flag = false;
        $('#textRedSocial').css('border', '1px solid red');
    } else {
        $('#textRedSocial').css('border', '1px solid gray');
    }
    if ($.trim($('#email').val()) === "") {
        flag = false;
        $('#email').css('border', '1px solid red');
    } else {
        $('#email').css('border', '1px solid gray');
    }
    if ($.trim($('#facebook').val()) === "") {
        flag = false;
        $('#facebook').css('border', '1px solid red');
    } else {
        $('#facebook').css('border', '1px solid gray');
    }
    if ($.trim($('#instagram').val()) === "") {
        flag = false;
        $('#instagram').css('border', '1px solid red');
    } else {
        $('#instagram').css('border', '1px solid gray');
    }
    if ($.trim($('#twitter').val()) === "") {
        flag = false;
        $('#twitter').css('border', '1px solid red');
    } else {
        $('#twitter').css('border', '1px solid gray');
    }
    if ($.trim($('#skype').val()) === "") {
        flag = false;
        $('#skype').css('border', '1px solid red');
    } else {
        $('#skype').css('border', '1px solid gray');
    }
    if ($.trim($('#linkedin').val()) === "") {
        flag = false;
        $('#linkedin').css('border', '1px solid red');
    } else {
        $('#linkedin').css('border', '1px solid gray');
    }
    if ($.trim($('#direccion').val()) === "") {
        flag = false;
        $('#direccion').css('border', '1px solid red');
    } else {
        $('#direccion').css('border', '1px solid gray');
    }
    if ($.trim($('#telefono').val()) === "") {
        flag = false;
        $('#telefono').css('border', '1px solid red');
    } else {
        $('#telefono').css('border', '1px solid gray');
    }
    if ($.trim($('#logo').val()) === "") {
        flag = false;
        $('#logo').css('border', '1px solid red');
    } else {
        $('#logo').css('border', '1px solid gray');
    }
    if ($.trim($('#imgdescuento').val()) === "") {
        flag = false;
        $('#imgdescuento').css('border', '1px solid red');
    } else {
        $('#imgdescuento').css('border', '1px solid gray');
    }
    
    if (flag) {

    } else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }

    return flag;    
} 