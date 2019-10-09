$(document).ready(function(){
    // Obtenemos los estados procesales
    obtenerEstadosprocesales();
    // Obtenemos los abogados
    obtenerAbogados();

    // Configuración para datapicker
    $('#fecha_recepcion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
    });
    
    // Al cancelar el formulario
    $('#btnCancelar').click(function (e){
        e.preventDefault()

        // reditigimos a la pagina principal
        location.href = '/recursos-humanos';
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
            data: form.serialize(), // serializes the form's elements.
            error: function (){
                console.error('Error al procesar el formulario');
            },
            success: function(data)
            {
                console.log(data);
                toastr.success('Su registro fue exitoso.');

                // reditigimos a la pagina principal
                location.href = '/recursos-humanos';
            }
        });
    });
}); 

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