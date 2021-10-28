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
      $.each(respuesta, function (index, value) {
        $("#tblDeclaracionSunat")
          .DataTable()
          .row.add([
            `<abbr title="Declarar Fecha"><button class="btn btn-warning border" id="btnEditarDeclaracion" iddeclaracion="${value.iddeclaracionsunat}" fecha="${value.fechavencimiento}"><i class="far fa-calendar-check"></i></button></abbr>`,
            value.ruc,
            value.clientes,
            value.fechavencimiento,
            value.estado,
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
