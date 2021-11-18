const IGV = 0.18;

const agregarDecimales = function (monto = 0) {
  return Number(Number(monto).toFixed(3));
};

const calcularIGVNeto = function (montoBruto, idIGV, idNeto) {
  let bruto = agregarDecimales(montoBruto);
  let brutoXigv = agregarDecimales(bruto * IGV);
  $(idIGV).val(brutoXigv).trigger("change");
  $(idNeto)
    .val(agregarDecimales(bruto + brutoXigv))
    .trigger("change");
};

const calcularNeto = function (montoBruto, idNeto) {
  $(idNeto).val(agregarDecimales(montoBruto)).trigger("change");
};

const sumaArrayMonto = function (ids, idTotal) {
  let total = 0;
  for (let index = 0; index < ids.length; index++) {
    total += agregarDecimales($(ids[index]).val());
  }
  $(idTotal).val(agregarDecimales(total)).trigger("change");
};

function montoRedondeado(monto) {
  return (
    "S./ " +
    parseFloat(monto)
      .toFixed(0)
      .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
  );
}
function mesNombre(fecha) {
  let meses = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ];
  return meses[parseFloat(fecha)];
}

function limpiarform() {
  $("#frmliquidaciones")[0].reset();
  $("#mestres").text("-");
  $("#mesactualCantidadImpuesto").text("S./ 0");
  $("#mesactualCantidadRenta").text("S./ 0");
  $("#mesdos").text("-");
  $("#mesdosCantidadImpuesto").text("S./ 0");
  $("#mesdosCantidadRenta").text("S./ 0");
  $("#mesuno").text("-");
  $("#mesunoCantidadImpuesto").text("S./ 0");
  $("#mesunoCantidadRenta").text("S./ 0");
}

$(".solo-numeros")
  .keypress(function (event) {
    if (this.value.length >= 12) {
      return false;
    }
    return /^[0-9.\-]+$/u.test(event.key);
  })
  .change(function (event) {
    let btn = $(this);
    if (btn.attr("tieneIGV") === "true") {
      calcularIGVNeto(btn.val(), btn.attr("idIGV"), btn.attr("idNeto"));
    } else {
      calcularNeto(btn.val(), btn.attr("idNeto"));
    }
  });

$(".suma-montos").change(function (event) {
  let btn = $(this);
  sumaArrayMonto(btn.attr("ids").split(","), btn.attr("idTotal"));
});

$(".resta-dos-numeros").change(function (event) {
  let btn = $(this);
  $(btn.attr("idResultado"))
    .val(
      agregarDecimales($(btn.attr("idIzq")).val() - $(btn.attr("idDer")).val())
    )
    .trigger("change");
});
$("#coeficiente").change(function () {
  $("#ingreso_neto").trigger("change");
});

$("#ingreso_neto").change(function () {
  let valor = agregarDecimales($(this).val());
  let porcentaje = agregarDecimales($("#coeficiente").val());
  let resultado = agregarDecimales(valor * porcentaje);
  $("#ingresos_netos").val(valor);
  $("#ingreso_resultante").val(resultado);
});

$("#saldo_afavor").change(function () {
  let valor = agregarDecimales($(this).val());
  if (valor < 0) {
    valor = agregarDecimales(0);
  }
  $("#importe_apagar").val(valor).trigger("change");
});

$("#importe_apagar").change(function () {
  let valor = $(this).val();
  let formato = montoRedondeado(valor);
  $("#impuesto_general_ventas").text(formato);
});

$("#impuesto_renta").change(function () {
  let valor = agregarDecimales($(this).val());
  if (valor < 0) {
    valor = agregarDecimales(0);
  }
  let formato = montoRedondeado(valor);
  $("#impuesto_rentaTotal").text(formato);
});
$("#ingreso_netototalvalor").change(function () {
  let valor = agregarDecimales($(this).val());
  let formato = montoRedondeado(valor);
  $("#ingreso_netototal").val(formato);
});
$("#total_comprastotalvalor").change(function () {
  let valor = agregarDecimales($(this).val());
  let formato = montoRedondeado(valor);
  $("#total_comprastotal").val(formato);
});

$("#total_impuesto").change(function () {
  let valor = agregarDecimales($(this).val());
  let formato = montoRedondeado(valor);
  $("#total_impuestovalor").val(formato);
});

$("#importe_apagar").change(function () {
  let valor = agregarDecimales($(this).val());
  let formato = montoRedondeado(valor);
  $("#importe_apagar2").val(formato);
});

