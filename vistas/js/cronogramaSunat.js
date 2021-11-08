$("#btnbuscar").on("click", function () {
  var datos = new FormData();
  datos.append("idano", $("#idano").val());
  datos.append("opcion", "ConsultarCronograma");
  $.ajax({
    url: "ajax/cronogramaSunat.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function ({ respuesta }) {
      $("#tblCronogramaSunat").DataTable().clear().draw();
      $.each(respuesta, function (index, value) {
        $("#tblCronogramaSunat")
          .DataTable()
          .row.add([
            value.mes,
            value.Ruc0,
            value.Ruc1,
            value.Ruc2y3,
            value.Ruc4y5,
            value.Ruc6y7,
            value.Ruc8y9,
          ])
          .draw(false);
      });
    },
    error: function ({ respuesta }) {
      console.log("Error", respuesta);
    },
  });
});

$("#btnbuscarAnio").on("click", function () {
  var datos = new FormData();
  datos.append("idAnual", $("#idAnual").val());
  datos.append("opcion", "ConsultarCronogramaAnual");
  $.ajax({
    url: "ajax/cronogramaAnualSunat.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function ({ respuesta }) {
      $("#tblCronogramaAnualSunat").DataTable().clear().draw();
      $.each(respuesta, function (index, value) {
        $("#tblCronogramaAnualSunat")
          .DataTable()
          .row.add([
            value.digitoruc,
            value.fechavencimiento,
          ])
          .draw(false);
      });
    },
    error: function ({ respuesta }) {
      console.log("Error", respuesta);
    },
  });
});

