$(document).ready(function() {

	$('#fechaAsignacion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

        // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Evento al cambiar el radio button
    $('input[type=radio][name=radios]').change(function() {

        let cadena = this.value;
        if (cadena == "civil") {
            $('#cajaPolicia').css('display', 'none');
            $('#cajaCivil').css('display', 'block');
        }else if (cadena == "policia") {
            $('#cajaCivil').css('display', 'none');
            $('#cajaPolicia').css('display', 'block');
        }
    });

    // Enviar la información del formulario
    $('#formAnticorrupcion').submit(function(e){
        
        e.preventDefault();
        $(this).validate({
            rules: {
                expediente:{
                    required: true,
                    maxlength: 15
                },

                carpetaAdministrativa:{
                    required: true,
                    maxlength: 15
                },

                fechaAsignacion:{
                    required: true,
                    date : true
                },

                carpetaInvestigacion:{
                    maxlength: 25,
                    required: true
                },

                averiguacionPrevia:{
                    required: true,
                    maxlength: 30
                },

                civil:{
                    maxlength: 25,
                    digits:false
                },

                policia:{
                    maxlength: 25,
                    digits: false
                },

                observaciones:{
                    required: false,
                    maxlength: 250
                },
            },
            messages:{
                expediente: {
                    required: "",
                    maxlength: "No puedes ingresar más de 15 digitos."
                },

                carpetaAdministrativa:{
                    required: "",
                    maxlength: "Ingresaste demaciados digitos."
                },

                fechaAsignacion:{
                    required: ""
                },

                carpetaInvestigacion:{
                    required: "",
                    maxlength: "No puedes ingresar más de 50 digitos."
                },

                averiguacionPrevia:{
                    required: "",
                    maxlength: "No puedes ingresar más de 30 digitos."
                },

                civil:{
                    required: "",
                    maxlength: "No puedes ingresar más de 25 digitos."
                },

                policia:{
                    maxlength: "No puedes ingresar más de 25 digitos."
                },

                observaciones:{
                    maxlength: "No puedes ingresar más de 250 digitos."
                },
            },
        });

        // Obtenemos los datos del formulario
        var form = $(this);

        let data = form.serializeArray();
        //data.push({name: "tipo", value: "antiCorrupcion"});

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: form.attr('action'),
            data: $.param(data),
            error: function (data){
                swal("Error!", "El registro no fue actualizado.", "error");
            },
            success: function(data)
            {
                if(data.success){
                	form[0].reset();
                    swal({
                        title: "OK!", 
                        text: "Tarea completada.", 
                        icon: "success",
                        timer: 2000
                    });
                }else{
                    swal({
                        title: "Error!",
                        text: "No se completo la tarea.",
                        icon: "error",
                        timer: 2000
                    });  
                    muestraErrores(data.error);
                    $('#erroresBox').fadeOut(10000);
                }
            }
        }); //Fin llamada ajax
    }); //Fin del sumit    

    //Mostrar errores
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

});