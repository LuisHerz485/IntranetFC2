function montoFormato(monto) {
  return (
    "S./ " +
    parseFloat(monto)
      .toFixed(2)
      .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
  );
}

$(".btnIngreso").click(function () {
  $("#tablaIngresoMes").DataTable().clear().draw(false);
  var fecha_ingreso = $("#fecha_ingreso").val();
  var datos = new FormData();
  datos.append("fecha_ingreso", fecha_ingreso);
  $.ajax({
    url: "ajax/constancia.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      let ingresoAnual = 0;
      $.each(respuesta, function (index, value) {
        /* Vamos agregando a nuestra tabla las filas necesarias */
        ingresoAnual += parseFloat(value.monto);
        $("#tablaIngresoMes")
          .DataTable()
          .row.add([value.mes, montoFormato(value.monto)])
          .draw(false);
      });
      $("#TotalAnyo").text(montoFormato(ingresoAnual));
    },
    error: function (respuesta) {
      console.log("Error", respuesta);
    },
  });
});

$(".btnIngresoCliente").click(function () {
  $("#tablaIngresoCliente").DataTable().clear().draw(false);
  var idcliente = $("#idcliente").val();
  var fecha_anho = $("#fecha_anho").val();
  var datos = new FormData();
  datos.append("idcliente", idcliente);
  datos.append("fecha_anho", fecha_anho);
  $.ajax({
    url: "ajax/constancia.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      let ingresoAnual = 0;
      $.each(respuesta, function (index, value) {
        /* Vamos agregando a nuestra tabla las filas necesarias */
        ingresoAnual += parseFloat(value.monto);
        $("#tablaIngresoCliente")
          .DataTable()
          .row.add([value.mes, montoFormato(value.monto)])
          .draw(false);
      });
      $("#TotalAnyo").text(montoFormato(ingresoAnual));
    },
    error: function (respuesta) {
      console.log("Error", respuesta);
    },
  });
});

$(".btnIngresoRanking").click(function () {
  $("#tablaIngresoRanking").DataTable().clear().draw(false);
  var fecha_ranking = $("#fecha_ranking").val();
  var datos = new FormData();
  datos.append("fecha_ranking", fecha_ranking);
  $.ajax({
    url: "ajax/constancia.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      let min = { monto: Infinity, razonsocial: "" };
      let max = { monto: 0, razonsocial: "" };
      $.each(respuesta, function (index, value) {
        let monto = parseFloat(value.monto);
        if (min.monto > monto) {
          min.monto = monto;
          min.razonsocial = value.razonsocial;
        }
        if (max.monto < monto) {
          max.monto = monto;
          max.razonsocial = value.razonsocial;
        }
        $("#tablaIngresoRanking")
          .DataTable()
          .row.add([value.razonsocial, montoFormato(monto)])
          .draw(false);
      });
      $("#montomayor").text(max.razonsocial + " - " + montoFormato(max.monto));
      $("#montomenor").text(min.razonsocial + " - " + montoFormato(min.monto));
    },
    error: function (respuesta) {
      console.log("Error", respuesta);
    },
  });
});
