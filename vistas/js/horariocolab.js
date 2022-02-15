//js de horario colab
$('#btnLimpiarFormHorariocolab').on('click', function () {
    $('#idusuario').val(null).trigger('change');
    $('#horaentrada').val(null).trigger('change');
    $('#horasalida').val(null).trigger('change');
    $('#detalle').val(null).trigger('change');
    $('form#frmhorariocolab')[0].reset();
});

    $(document).on('click', '.btn-editar-horariocolab', function () {
        let datahorariocolab = JSON.parse($(this).attr('datahorariocolab'));
        if (datahorariocolab) {
            $('#idhorariocolab').val(datahorariocolab['idhorariocolab']);
            $('#idusuario').val(datahorariocolab['idusuario']).trigger('change');
            $('#horaentrada').val(datahorariocolab['horaentrada']);
            $('#horasalida').val(datahorariocolab['horasalida']);
            $('#detalle').val(datahorariocolab['detalle']);
            $('#opcionesRegistrarHorariocolab').addClass('d-none');	
            $('#opcionesEditarHorariocolab').removeClass('d-none');       
        }
    });

$('#btnCancelarEditarHorariocolab').on('click', function () {
    $('#opcionesRegistrarHorariocolab').removeClass('d-none');
    $('#opcionesEditarHorariocolab').addClass('d-none');
    $('#btnLimpiarFormHorariocolab').trigger('click');
});
  

$(document).on('click', '.btn-ver-detalle-horariocolab', function () {
    let btn = $(this);
    $("#detalle2").val(btn.attr("detalle2"));
    $("#modalVerDetallecolab").modal("show");   
});





