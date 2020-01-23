$(document).ready(function() {

obtenerEstadosContratos();

    $('.fecha').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
    });

    $('#btnNuevo').click(function (e) {
        e.preventDefault();

        location.href = '/contratos-convenios-form';
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
    $('#tablaCC').DataTable({
        dom: 'Bfrtip',
        language: espanol,
        serverSide: true,
        scrollX: true,
        ajax: 'api/ContratosyConvenios',
        columns: [
            {data: 'id', 'visible': false},
            {data: 'ObjetoContrato'},
            {data: 'Contratante'},
            {data: 'Vigencia'},
            {data: 'FundamentoLegal'},
            {data: 'Recurso'},
            {data: 'ContraPrestacion'},
            {data: 'Decreto'},
            {data: 'FechaElaboracion'},
            {data: 'Tipo',
                render: function(data, type, row){
                    if(data==1){
                        return 'Contrato';
                    }else if(data==2){
                        return 'Acuerdo';
                    }else if(data==3){
                        return 'Convenio';
                    }else if(data==4){
                        return 'Convenio elaborado';
                    }else{
                        return 'Otro'
                    }
                }
            },
            {data: 'Observacion'},
        {data:'btn'},
        ],
        buttons: [
        {
            extend: 'copyHtml5',
            text: 'Copiar',
        },
        {
            extend: 'excelHtml5',
            title: 'Reporte de Contratos y convenios',
            exportOptions:{
                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            }
        },
        {
                extend: 'pdfHtml5',
                title: 'Reporte de Contratos y convenios',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                }
        },
        'colvis'
        ]
    });

    //Información para obtener un registro
    $('body').on('click', '.edit', function () {
        var _id = $(this).data('id');
        $('#saveBtn').html('Guardar');
        var url = 'contratos-convenio-edit/'+_id;
        if ($('#tiposContrato').val()){
            obtenerEstadosContratos();
        }

        $.get(url, function (data) {
            $('#modelHeading').html("Editar registro");
            $('#saveBtn').val("Actualizar");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#ObjetoContrato').val(data.ObjetoContrato);
            $('#Contratante').val(data.Contratante);
            $('#Vigencia').val(data.Vigencia.substr(0,10));
            $('#FundamentoLegal').val(data.FundamentoLegal);
            $('#Recurso').val(data.Recurso);
            $('#ContraPrestacion').val(data.ContraPrestacion);
            $('#Decreto').val(data.Decreto);
            $('#encargado').val(data.Encargado);
            $('#FechaElaboracion').val(data.FechaElaboracion.substr(0,10));
            $('#Tipo').val(data.Tipo);
            $('#Observacion').val(data.Observacion);
        })
    });

     //Guardar o actualizar
     $('#saveBtn').click(function (e) {
        e.preventDefault();

        $(this).html('Enviando...');
        let formu = $('#formContratos');
        console.log(formu.serialize());
        $.ajax({
          data: formu.serialize(),
          url: formu.attr('action'),
          type: "POST",
          dataType: 'json',
          success: function (data) {
            if (data.success) {
              formu[0].reset();
              $('#ajaxModel').modal('hide');
              $('#tablaCC').DataTable().ajax.reload();
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
        console.log("Data a eliminar: " + _id);
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
                    url: 'contratos-convenio-del/'+_id,
                    success: function(data){
                        swal("OK!", "El registro fue eliminado.", "success");
                        $('#tablaCC').DataTable().ajax.reload();
                    },
                    error: function(data){
                        swal("Ocurrio un error", "Contacta a sistemas", "error");
                    }
                });
            }
        });

    });

}); //Fin del document ready!!!

var obtenerEstadosContratos = function (){
    $.ajax({
        url: "/obtenerTipos",
        method: "GET",
        data: { },
        dataType: "json",
        cache: false,
        error: function (){
            console.error('Error al procesar la solicitud');
        },
        success: function (data){
            var elem = $('#Tipo'); //Id del select del modal

            $.each(data, function (kay, val){
                elem.append($('<option/>', { 'value': val.Id, 'text': val.Tipo }));
            });
        }
    });
};