$("#idcliente_liquidacion")
  .change(function () {
    let element = $(this).find("option:selected");
    $("#coeficiente").val(element.attr("coeficiente"));
    $("#idregimen").val(element.attr("idregimen"));
    $("#nombreRegimen").text(element.attr("nombreregimen"));
  })
  .trigger("change");

$("#btnRegistrarLiquidacion").on("click", function () {
  let form = new FormData($("#frmliquidaciones").get(0));
  form.append("opcion", "registrarLiquidacion");
  $.ajax({
    method: "POST",
    url: "ajax/liquidaciones.ajax.php",
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function ({ respuesta }) {
      if (respuesta) {
        Swal.fire({
          title: "Registrado!",
          text: "¡Registro de Liquidacion correctamente!",
          icon: "success",
          confirmButtonText: "Ok",
        });
        limpiarform();
      } else {
        Swal.fire({
          title: "Error!",
          text: "¡No se pudo Registrar la Liquidacion!",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
});

$("#btnEditarLiquidacion").on("click", function () {
  $("#btnRegistrarLiquidacion").removeClass("d-none");
  $("#btnEditarLiquidacion").addClass("d-none");
  let form = new FormData($("#frmliquidaciones").get(0));
  form.append("opcion", "editarLiquidacion");
  $.ajax({
    method: "POST",
    url: "ajax/liquidaciones.ajax.php",
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function ({ respuesta }) {
      if (respuesta) {
        Swal.fire({
          title: "Editado!",
          text: "¡Se Edito el Liquidacion correctamente!",
          icon: "success",
          confirmButtonText: "Ok",
        });
        limpiarform();
      } else {
        Swal.fire({
          title: "Error!",
          text: "¡No se pudo Editar la Liquidacion!",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
});
$(".buscar-meses-anteriores").on("change", function () {
  let periodo = $("#periodo").val();
  let idcliente = $("#idcliente_liquidacion").val();
  $("#mesuno").text("-");
  $("#mesdos").text("-");
  $("#mestres").text("-");
  $("#mesunoCantidadImpuesto").text(montoRedondeado(0));
  $("#mesdosCantidadImpuesto").text(montoRedondeado(0));
  $("#mesactualCantidadImpuesto").text(montoRedondeado(0));
  $("#mesunoCantidadRenta").text(montoRedondeado(0));
  $("#mesdosCantidadRenta").text(montoRedondeado(0));
  $("#mesactualCantidadRenta").text(montoRedondeado(0));
  $("#saldo_afavor_anterior").val(0);
  if (periodo && idcliente) {
    $.ajax({
      type: "POST",
      url: "ajax/liquidaciones.ajax.php",
      data: {
        periodo: periodo,
        idcliente: idcliente,
        opcion: "listarResumenMeses",
      },
      dataType: "json",
      success: function ({ respuesta }) {
        console.log(respuesta);
        $("#mestres").text(respuesta[0].mes);
        $("#mesactualCantidadImpuesto").text(
          montoRedondeado(respuesta[0].impuesto_igv)
        );
        $("#mesactualCantidadRenta").text(
          montoRedondeado(respuesta[0].impuesto_renta)
        );
        $("#mesdos").text(respuesta[1].mes);
        $("#mesdosCantidadImpuesto").text(
          montoRedondeado(respuesta[1].impuesto_igv)
        );
        $("#mesdosCantidadRenta").text(
          montoRedondeado(respuesta[1].impuesto_renta)
        );
        $("#saldo_afavor_anterior")
          .val(respuesta[1].impuesto_igv)
          .trigger("change");
        $("#mesuno").text(respuesta[2].mes);
        $("#mesunoCantidadImpuesto").text(
          montoRedondeado(respuesta[2].impuesto_igv)
        );
        $("#mesunoCantidadRenta").text(
          montoRedondeado(respuesta[2].impuesto_renta)
        );
      },
    });
  }
});

$("#btnBuscarLiquidaciones").on("click", function () {
  let form = new FormData($("#frmliquidacionesFiltrar")[0]);
  form.append("opcion", "buscarLiquidacionxMes");
  $.ajax({
    method: "POST",
    url: "ajax/liquidaciones.ajax.php",
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function ({ respuesta }) {
      $("#tablaLiquidaciones").DataTable().clear().draw();
      $.each(respuesta, function (index, value) {
        $("#tablaLiquidaciones")
          .DataTable()
          .row.add([
            `<div class="row justify-content-center"><abbr title="Editar"><form method="POST" action="liquidaciones" target="_blank"><input type="hidden" name="id_liquidacion" value="${value.id_liquidacion}" /><button type="submit" class="btn btn-outline-warning mx-1"><i class="fas fa-edit"></i></button></form></abbr>
            <abbr title="Exportar PDF"><form method="POST" action="ajax/generarLiquidicionPDF.php" target="_blank" ><input type="hidden" name="id_liquidacion" value="${value.id_liquidacion}" /><button type="submit" class="btn btn-outline-danger mx-1"><i class="fas fa-file-pdf"></i></button></form></abbr>
            <abbr title="Revisión"><button type="button" class="btn btn-outline-primary btn-revisado" idliquidacion="${value.id_liquidacion}"><i class="fas fa-clipboard-check"></i></button></abbr></div>
            `,
            value.razonsocial,
            montoRedondeado(
              parseFloat(value.ingreso_neto) * 0.18 +
                parseFloat(value.ingreso_neto)
            ),
            montoRedondeado(value.saldo_afavor),
            value.nombreregimen,
            montoRedondeado(value.impuesto_resultante),
            montoRedondeado(value.saldo_afavor_renta),
            montoRedondeado(value.impuesto_renta),
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

$(document).on("click", ".btn-revisado", function () {
  console.log($(this).attr("idliquidacion"));
  let datos = {
    opcion: "RegistrarRevision",
    id_liquidacion: $(this).attr("idliquidacion"),
  };
  Swal.fire({
    title: "¿Seguro que desea marcarlo como revisado?",
    showCancelButton: true,
    confirmButtonText: `Si`,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "ajax/liquidaciones.ajax.php",
        data: datos,
        dataType: "json",
        success: function ({ respuesta }) {
          if (respuesta) {
            Swal.fire({
              title: "REVISADO!",
              text: "¡Se reviso correctamente el documento!",
              icon: "success",
              confirmButtonText: "Ok",
            });
          } else {
            Swal.fire({
              title: "Error!",
              text: "¡No se pudo revisar correctamente el documento!",
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    }
  });
});

if (idliquidacion_recibido) {
  $("#btnRegistrarLiquidacion").addClass("d-none");
  $("#btnEditarLiquidacion").removeClass("d-none");
  let datos = {
    id_liquidacion: idliquidacion_recibido,
    opcion: "buscarLiquidacion",
  };
  $.ajax({
    type: "POST",
    url: "ajax/liquidaciones.ajax.php",
    data: datos,
    dataType: "json",
    success: function ({ respuesta }) {
      if (respuesta) {
        $("#idliquidacion").val(idliquidacion_recibido).trigger("change");
        $("#periodo")
          .val(respuesta[0].periodo.substring(0, 7))
          .trigger("change");
        $("#idcliente_liquidacion")
          .val(respuesta[0].idcliente)
          .trigger("change");
        $("#fechavencimiento")
          .val(respuesta[0].fechavencimiento)
          .trigger("change");
        $("#ventas_netas").val(respuesta[0].ventas_netas).trigger("change");
        $("#ventas_no_gravadas")
          .val(respuesta[0].ventas_no_gravadas)
          .trigger("change");
        $("#exportaciones_facturada")
          .val(respuesta[0].exportaciones_facturada)
          .trigger("change");
        $("#exportaciones_embarcadas")
          .val(respuesta[0].exportaciones_embarcadas)
          .trigger("change");
        $("#nota_debito").val(respuesta[0].nota_debito).trigger("change");
        $("#nota_credito").val(respuesta[0].nota_credito).trigger("change");
        $("#comp_nacion_grava")
          .val(respuesta[0].comp_nacion_grava)
          .trigger("change");
        $("#comp_importa_grava")
          .val(respuesta[0].comp_importa_grava)
          .trigger("change");
        $("#comp_nacion_no_grava")
          .val(respuesta[0].comp_nacion_no_grava)
          .trigger("change");
        $("#comp_importa_no_grava")
          .val(respuesta[0].comp_importa_no_grava)
          .trigger("change");
        $("#coeficiente").val(respuesta[0].coeficiente).trigger("change");
        $("#saldo_afavor_renta")
          .val(respuesta[0].saldo_afavor_renta)
          .trigger("change");
        $("#pagos_previos").val(respuesta[0].pagos_previos).trigger("change");
        $("#ventas_netas").val(respuesta[0].ventas_netas).trigger("change");
        $("#ventas_netas").val(respuesta[0].ventas_netas).trigger("change");
      }
    },
  });
}
