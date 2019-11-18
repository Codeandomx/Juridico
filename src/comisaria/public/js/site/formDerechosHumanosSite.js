$(document).ready(function(){
    // Obtenemos los estados procesales
    obtenerEstadosprocesales();

    // Obtenemos los abogados
    //obtenerAbogados();

    $('label').addClass("control-label");

    // Configuración para datapicker
    $('#fecha_recepcion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

    // Al cancelar el formulario
    $('#btnCancelar').click(function (e){
        e.preventDefault()

        // reditigimos a la pagina principal
        location.href = '/derechos-humanos';
    });

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Guardamos el formulario
    $("#formGuardar").submit(function(e) {
        e.preventDefault();

        // Obtenemos los datos del formulario
        var form = $(this);
        var url = form.attr('action');

        // enviamos el formulario
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
                    $(this)[0].reset();
                    //$('#abogados').val(null).trigger('change');
                }
            }
        }); //Fin llamada ajax
    }); //Fin del submit
});

var muestraErrores = function(msg){
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
    $('#lista-errores').append('<li>'+"Ha ocurrido un error en el servidor, revise el formulario."+'</li>');
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

// Obtiene los Abogados
var obtenerAbogados = function (){
    $.ajax({
        url: "/obtenerabogados",
        method: "GET",
        data: { },
        dataType: "json",
        cache: false,
        error: function (){
            console.error('Error al procesar la solicitud');
        },
        success: function (data){
            var elem = $('#abogado');

            $.each(data, function (kay, val){
                elem.append($('<option/>', { 'value': val.user, 'text': val.nombreCompleto }));
            });
        }
    });
};
