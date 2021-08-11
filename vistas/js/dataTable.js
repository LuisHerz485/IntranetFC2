//TABLA PARA REPORTES DE USUARIOS
$('.tablaDataUsuario').DataTable({
    dom: 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    buttons: [{
            extend: 'excelHtml5',
            download: 'open',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
        {
            extend: 'pdf',
            download: 'open',
            orientation: 'landscape',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
            title: "Reporte de Usuarios",
            titleAttr: 'Exportar a PDF',
            alignment: 'center',
            className: 'btn btn-danger',
            customize: function(doc) {
                doc.watermark = {
                    text: 'FC Contadores & Asociados',
                    bold: true,
                    color: 'gray',
                    opacity: 0.2
                }
                doc.styles.title = {
                    color: '#0730A3',
                    fontSize: '25',
                    bold: true,
                    alignment: 'center'
                }
                doc.styles.tableHeader = {
                alignment: 'center',
                fontSize: '12',
                bold: true,
                color: '#223D8A'
                }
                doc.content[1].layout = {
                hLineWidth: function(i, node) {
                    return (i === 0 || i === 1) ? 1 : 0;},
                vLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 0 : 0;},
                hLineColor: function(i, node) {
                    return (i === 0 || i === 1) ? 'black' : 'gray';},
                };

                doc.content.splice(1, 0, {
                  margin: [10, 15, -2, 10],
                  alignment: 'right',
                    bold: true,
                  text: 'Fecha de Creacion: ' + new Date().toLocaleString(),
                });

                doc.content.splice(1, 0, {
                    margin: [0, 0, 0, -27],
                    alignment: 'left',
                    color: '#7D7631',
                    bold: true,
                    text: $("#username").text(),
                });

                
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyEven.noWrap = true;
                doc.styles.tableBodyOdd.alignment = 'center';
                doc.styles.tableBodyOdd.noWrap = true;
                doc.styles.tableBodyOdd.fontSize = '11.7';
                doc.styles.tableBodyEven.fontSize = '11.7';
                doc.content.splice(0, 0, {
                        columns: [{
                        image: 'data:image/png;base64,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',
                        width: 150,
                        opacity: 0.9
                      }]
                  });
            },
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            },
        },
        {
            extend: 'csv',
            text: '<i class="fa fa-print"> CSV</i> ',
            titleAttr: 'Exportar a CSV',
            className: 'btn btn-info',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
    ],
    'autoWidth': false,
    'language': language,
});

//TABLA PARA REPORTES TIPO USUARIOS
$('.tablaDataTipoUsuario').DataTable({
    dom: 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    buttons: [{
            extend: 'excelHtml5',
            download: 'open',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
        {
            extend: 'pdf',
            download: 'open',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
            title: "Reporte de Tipo Usuarios",
            titleAttr: 'Exportar a PDF',
            alignment: 'center',
            className: 'btn btn-danger',
            customize: function(doc) {
                doc.watermark = {
                    text: 'FC Contadores & Asociados',
                    bold: true,
                    color: 'gray',
                    opacity: 0.2
                }
                doc.styles.title = {
                    color: '#0730A3',
                    fontSize: '25',
                    bold: true,
                    alignment: 'center'
                }
                doc.styles.tableHeader = {
                alignment: 'center',
                fontSize: '9',
                marginLeft: 35,
                bold: true,
                color: '#223D8A'
                }
                doc.content[1].layout = {
                hLineWidth: function(i, node) {
                    return (i === 0 || i === 1) ? 1 : 0;},
                vLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 0 : 0;},
                hLineColor: function(i, node) {
                    return (i === 0 || i === 1) ? 'black' : 'gray';},
                };

                doc.content.splice(1, 0, {
                  margin: [10, 15, -2, 10],
                  alignment: 'right',
                    bold: true,
                  text: 'Fecha de Creacion: ' + new Date().toLocaleString(),
                });

                doc.content.splice(1, 0, {
                    margin: [0, 0, 0, -27],
                    alignment: 'left',
                    color: '#7D7631',
                    bold: true,
                    text: $("#username").text(),
                });

                
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyEven.noWrap = true;
                doc.styles.tableBodyOdd.alignment = 'center';
                doc.styles.tableBodyOdd.noWrap = true;
                doc.styles.tableBodyOdd.fontSize = '9';
                doc.styles.tableBodyEven.fontSize = '9';
                doc.styles.tableBodyOdd.marginLeft = 35;
                doc.styles.tableBodyEven.marginLeft = 35;
                doc.content.splice(0, 0, {
                        columns: [{
                        image: 'data:image/png;base64,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',
                        width: 150,
                        opacity: 0.9
                      }]
                  });
            },
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            },
        },
        {
            extend: 'csv',
            text: '<i class="fa fa-print"> CSV</i> ',
            titleAttr: 'Exportar a CSV',
            className: 'btn btn-info',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
    ],
    'autoWidth': false,
    'language': language,
});

