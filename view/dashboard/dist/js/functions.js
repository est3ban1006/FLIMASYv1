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
        setMapa(coords); //pasamos las coordenadas al metodo para crear el mapa
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