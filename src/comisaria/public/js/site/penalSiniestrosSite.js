$(document).ready(function() {

    $('#btnNuevo').click(function (e) {
        e.preventDefault();

        location.href = '/penal-siniestros-form';
    });

    $('#tabla').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
});
