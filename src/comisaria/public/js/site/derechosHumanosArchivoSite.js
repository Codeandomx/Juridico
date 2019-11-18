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

    //Configuración del datatables
    $('#tabla').DataTable( {
        serverSide: true,
        scrollX: true,
        lengthChange: false,
        ajax: 'api/DerechosHumanoArchivo',
        columns: [
            {data: 'id'},
            {data: 'queja'},
            {data: 'fecha_recepcion'},
            {data: 'empleado'},
            {data: 'estado'},
            {data: 'asunto',
                render: function(data, type, row){
                    return data.substr(0, data.langth > 100 ? 100 : data.length);
                }
            },
            {data: 'derecho_violado',
                render: function(data, type, row){
                    return data.substr(0, data.langth > 100 ? 100 : data.length);
                }
            },
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
        ],
        initComplete: function () {
            // Cambiamos el nombre
            $('.delete').text('Activar');
            $('.delete').removeClass('btn-outline-danger');
            $('.delete').addClass('btn-outline-primary');
        }
    });

    //Mostrar un registro
    $('body').on('click', '.edit', function () {
        var _id = $(this).data('id');
        
        location.href = '/derechos-humanos-editar/'+_id;
    });

    //Eliminar un registro
    $('body').on('click', '.delete', function(e){
        e.preventDefault();

        var _id = $(this).data("id");

        swal({
            title: "¿Estas seguro?",
            text: "El registro sera activado.",
            icon: "warning",
            buttons: true,
            dangerMode: false,
            closeModal: false
        })
        .then((willDelete) => {
            if (willDelete){
                $.ajax({
                    type: 'delete',
                    url: 'derechos-humanos-del/'+_id,
                    success: function(data){
                        swal("OK!", "El registro esta activo nuevamente.", "success");
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
