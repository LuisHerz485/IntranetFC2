function limpiarpermiso() {
  $('#frmRegistrarPermiso')[0].reset();
}

$(document).on('click', '.btn-editar-permiso', function () {
  limpiarpermiso();
  var tabla=$('.tablaDataPermisos').DataTable();
  const datos=tabla.row($(this).closest("tr")).data();
  if(datos){
    $('#idpermiso').val(datos[0]);
    $('#idtipopermiso').val(datos[1]).trigger('change');
    $('#fechainicio').val(datos[4].replace(' ', 'T').slice(0, -3));
    $('#fechafin').val(datos[5].replace(' ', 'T').slice(0, -3));
    $('#detalle').val(datos[6]);
    $('#opcionesEditarPermiso').removeClass('d-none');
    $('#opcionesRegistrarPermiso').addClass('d-none');
  }
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
  $('#fechainicio').val(btn.attr('fechainicio').replace(' ', 'T').slice(0, -3));
  $('#fechafin').val(btn.attr('fechafin').replace(' ', 'T').slice(0, -3));
  $('#detalle').val(btn.attr('detalles'));
  $('#modalPermisoDetalles').modal('show');
});
$(document).on('click', '.btn-mostrar-detalle', function () {
  let btn = $(this);
  $('#detalle2').val(btn.attr('detalles'));
  $('#modalPermisoDetalle').modal('show');
});
