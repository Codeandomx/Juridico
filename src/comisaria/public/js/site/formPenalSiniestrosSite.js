$(document).ready(function(){

    $('#fecha_asignacion').datepicker({
		autoclose: true,
        todayHighlight: true,
        language: 'es'
    });

    // Al cancelar el formulario
    $('#btnCancelar').click(function (e){
        e.preventDefault()

        // reditigimos a la pagina principal
        location.href = '/penal-siniestros';
    });

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
