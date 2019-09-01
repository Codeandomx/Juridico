$(document).ready(function(){
    // Obtenemos los estados procesales
    ObtenerEstadosprocesales();

    $('#fecha).datepicker({
		autoclose: true,
		todayHighlight: true
	});
}); 

var ObtenerEstadosprocesales = function (){
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
            var elem = $('#estado');

            $.each(data, function (kay, val){
                elem.append($('<option/>', { 'value': val.id, 'text': val.nombre }));
            });
        }
    });
};