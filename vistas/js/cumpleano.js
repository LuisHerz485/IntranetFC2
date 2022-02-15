$('#btnLimpiarFormCumpleanos').on('click', function () {
  $('#idusuario').val(null).trigger('change');
  $('#fechacumple').val(null).trigger('change');
  $('form#frmCumpleanos')[0].reset();
});

  $(document).on('click', '.btn-editar-cumpleanos', function () {
    let dataCumpleanos = JSON.parse($(this).attr('dataCumpleanos'));
    if (dataCumpleanos) {
      $('#idcumpleanos').val(dataCumpleanos['idcumpleanos']);
      $('#idusuario').val(dataCumpleanos['idusuario']).trigger('change');
      $('#fechacumple').val(dataCumpleanos['fechacumple']);
      $('#opcionesEditarCumpleanos').removeClass('d-none');
      $('#opcionesRegistrarCumpleanos').addClass('d-none');
    }
  });

  $('#btnCancelarEditarCumpleanos').on('click', function () {
    $('#opcionesRegistrarCumpleanos').removeClass('d-none');
    $('#opcionesEditarCumpleanos').addClass('d-none');
    $('#btnLimpiarFormCumpleanos').trigger('click');
  });
