$(document).ready(function() {

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
        }
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

    $('#btnNuevo').click(function (e) {
        e.preventDefault();

        location.href = '/armas-form';
    });

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Configuración español
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

    //Llenado del datatable
    $('#tablaArmas').DataTable({
        dom: 'Bfrtip',
        language: espanol,
        serverSide: true,
        scrollX: true,
        ajax: 'api/Armeria',
        columns: [
            {data: 'id', 'visible': false},
            {data: 'numero_servicio'},
            {data: 'abogado_integrado'},
            {data: 'estado',
                render: function(data, type, row){
                    if(data==1){
                        return 'Activo';
                    }else if(data==2){
                        return 'Concluido';
                    }else if(data==3){
                        return 'Suspendido';
                    }
                }
            },
            {data: 'numero_expediente'},
            {data: 'poligono'},
            {data: 'solicitante'},
            {data: 'encargado'},
            {data: 'fecha_registro'},
            {data: 'motivo_investigacion'},
            {data: 'ofendido'},
            {data: 'fecha_resolucion'},
            {data: 'sentido_resolucion'},
            {data: 'estado_procesal',
                render: function(data, type, row){
                    if(data==1){
                        return 'Investigación';
                    }else if(data==2){
                        return 'Integración';
                    }else if(data==3){
                        return 'Periodo aprobatorio';
                    }else{
                        return 'Informe de ley';
                    }
                }
            },
        {data:'btn'},
        ],
        buttons: [
        {
            extend: 'copyHtml5',
            text: 'Copiar',
        },
        {
            extend: 'excelHtml5',
            title: 'Reporte de armas',
            exportOptions:{
                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
            }
        },
        {
                extend: 'pdfHtml5',
                title: 'Reporte de armas',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                }
        },
        'colvis'
        ]
    });

    //Actualizar un registro
    $('body').on('click', '.edit', function () {
        var _id = $(this).data('id');
        $('#saveBtn').html('Guardar');
        var url = 'armas-edit/'+_id;
        if (!$('#estado_procesal').val()){
            obtenerEstadosprocesales();
        }

        if(!$('#estado').val()){
            obtenerEstados();
        }
        $.get(url, function (data) {
            $('#modelHeading').html("Editar registro");
            $('#saveBtn').val("Actualizar");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#numero_servicio').val(data.numero_servicio);
            $('#abogado_integrado').val(data.abogado_integrado);
            $('#estado').val(data.estado);
            $('#numero_expediente').val(data.numero_expediente);
            $('#poligono').val(data.poligono);
            $('#solicitante').val(data.solicitante);
            $('#poligono').val(data.poligono);
            $('#encargado').val(data.encargado);
            $('#fecha_registro').val(data.fecha_registro.substr(0,10));
            $('#motivo_investigacion').val(data.motivo_investigacion);
            $('#ofendido').val(data.ofendido);
            $('#fecha_resolucion').val(data.fecha_resolucion.substr(0,10));
            $('#sentido_resolucion').val(data.sentido_resolucion);
            $('#estado_procesal').val(data.estado_procesal);
        })
    });

     //Guaradar o actualizar
     $('#saveBtn').click(function (e) {
        e.preventDefault();

        $(this).html('Enviando...');
        let formu = $('#formArmas');
        $.ajax({
          data: formu.serialize(),
          url: formu.attr('action'),
          type: "POST",
          dataType: 'json',
          success: function (data) {
            if (data.success) {
              formu[0].reset();
              $('#ajaxModel').modal('hide');
              $('#tablaArmas').DataTable().ajax.reload();
              swal({
                title: "OK!",
                text: "Tarea completada.",
                icon: "success",
                timer: 2000
            });
            }else{
                printErrorMsg(data.error);
                $('#ajaxModel').modal('hide');
                swal({
                    title: "Error!",
                    text: "No se completo la tarea.",
                    icon: "error",
                    timer: 2000
                });
                $('#erroresBox').fadeOut(12000);
            }
          },
          error: function (data) {
            swal({
                title: "Error!",
                text: "El registro no fue actualizado " + data.error,
                icon: "error",
                timer: 2000
            });
              $('#saveBtn').html('Guardar');
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

    //Eliminación del registro
    $('body').on('click', '.delete', function(e){
        e.preventDefault();

        var _id = $(this).data("id");

        swal({
            title: "¿Estas seguro?",
            text: "El registro sera deactivado.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeModal: false
        })
        .then((willDelete) => {
            if (willDelete){
                $.ajax({
                    type: 'delete',
                    url: 'armas-del/'+_id,
                    success: function(data){
                        swal("OK!", "El registro fue eliminado.", "success");
                        $('#tablaArmas').DataTable().ajax.reload();
                    },
                    error: function(data){
                        swal("Ocurrio un error", "Contacta a sistemas", "error");
                    }
                });
            }
        });

    });

}); //Fin del document ready!!!

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
