$(document).ready(function(){

    obtenerEstadosprocesales();

    obtenerEstados();

    $('#fecha_registro').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
    });

    $('#fecha_resolucion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
    });

    // Al cancelar el formulario
    $('#btnCancelar').click(function (e){
        e.preventDefault()

        // reditigimos a la pagina principal
        location.href = '/armas';
    });

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Enviar la información del formulario
    $('#formArmas').submit(function(e){
        e.preventDefault();

        // Obtenemos los datos del formulario
        var form = $(this);
        var url = form.attr('action');
        console.log(url);
        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            error: function (data){
                toastr.error('Ocurrieron errores');
            },
            success: function(data)
            {
                if($.isEmptyObject(data.success)){
                    muestraErrores(data.success);
                }else{
                    toastr.success(data.success,'Correcto');
                    $("#formArmas")[0].reset();
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

//Obtiene estado del registro
var obtenerEstados = function(){
    $.ajax({
        url: "obtenerestados",
        method: "GET",
        data: { },
        dataType: "json",
        cache: false,
        error: function (){
            console.error('Error al procesar la solicitud');
        },
        success: function (data){
            var elem = $('#estado');
            $.each(data, function (kay, val){
                elem.append($('<option/>', { 'value': val.id, 'text': val.estado }));
            });
        }
    });
};
