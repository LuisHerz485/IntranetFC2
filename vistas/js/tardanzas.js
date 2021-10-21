$("#btnMostrar").on("click", function () {
  let formularioTardanzas = new FormData($("#frmlistarTardanzas")[0]);
  formularioTardanzas.append("opcion", "consultaTardanza");
  $.ajax({
    method: "POST",
    url: "ajax/reporte.ajax.php",
    cache: false,
    contentType: false,
    processData: false,
    data: formularioTardanzas,
    dataType: "json",
    success: function ({ respuesta }) {
      let tabla = $("#mostrarReporteTardanzas").DataTable();
      if (respuesta) {
        tabla.clear().draw();
        $.each(respuesta, function (index, value) {
          tabla.row
            .add([value.area, value.colaborador, value.numeroTardanzas])
            .draw(false);
        });
      } else {
        console.log(respuesta);
      }
    },
  });
});

$("#fecha_inicio").val(getFechaActual());
$("#fecha_fin").val(getFechaActual());
