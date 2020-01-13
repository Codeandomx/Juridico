var table;

$(document).ready(function() {
    /*************************************************
     * Configuraciones
     * **********************************************/

    // Configuración para datapicker
    $('#fecha_inicio').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

    // Configuración para datapicker
    $('#fecha_fin').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
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

    /*************************************************
     * FIN Configuraciones
     * **********************************************/

    //Configuración del datatables
    table = $('#tabla').DataTable( {
        // serverSide: true,
        scrollX: true,
        data: [],
        columns: [
            {data: 'id', 'visible': false},
            {data: 'solicitante'},
            {data: 'tipo',
                render: function(data, type, row){
                    if(data==1){
                        return 'AMPAROS';
                    }else if(data==2){
                        return 'ARMAS';
                    }else if(data==3){
                        return 'DERECHOS HUMANOS';
                    }else if(data==4){
                        return 'TRANSPARENCIA';
                    }
                }
            },
            {data: 'fecha'},
            {data:'btn'},
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
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Exportar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            'colvis'
        ]
    });

    // Guardamos el formulario
    $("#formBuscar").submit(function(e) {
        e.preventDefault();
    }).validate({
        debug: false,
        rules: {
            fecha_inicio: {
                required: true,
            },
            fecha_fin: {
                required: true,
            },
            nombre: {
                required: true,
            },
        },
        messages: {
            fecha_inicio: {
                required: "Campo requerido.",
                digits: "Ingrese solo números."
            },
            fecha_fin: {
                required: "Campo requerido.",
                digits: "Ingrese solo números."
            },
            nombre: {
                required: "Campo requerido.",
                digits: "Ingrese solo números."
            },
        },
        errorClass: "text-danger",
        // validClass: "bg-success",
        invalidHandler: function (){
            toastr.error('Válide la información en el formulario.');
        },
        submitHandler : function(){
            // Obtenemos los datos del formulario
            var form = $("#formBuscar");
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
                    table.clear().draw();
                    table.rows.add(data.data).draw();
                    $('.delete').hide();
                    $('.edit').text('VER');
                    $('.edit').removeClass('btn-outline-danger');
                    $('.edit').addClass('btn-outline-primary');
                }
            }); //Fin llamada ajax
        }
    }); //Fin del submit

    //Eliminar un registro
    $('body').on('click', '.edit', function(e){
        e.preventDefault();

        var _id = $(this).data("id");
        var res = _id.split('-');

        console.log(res[1]);

        if(res[1] == 1){
            location.href = '/amparos-view/'+res[0];
        } else if(res[1] == 2){
            location.href = '/armas-view/'+res[0];
        } else if(res[1] == 3){
            location.href = '/derechos-humanos-view/'+res[0];
        } else if(res[1] == 4){
            location.href = '/transparencia-view/'+res[0];
        }
    });
}); //Fin del onReady
