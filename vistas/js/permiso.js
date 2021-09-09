function limpiarpermiso() {
  $('#frmRegistrarPermiso')[0].reset();
}

$(document).on('click', '.btn-editar-permiso', function () {
  limpiarpermiso();
  var idpermiso = $(this).attr('idpermiso');
  var datos = new FormData();
  datos.append('opcion', 'buscar');
  datos.append('idpermiso', idpermiso);
  $.ajax({
    url: 'ajax/permiso.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (respuesta) {
      $('#idpermiso').val(respuesta['idpermiso']);
      $('#idtipopermiso').val(respuesta['idtipopermiso']).trigger('change');
      $('#fechainicio').val(
        respuesta['fechainicio'].replace(' ', 'T').slice(0, -3)
      );
      $('#fechafin').val(respuesta['fechafin'].replace(' ', 'T').slice(0, -3));
      $('#detalle').val(respuesta['detalle']);
      $('#opcionesEditarPermiso').removeClass('d-none');
      $('#opcionesRegistrarPermiso').addClass('d-none');
    },
  });
});

$('#btnCancelarEditarPermiso').on('click', function () {
  $('#opcionesRegistrarPermiso').removeClass('d-none');
  $('#opcionesEditarPermiso').addClass('d-none');
});

$('#btnLimpiarFormPermiso').on('click', function () {
  $('#idtipopermiso').val(null).trigger('change');
  $('#frmRegistrarPermiso')[0].reset();
});

$('#fechadesde').val(getFechaActual());
$('#fechahasta').val(getFechaActual());

$(document).on('click', '.btn-actualizar-estado-permiso', function () {
  let btn = $(this);
  $('#idestadopermiso').val(btn.attr('idestadopermiso'));
  $('#idpermiso').val(btn.attr('idpermiso'));
  $('#modalPermisoCambio').modal('show');
});

$(document).on('click', '.btn-mostrar-detalles', function () {
  let btn = $(this);
  $('#fechainicio').val(new Date(btn.attr('fechainicio')).replace(' ', 'T'));
  $('#fechafin').val(new Date(btn.attr('fechafin')).replace(' ', 'T'));
  $('#detalle').val(btn.attr('detalles'));
  $('#modalPermisoDetalles').modal('show');
});
$(document).on('click', '.btn-mostrar-detalle', function () {
  let btn = $(this);
  $('#detalle2').val(btn.attr('detalles'));
  $('#modalPermisoDetalle').modal('show');
});
