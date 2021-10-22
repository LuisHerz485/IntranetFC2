$(".btnEditarDetalle").click(function () {
  var codigo = $(this).attr("codigo");
  var fecha = $(this).attr("fecha");
  var datos = new FormData();
  datos.append("codigo", codigo);
  datos.append("fecha", fecha);
  $.ajax({
    url: "ajax/asistencia.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#estado option[value=" + respuesta["estado"] + "]").attr(
        "selected",
        true
      );
      $("#idasistencia").val(respuesta["idasistencia"]);
      $("#fecha").val(respuesta["fecha"]);
      $("#detalle").val(respuesta["detalle"]);
    },
    error: function (respuesta) {
      console.log("Error", respuesta);
    },
  });
});

$("#btnguardarHorario").on("click", function () {
  let formularioHorario = new FormData($("#formCambiarHorario")[0]);
  formularioHorario.append("opcion", "registrar");
  $.ajax({
    method: "POST",
    url: "ajax/horario.ajax.php",
    cache: false,
    contentType: false,
    processData: false,
    data: formularioHorario,
    dataType: "json",
    success: function ({ respuesta }) {
      if (respuesta) {
        $("#horainicio").attr("disabled", true);
        $("#horafin").attr("disabled", true);
        $("#btnCambiarHorario").removeAttr("disabled");
        Swal.fire({
          title: "Registrado!",
          text: "¡Se cambio a un Nuevo Horario!",
          icon: "success",
          confirmButtonText: "Ok",
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: "¡No se pudo cambiar el Horario!",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
});
