(function ($) {
    "use strict";
    /*==================================================================
     [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {
        var check = true;
        
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
  
        return check;
    });
    
    $('.validate-form2').on('submit', function () {
        var check = true;
        input = $('.validate-input2 .input100');

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
        
        //HACER LA VALIDACION DEL CONFIRM PASS Y EL PASS
        if($('#passNew').val() !== $('#confirmPassNew').val()){
            check = false;
            alertify.error("Las contraseñas deben ser iguales");
            showValidate($('#passNew'));
            showValidate($('#confirmPassNew'));
        }

        if($.trim($('#direccion').val()) === ""){
            check = false;
            alertify.error("Seleccione su direccion en el mapa");
        }
        
        return check;
    });

    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });
    
    $('.validate-form2 .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
})(jQuery);

function ShowForm(type){
    if(type == 2){
        $('#register').val(1);
        $('#login').val(0);
        //clean fields
        $('#emailNew').val("");
        $('#passNew').val("");
        $('#confirmPassNew').val("");
        $('#name').val("");
        $('#lastNameNew').val("");
        $('#lastName2New').val("");
        $('#birthNew').val("");
        $('#phoneNew').val("");
        $('#cellPhoneNew').val("");
        $('#cedulaNew').val("");
        
        $('#formRegister').show();
        $('#formLogin').hide();
        $('.validate-form2 .input100').each(function () {
            $(this).focus(function () {
                hideValidate(this);
            });
        });
        
    }else{
        $('#register').val(0);
        $('#login').val(1);
        $('#email').val("");
        $('#pass').val("");
        $('#formRegister').hide();
        $('#formLogin').show();
        
        $('.validate-form .input100').each(function () {
            $(this).focus(function () {
                hideValidate(this);
            });
        });
    }
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