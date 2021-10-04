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

$('#btnCancelarCheckJefe').on('click', function () {
  limpiarCheckList();
  $('#mostrarCheckList').DataTable().clear().draw();
  mostrarformCL(false);
});

$(document).on('click', '.btnListarCheckList', function () {
  let btn = $(this);
  $('#idusuario').val(btn.attr('idusuario'));
  $('#idusuario2').val(btn.attr('idusuario'));
  $('#idtipousuario').val(btn.attr('idtipousuario'));
  $('#iddepartamento').val(btn.attr('iddepartamento'));
});

const sectionActividad = $('#modalBodyActividades').html();

$('.btnAgregarActividad').on('click', function () {
  $('#modalBodyActividades').append(sectionActividad);
});

$('#btnSalirActividad').on('click', function () {
  $('#modalBodyActividades').html('');
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
    success: function ({ respuesta }) {
      if (respuesta) {
        $('#modalCheckList').modal('hide');
        limpiarCheckList();
        $('#btnFiltrarChecklist').click();
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

$('#btnFiltrarChecklist').on('click', function () {
  let formulariofiltroChecklist = new FormData($('#frmFiltroChecklist')[0]);
  formulariofiltroChecklist.append('opcion', 'consulta');
  $.ajax({
    method: 'POST',
    url: 'ajax/checklist.ajax.php',
    cache: false,
    contentType: false,
    processData: false,
    data: formulariofiltroChecklist,
    dataType: 'json',
    success: function (respuesta) {
      let tabla = $('#mostrarCheckList').DataTable();
      if (respuesta) {
        tabla.clear().draw();
        $.each(respuesta, function (index, value) {
          if (value.idestadochecklist == 1) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>
            <button class='btn btn-warning btn-editar-detalle-checklist' iddetallechecklist="${value.iddetallechecklist}" idestadochecklist="${value.idestadochecklist}"> <i class="fas fa-pencil-alt"></i> </button>`,
                value.detalle,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-primary">Pendiente</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 2) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>
            <button class='btn btn-warning btn-editar-detalle-checklist' iddetallechecklist="${value.iddetallechecklist}" idestadochecklist="${value.idestadochecklist}"> <i class="fas fa-pencil-alt"></i> </button>`,
                value.detalle,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-success">Realizado</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 3) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>
            <button class='btn btn-warning btn-editar-detalle-checklist' iddetallechecklist="${value.iddetallechecklist}" idestadochecklist="${value.idestadochecklist}"> <i class="fas fa-pencil-alt"></i> </button>`,
                value.detalle,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-danger">Cancelado</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 4) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>
            <button class='btn btn-warning btn-editar-detalle-checklist' iddetallechecklist="${value.iddetallechecklist}" idestadochecklist="${value.idestadochecklist}"> <i class="fas fa-pencil-alt"></i> </button>`,
                value.detalle,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-warning">Suspendido</h4>',
              ])
              .draw(false);
          }
        });
      } else {
        console.log(respuesta);
      }
    },
  });
});

$('#btnFiltrarChecklistAdmin').on('click', function () {
  let formulariofiltroChecklist = new FormData(
    $('#frmFiltroChecklistAdmin')[0]
  );
  formulariofiltroChecklist.append('opcion', 'consultaUsuarios');
  $.ajax({
    method: 'POST',
    url: 'ajax/checklist.ajax.php',
    cache: false,
    contentType: false,
    processData: false,
    data: formulariofiltroChecklist,
    dataType: 'json',
    success: function (respuesta) {
      let tabla = $('#mostrarCheckList').DataTable();
      if (respuesta) {
        tabla.clear().draw();
        $.each(respuesta, function (index, value) {
          if (value.idestadochecklist == 1) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>`,
                value.detalle,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-primary">Pendiente</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 2) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>`,
                value.detalle,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-success">Realizado</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 3) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>`,
                value.detalle,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-danger">Cancelado</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 4) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>`,
                value.detalle,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-warning">Suspendido</h4>',
              ])
              .draw(false);
          }
        });
      } else {
        console.log(respuesta);
      }
    },
  });
});

