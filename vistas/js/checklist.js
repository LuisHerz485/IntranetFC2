function init() {
  mostrarformCL(false);
}

function limpiarCheckList() {
  $('#frmChecklist')[0].reset();
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
  let btn = $(this);
  $('#idusuario').val(btn.attr('idusuario'));
  $('#idtipousuario').val(btn.attr('idtipousuario'));
  $('#iddepartamento').val(btn.attr('iddepartamento'));
});

const sectionActividad = $('#modalBodyActividades').html();
$('.btnAgregarActividad').on('click', function () {
  $('#modalBodyActividades').append(sectionActividad);
});

$(document).on('click', '.btn-eliminar-actividad', function () {
  $(this).closest('section').remove();
});

$('#btnGuardarActividades').on('click', function () {
  let formularioCheckList = new FormData($('#frmChecklist')[0]);
  formularioCheckList.append('opcion', 'registrar');
  $.ajax({
    method: 'POST',
    url: 'ajax/checklist.ajax.php',
    cache: false,
    contentType: false,
    processData: false,
    data: formularioCheckList,
    dataType: 'json',
    success: function ({ registrado }) {
      if (registrado) {
        limpiarCheckList();
        Swal.fire({
          title: 'Registrado!',
          text: '¡Se registro el checklist correctamente!',
          icon: 'success',
          confirmButtonText: 'Ok',
        });
      } else {
        Swal.fire({
          title: 'Error!',
          text: '¡No se pudo registrar el checklist!',
          icon: 'error',
          confirmButtonText: 'Ok',
        });
      }
    },
  });
});

init();
