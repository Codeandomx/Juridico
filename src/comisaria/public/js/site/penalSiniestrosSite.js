$(document).ready(function() {

    $('#fecha_asignacion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
    });

    $('#btnNuevo').click(function (e) {
        e.preventDefault();

        location.href = '/penal-siniestros-form';
    });

    $("#servidor_publico").select2({
        tags: true
    });

    $("#denunciante").select2({
        tags: true
    });

    $("#delito").select2({
        tags: true
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
        lengthChange: false,
        ajax: 'api/penal&siniestros',
        columns: [
            {data: 'id'},
            {data: 'numero_consecutivo'},
            {data: 'carpeta_investigacion'},
            {data: 'fecha_asignacion'},
            {data: 'agencia_mp'},
            {data: 'servidor_publico'},
            {data: 'denunciante'},
            {data: 'delito'},
            {data: 'poligono'},
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
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Exportar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                }
            },
            'colvis'
        ]
    });

    //mostrar un registro
    $('body').on('click', '.edit', function () {
        var _id = $(this).data('id');
        $('#saveBtn').html('Guardar');
        var url = 'penal-siniestros-edit/'+_id;
        if (!$('#estado_procesal').val()){
            obtenerEstadosprocesales();
        }
        $.get(url, function (data) {

            fillSelects(data);
            $('#modelHeading').html("Editar registro");
            $('#saveBtn').val("Actualizar");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#numero_consecutivo').val(data.numero_consecutivo);
            $('#carpeta_investigacion').val(data.carpeta_investigacion);
            $('#agencia_mp').val(data.agencia_mp);
            $('#fecha_asignacion').val(data.fecha_asignacion);
            $('#poligono').val(data.poligono);
            $('#estado_procesal').val(data.estado_procesal);
            $('#observaciones').val(data.observaciones);
            console.log(data);
        })
     });

     //Guaradar o actualizar
     $('#saveBtn').click(function (e) {
        e.preventDefault();

        $(this).html('Enviando...');

        $.ajax({
          data: $('#productForm').serialize(),
          url: $('#productForm').attr('action'),
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $("#productForm")[0].reset();
              $('#ajaxModel').modal('hide');
              $('#tabla').DataTable().ajax.reload();
              swal("OK!", "El registro fue actualizado.", "success");
          },
          error: function (data) {
            swal("Error!", "El registro no fue actualizado.", "error");
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    //Cargar selects
    function fillSelects(data){
        forSelector(data.servidor_publico,"servidor_publico");
        forSelector(data.denunciante,"denunciante");
        forSelector(data.delito,"delito");
    }

    //recargar selects por for
    function forSelector(array,id){
        var sel = document.getElementById(id);
        var arrai = array.split(',');

        for(var i = 0; i < arrai.length; i++) {
            var opt = arrai[i];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            el.setAttribute("selected","selected");
            sel.append(el);
            }
    }

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
                    url: 'penal-siniestros-del/'+_id,
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

});//Fin del document ready!!!

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