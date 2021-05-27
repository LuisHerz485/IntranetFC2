$('.tablaDataTable').DataTable({
<<<<<<< HEAD
    dom: 'Bfrtip',
    buttons: [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
=======
    language: {
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
    },
    //para usar los botones   
    responsive: "true",
    dom: 'Bfrtilp',       
    buttons:[ 
        {
            extend:    'excelHtml5',
            text:      '<i class="fas fa-file-excel"></i> ',
>>>>>>> 9498ab7771ca56cd043fa5d5f394981723aae726
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success'
        },
        {
<<<<<<< HEAD
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
=======
            extend:    'pdfHtml5',
            text:      '<i class="fas fa-file-pdf"></i> ',
>>>>>>> 9498ab7771ca56cd043fa5d5f394981723aae726
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger'
        },
        {
<<<<<<< HEAD
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
});
=======
            extend:    'print',
            text:      '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info'
        },
    ]
});

>>>>>>> 9498ab7771ca56cd043fa5d5f394981723aae726
