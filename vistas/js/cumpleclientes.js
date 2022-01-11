$('#btnLimpiarFormCumpleClientes').on('click', function () {
    $('#idcliente').val(null).trigger('change');
    $('#fechacumplecliente').val(null).trigger('change');
    $('form#frmCumpleClientes')[0].reset();
  });
  
  $(document).on('click', '.btn-editar-cumpleanoclientes', function () {
    let dataCumplenosClientes = JSON.parse($(this).attr('dataCumplenosClientes'));
    if (dataCumplenosClientes) {
      $('#idcumplecliente').val(dataCumplenosClientes['idcumplecliente']);
      $('#idcliente').val(dataCumplenosClientes['idcliente']).trigger('change');
      $('#fechacumplecliente').val(dataCumplenosClientes['fechacumplecliente']);
      $('#opcionesEditarCumpleClientes').removeClass('d-none');
      $('#opcionesRegistrarCumpleClientes').addClass('d-none');
    }
  });