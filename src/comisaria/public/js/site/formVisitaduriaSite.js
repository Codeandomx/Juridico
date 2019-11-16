$(document).ready(function() {

	$('#fecha_asignacion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
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
        location.href = '/penal-siniestros';
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

        // Obtenemos los datos del formulario
        var form = $(this);
        var url = form.attr('action');
        console.log(url);

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
                    $('#servidor_publico').val(null).trigger('change');
                    $('#denunciante').val(null).trigger('change');
                    $('#delito').val(null).trigger('change');
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

