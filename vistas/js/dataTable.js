$('.tablaDataTable').DataTable({
    dom: 'Bfrtip',
    buttons: [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success'
        },
        {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger'
        },
        {
            extend: 'csv',
            text: '<i class="fa fa-print"> CSV</i> ',
            titleAttr: 'Exportar a CSV',
            className: 'btn btn-info'
        },
        {
            extend: 'print',
            text: '<i class="fa fa-print"> Imprimir</i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-warning',
            customize: function(win) {
                $(win.document.body)
                    .css('font-size', '10pt')
                    .prepend(
                        '<img src="vistas/dist/img/logo-azul.png" style="position:absolute; top:0; left:0;" />'
                    );
                $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
            }
        },
        {
            extend: 'copy',
            text: '<i class="fas fa-copy"> Copy</i> ',
            titleAttr: 'Copiar',
            className: 'btn btn-default'
        },
    ],
    'autoWidth': false,
});