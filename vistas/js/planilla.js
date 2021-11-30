$('#btnLimpiarFormPlanilla').on('click', function () {
  $('#idusuario').val(null).trigger('change');
  $('#idestadoplanilla').val(null).trigger('change');
  $('form#frmPlanilla')[0].reset();
});

$(document).on('click', '.btn-editar-planilla', function () {
  let dataPlanilla = JSON.parse($(this).attr('dataPlanilla'));
  if (dataPlanilla) {
    $('#idplanilla').val(dataPlanilla['idplanilla']);
    $('#idusuario').val(dataPlanilla['idusuario']).trigger('change');
    $('#idestadoplanilla')
      .val(dataPlanilla['idestadoplanilla'])
      .trigger('change');
    $('#honorario').val(dataPlanilla['honorario']);
    $('#remuneraciondiaria').val(dataPlanilla['remuneraciondiaria']);
    $('#remuneracionmensual').val(dataPlanilla['remuneracionmensual']);
    $('#fechaingreso').val(dataPlanilla['fechaingreso']);
    $('#fechafin').val(dataPlanilla['fechafin']);
    $('#montodescuento').val(dataPlanilla['montodescuento']);
    $('#observacion').val(dataPlanilla['observacion']);
    $('#opcionesEditarPlanilla').removeClass('d-none');
    $('#opcionesRegistrarPlanilla').addClass('d-none');
  }
});

$('#remuneracionmensual').on('change', function () {
  let diasLaboralesDelMes = 22;
  let remuneracionMensual = redondear($('#remuneracionmensual').val());
  let montoDescuento = redondear($('#montodescuento').val());
  $('#remuneraciondiaria').val(
    redondear((remuneracionMensual - montoDescuento) / diasLaboralesDelMes)
  );
});

$('#montodescuento').on('change', function () {
  $('#remuneracionmensual').trigger('change');
});

$('#btnCancelarEditarPlanilla').on('click', function () {
  $('#opcionesRegistrarPlanilla').removeClass('d-none');
  $('#opcionesEditarPlanilla').addClass('d-none');
  $('#btnLimpiarFormPlanilla').trigger('click');
});
