$(document).ready(function() {

	$('#fecha_asignacion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

    $("#servidor_publico").select2({
	    tags: true,
	    tokenSeparators: [',']
	})

	$("#denunciante").select2({
	    tags: true,
	    tokenSeparators: [',']
	})

	$("#delito").select2({
	    tags: true,
	    tokenSeparators: [',']
	})
        // Al cancelar el formulario
    $('#btnCancelar').click(function (e){
        e.preventDefault()

        // reditirimos a la pagina principal
        location.href = '/penal-siniestros-form';
    });

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    obtenerEstadosprocesales();

    // Enviar la información del formulario
    $('#formPenalSiniestros').submit(function(e){
        e.preventDefault();
        $(this).validate({
            rules: {
                numero_consecutivo:{
                    required: true,
                    maxlength: 15
                },

                carpeta_investigacion:{
                    required: true,
                    maxlength: 150
                },

                fecha_asignacion:{
                    required: true,
                    date : true
                },

                agencia_mp:{
                    maxlength: 50
                },

                servidor_publico:{
                    required: false
                },

                denunciante:{
                    required: false,
                    maxlength: 30
                },

                delito:{
                    required: true,
                    maxlength: 30,
                    digits:false
                },

                poligono:{
                    required: true,
                    maxlength: 50
                },

                Estado_procesal:{
                    required: true
                },

                observaciones:{
                    required: false,
                    maxlength: 250
                },
            },
            messages:{
                numero_consecutivo: {
                    required: "",
                    maxlength: "No puedes ingresar más de 15 digitos."
                },

                carpeta_investigacion:{
                    required: "",
                    maxlength: "Ingresaste demaciados digitos."
                },

                fecha_asignacion:{
                    required: ""
                },

                agencia_mp:{
                    required: "",
                    maxlength: "No puedes ingresar más de 50 digitos."
                },

                servidor_publico:{
                    required: "Ingresa al menos un servidor publico."
                },

                denunciante:{
                    required: "",
                    maxlength: "No puedes ingresar más de 30 digitos."
                },

                delito:{
                    required: "",
                    maxlength: "No puedes ingresar más de 30 digitos."
                },

                poligono:{
                    required: "",
                    maxlength: "No puedes ingresar más de 50 digitos."
                },

                Estado_procesal:{
                    required: "Selecciona un estado procesal."
                },

                observaciones:{
                    required: ""
                },
            },
        });

        // Obtenemos los datos del formulario
        var form = $(this);

        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            error: function (data){
                swal("Error!", "El registro no fue actualizado.", "error");
            },
            success: function(data)
            {
                if(data.error){
                    swal({
                        title: "Error!",
                        text: "No se completo la tarea.",
                        icon: "error",
                        timer: 2000
                    });  
                    muestraErrores(data.error);
                    $('#erroresBox').fadeOut(10000);
                }else{
                    form[0].reset();
                    $('#servidor_publico').val(null).trigger('change');
                    $('#denunciante').val(null).trigger('change');
                    $('#delito').val(null).trigger('change');
                    swal({
                        title: "OK!", 
                        text: "Tarea completada.", 
                        icon: "success",
                        timer: 2000
                    });
                }
            }
        }); //Fin llamada ajax
    }); //Fin del sumit
});

var muestraErrores = function(msg){
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}

// Obtiene los estados procesales
var obtenerEstadosprocesales = function (){
    $.ajax({
        url: "/obtenerestadosprocesales",
        method: "GET",
        data: { },
        dataType: "json",
        cache: false,
        error: function (){
            console.error('Error al procesar la solicitud');
        },
        success: function (data){
            var elem = $('#estado_procesal');

            $.each(data, function (kay, val){
                elem.append($('<option/>', { 'value': val.id, 'text': val.nombre }));
            });
        }
    });
};

