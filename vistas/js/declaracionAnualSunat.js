$('#btnfiltrarda').on('click', function () {
  let fomularioDeclaracionAnual = new FormData(
    $('#fomularioFiltroDeclaracionAnual')[0]
  );
  fomularioDeclaracionAnual.append('opcion', 'ConsultarDeclaracionAnual');
  $.ajax({
    url: 'ajax/declaracionAnualSunat.ajax.php',
    method: 'POST',
    data: fomularioDeclaracionAnual,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function ({ respuesta }) {
      $('#tblDeclaracionAnualSunat').DataTable().clear().draw();
      let rowestado;
      let rowopcion;
      $.each(respuesta, function (index, value) {
        if (value.estado === null) {
          rowopcion = `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="ModalRegistroAnualDeclara" idestado="${value.idestado}" iddeclaracionAS="${value.iddeclaracionsunatanual}" fecha="${value.fechavencimiento}"><i class="far fa-calendar-check"></i></button></abbr>`;
          rowestado = `<h3><p class="badge badge-primary">Pendiente</p></h3>`;
        } else if (value.estado == 'Dentro de plazo') {
          rowopcion = `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="ModalRegistroAnualDeclara" iddetalledeclaracionanual="${
            value.iddetalledeclaracionanualsunat
          }" iddeclaracionAS="${value.iddeclaracionsunatanual}"  idestado="${
            value.idestado
          }" fecha="${
            value.fechavencimiento
          }" disabled><i class="far fa-calendar-check"></i></button></abbr>${
            canEdit
              ? `<abbr title="Editar Declaracion"><button class="btn btn-secondary border ModalEditarDeclaraAnual" iddetalledeclaracionanual="${value.iddetalledeclaracionanualsunat}" iddeclaracionAS="${value.iddeclaracionsunatanual}" fecha="${value.fechavencimiento}"  idestado="${value.idestado}"  numOrden="${value.numOrden}" fechadeclarada="${value.fechadeclarada}" ><i class="far fa-calendar-check"></i></button></abbr>`
              : ``
          }`;
          rowestado = `<h3><p class="badge badge-success">${value.estado}</p></h3>`;
        } else if (value.estado == 'Fuera de plazo') {
          rowopcion = `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="ModalRegistroAnualDeclara" iddetalledeclaracionanual="${
            value.iddetalledeclaracionanualsunat
          }"  iddeclaracionAS="${value.iddeclaracionsunatanual}"  idestado="${
            value.idestado
          }" fecha="${
            value.fechavencimiento
          }" disabled><i class="far fa-calendar-check"></i></button></abbr>${
            canEdit
              ? `<abbr title="Editar Declaracion"><button class="btn btn-secondary border ModalEditarDeclaraAnual" iddetalledeclaracionanual="${value.iddetalledeclaracionanualsunat}"  iddeclaracionAS="${value.iddeclaracionsunatanual}" fecha="${value.fechavencimiento}"  idestado="${value.idestado}" numOrden="${value.numOrden}"  fechadeclarada="${value.fechadeclarada}" ><i class="far fa-calendar-check"></i></button></abbr>`
              : ``
          }`;
          rowestado = `<h3><p class="badge badge-danger">${value.estado}</p></h3>`;
        } else if (value.estado == 'Fuera de plazo por rectificatoria') {
          rowopcion = `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="ModalRegistroAnualDeclara" iddetalledeclaracionanual="${
            value.iddetalledeclaracionanualsunat
          }"  iddeclaracionAS="${value.iddeclaracionsunatanual}"  idestado="${
            value.idestado
          }" fecha="${
            value.fechavencimiento
          }" disabled><i class="far fa-calendar-check"></i></button></abbr>${
            canEdit
              ? `<abbr title="Editar Declaracion"><button class="btn btn-secondary border ModalEditarDeclaraAnual" iddetalledeclaracionanual="${value.iddetalledeclaracionanualsunat}"  iddeclaracionAS="${value.iddeclaracionsunatanual}" fecha="${value.fechavencimiento}"  idestado="${value.idestado}" numOrden="${value.numOrden}"  fechadeclarada="${value.fechadeclarada}" ><i class="far fa-calendar-check"></i></button></abbr>`
              : ``
          }`;
          rowestado = `<h3><p class="badge badge-danger">Fuera de plazo</br>por rectificatoria</p></h3>`;
        } else if (value.estado == 'Fuera de plazo por error contador') {
          rowopcion = `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="ModalRegistroAnualDeclara" iddetalledeclaracionanual="${
            value.iddetalledeclaracionanualsunat
          }"  iddeclaracionAS="${value.iddeclaracionsunatanual}"  idestado="${
            value.idestado
          }" fecha="${
            value.fechavencimiento
          }" disabled><i class="far fa-calendar-check"></i></button></abbr>${
            canEdit
              ? `<abbr title="Editar Declaracion"><button class="btn btn-secondary border ModalEditarDeclaraAnual" iddetalledeclaracionanual="${value.iddetalledeclaracionanualsunat}"  iddeclaracionAS="${value.iddeclaracionsunatanual}" fecha="${value.fechavencimiento}"  idestado="${value.idestado}" numOrden="${value.numOrden}"  fechadeclarada="${value.fechadeclarada}" ><i class="far fa-calendar-check"></i></button></abbr>`
              : ``
          }`;
          rowestado = `<h3><p class="badge badge-danger">Fuera de plazo</br>por error contador</p></h3>`;
        }
        $('#tblDeclaracionAnualSunat')
          .DataTable()
          .row.add([
            rowopcion,
            value.ruc,
            value.clientes,
            value.fechavencimiento,
            rowestado,
            value.fechadeclarada,
            value.numOrden,
          ])
          .draw(false);
      });
    },
    error: function ({ respuesta }) {
      console.log('Error', respuesta);
    },
  });
});

