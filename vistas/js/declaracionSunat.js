$("#btnfiltrar").on("click", function () {
  let formularioDeclaracion = new FormData($("#fomularioFiltroDeclaracion")[0]);
  formularioDeclaracion.append("opcion", "ConsultarDeclaracion");
  $.ajax({
    url: "ajax/declaracionSunat.ajax.php",
    method: "POST",
    data: formularioDeclaracion,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function ({ respuesta }) {
      $("#tblDeclaracionSunat").DataTable().clear().draw();
      let rowestado;
      let rowopcion;
      $.each(respuesta, function (index, value) {
        if (value.estado === null) {
          rowopcion = `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="btnEditarDeclaracion"  iddeclaracion="${value.iddeclaracionsunat}" fecha="${value.fechavencimiento}"><i class="far fa-calendar-check"></i></button></abbr>`;
          rowestado = `<h3><span class="badge badge-primary">Pendiente</span></h3>`;
        } else if (value.estado == "Dentro de plazo") {
          rowopcion = `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="btnEditarDeclaracion" iddetalledeclaracion="${value.iddetalledeclaracionsunat}" iddeclaracion="${value.iddeclaracionsunat}" fecha="${value.fechavencimiento}" disabled><i class="far fa-calendar-check"></i></button></abbr>`;
          rowestado = `<h3><span class="badge badge-success">${value.estado}</span></h3>`;
        } else if (value.estado == "Fuera de plazo") {
          rowopcion = `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="btnEditarDeclaracion" iddetalledeclaracion="${value.iddetalledeclaracionsunat}"  iddeclaracion="${value.iddeclaracionsunat}" fecha="${value.fechavencimiento}" disabled><i class="far fa-calendar-check"></i></button></abbr>`;
          rowestado = `<h3><span class="badge badge-danger">${value.estado}</span></h3>`;
        }
        $("#tblDeclaracionSunat")
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
      console.log("Error", respuesta);
    },
  });
});
$("#mesanyo").val(getFechaMes());
$(document).on("click", "#btnEditarDeclaracion", function () {
  $("#iddeclaracionS").val($(this).attr("iddeclaracion"));
  $("#fechavencimiento").val($(this).attr("fecha"));
  $("#modalFechaDeclara").modal("show");
});

$("#btnRegistrarDeclaracion").on("click", function () {
  let formulariodeclaracion = new FormData($("#formEditarDeclaracionSunat")[0]);
  formulariodeclaracion.append("opcion", "registrar");
  $.ajax({
    method: "POST",
    url: "ajax/declaracionSunat.ajax.php",
    cache: false,
    contentType: false,
    processData: false,
    data: formulariodeclaracion,
    dataType: "json",
    success: function ({ respuesta }) {
      if (respuesta) {
        $("#modalFechaDeclara").modal("hide");
        $("#btnfiltrar").click();
        $("#formEditarDeclaracionSunat")[0].reset();
        Swal.fire({
          title: "Registrado!",
          text: "¡Se registro la declaracion correctamente!",
          icon: "success",
          confirmButtonText: "Ok",
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: "¡No se pudo registrar la declaracion!",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
});

$("#btnfiltrarCliente").on("click", function () {
  let formularioDeclaracioncliente = new FormData(
    $("#fomularioFiltroDeclaracionClientes")[0]
  );
  formularioDeclaracioncliente.append("opcion", "ConsultarDeclaracionClientes");
  $.ajax({
    url: "ajax/declaracionSunat.ajax.php",
    method: "POST",
    data: formularioDeclaracioncliente,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function ({ respuesta }) {
      $("#tblReporteDeclaracionSunat").DataTable().clear().draw();
      $.each(respuesta, function (index, value) {
        if (value.estado === null) {
          rowestado = `<h3><span class="badge badge-primary">Pendiente</span></h3>`;
        } else if (value.estado == "Dentro de plazo") {
          rowestado = `<h3><span class="badge badge-success">${value.estado}</span></h3>`;
        } else if (value.estado == "Fuera de plazo") {
          rowestado = `<h3><span class="badge badge-danger">${value.estado}</span></h3>`;
        }
        $("#tblReporteDeclaracionSunat")
          .DataTable()
          .row.add([
            value.mes,
            value.fechavencimiento,
            rowestado,
            value.fechadeclarada,
            value.numOrden,
          ])
          .draw(false);
      });
    },
    error: function ({ respuesta }) {
      console.log("Error", respuesta);
    },
  });
});