$('#btnFiltrarChecklistAsignado').on('click', function () {
  let formulariofiltroChecklist = new FormData(
    $('#frmFiltroChecklistAsignado')[0]
  );
  formulariofiltroChecklist.append('opcion', 'consultaAsignador');
  $.ajax({
    method: 'POST',
    url: 'ajax/checklist.ajax.php',
    cache: false,
    contentType: false,
    processData: false,
    data: formulariofiltroChecklist,
    dataType: 'json',
    success: function (respuesta) {
      let tabla = $('#mostrarCheckListAsignado').DataTable();
      if (respuesta) {
        tabla.clear().draw();
        $.each(respuesta, function (index, value) {
          if (value.idestadochecklist == 1) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>`,
                value.detalle,
                value.nombre + ' ' + value.apellidos,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-primary">Pendiente</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 2) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>`,
                value.detalle,
                value.nombre + ' ' + value.apellidos,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-success">Realizado</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 3) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>`,
                value.detalle,
                value.nombre + ' ' + value.apellidos,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-danger">Cancelado</h4>',
              ])
              .draw(false);
          } else if (value.idestadochecklist == 4) {
            tabla.row
              .add([
                `<button class='btn btn-secondary btn-ver-detalle-checklist' detalle="${value.detalle}"> <i class="far fa-eye"></i></button>`,
                value.detalle,
                value.nombre + ' ' + value.apellidos,
                value.fecha,
                value.horainicio,
                value.horafin,
                '<h4><span class="badge badge-warning">Suspendido</h4>',
              ])
              .draw(false);
          }
        });
      } else {
        console.log(respuesta);
      }
    },
  });
});

$('.btnCheckArea').click(function () {
  var idarea = $('#idarea').val();
  var datos = new FormData();
  datos.append('idarea', idarea);
  $.ajax({
    url: 'ajax/departamento.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (respuesta) {
      $('#listaCheckUser').DataTable().clear().draw();
      $.each(respuesta, function (index, value) {
        /* Vamos agregando a nuestra tabla las filas necesarias */
        if (value.estado == 1) {
          $('#listaCheckUser')
            .DataTable()
            .row.add([
              value.nombre,
              value.email,
              value.departamento,
              '<button class="btn btn-s btn-warning btnListarCheckList" idusuario="' +
                value.idusuario +
                '" iddepartamento="' +
                value.iddepartamento +
                '" idtipousuario="' +
                value.idtipousuario +
                '" onclick="mostrarformCL(true)"><i class="far fa-list-alt"></i></button>',
            ])
            .draw(false);
        }
      });
    },
    error: function (respuesta) {
      console.log('Error', respuesta);
    },
  });
});

$(document).on('click', '.btn-ver-detalle-checklist', function () {
  let btn = $(this);
  $('#detalle2').val(btn.attr('detalle'));
  $('#modalVerActividad').modal('show');
});

$(document).on('click', '.btn-editar-detalle-checklist', function () {
  let btn = $(this);
  const datos = $('#mostrarCheckList')
    .DataTable()
    .row(btn.closest('tr'))
    .data();
  if (datos) {
    $('#iddetallechecklist').val(btn.attr('iddetallechecklist'));
    $('#idestadochecklist2').val(btn.attr('idestadochecklist'));
    $('#detalle').val(datos[1]);
    $('#horainicio').val(datos[3].slice(0, -3));
    $('#horafin').val(datos[4].slice(0, -3));
    $('#modalEditarActividad').modal('show');
  }
});

$(document).on('click', '.btnEditarActividad', function () {
  let formularioCheckList = new FormData($('#frmEditarChecklist')[0]);
  formularioCheckList.append('opcion', 'editar');
  $.ajax({
    method: 'POST',
    url: 'ajax/checklist.ajax.php',
    cache: false,
    contentType: false,
    processData: false,
    data: formularioCheckList,
    dataType: 'json',
    success: function ({ respuesta }) {
      if (respuesta) {
        $('#btnFiltrarChecklist').click();
        $('#btnFiltrarChecklistAdmin').click();
        $('#modalEditarActividad').modal('hide');
        Swal.fire({
          title: 'Editado!',
          text: '¡Se Edito el checklist correctamente!',
          icon: 'success',
          confirmButtonText: 'Ok',
        });
      } else {
        $('#modalEditarActividad').modal('hide');
        Swal.fire({
          title: 'Error!',
          text: '¡No se pudo editar el checklist!',
          icon: 'error',
          confirmButtonText: 'Ok',
        });
      }
    },
  });
});

init();
