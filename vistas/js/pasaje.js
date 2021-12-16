$('#btnLimpiarFormPasaje').on('click', function () {
    $('#idusuario').val(null).trigger('change');
    $('form#frmPasaje')[0].reset();
});

$(document).on('click', '.btn-editar-pasaje', function () {
  let dataPasaje = JSON.parse($(this).attr('dataPasaje'));
  if (dataPasaje) {
    $('#idpasajes').val(dataPasaje['idpasajes']);
    $('#idusuario').val(dataPasaje['idusuario']).trigger('change');
    $('#gastos').val(dataPasaje['gastos']);
    $('#ida').val(dataPasaje['ida']);
    $('#vuelta').val(dataPasaje['vuelta']);
    $('#dias').val(dataPasaje['dias']);
    $('#semana').val(dataPasaje['semana']);
    $('#mensual').val(dataPasaje['mensual']);
    $('#detalle').val(dataPasaje['detalle']);
    $('#fechacreacion').val(dataPasaje['fechacreacion']);
    $('#pagomedio').val(dataPasaje['pagomedio']);
    $('#totalpasaje').val(dataPasaje['totalpasaje']);
    $('#diasextra').val(dataPasaje['diasextra']);
    $('#diasmenos').val(dataPasaje['diasmenos']);
    $('#opcionesEditarPasaje').removeClass('d-none');
    $('#opcionesRegistrarPasaje').addClass('d-none');
  }
});

$(document).on('click', '.btn-pagos-pasaje', function () {
  let dataPasaje = JSON.parse($(this).attr('dataPasaje'));
  if (dataPasaje) {
    $('#opcionesEditarPasaje').removeClass('d-none');
    $('#opcionesRegistrarPasaje').addClass('d-none');
  }
});

$('#ida').on('change', function () {
    let ida = redondear($('#ida').val());
    let vuelta = redondear($('#vuelta').val());
    let dias = redondear($('#dias').val());
    let pagomedio = redondear($('#pagomedio').val());
    let extra = redondear($('#diasextra').val());
    let menos = redondear($('#diasmenos').val());
    let montoGasto = redondear(ida + vuelta);
    let proysem = redondear(montoGasto * dias);
    let proymes = redondear(proysem * 4);
    let total = redondear(proymes - pagomedio);
    let ecuextra = redondear(extra * montoGasto);
    let ecuemenos = redondear(menos * montoGasto);
    let diaextra = redondear((ecuextra + total) - ecuemenos);
    $('#gastos').val(montoGasto);
    $('#semana').val(proysem);
    $('#mensual').val(proymes);
    $('#totalpasaje').val(diaextra);
});

$('#dias').on('change', function () {
    $('#ida').trigger('change');
});

$('#vuelta').on('change', function () {
    $('#ida').trigger('change');
});

$('#pagomedio').on('change', function () {
  $('#ida').trigger('change');
});

$('#diasextra').on('change', function () {
  $('#ida').trigger('change');
});

$('#diasmenos').on('change', function () {
  $('#ida').trigger('change');
});

$('#btnCancelarEditarPasaje').on('click', function () {
  $('#opcionesRegistrarPasaje').removeClass('d-none');
  $('#opcionesEditarPasaje').addClass('d-none');
  $('#btnLimpiarFormPasaje').trigger('click');
});

$(".btnTotalPasaje").click(function () {
  $("#tblPasaje").DataTable().clear().draw(false);
  $("#tablaIngresoPasajes").DataTable().clear().draw(false);
  var idusuario = $("#idusuario").val();
  var datos = new FormData();
  datos.append("idusuario", idusuario);
  datos.append("opcion", "buscarPasajeDeUnUsuario");
  $.ajax({
    url: "ajax/pasaje.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function ({respuesta}) {
      let montoTotal = 0;
      $.each(respuesta, function (index, value) {
        /* Vamos agregando a nuestra tabla las filas necesarias */
        montoTotal += parseFloat(value.mensual);
        $("#tablaIngresoPasajes")
          .DataTable()
          .row.add([value.fechacreacion, montoFormato(value.mensual)])
          .draw(false);
      });
      
      $("#montoTotal").text(montoFormato(montoTotal));
    },
    error: function (respuesta) {
      console.log("Error", respuesta);
    },
});

  $.ajax({
    url: "ajax/pasaje.ajax.php",
    method: "POST",
    data: {opcion: "MontoTotalPasaje"},
    cache: false,
    dataType: "json",
    success: function ({respuesta}) {
      $("#TotalGeneral").text(respuesta);
    },
    error: function (respuesta) {
    },
  });

});
