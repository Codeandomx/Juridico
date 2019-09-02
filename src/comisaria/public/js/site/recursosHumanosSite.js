var db;

$(document).ready(function() {
    initDB();
    obtenerEstadosprocesales();

    $('#btnNuevo').click(function (e) {
        e.preventDefault();
        
        location.href = '/recursos-humanos-form';
    });
});

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
            // Asignamos los estados procesales
            db.estados_procesales = [];

            $.each(data, function (key, val){
                db.estados_procesales.push({ 'id': val.id, 'name': val.nombre });
            });
            // Obtenemos los abogados
            obtenerAbogados();
        }
    });
};

// Obtiene los Abogados
var obtenerAbogados = function (){
    $.ajax({
        url: "/obtenerabogados",
        method: "GET",
        data: { },
        dataType: "json",
        cache: false,
        error: function (){
            console.error('Error al procesar la solicitud');
        },
        success: function (data){
            // Asignamos los abogados
            db.abogados = [];

            $.each(data, function (key, val){
                db.abogados.push({ 'id': val.user, 'name': val.nombreCompleto });
            });

            // Obtenemos los reportes
            obtenerReportes()
        }
    });
};

// Obtiene los reportes
var obtenerReportes = function (){
    $.ajax({
        url: "/obtenerreportes",
        method: "GET",
        data: { },
        dataType: "json",
        cache: false,
        error: function (){
            console.error('Error al procesar la solicitud');
        },
        success: function (data){
            // Asignamos los reportes
            db.reports = data;

            // Llenamos el data grid
            setDataGrid();
        }
    });
};

var initDB = function (){
    // Formato para los filtros del datatable
    db = {
        loadData: function(filter) {
            return $.grep(this.reports, function(report) {
                return (!filter.id || report.id === filter.id)
                    && (!filter.fecha_captura || report.fecha_captura.indexOf(filter.fecha_captura) > -1)
                    && (!filter.fecha_recepcion || report.fecha_recepcion.indexOf(filter.fecha_recepcion) > -1)
                    && (!filter.nombre || report.nombre.indexOf(filter.nombre) > -1)
                    && (!filter.estado_procesal || report.estado_procesal === filter.estado_procesal)
                    && (!filter.abogado || report.abogado === filter.abogado)
            });
        },

        insertItem: function(insertingReport) {
            this.reports.push(insertinReport);
        },

        updateItem: function(updatingReport) { },

        deleteItem: function(deletingReport) {
            var reportIndex = $.inArray(deletingReport, this.reports);
            this.reports.splice(reportIndex, 1);
        }
    }
}

var setDataGrid = function (){   

    jsGrid.setDefaults({
        tableClass: "jsgrid-table table table-striped table-hover"
    });
    
    jsGrid.setDefaults("control", {
        _createGridButton: function(cls, tooltip, clickHandler) {
            var grid = this._grid;
            return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                type: "button",
                title: tooltip,
                id: count
            }).on("click", function(e) {
                // clickHandler(grid, e)
                if($(this).hasClass('jsgrid-delete-button')) console.log(grid.data[$(this).attr('id')]);
                if($(this).hasClass('jsgrid-edit-button')) console.log(grid);
            })
        }
    }),

    function() {
        // Obtenemos los datos

        $("#jsGrid-basic").jsGrid({
            height: "500px",
            width: "100%",
            filtering: true,
            editing: false,
            selecting: true,
            inserting: false,
            sorting: true,
            paging: true,
            autoload: true,
            pagerFormat: "Páginas: {first} {prev} {pages} {next} {last}    {pageIndex} de {pageCount}",
            pagePrevText: "Antes",
            pageNextText: "Siguiente",
            pageFirstText: "Primero",
            pageLastText: "Ultimo",
            pageNavigatorNextText: "...",
            pageNavigatorPrevText: "...",
            pageSize: 15,
            pageButtonCount: 5,
            confirmDeleting: false,
            deleteConfirm: "Are you sure?",
            noDataContent: "No hay datos disponibles",
            controller: db,
            fields: [
                { name: "ID", type: "text", width: 50 },
                { name: "Fecha Captura", type: "text", width: 140 },
                { name: "Fecha recepción", type: "text", width: 140 },
                { name: "Asunto", type: "text", width: 200 },
                { name: "Estado Procesal", type: "select", items: db.estados_procesales, valueField: "id", textField: "name" },
                { name: "Abogado", type: "select", items: db.abogados, valueField: "id", textField: "name" },
                // { type: "control" }
                { itemTemplate: function(value, item) {
                    var btnEditar = $('<button>', { 'class': 'btn btn-warning btnEditar', 'id': item.Age });
                    btnEditar.append($('<i>', { 'class': 'fa fa-edit' }));
                    var btnEliminar = $('<button>', { 'class': 'btn btn-danger btnEliminar', 'id': item.Age });
                    btnEliminar.append($('<i>', { 'class': 'fa fa-trash' }));

                    return $('<div>', { 'class': 'pull-right' }).append(btnEditar).append(btnEliminar);
                }}
            ],
            onDataLoaded: function (){
                $('.btnEditar').on('click', function (){
                    console.log($(this).attr('id'));
                })
                $('.btnEliminar').on('click', function (){
                    console.log($(this).attr('id'));
                })
            }
        });
    }();
}