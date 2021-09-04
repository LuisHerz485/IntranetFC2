$('#btnRegistrarPermiso').on('click', function () {
  let form = new FormData($('#frmRegistrarPermiso')[0]);
  form.append('opcion', 'registrar');
  $.ajax({
    method: 'POST',
    url: 'ajax/permiso.ajax.php',
    data: form,
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
    },
    error: function (respuesta) {
      console.log('Error', respuesta);
    },
  });
});
$('#btnLimpiarFormPermiso').on('click', function () {
  $('#idtipopermiso').val(null).trigger('change');
  $('#frmRegistrarPermiso')[0].reset();
});
