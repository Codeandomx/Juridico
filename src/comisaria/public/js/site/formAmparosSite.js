$(document).ready(function(){
    obtenerAbogados();

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#fecha_recepcion').datepicker({
  		autoclose: true,
  		todayHighlight: true
  	});
    $('#fecha_ejecutoria').datepicker({
      autoclose: true,
      todayHighlight: true
    });
    $('#requerimientos1').datepicker({
      autoclose: true,
      todayHighlight: true
    });
    $('#requerimientos2').datepicker({
      autoclose: true,
      todayHighlight: true
    });
    $('#start').datepicker({
      autoclose: true,
      todayHighlight: true
    });
    $('#end').datepicker({
      autoclose: true,
      todayHighlight: true
    });

  // Al cancelar el formulario
  $('#btnCancelar').click(function (e){
      e.preventDefault()

      // reditigimos a la pagina principal
      location.href = '/amparos';
  });

  // Guardamos el formulario
    $("#formGuardar").submit(function(e) {
        e.preventDefault();
    }).validate({
        debug: false,
        rules: {
            fecha_recepcion: {
                required: true,
            },
            abogado: {
                required: true,
            },
            quejoso: {
              required: true,
              minlength: 5
            },
            juzgado_expediente: {
              required: true,
              minlength: 5
            },
            acto_reclamo: {
              required: true,
              minlength: 5
            },
            suspension: {
                required: true,
            },
            recurso_diverso: {
                required: true,
                minlength: 5
            },
            activo_pasivo: {
                required: true,
            },
            sentencia: {
                required: true,
            },
            fecha_ejecutoria: {
                required: true,
            },
            recurso_revision: {
                required: true,
                minlength: 5
            },
            requerimientos: {
                required: true,
                minlength: 1
            },
            semaforo: {
                required: true,
            },
            indice_ejecucion: {
                required: true,
            },
            status: {
                required: true,
            },
            estado_procesal_actual: {
                required: true,
            },
        },
        messages: {
            fecha_recepcion: {
                required: "Campo requerido.",
            },
            abogado: {
                required: "Campo requerido.",
            },
            quejoso: {
              required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            juzgado_expediente: {
              required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            acto_reclamo: {
              required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            suspension: {
              required: "Campo requerido.",
            },
            recurso_diverso: {
                required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            activo_pasivo: {
              required: "Campo requerido.",
            },
            sentencia: {
              required: "Campo requerido.",
            },
            fecha_ejecutoria: {
              required: "Campo requerido.",
            },
            recurso_revision: {
                required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            requerimientos: {
                required: "Campo requerido.",
                minlength: jQuery.validator.format("Tamaño minimo {0} caracteres.")
            },
            semaforo: {
              required: "Campo requerido.",
            },
            indice_ejecucion: {
              required: "Campo requerido.",
            },
            status: {
              required: "Campo requerido.",
            },
            estado_procesal_actual: {
              required: "Campo requerido.",
            },
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
                        // form[0].reset();

                        toastr.success(data.success);

                        // reditigimos a la pagina principal
                        location.href = '/amparos';
                    }
                }
            }); //Fin llamada ajax
        }
    }); //Fin del submit
});

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
            elem.append($('<option/>'));

            $.each(data, function (kay, val){
                elem.append($('<option/>', { 'value': val.user, 'text': val.nombreCompleto }));
            });
        }
    });
};