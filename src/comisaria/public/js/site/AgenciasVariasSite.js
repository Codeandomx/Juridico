$(document).ready(function() {

obtenerEstadosprocesales();

    $('.fecha').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

    //Evento al cambiar el radio button
    $('input[type=radio][name=radios]').change(function() {
        let cadena = this.value;
        if (cadena == "civil") {
            $('#cajaPolicia').css('display', 'none');
            $('#policia').val('');
            $('#cajaCivil').css('display', 'block');
        }else if (cadena == "policia") {
            $('#cajaCivil').css('display', 'none');
            $('#civil').val('');
            $('#cajaPolicia').css('display', 'block');
        }
    });

    $('#btnNuevo').click(function (e) {
        e.preventDefault();

        location.href = '/AgenciasVariasForm';
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
    $('#tablaAV').DataTable({
        dom: 'Bfrtip',
        language: espanol,
        serverSide: true,
        scrollX: true,
        ajax: 'api/AgenciasVarias',
        columns: [
            {data: 'id', 'visible': false},
            {data: 'carpetaAdministrativa'},
            {data: 'carpetaInvestigacion'},
            {data: 'averiguacionPrevia'},
            {data: 'expediente'},
            {data: 'fechaAsignacion'},
            {data: 'civil'},
            {data: 'policia'},
            {data: 'observaciones'},
            {data:'btn', orderable: false, searchable: false},  
        ],
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copiar',
            },
            {
                extend: 'excelHtml5',
                title: 'Exportar EXCEL',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Exportar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            },
            'colvis'
        ] 
    });

    //Información para obtener un registro
    $('body').on('click', '.edit', function () {
        let _id = $(this).data('id');
        let _type = "/agenciasVarias";
        $('#saveBtn').html('Guardar');
        var url = 'penal-siniestros-edit/'+_id+_type;
        $.get(url, function (data) {
            console.log(data);
            if (data.pocilia != null) {
                $('#cajaPolicia').css('display', 'block');
                $('#policia').val(data.policia);
            }else{
                $('#civil').val(data.civil);
                $('#cajaCivil').css('display', 'block');
            }
            $('#modelHeading').html("Editar registro");
            $('#saveBtn').val("Actualizar");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#expediente').val(data.expediente);
            $('#carpetaAdministrativa').val(data.carpetaAdministrativa);
            $('#carpetaInvestigacion').val(data.carpetaInvestigacion);
            $('#averiguacionPrevia').val(data.averiguacionPrevia);
            $('#fechaAsignacion').val(data.fechaAsignacion.substr(0,10));
            $('#radio1').val(data.civil);
            $('#radio2').val(data.policia);
            $('#observaciones').val(data.observaciones);
        })
     });

     //Guardar o actualizar
     $('#saveBtn').click(function (e) {
        e.preventDefault();
        var formu = $('#PSFormAV'); 

        //Agregamos un campo extra al form
        let data = formu.serializeArray();
        data.push({name: "tipo", value: "agenciasVarias"});

        $.ajax({
          data: $.param(data),
          url: formu.attr('action'),
          type: "POST",
          dataType: 'json',
          success: function (data) {
            console.log(data.success);
            if (data.success) {
              formu[0].reset();
              $('#ajaxModel').modal('hide');
              $('#tablaAV').DataTable().ajax.reload();
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
    $('#tablaAV').on('click', '.delete', function(e){
        e.preventDefault();

        var _id = $(this).data("id");
        var _type = "/agenciasVarias";
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
                    url: 'penal-siniestros-del/'+_id+_type,
                    success: function(result){
                        swal("OK!", "El registro fue archivado.", "success");
                        $('#tablaV').DataTable().ajax.reload();
                    },
                    error: function(data){
                        swal("Ocurrio un error", "Contacta a sistemas", "error");
                    }
                });
            }
        });
    });

}); //Fin del document ready!!!

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
