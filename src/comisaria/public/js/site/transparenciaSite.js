$(document).ready(function() {

    $('#fecha').datepicker({
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

    $('#btnNuevo').click(function (e) {
        e.preventDefault();

        location.href = '/transparencia-form';
    });

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var espanol = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
        }
    };

    $('#tabla').DataTable( {
        serverSide: true,
        scrollX: true,
        ajax: 'api/transparencia',
        columns: [
            {data: 'id', 'visible': false},
            {data: 'Folio'},
            {data: 'Expediente'},
            {data: 'Solicitante'},
            {data: 'Recepcion'},
            {data: 'Informacion'},
            {data: 'Derivado'},
            {data: 'Canalizacion'},
            {data: 'Respuesta'},
            {data: 'Envio_UT'},
            {data: 'Fecha'},
            {data: 'idObservacion',
                render: function(data, type, row){
                    if(data==1){
                        return 'Incompetencia';
                    }else if(data==2){
                        return 'Reserva';
                    }else if(data==3){
                        return 'Confidencial';
                    }
                }
            },
            {data:'btn', orderable: false, searchable: false},
        ],
        dom: 'Bfrtip',
        language: espanol,
        buttons: [
        {
            extend: 'copyHtml5',
            text: 'Copiar'
        },
        {
            extend: 'excelHtml5',
            title: 'Exportar EXCEL',
            exportOptions: {
                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
            }
        },
        {
            extend: 'pdfHtml5',
            title: 'Exportar PDF',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            exportOptions: {
                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
            }
        },
            'colvis'
        ]
    });

    //Actualizar un registro
    $('body').on('click', '.edit', function () {
        console.log($(this).data('id'));
        var _id = $(this).data('id');
        $('#saveBtn').html('Guardar');
        var url = 'transparencia-edit/'+_id;
        
        if (!$('#idObservacion').val()){
            obtenerObservaciones();
        }
        $.get(url, function (data) {
            $('#modelHeading').html("Editar registro");
            $('#saveBtn').val("Actualizar");
            $('#ajaxModel').modal('show');
            console.log(data);

            $('#id').val(data.id);
            $('#Folio').val(data.Folio);
            $('#Expediente').val(data.Expediente);
            $('#Solicitante').val(data.Solicitante);
            $('#Recepcion').val(data.Recepcion.substr(0,10));
            $('#Informacion').val(data.Informacion);
            $('#Derivado').val(data.Derivado);
            $('#Canalizacion').val(data.Canalizacion);
            $('#Respuesta').val(data.Respuesta);
            $('#Envio_UT').val(data.Envio_UT);
            $('#Fecha').val(data.Fecha.substr(0,10));
            $('#idObservacion').val(data.idObservacion);
        })
     });

     //Guaradar o actualizar
     $('#saveBtn').click(function (e) {
        e.preventDefault();

        var formu = $('#transparenciaForm');
        console.log(formu.serialize());
        $(this).html('Enviando...');
        $.ajax({
          data: formu.serialize(),
          url: formu.attr('action'),
          type: 'post',
          dataType: 'json',
          success: function (data) {
            if (data.success) {
              formu[0].reset();
              $('#ajaxModel').modal('hide');
              $('#tabla').DataTable().ajax.reload();
                swal({
                    title: "OK!", 
                    text: "Tarea completada.", 
                    icon: "success",
                    timer: 2000
                });
            }else{
                 $('#ajaxModel').modal('hide');
                swal({
                    title: "Error!",
                    text: "No se completo la tarea.",
                    icon: "error",
                    timer: 2000
                });
                printErrorMsg(data.error);
                $('#erroresBox').fadeOut(10000);               
            }
          },
          error: function (data) {
            swal({
                title: "Error!",
                text: "El registro no fue actualizado " + data.error,
                icon: "error",
                timer: 2000
            });
            $('#saveBtn').html('Save Changes');
          }
      });
    });

    //Mostrar errores
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

    //Eliminar un registro
    $('body').on('click', '.delete', function(e){
        e.preventDefault();

        var _id = $(this).data("id");

        swal({
            title: "¿Estas seguro?",
            text: "El registro sera desactivado.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeModal: false
        })
        .then((willDelete) => {
            if (willDelete){
                $.ajax({
                    type: 'delete',
                    url: 'transparencia-del/'+_id,
                    success: function(data){
                        swal("OK!", "El registro fue eliminado.", "success");
                        $('#tabla').DataTable().ajax.reload();
                    },
                    error: function(data){
                        swal("Ocurrio un error", "Contacta a sistemas", "error");
                    }
                });
            }
        });
    });

});//Fin del document ready!!!

// Obtiene los estados procesales
var obtenerObservaciones = function (){
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