//TABLA PARA REPORTES ÁREAS
$('.tablaDataAreas').DataTable({
    dom: 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    buttons: [{
            extend: 'excelHtml5',
            download: 'open',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
        {
            extend: 'pdf',
            download: 'open',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
            title: "Reporte de Áreas",
            titleAttr: 'Exportar a PDF',
            alignment: 'center',
            className: 'btn btn-danger',
            customize: function(doc) {
                doc.watermark = {
                    text: 'FC Contadores & Asociados',
                    bold: true,
                    color: 'gray',
                    opacity: 0.2
                }
                doc.styles.title = {
                    color: '#0730A3',
                    fontSize: '25',
                    bold: true,
                    alignment: 'center'
                }
                doc.styles.tableHeader = {
                alignment: 'center',
                fontSize: '9',
                marginLeft: 47.5,
                bold: true,
                color: '#223D8A'
                }
                doc.content[1].layout = {
                hLineWidth: function(i, node) {
                    return (i === 0 || i === 1) ? 1 : 0;},
                vLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 0 : 0;},
                hLineColor: function(i, node) {
                    return (i === 0 || i === 1) ? 'black' : 'gray';},
                };

                doc.content.splice(1, 0, {
                  margin: [10, 15, -2, 10],
                  alignment: 'right',
                    bold: true,
                  text: 'Fecha de Creacion: ' + new Date().toLocaleString(),
                });

                doc.content.splice(1, 0, {
                    margin: [0, 0, 0, -27],
                    alignment: 'left',
                    color: '#7D7631',
                    bold: true,
                    text: $("#username").text(),
                });

                
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyEven.noWrap = true;
                doc.styles.tableBodyOdd.alignment = 'center';
                doc.styles.tableBodyOdd.noWrap = true;
                doc.styles.tableBodyOdd.fontSize = '9';
                doc.styles.tableBodyEven.fontSize = '9';
                doc.styles.tableBodyOdd.marginLeft = 47.5;
                doc.styles.tableBodyEven.marginLeft = 47.5;
                doc.content.splice(0, 0, {
                        columns: [{
                        image: 'data:image/png;base64,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',
                        width: 150,
                        opacity: 0.9
                      }]
                  });
            },
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            },
        },
        {
            extend: 'csv',
            text: '<i class="fa fa-print"> CSV</i> ',
            titleAttr: 'Exportar a CSV',
            className: 'btn btn-info',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
    ],
    'autoWidth': false,
    'language': language,
});

