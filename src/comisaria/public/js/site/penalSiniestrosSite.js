var tableV;

$(document).ready(function() {

    // Configuración para datapicker
    $('.fecha').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es',
        dateFormat: 'yy-mm-dd'
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

    tableV = $('#tablaV').DataTable( {
        //serverSide: true,
        scrollX: true,
        lengthChange: false,
        //ajax: 'api/penal&siniestros',
        data: [],
        columns: [
            {data: 'id', 'visible': false},
            {data: 'numero_consecutivo'},
            {data: 'carpeta_investigacion'},
            {data: 'fecha_asignacion'},
            {data: 'agencia_mp'},
            {data: 'servidor_publico'},
            {data: 'denunciante'},
            {data: 'delito'},
            {data: 'poligono'},
            {data: 'observaciones'},
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

    //Proceso de busqueda
    $('#formBuscarV').submit(function (e){
        e.preventDefault();
    }).validate({
        debug: false,
        rules: {
            fecha_inicioV: {
                required: true,
            },
            fecha_finV: {
                required: true,
            },
        },
        messages: {
            fecha_inicioV: {
                required: "Campo requerido.",
                digits: "Ingrese solo números."
            },
            fecha_finV: {
                required: "Campo requerido.",
                digits: "Ingrese solo números."
            },
        },
        errorClass: "text-danger",
        invalidHandler: function (){
            swal({
                title: "Error!",
                text: "Datos erroneos",
                icon: "error",
                timer: 1500
            });
        },
        submitHandler : function(){
            // Obtenemos los datos del formulario
            var form = $("#formBuscarV");
            var url = form.attr('action');

            // enviamos el formulario
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                error: function (data){
                    swal({
                        title: "Error en la solicitud!",
                        text: "Algo salio mal: " + data,
                        icon: "error",
                        timer: 1500
                    });
                },
                success: function(data)
                {
                    tableV.clear().draw();
                    tableV.rows.add(data.data).draw();
                }
            }); //Fin llamada ajax
        }
    });//Fin del submit.

    //mostrar un registro
    $('#tablaV').on('click', '.edit', function () {
        let _id = $(this).data('id');
        let _type = "/visitaduria";
        $('#saveBtn').html('Guardar');
        var url = 'penal-siniestros-edit/'+_id+_type;
        if (!$('#estado_procesal').val()){
            obtenerEstadosprocesales();
        }
        $.get(url, function (data) {
            $('#modelHeading').html("Editar registro");
            $('#saveBtn').val("Actualizar");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            forSelector(data.servidor_publico,"servidor_publico");
            forSelector(data.denunciante,"denunciante");
            forSelector(data.delito,"delito");
            $('#numero_consecutivo').val(data.numero_consecutivo);
            $('#carpeta_investigacion').val(data.carpeta_investigacion);
            $('#agencia_mp').val(data.agencia_mp);
            $('#fecha_asignacion').val(data.fecha_asignacion.substr(0,10));
            $('#poligono').val(data.poligono);
            $('#estado_procesal').val(data.estado_procesal);
            $('#observaciones').val(data.observaciones);
        })
     });

     //Guardar o actualizar
     $('#saveBtn').click(function (e) {
        e.preventDefault();
        var formu = $('#PSFormV');
        formu.validate({
            rules:{
                numero_consecutivo:{
                    required: true,
                    maxlength: 15
                },
                carpeta_investigacion:{
                    required: true
                },
                fecha_asignacion:{
                    required: true
                },
                agencia_mp:{
                    required: true
                },
                servidor_publico:{
                    required: true
                },
                denunciante:{
                    required: true
                },
                delito:{
                    required: true
                },
                poligono:{
                    required: true
                },
                estado_procesal:{
                    required: true
                },
                observaciones:{
                    required: true
                },
            } //Fin rules
        }); 

        //Agregamos un campo extra al form
        let data = formu.serializeArray();
        data.push({name: "tipo", value: "visitaduria"});

        $.ajax({
          data: $.param(data),
          url: formu.attr('action'),
          type: "POST",
          dataType: 'json',
          success: function (data) {
            if (data.success) {
              formu[0].reset();
              $('#ajaxModel').modal('hide');
              $('#tablaV').DataTable().ajax.reload();
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

    //Cargar selects
    function fillSelects(data){
        forSelector(data.servidor_publico,"servidor_publico");
        forSelector(data.denunciante,"denunciante");
        forSelector(data.delito,"delito");
    }

    //recargar selects por for
    function forSelector(array,id){
        var sel = document.getElementById(id);

        //limpiamos el select
        sel.length = 0;
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

    //Mostrar errores
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

    //Eliminar un registro
    $('#tablaV').on('click', '.delete', function(e){
        e.preventDefault();

        var _id = $(this).data("id");
        var _type = "/visitaduria";
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
                    success: function(data){
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
