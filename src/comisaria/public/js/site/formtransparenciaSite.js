$(document).ready(function(){

    obtenerObservaciones();

    $('input, :input').attr('autocomplete', 'off');

    $('#transparenciaForm').validate({
        rules:{
            Folio:{
                required: true,
            },
            Expediente:{
                required: true,
            },
            Solicitante:{
                required: true,
            },
            Recepcion:{
                required: true,
            },
            Informacion:{
                required: true,
            },
            Derivado:{
                required: true,
            },
            Canalizacion:{
                required: true,
            },
            Respuesta:{
                required: true,
            },
            Envio_UT:{
                required: true,
            },
            Fecha:{
                required: true,
            },
            idObservacion:{
                required: true,
            },
        }
    });

    $('#Fecha').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

    $('#Recepcion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
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
    $('#transparenciaForm').submit(function(e){
        e.preventDefault();

        var form = $(this);
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            error: function (data){
                 swal({
                    title: "Error!",
                    text: "El registro no fue actualizado " + data.error,
                    icon: "error",
                    timer: 2000
                });               
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
});

//Mostrar los errores
var muestraErrores = function(msg){
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}

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
