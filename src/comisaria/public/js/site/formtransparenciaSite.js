$(document).ready(function(){

    obtenerObservaciones();

    $('#Fecha').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
    });

    $('#Recepcion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
    });

    // Al cancelar el formulario
    $('#btnCancelar').click(function (e){
        e.preventDefault()

        // reditigimos a la pagina principal
        location.href = '/transparencia';
    });

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Enviar la información del formulario
    $('#formTransparencia').submit(function(e){
        e.preventDefault();

        // Obtenemos los datos del formulario
        var form = $(this);
        var url = form.attr('action');

        console.log(form.serialize());
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            error: function (data){
                toastr.error('Ocurrieron errores');
            },
            success: function(data)
            {
                if($.isEmptyObject(data.success)){
                    muestraErrores(data.error);
                }else{
                    toastr.success(data.success,'Correcto');
                    $("#formTransparencia")[0].reset();
                }
            }
        }); //Fin llamada ajax
    }); //Fin del sumit

    var muestraErrores = function(msg){
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

});

    // Obtiene las observaciones
    var  obtenerObservaciones = function (){
        $.ajax({
            url: "/obtenerobservaciones",
            method: "GET",
            data: { },
            dataType: "json",
            cache: false,
            error: function (){
                console.error('Error al procesar la solicitud');
            },
            success: function (data){
                var elem = $('#idObservacion');

                $.each(data, function (kay, val){
                    elem.append($('<option/>', { 'value': val.id, 'text': val.nombre }));
                });
            }
        });
    };
