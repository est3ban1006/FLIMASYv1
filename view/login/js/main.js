(function ($) {
    "use strict";
    /*==================================================================
     [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {
        var check = true;
        
        if($('#register').val() === 1){
            input = $('.validate-input2 .input100');
        }
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
        
        if($('#register').val() === 1){
            //HACER LA VALIDACION DEL CONFIRM PASS Y EL PASS
            if($('#passNew').val() !== $('#confirmPassNew').val()){
                check = false;
                alertify.error("Las contraseñas deben ser iguales");
            }
        }

        return check;
    });
    
    var input = $('.validate-input .input100');

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