//TABLA PARA REPORTES ASISTENCIA
$('.tablaDataAsistencia').DataTable({
    dom: 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    buttons: [{
            extend: 'excelHtml5',
            download: 'open',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
        {
            extend: 'pdf',
            download: 'open',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
            title: "Reporte de Asistencia",
            titleAttr: 'Exportar a PDF',
            alignment: 'center',
            className: 'btn btn-danger',
            customize: function(doc) {
                doc.watermark = {
                    text: 'FC Contadores & Asociados',
                    bold: true,
                    color: 'gray',
                    opacity: 0.2
                }
                doc.styles.title = {
                    color: '#0730A3',
                    fontSize: '25',
                    bold: true,
                    alignment: 'center'
                }
                doc.styles.tableHeader = {
                alignment: 'center',
                fontSize: '9',
                bold: true,
                marginLeft: 30,
                color: '#223D8A'
                }
                doc.content[1].layout = {
                hLineWidth: function(i, node) {
                    return (i === 0 || i === 1) ? 1 : 0;},
                vLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 0 : 0;},
                hLineColor: function(i, node) {
                    return (i === 0 || i === 1) ? 'black' : 'gray';},
                };

                doc.content.splice(1, 0, {
                  margin: [10, 15, -2, 10],
                  alignment: 'right',
                    bold: true,
                  text: 'Fecha de Creacion: ' + new Date().toLocaleString(),
                });

                doc.content.splice(1, 0, {
                    margin: [0, 0, 0, -27],
                    alignment: 'left',
                    color: '#7D7631',
                    bold: true,
                    text: $("#username").text(),
                });

                
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyEven.noWrap = true;
                doc.styles.tableBodyOdd.alignment = 'center';
                doc.styles.tableBodyOdd.noWrap = true;
                doc.styles.tableBodyOdd.fontSize = '9';
                doc.styles.tableBodyEven.fontSize = '9';
                doc.styles.tableBodyOdd.marginLeft = 30;
                doc.styles.tableBodyEven.marginLeft = 30;
                doc.content.splice(0, 0, {
                        columns: [{
                        image: 'data:image/png;base64,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',
                        width: 150,
                        opacity: 0.9
                      }]
                  });
            },
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            },
        },
        {
            extend: 'csv',
            text: '<i class="fa fa-print"> CSV</i> ',
            titleAttr: 'Exportar a CSV',
            className: 'btn btn-info',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
    ],
    'autoWidth': false,
    'language': language,
});


//TABLA REPORTE CLIENTES
$('.tablaDataClientes').DataTable({
    dom: 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    buttons: [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
        {
            extend: 'pdf',
            download: 'open',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
            title: 'Reporte de Clientes',
            orientation: 'landscape',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger',
            customize: function(doc) {
                doc.watermark = {
                    text: 'FC Contadores & Asociados',
                    bold: true,
                    color: 'gray',
                    opacity: 0.2
                }
                doc.styles.title = {
                    color: '#0730A3',
                    fontSize: '25',
                    bold: true,
                    alignment: 'center'
                }
                doc.styles.tableHeader = {
                alignment: 'center',
                fontSize: '10',
                bold: true,
                marginLeft: 30,
                color: '#223D8A'
                }
                doc.content[1].layout = {
                hLineWidth: function(i, node) {
                    return (i === 0 || i === 1) ? 1 : 0;},
                vLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 0 : 0;},
                hLineColor: function(i, node) {
                    return (i === 0 || i === 1) ? 'black' : 'gray';},
                };

                doc.content.splice(1, 0, {
                  margin: [10, 15, 2, 10],
                  alignment: 'right',
                  text: 'Fecha de Creacion: ' + new Date().toLocaleString(),
                });

                doc.content.splice(1, 0, {
                    margin: [0, 0, 0, -27],
                    alignment: 'left',
                    color: '#7D7631',
                    bold: true,
                    text: $("#username").text(),
                });

                
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyEven.noWrap = true;
                doc.styles.tableBodyOdd.alignment = 'center';
                doc.styles.tableBodyOdd.noWrap = true;
                doc.styles.tableBodyOdd.fontSize = '9';
                doc.styles.tableBodyEven.fontSize = '9';
                doc.styles.tableBodyOdd.marginLeft = 30;
                doc.styles.tableBodyEven.marginLeft = 30;
                doc.content.splice(0, 0, {
                        columns: [{
                        image: 'data:image/png;base64,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',
                        width: 150,
                        opacity: 0.9
                      }]
                  });
            },
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            },
        },
        {
            extend: 'csv',
            text: '<i class="fa fa-print"> CSV</i> ',
            titleAttr: 'Exportar a CSV',
            className: 'btn btn-info',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
    ],
    'autoWidth': false,
    'language': language,
});

