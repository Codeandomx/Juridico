$(document).ready(function() {
    /*************************************************
     * Configuraciones
     * **********************************************/

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

    /*************************************************
     * FIN Configuraciones
     * **********************************************/

    $('#btnNuevo').click(function (e) {
        e.preventDefault();

        location.href = '/derechos-humanos-form';
    });

    //Configuración del datatables
    $('#tabla').DataTable( {
        serverSide: true,
        scrollX: true,
        lengthChange: false,
        ajax: 'api/DerechosHumano',
        columns: [
            {data: 'id'},
            {data: 'queja'},
            {data: 'fecha_recepcion'},
            {data: 'empleado'},
            {data: 'estado'},
            {data: 'asunto'},
            {data: 'derecho_violado'},
            {data:'btn', orderable: false, searchable: false},
        ],
        dom: 'Bfrtip',
        language: espanol,
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copiar',
            },
            {
                extend: 'excelHtml5',
                title: 'Exportar EXCEL',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Exportar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6 ]
                }
            },
            'colvis'
        ]
    });

    //Mostrar un registro
    $('body').on('click', '.edit', function () {
        var _id = $(this).data('id');
        $('#saveBtn').html('Guardar');
        var url = 'derechos-humanos-edit/'+_id;
        if (!$('#estado_procesal').val()){
            obtenerEstadosprocesales();
        }
        $.get(url, function (data) {
            $('#modelHeading').html("Editar registro");
            $('#saveBtn').val("Actualizar");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#queja').val(data.queja);
            $('#asunto').val(data.asunto);
            $('#fecha_recepcion').val(data.fecha_recepcion);
            $('#abogados').val(data.abogados);
            $('#derecho_violado').val(data.derecho_violado);
            $('#estado_procesal').val(data.estado_procesal);
        })
    });

    //Guardar o actualizar
    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $(this).html('Enviando...');

        var form = $('#productForm');

        $.ajax({
            data: form.serialize(),
            url: form.attr('action'),
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $("#productForm")[0].reset();
                $('#ajaxModel').modal('hide');
                $('#tabla').DataTable().ajax.reload();
                swal("OK!", data.success, "success");
            },
            error: function (data) {
            swal("Error!", "El registro no fue actualizado:" + data.error, "error");
                $('#saveBtn').html('Save Changes');
            }
        });
    });

    //Eliminar un registro
    $('body').on('click', '.delete', function(e){
        e.preventDefault();

        var _id = $(this).data("id");

        swal({
            title: "¿Estas seguro?",
            text: "El registro sera archivado.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeModal: false
        })
        .then((willDelete) => {
            if (willDelete){
                $.ajax({
                    type: 'delete',
                    url: 'derechos-humanos-del/'+_id,
                    success: function(data){
                        swal("OK!", "El registro fue archivado.", "success");
                        $('#tabla').DataTable().ajax.reload();
                    },
                    error: function(data){
                        swal("Ocurrio un error", "Contacta a sistemas", "error");
                    }
                });
            }
        });
    });
}); //Fin del onReady
