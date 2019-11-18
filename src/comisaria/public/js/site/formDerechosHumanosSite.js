$(document).ready(function(){
    /*************************************************
     * Configuraciones
     * **********************************************/

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Configuración para datapicker
    $('#fecha_recepcion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

    /*************************************************
     * FIN Configuraciones
     * **********************************************/

    // Obtenemos los estados procesales
    obtenerEstadosprocesales();

    // Obtenemos los abogados
    obtenerAbogados();

    // Al cancelar el formulario
    $('#btnCancelar').click(function (e){
        e.preventDefault()

        // reditigimos a la pagina principal
        location.href = '/derechos-humanos';
    });

    // Guardamos el formulario
    $("#formGuardar").submit(function(e) {
        e.preventDefault();
    }).validate({
        debug: false,
        rules: {
            queja: {
                required: true,
                minlength: 5
            },
            fecha_recepcion: {
                required: true,
            },
            abogados: {
                required: true,
            },
            estado_procesal: {
                required: true,
            },
            asunto: {
                required: true,
                minlength: 5
            },
            derecho_violado: {
                required: true,
                minlength: 5
            },
        },
        messages: {
            queja: {
                required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            fecha_recepcion: {
                required: "Campo requerido.",
                digits: "Ingrese solo números."
            },
            abogados: {
                required: "Campo requerido.",
            },
            estado_procesal: {
                required: "Campo requerido.",
                min: jQuery.validator.format("Precio minimo de {0} peso.")  
            },
            asunto: {
                required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            derecho_violado: {
                required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            image: {
                required: "Campo requerido.",
            }
        },
        errorClass: "text-danger",
        // validClass: "bg-success",
        invalidHandler: function (){
            toastr.error('Válide la información en el formulario.');
        },
        submitHandler : function(){
            // Obtenemos los datos del formulario
            var form = $("#formGuardar");
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
                        form[0].reset();

                        toastr.success(data.success);

                        // reditigimos a la pagina principal
                        location.href = '/derechos-humanos';
                    }
                }
            }); //Fin llamada ajax
        }
    }); //Fin del submit
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
            elem.append($('<option/>'));

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
            var elem = $('#abogados');
            elem.append($('<option/>'));

            $.each(data, function (kay, val){
                elem.append($('<option/>', { 'value': val.user, 'text': val.nombreCompleto }));
            });
        }
    });
};
