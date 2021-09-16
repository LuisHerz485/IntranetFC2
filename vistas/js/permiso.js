function limpiarpermiso() {
  $('#frmRegistrarPermiso')[0].reset();
}

$(document).on('click', '.btn-editar-permiso', function () {
  limpiarpermiso();
  var tabla = $('.tablaDataPermisos').DataTable();
  const datos = tabla.row($(this).closest('tr')).data();
  console.log(datos);
  if (datos) {
    $('#idpermiso').val(datos[0]);
    $('#idtipopermiso').val(datos[1]).trigger('change');
    $('#fechainicio').val(datos[5].replace(' ', 'T').slice(0, -3));
    $('#fechafin').val(datos[6].replace(' ', 'T').slice(0, -3));
    $('#detalle').val(datos[7]);
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
  $('#idestadopermiso').val(btn.attr('idestadopermiso')).trigger('change');
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

var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
});

(function ($) {
  $.extend({
    playSound: function () {
      return $(
        '<audio class="sound-player" autoplay="autoplay" style="display:none;">' +
          '<source src="' +
          arguments[0] +
          '" />' +
          '<embed src="' +
          arguments[0] +
          '" hidden="true" autostart="true" loop="false"/>' +
          '</audio>'
      ).appendTo('body');
    },
    stopSound: function () {
      $('.sound-player').remove();
    },
  });
})(jQuery);

function notificacionesPermisos(notificar) {
  let permisosPendientes = $('#permisosPendientes');
  let notificaciones = $('#notificaciones');
  $.ajax({
    method: 'POST',
    url: 'ajax/permiso.ajax.php',
    data: { opcion: 'pendientes' },
    dataType: 'json',
    cache: false,
    success: function ({ cantidad }) {
      if (cantidad > permisosPendientes.text()) {
        if (notificar) {
          $.playSound('sounds/notificacion.mp3');
          var sound = new Howl({
            src: ['sounds/notificacion.mp3'],
            autoplay: true,
            loop: true,
          });

          sound.play();
          Toast.fire({
            icon: 'info',
            title: 'Hay Solicitudes de Permisos Pendientes',
          });
        }
        permisosPendientes.text(cantidad);
        notificaciones.text(cantidad);
      }
    },
  });
}

$(function () {
  if ($('#permisosPendientes').length) {
    notificacionesPermisos(false);
    setInterval(notificacionesPermisos, 60000, true);
  }
});
