$(document).ready(function(){

    obtenerEstadosprocesales();

    $('#fecha_asignacion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
    });

    // Al cancelar el formulario
    $('#btnCancelar').click(function (e){
        e.preventDefault()

        // reditigimos a la pagina principal
        location.href = '/penal-siniestros';
    });

    $('#formPenalSiniestros').validate({
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
                required: true,
                maxlength: 250
            },
        },
        messages:{
            numero_consecutivo: {
                required: "Porfavor ingresa el numero consecutivo.",
                maxlength: "No puedes ingresar más de 15 digitos."
            },

            carpeta_investigacion:{
                required: "porfavor ingresa la carpeta de investigación.",
                maxlength: "Ingresaste demaciados digitos."
            },

            fecha_asignacion:{
                required: "Porfavor ingresa una fecha de asignación."
            },

            agencia_mp:{
                maxlength: "No puedes ingresar más de 50 digitos."
            },

            denunciante:{
                maxlength: "No puedes ingresar más de 30 digitos."
            },

            delito:{
                required: "Ingresa el delito",
                maxlength: "No puedes ingresar más de 30 digitos."
            },

            poligono:{
                required: "Ingresa el poligono",
                maxlength: "No puedes ingresar más de 50 digitos."
            },

            Estado_procesal:{
                required: "Selecciona un estado procesal."
            },

            observaciones:{
                required: "Ingresa un comentario."
            },
        },
    });

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Enviar la información del formulario
    $('#formPenalSiniestros').submit(function(e){
        e.preventDefault();

        // Obtenemos los datos del formulario
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            error: function (data){
                toastr.error('Error al procesar la solicitud.');
            },
            success: function(data)
            {
                if($.isEmptyObject(data.success)){
                    muestraErrores(data.error);
                }else{
                    toastr.success(data.success,'Correcto');
                    $("#formPenalSiniestros")[0].reset();
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
