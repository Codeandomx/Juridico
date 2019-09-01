$(document).ready(function() {
    var data;

	jsGrid.setDefaults({
        tableClass: "jsgrid-table table table-striped table-hover"
    });
    
    jsGrid.setDefaults("control", {
        _createGridButton: function(cls, tooltip, clickHandler) {
            var grid = this._grid;
            return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                type: "button",
                title: tooltip
            }).on("click", function(e) {
                clickHandler(grid, e)
            })
        }
    }),

    function() {
        $("#jsGrid-basic").jsGrid({
            height: "500px",
            width: "100%",
            filtering: true,
            editing: true,
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
                { name: "Name", type: "text", width: 150 },
                { name: "Age", type: "number", width: 50 },
                { name: "Address", type: "text", width: 200 },
                { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
                { type: "control" }
            ],
            onItemDeleting: function (args){
                console.log(args);
            },
            onItemEditing: function(args) {
                console.log(args);
            }
        });
    }();

    $('#btnNuevo').click(function (e) {
        e.preventDefault();
        console.log('ok');
        location.href = '/recursos-humanos-form';
    });
});