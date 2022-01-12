$('#btnLimpiarcliente').on('click', function () {
  $('#idcliente').val(null).trigger('change');
  $('#fechacumplecliente').val(null).trigger('change');
  $('form#frmCumpleClientes')[0].reset();
});

$(document).on('click', '.btn-editar-cumplecliente', function () {
  let dataCumplecliente = JSON.parse($(this).attr('dataCumplecliente'));
  if (dataCumplecliente) {
    $('#idcumplecliente').val(dataCumplecliente['idcumplecliente']);
    $('#idcliente').val(dataCumplecliente['idcliente']).trigger('change');
    $('#fechacumplecliente').val(dataCumplecliente['fechacumplecliente']);
    $('#opcionesEditarCumplecliente').removeClass('d-none');
    $('#opcionesRegistrarCumplecliente').addClass('d-none');
  }
});

  $('#btnCancelarEditarCumplecliente').on('click', function () {
  $('#opcionesRegistrarCumplecliente').removeClass('d-none');
  $('#opcionesEditarCumplecliente').addClass('d-none');
  $('#btnLimpiarcliente').trigger('click');
});