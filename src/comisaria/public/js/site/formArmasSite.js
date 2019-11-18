$(document).ready(function(){

    obtenerEstadosprocesales();

    obtenerEstados();

    $('#formArmas').validate({
        rules:{
            numero_servicio:{
                required: true,
                maxlength: 15
            },
            abogado_integrado:{
                required: true
            },
            estado:{
                required: true
            },
            numero_expediente:{
                required: true
            },
            poligono:{
                required: true
            },
            solicitante:{
                required: true
            },
            encargado:{
                required: true
            },
            fecha_registro:{
                required: true
            },
            motivo_investigacion:{
                required: true
            },
            ofendido:{
                required: true
            },
            fecha_resolucion:{
                required: true
            },
            sentido_resolucion:{
                required: true
            },
            estado_procesal:{
                required: true
            },
        },
        messages:{
            numero_servicio:{
                required: "",
                maxlength: ""
            },
            abogado_integrado:{
                required: ""
            },
            estado:{
                required: ""
            },
            numero_expediente:{
                required: ""
            },
            poligono:{
                required: ""
            },
            solicitante:{
                required: ""
            },
            encargado:{
                required: ""
            },
            fecha_registro:{
                required: ""
            },
            motivo_investigacion:{
                required: ""
            },
            ofendido:{
                required: ""
            },
            fecha_resolucion:{
                required: ""
            },
            sentido_resolucion:{
                required: ""
            },
            estado_procesal:{
                required: ""
            },
        },
    });

    $('#fecha_registro').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

    $('#fecha_resolucion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
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

        var form = $(this);
        $.ajax({
            type: 'POST',
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