$(document).on('click', '#ModalRegistroAnualDeclara', function () {
  $('#iddeclaracionAS').val($(this).attr('iddeclaracionAS'));
  $('#fechavencimiento').val($(this).attr('fecha'));
  $('#modalFechaDeclaraAnual').modal('show');
});

$('#btnRegistroAS').on('click', function () {
  let formulariodeclaracion = new FormData($('#formRegistroDeclaracionAS')[0]);
  formulariodeclaracion.append('opcion', 'RegistroAnual');
  $.ajax({
    method: 'POST',
    url: 'ajax/declaracionAnualSunat.ajax.php',
    cache: false,
    contentType: false,
    processData: false,
    data: formulariodeclaracion,
    dataType: 'json',
    success: function ({ respuesta }) {
      if (respuesta) {
        $('#modalFechaDeclaraAnual').modal('hide');
        $('#btnfiltrarda').click();
        $('#formRegistroDeclaracionAS')[0].reset();
        Swal.fire({
          title: 'Registrado!',
          text: '¡Se registro la declaracion correctamente!',
          icon: 'success',
          confirmButtonText: 'Ok',
        });
      } else {
        Swal.fire({
          title: 'Error!',
          text: '¡No se pudo registrar la declaracion!',
          icon: 'error',
          confirmButtonText: 'Ok',
        });
      }
    },
  });
});

$(document).on('click', '.ModalEditarDeclaraAnual', function () {
  let btn = $(this);
  $('#iddetalledeclaracionEditar').val(btn.attr('iddetalledeclaracionanual'));
  $('#iddeclaracionEditar').val(btn.attr('iddeclaracionAS'));
  $('#fechavencimientoEditar').val(btn.attr('fecha'));
  $('#fechadeclaradaEditar').val(btn.attr('fechadeclarada'));
  $('#numOrdenEditar').val(btn.attr('numOrden'));
  $('#idestadoEditar').val(btn.attr('idestado')).trigger('change');
  $('#modalEditarDeclara').modal('show');
});

$('#btnEditarDeclaracionAnual').on('click', function () {
  let formulariodeclaracion = new FormData(
    $('#formEditarDeclaracionAnualSunat')[0]
  );
  formulariodeclaracion.append('opcion', 'ActualizarAnual');
  $.ajax({
    method: 'POST',
    url: 'ajax/declaracionAnualSunat.ajax.php',
    cache: false,
    contentType: false,
    processData: false,
    data: formulariodeclaracion,
    dataType: 'json',
    success: function ({ respuesta }) {
      if (respuesta) {
        $('#modalEditarDeclara').modal('hide');
        $('#btnfiltrarda').click();
        $('#formEditarDeclaracionAnualSunat')[0].reset();
        Swal.fire({
          title: 'Editado!',
          text: '¡Se edito la declaracion correctamente!',
          icon: 'success',
          confirmButtonText: 'Ok',
        });
      } else {
        Swal.fire({
          title: 'Error!',
          text: '¡No se pudo editar la declaración!',
          icon: 'error',
          confirmButtonText: 'Ok',
        });
      }
    },
  });
});
