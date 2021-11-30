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
    $('#diaslaborales').val(dataPlanilla['diaslaborales']);
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

$('#honorario').on('change', function () {
  let diasLaboralesDelMes = redondear($('#diaslaborales').val());
  let honorario = redondear($('#honorario').val());
  let montoDescuento = redondear($('#montodescuento').val());
  let remuneracionMensual = redondear(honorario - montoDescuento);
  let remuneracionDiaria = redondear(remuneracionMensual / diasLaboralesDelMes);
  $('#remuneracionmensual').val(remuneracionMensual);
  $('#remuneraciondiaria').val(remuneracionDiaria);
});

$('#diaslaborales').on('change', function () {
  $('#honorario').trigger('change');
});

$('#montodescuento').on('change', function () {
  $('#honorario').trigger('change');
});

$('#btnCancelarEditarPlanilla').on('click', function () {
  $('#opcionesRegistrarPlanilla').removeClass('d-none');
  $('#opcionesEditarPlanilla').addClass('d-none');
  $('#btnLimpiarFormPlanilla').trigger('click');
});
