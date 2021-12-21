$(document).on('click', '.btn-editar-cumpleanos', function () {
    let dataCumpleanos = JSON.parse($(this).attr('dataCumpleanos'));
    if (dataCumpleanos) {
      $('#idcumpleanos').val(dataCumpleanos['idcumpleanos']);
      $('#idusuario').val(dataCumpleanos['idusuario']).trigger('change');
      $('#fechacumple').val(dataCumpleanos['fechacumple']);
    }
  });