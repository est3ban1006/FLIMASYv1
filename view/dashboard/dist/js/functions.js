/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//inicializar tabla si hay 
function initTable(name) {
    $(name).DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
}

function ValidateFormUpdateAvion() {
    var flag = true;
    if ($.trim($('#tipoAvion').val()) === "") {
        flag = false;
        $('#tipoAvion').css('border', '1px solid red');
    } else {
        $('#tipoAvion').css('border', '1px solid gray');
    }
    if ($.trim($('#nombre').val()) === "") {
        flag = false;
        $('#nombre').css('border', '1px solid red');
    } else {
        $('#nombre').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ValidateFormUpdateHorario() {
    var flag = true;
    if ($.trim($('#ruta').val()) === "") {
        flag = false;
        $('#ruta').css('border', '1px solid red');
    } else {
        $('#ruta').css('border', '1px solid gray');
    }
    if ($.trim($('#fecha').val()) === "") {
        flag = false;
        $('#fecha').css('border', '1px solid red');
    } else {
        $('#fecha').css('border', '1px solid gray');
    }
    if ($.trim($('#precio').val()) === "") {
        flag = false;
        $('#precio').css('border', '1px solid red');
    } else {
        $('#precio').css('border', '1px solid gray');
    }
    if ($.trim($('#avion').val()) === "") {
        flag = false;
        $('#avion').css('border', '1px solid red');
    } else {
        $('#avion').css('border', '1px solid gray');
    }
    if ($.trim($('#horaDespliegue').val()) === "") {
        flag = false;
        $('#horaDespliegue').css('border', '1px solid red');
    } else {
        $('#horaDespliegue').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ConfirmDeleteAsientoRuta(idAsiento) {
    //mostrar un confirm box
    alertify.confirm('Desea eliminar el asiento?', 'Una vez realizada la accion no se podran recuperar los datos.', function() {
        $('#idDelete').val(idAsiento);
        $('#formDeleteAsientoRuta').submit();
    }, function() {
        $('#idDelete').val(0);
    }).set('closable', false).set('defaultFocus', 'cancel');
}

function ConfirmDeleteHorario(idRuta) {
    //mostrar un confirm box
    alertify.confirm('Desea eliminar el horario?', 'Una vez realizada la accion no se podran recuperar los datos y se eliminaran todos los asientos asociados al horario', function() {
        $('#idDelete').val(idRuta);
        $('#formDeleteHorario').submit();
    }, function() {
        $('#idDelete').val(0);
    }).set('closable', false).set('defaultFocus', 'cancel');
}

function ValidateFormAddHorario() {
    var flag = true;
    if ($.trim($('#ruta').val()) === "") {
        flag = false;
        $('#ruta').css('border', '1px solid red');
    } else {
        $('#ruta').css('border', '1px solid gray');
    }
    if ($.trim($('#fecha').val()) === "") {
        flag = false;
        $('#fecha').css('border', '1px solid red');
    } else {
        $('#fecha').css('border', '1px solid gray');
    }
    if ($.trim($('#precio').val()) === "") {
        flag = false;
        $('#precio').css('border', '1px solid red');
    } else {
        $('#precio').css('border', '1px solid gray');
    }
    if ($.trim($('#avion').val()) === "") {
        flag = false;
        $('#avion').css('border', '1px solid red');
    } else {
        $('#avion').css('border', '1px solid gray');
    }
    if ($.trim($('#horaDespliegue').val()) === "") {
        flag = false;
        $('#horaDespliegue').css('border', '1px solid red');
    } else {
        $('#horaDespliegue').css('border', '1px solid gray');
    }
    if ($.trim($('#cantAsientosDispo').val()) === "") {
        flag = false;
        $('#cantAsientosDispo').css('border', '1px solid red');
    } else {
        $('#cantAsientosDispo').css('border', '1px solid gray');
    }
    if ($.trim($('#descuento').val()) !== "") {
        //VALIDAR QUE TENGAN CNTIDAD CON DECUENTO
        if ($.trim($('#cantAsientosDescuento').val()) === "") {
            flag = false;
            $('#cantAsientosDescuento').css('border', '1px solid red');
        } else {
            $('#cantAsientosDescuento').css('border', '1px solid gray');
        }
    } else{
        $('#cantAsientosDescuento').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ValidateFormUpdateRuta() {
    var flag = true;
    if ($.trim($('#ruta').val()) === "") {
        flag = false;
        $('#ruta').css('border', '1px solid red');
    } else {
        $('#ruta').css('border', '1px solid gray');
    }
    if ($.trim($('#duracion').val()) === "") {
        flag = false;
        $('#duracion').css('border', '1px solid red');
    } else {
        $('#duracion').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ValidateFormAddRuta() {
    var flag = true;
    if ($.trim($('#ruta').val()) === "") {
        flag = false;
        $('#ruta').css('border', '1px solid red');
    } else {
        $('#ruta').css('border', '1px solid gray');
    }
    if ($.trim($('#duracion').val()) === "") {
        flag = false;
        $('#duracion').css('border', '1px solid red');
    } else {
        $('#duracion').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ConfirmDeleteRuta(idRuta) {
    //mostrar un confirm box
    alertify.confirm('Desea eliminar la ruta?', 'Una vez realizada la accion no se podran recuperar los datos', function() {
        $('#idDelete').val(idRuta);
        $('#formDeleteRuta').submit();
    }, function() {
        $('#idDelete').val(0);
    }).set('closable', false).set('defaultFocus', 'cancel');
}

function ValidateFormAddAvion() {
    var flag = true;
    if ($.trim($('#tipoAvion').val()) === "") {
        flag = false;
        $('#tipoAvion').css('border', '1px solid red');
    } else {
        $('#tipoAvion').css('border', '1px solid gray');
    }
    if ($.trim($('#nombre').val()) === "") {
        flag = false;
        $('#nombre').css('border', '1px solid red');
    } else {
        $('#nombre').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ConfirmDeleteAvion(idAvion) {
    //mostrar un confirm box
    alertify.confirm('Desea eliminar el avion?', 'Una vez realizada la accion no se podran recuperar los datos', function() {
        $('#idDelete').val(idAvion);
        $('#formDeleteAvion').submit();
    }, function() {
        $('#idDelete').val(0);
    }).set('closable', false).set('defaultFocus', 'cancel');
}

function ValidateFormUpdateTipoAvion() {
    var flag = true;
    if ($.trim($('#año').val()) === "") {
        flag = false;
        $('#año').css('border', '1px solid red');
    } else {
        $('#año').css('border', '1px solid gray');
    }
    if ($.trim($('#modelo').val()) === "") {
        flag = false;
        $('#modelo').css('border', '1px solid red');
    } else {
        $('#modelo').css('border', '1px solid gray');
    }
    if ($.trim($('#marca').val()) === "") {
        flag = false;
        $('#marca').css('border', '1px solid red');
    } else {
        $('#marca').css('border', '1px solid gray');
    }
    if ($.trim($('#cantFilas').val()) === "") {
        flag = false;
        $('#cantFilas').css('border', '1px solid red');
    } else {
        $('#cantFilas').css('border', '1px solid gray');
    }
    if ($.trim($('#cantAsientos').val()) === "") {
        flag = false;
        $('#cantAsientos').css('border', '1px solid red');
    } else {
        $('#cantAsientos').css('border', '1px solid gray');
    }
    if ($.trim($('#cantpasajeros').val()) === "") {
        flag = false;
        $('#cantpasajeros').css('border', '1px solid red');
    } else {
        $('#cantpasajeros').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ConfirmDeleteTipoAvion(idTipo) {
    //mostrar un confirm box
    alertify.confirm('Desea eliminar el tipo de avion?', 'Una vez realizada la accion no se podran recuperar los datos', function() {
        $('#idDelete').val(idTipo);
        $('#formDeleteTipoAvion').submit();
    }, function() {
        $('#idDelete').val(0);
    }).set('closable', false).set('defaultFocus', 'cancel');
}

function ValidateFormAddTipoAvion() {
    var flag = true;
    if ($.trim($('#año').val()) === "") {
        flag = false;
        $('#año').css('border', '1px solid red');
    } else {
        $('#año').css('border', '1px solid gray');
    }
    if ($.trim($('#modelo').val()) === "") {
        flag = false;
        $('#modelo').css('border', '1px solid red');
    } else {
        $('#modelo').css('border', '1px solid gray');
    }
    if ($.trim($('#marca').val()) === "") {
        flag = false;
        $('#marca').css('border', '1px solid red');
    } else {
        $('#marca').css('border', '1px solid gray');
    }
    if ($.trim($('#cantFilas').val()) === "") {
        flag = false;
        $('#cantFilas').css('border', '1px solid red');
    } else {
        $('#cantFilas').css('border', '1px solid gray');
    }
    if ($.trim($('#cantAsientos').val()) === "") {
        flag = false;
        $('#cantAsientos').css('border', '1px solid red');
    } else {
        $('#cantAsientos').css('border', '1px solid gray');
    }
    if ($.trim($('#cantpasajeros').val()) === "") {
        flag = false;
        $('#cantpasajeros').css('border', '1px solid red');
    } else {
        $('#cantpasajeros').css('border', '1px solid gray');
    }
    if (flag) {} else {
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
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

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
    if ($.trim($('#direccion').val()) === "") {
        flag = false;
        alertify.error("Por favor marque su direccion en el mapa");
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
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ValidateFormAddPerson() {
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
    if ($.trim($('#direccion').val()) === "") {
        flag = false;
        alertify.error("Por favor marque su direccion en el mapa");
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
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ConfirmDeletePerson(idPerson) {
    //mostrar un confirm box
    alertify.confirm('Desea eliminar el usuario?', 'Una vez realizada la accion no se podran recuperar los datos', function() {
        $('#idDelete').val(idPerson);
        $('#formDeletePerson').submit();
    }, function() {
        $('#idDelete').val(0);
    }).set('closable', false).set('defaultFocus', 'cancel');
}

initMap = function() {
    //usamos la API para geolocalizar el usuario
    navigator.geolocation.getCurrentPosition(function(position) {
        coords = {
            lng: position.coords.longitude,
            lat: position.coords.latitude
        }; 
        //setMapa(coords); //pasamos las coordenadas al metodo para crear el mapa
    }, function(error) {
        console.log(error);
    });
}

function setMapa(coords) {
    //Se crea una nueva instancia del objeto mapa
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: new google.maps.LatLng(coords.lat, coords.lng),
    });
    //Creamos el marcador en el mapa con sus propiedades
    //para nuestro obetivo tenemos que poner el atributo draggable en true
    //position pondremos las mismas coordenas que obtuvimos en la geolocalización
    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coords.lat, coords.lng),
    });
    //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
    //cuando el usuario a soltado el marcador
    marker.addListener('click', toggleBounce);
    marker.addListener('dragend', function(event) {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("direccion").value = this.getPosition().lat() + "," + this.getPosition().lng();
    });
}
//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}
function ValidateFormAddDescuento() {
    var flag = true;
    if ($.trim($('#nombre').val()) === "") {
        flag = false;
        $('#nombre').css('border', '1px solid red');
    } else {
        $('#nombre').css('border', '1px solid gray');
    }
    if ($.trim($('#porcentaje').val()) === "") {
        flag = false;
        $('#porcentaje').css('border', '1px solid red');
    } else {
        $('#porcentaje').css('border', '1px solid gray');
    }
    if ($.trim($('#valor').val()) === "") {
        flag = false;
        $('#valor').css('border', '1px solid red');
    } else {
        $('#valor').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

function ConfirmDeleteDescuento(idDescuento) {
    //mostrar un confirm box
    alertify.confirm('Desea eliminar el descuento?', 'Una vez realizada la accion no se podran recuperar los datos', function() {
        $('#idDelete').val(idDescuento);
        $('#formDeleteDescuento').submit();
    }, function() {
        $('#idDelete').val(0);
    }).set('closable', false).set('defaultFocus', 'cancel');
}

function ValidateFormAddRuta() {
    var flag = true;
    if ($.trim($('#ruta').val()) === "") {
        flag = false;
        $('#ruta').css('border', '1px solid red');
    } else {
        $('#ruta').css('border', '1px solid gray');
    }
    if ($.trim($('#duracion').val()) === "") {
        flag = false;
        $('#duracion').css('border', '1px solid red');
    } else {
        $('#duracion').css('border', '1px solid gray');
    }
    if (flag) {} else {
        alertify.error("Por favor ingrese los valores de los campos en rojo");
    }
    return flag;
}

//LLAMAR FUNCION PARA CERRAR SESION EN PHP
function ConfirmCloseSession(){
    alertify.confirm('Cerrar Sesion', 'Esta seguro que desea salir del sistema?', function() {
        $('#formCloseSession').submit();
    }, function() {
    }).set('closable', false).set('defaultFocus', 'cancel');
}