//TABLA REPORTE DE COBRANZAS
$('.tablaDataCobranza').DataTable({
    dom: 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    buttons: [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
        {
            extend: 'pdf',
            download: 'open',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
            title: 'Reporte de Cobranza',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger',
            customize: function(doc) {
                doc.watermark = {
                    text: 'FC Contadores & Asociados',
                    bold: true,
                    color: 'gray',
                    opacity: 0.2
                }
                doc.styles.title = {
                    color: '#0730A3',
                    fontSize: '25',
                    bold: true,
                    alignment: 'center'
                }
                doc.styles.tableHeader = {
                alignment: 'center',
                fontSize: '10',
                bold: true,
                color: '#223D8A'
                }
                doc.content[1].layout = {
                hLineWidth: function(i, node) {
                    return (i === 0 || i === 1) ? 1 : 0;},
                vLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 0 : 0;},
                hLineColor: function(i, node) {
                    return (i === 0 || i === 1) ? 'black' : 'gray';},
                };

                doc.content.splice(1, 0, {
                  margin: [10, 15, 2, 10],
                  alignment: 'right',
                  text: 'Fecha de Creacion: ' + new Date().toLocaleString(),
                });

                doc.content.splice(1, 0, {
                    margin: [0, 0, 0, -27],
                    alignment: 'left',
                    color: '#7D7631',
                    bold: true,
                    text: $("#username").text(),
                });

                
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyEven.noWrap = true;
                doc.styles.tableBodyOdd.alignment = 'center';
                doc.styles.tableBodyOdd.noWrap = true;
                doc.styles.tableBodyOdd.fontSize = '9';
                doc.styles.tableBodyEven.fontSize = '9';
                doc.content.splice(0, 0, {
                        columns: [{
                        image: 'data:image/png;base64,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',
                        width: 150,
                        opacity: 0.9
                      }]
                  });
            },
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            },
        },
    ],
    'autoWidth': false,
    'language': language,
});


//TABLA PARA PAGOS DE INTRANET DE CLIENTES
$('.tablaDataClientesPagos').DataTable({
    dom: 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    buttons: [{
            extend: 'excelHtml5',
            filename: 'Reporte de Pagos',
            title: 'Reporte de Pagos',
            text: '<i class="fas fa-file-excel"> Excel</i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }
        },
        {
            extend: 'pdf', 
            download: 'open',
            filename: 'Reporte de Pagos',
            text: '<i class="fas fa-file-pdf"> PDF</i> ',
            titleAttr: 'Exportar a PDF',
            title: 'Reporte de Pagos',
            className: 'btn btn-danger',

            customize: function(doc) {
                doc.watermark = {
                    text: 'FC Contadores & Asociados',
                    bold: true,
                    color: 'gray',
                    opacity: 0.2
                }
                doc.styles.title = {
                    color: '#0730A3',
                    fontSize: '25',
                    bold: true,
                    alignment: 'center'
                }
                doc.styles.tableHeader = {
                alignment: 'center',
                fontSize: '10',
                bold: true,
                color: '#223D8A'
                }
                doc.content[1].layout = {
                hLineWidth: function(i, node) {
                    return (i === 0 || i === 1) ? 1 : 0;},
                vLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 0 : 0;},
                hLineColor: function(i, node) {
                    return (i === 0 || i === 1) ? 'black' : 'gray';},
                };

                doc.content.splice(1, 0, {
                  margin: [10, 15, 20, 10],
                  alignment: 'right',
                  text: 'Fecha de Creacion: ' + new Date().toLocaleString(),
                });

                doc.content.splice(1, 0, {
                    margin: [0, 0, 0, -27],
                    alignment: 'left',
                    color: '#7D7631',
                    bold: true,
                    text: $("#username").text(),
                });

                
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyEven.noWrap = true;
                doc.styles.tableBodyOdd.alignment = 'center';
                doc.styles.tableBodyOdd.noWrap = true;
                doc.styles.tableBodyOdd.fontSize = '9';
                doc.styles.tableBodyEven.fontSize = '9';
                doc.content.splice(0, 0, {
                        columns: [{
                        image: 'data:image/png;base64,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',
                        width: 150,
                        opacity: 0.9
                      }]
                  });
            },
            exportOptions: {
                columns: ":not(.no-exportar)" //exportar toda columna que no tenga la clase no-exportar
            }

        },
    ],
    'autoWidth': false,
    'language': language,
});

$('.tablaDataTableC').DataTable({
    'autoWidth': false,
    'language': language,
});

$('.tabla')