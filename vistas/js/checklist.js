function init() {
  mostrarformCL(false);
}

function limpiarCheckList(){
  $("#modalActividad").val("");
  $("#modalFecha").val("");
  $("#modalEstado").val("");
  $("#modalHoraInicio").val("");
  $("#modalHoraFin").val("");
}

function mostrarformCL(flag) {
  if (flag) {
    $('#listadoUserCL').hide();
    $('#formularioCheckList').show();
  } else {
    $('#listadoUserCL').show();
    $('#formularioCheckList').hide();
  }
}

function cancelarCL() {
  limpiarCheckList();
  mostrarformCL(false);
}

$('.btnListarCheckList').click(function () {
  $('#mostrarCheckList').DataTable().clear().draw(flase);
  var idusuario = $('#idusuario').val();
  datos.append('idusuario', idusuario);
  $.ajax({
    url: 'ajax/checklist.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (respuesta) {
      $.each(respuesta, function (index, value) {
        $('#mostrarCheckList').DataTable().row.add([value.nombre,value.apellidos]).draw(false);
      });
    },
    error: function (respuesta) {
      console.log('Error', respuesta);
    },
  });
});


$('.btnAgregarActividad').click(function () {
  $('#mostrarCheckList').DataTable().clear().draw(flase);
  var idusuario = $('#idusuario').val();
  datos.append('idusuario', idusuario);
  $.ajax({
    url: 'ajax/checklist.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (respuesta) {
      $.each(respuesta, function (index, value) {
        $('#mostrarCheckList').DataTable().row.add([value.nombre,value.apellidos]).draw(false);
      });
    },
    error: function (respuesta) {
      console.log('Error', respuesta);
    },
  });
});

init();
