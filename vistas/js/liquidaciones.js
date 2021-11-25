const IGV = 0.18;

const redondear = function (monto = 0) {
  return Number(Number(monto).toFixed(3));
};

const getIGV = function (monto = 0) {
  return redondear(monto * IGV);
};

const calcularIGVNeto = function (idBruto, idIGV, idNeto) {
  let bruto = redondear($(idBruto).val());
  let igv = getIGV(bruto);
  let neto = redondear(bruto + igv);
  $(idIGV).val(igv).trigger('change');
  $(idNeto).val(neto).trigger('change');
};

const calcularNeto = function (idBruto, idNeto) {
  let bruto = redondear($(idBruto).val());
  $(idNeto).val(bruto).trigger('change');
};

const getSumaArrayMonto = function (ids) {
  let total = 0;
  for (let index = 0; index < ids.length; index++) {
    total += redondear($(ids[index]).val());
  }
  return redondear(total);
};

const sumaArrayMonto = function (ids, idTotal) {
  $(idTotal).val(getSumaArrayMonto(ids)).trigger('change');
};

const restaDosMontos = function (idIzq, idDer, idResultado) {
  let resultado = redondear($(idIzq).val()) - redondear($(idDer).val());
  $(idResultado).val(redondear(resultado)).trigger('change');
};

const multiplicacionDosMontos = function (idIzq, idDer, idResultado) {
  let resultado = redondear($(idIzq).val()) * redondear($(idDer).val());
  $(idResultado).val(redondear(resultado)).trigger('change');
};

function formatoMonto(monto = 0) {
  return (
    'S./ ' +
    parseFloat(monto)
      .toFixed(0)
      .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  );
}

//INGRESO
$('#ventas_netas').on('change', function () {
  calcularIGVNeto('#ventas_netas', '#ventas_netas_igv', '#ventas_netas_total');
  sumaArrayMonto(
    [
      '#ventas_netas',
      '#ventas_no_gravadas',
      '#exportaciones_facturada',
      '#exportaciones_embarcadas',
      '#nota_debito',
    ],
    '#ingreso_bruto'
  );
});

$('#ventas_no_gravadas').on('change', function () {
  calcularNeto('#ventas_no_gravadas', '#ventas_no_gravadas_total');
  sumaArrayMonto(
    [
      '#ventas_netas',
      '#ventas_no_gravadas',
      '#exportaciones_facturada',
      '#exportaciones_embarcadas',
      '#nota_debito',
    ],
    '#ingreso_bruto'
  );
});

$('#exportaciones_facturada').on('change', function () {
  calcularNeto('#exportaciones_facturada', '#exportaciones_facturada_total');
  sumaArrayMonto(
    [
      '#ventas_netas',
      '#ventas_no_gravadas',
      '#exportaciones_facturada',
      '#exportaciones_embarcadas',
      '#nota_debito',
    ],
    '#ingreso_bruto'
  );
});

$('#exportaciones_embarcadas').on('change', function () {
  calcularNeto('#exportaciones_embarcadas', '#exportaciones_embarcadas_total');
  sumaArrayMonto(
    [
      '#ventas_netas',
      '#ventas_no_gravadas',
      '#exportaciones_facturada',
      '#exportaciones_embarcadas',
      '#nota_debito',
    ],
    '#ingreso_bruto'
  );
});

$('#nota_debito').on('change', function () {
  calcularIGVNeto('#nota_debito', '#nota_debito_igv', '#nota_debito_total');
  sumaArrayMonto(
    [
      '#ventas_netas',
      '#ventas_no_gravadas',
      '#exportaciones_facturada',
      '#exportaciones_embarcadas',
      '#nota_debito',
    ],
    '#ingreso_bruto'
  );
});

$('#ingreso_bruto').on('change', function () {
  sumaArrayMonto(
    ['#ventas_netas_igv', '#nota_debito_igv'],
    '#ingreso_bruto_igv'
  );
  sumaArrayMonto(
    [
      '#ventas_netas_total',
      '#ventas_no_gravadas_total',
      '#exportaciones_facturada_total',
      '#exportaciones_embarcadas_total',
      '#nota_debito_total',
    ],
    '#ingreso_bruto_total'
  );
  restaDosMontos('#ingreso_bruto', '#nota_credito', '#ingreso_neto');
  restaDosMontos(
    '#ingreso_bruto_igv',
    '#nota_credito_igv',
    '#ingreso_neto_igv'
  );
  restaDosMontos(
    '#ingreso_bruto_total',
    '#nota_credito_total',
    '#ingreso_neto_total'
  );
});

$('#nota_credito').on('change', function () {
  calcularIGVNeto('#nota_credito', '#nota_credito_igv', '#nota_credito_total');
  restaDosMontos('#ingreso_bruto', '#nota_credito', '#ingreso_neto');
  restaDosMontos(
    '#ingreso_bruto_igv',
    '#nota_credito_igv',
    '#ingreso_neto_igv'
  );
  restaDosMontos(
    '#ingreso_bruto_total',
    '#nota_credito_total',
    '#ingreso_neto_total'
  );
});

//COMPRAS
$('#comp_nacion_grava').on('change', function () {
  calcularIGVNeto(
    '#comp_nacion_grava',
    '#comp_nacion_grava_igv',
    '#comp_nacion_grava_total'
  );
  sumaArrayMonto(
    [
      '#comp_nacion_grava',
      '#comp_importa_grava',
      '#comp_nacion_no_grava',
      '#comp_importa_no_grava',
    ],
    '#total_compras'
  );
});

$('#comp_importa_grava').on('change', function () {
  calcularIGVNeto(
    '#comp_importa_grava',
    '#comp_importa_grava_igv',
    '#comp_importa_grava_total'
  );
  sumaArrayMonto(
    [
      '#comp_nacion_grava',
      '#comp_importa_grava',
      '#comp_nacion_no_grava',
      '#comp_importa_no_grava',
    ],
    '#total_compras'
  );
});

$('#comp_nacion_no_grava').on('change', function () {
  calcularNeto('#comp_nacion_no_grava', '#comp_nacion_no_grava_total');
  sumaArrayMonto(
    [
      '#comp_nacion_grava',
      '#comp_importa_grava',
      '#comp_nacion_no_grava',
      '#comp_importa_no_grava',
    ],
    '#total_compras'
  );
});

$('#comp_importa_no_grava').on('change', function () {
  calcularNeto('#comp_importa_no_grava', '#comp_importa_no_grava_total');
  sumaArrayMonto(
    [
      '#comp_nacion_grava',
      '#comp_importa_grava',
      '#comp_nacion_no_grava',
      '#comp_importa_no_grava',
    ],
    '#total_compras'
  );
});

$('#total_compras').on('change', function () {
  sumaArrayMonto(
    ['#comp_nacion_grava_igv', '#comp_importa_grava_igv'],
    '#total_compras_igv'
  );
  sumaArrayMonto(
    [
      '#comp_nacion_grava_total',
      '#comp_importa_grava_total',
      '#comp_nacion_no_grava_total',
      '#comp_importa_no_grava_total',
    ],
    '#total_compras_total'
  );
});

//

$('#ingreso_neto_igv').on('change', function () {
  restaDosMontos('#ingreso_neto_igv', '#total_compras_igv', '#total_impuesto');
});

$('#total_compras_igv').on('change', function () {
  restaDosMontos('#ingreso_neto_igv', '#total_compras_igv', '#total_impuesto');
});

$('#total_impuesto').on('change', function () {
  $('#total_impuesto_formato').val(formatoMonto(this.value));
  sumaArrayMonto(
    ['#total_impuesto', '#saldo_afavor_anterior'],
    '#saldo_afavor'
  );
});

$('#saldo_afavor_anterior').on('change', function () {
  sumaArrayMonto(
    ['#total_impuesto', '#saldo_afavor_anterior'],
    '#saldo_afavor'
  );
});

$('#saldo_afavor').on('change', function () {
  let saldoafavor = redondear(this.value);
  if (saldoafavor > 0) {
    let sumatoria = getSumaArrayMonto([
      '#percepciones_periodo',
      '#percepciones_periodo_ant',
      '#saldo_percepciones_no_apl',
      '#retenciones_declaradas',
      '#retenciones_declaradas_ant',
      '#saldo_retenciones_no_apl',
      '#pagos_previos_compras',
    ]);
    $('#igv_a_pagar')
      .val(redondear(saldoafavor - sumatoria))
      .trigger('change');
    $('#importe_apagar')
      .val(redondear(saldoafavor - sumatoria))
      .trigger('change');
  } else {
    $('#igv_a_pagar').val(saldoafavor).trigger('change');
    $('#importe_apagar').val(0).trigger('change');
  }
});

$('#percepciones_periodo').on('change', function () {
  $('#saldo_afavor').trigger('change');
});

$('#percepciones_periodo_ant').on('change', function () {
  $('#saldo_afavor').trigger('change');
});

$('#saldo_percepciones_no_apl').on('change', function () {
  $('#saldo_afavor').trigger('change');
});

$('#retenciones_declaradas').on('change', function () {
  $('#saldo_afavor').trigger('change');
});

$('#retenciones_declaradas_ant').on('change', function () {
  $('#saldo_afavor').trigger('change');
});

$('#saldo_retenciones_no_apl').on('change', function () {
  $('#saldo_afavor').trigger('change');
});

$('#pagos_previos_compras').on('change', function () {
  $('#saldo_afavor').trigger('change');
});

//

$('#ingreso_neto').on('change', function () {
  $('#ingresos_netos').val(this.value).trigger('change');
});

$('#ingresos_netos').on('change', function () {
  multiplicacionDosMontos(
    '#ingresos_netos',
    '#coeficiente',
    '#ingreso_resultante'
  );
});

$('#coeficiente').on('change', function () {
  multiplicacionDosMontos(
    '#ingresos_netos',
    '#coeficiente',
    '#ingreso_resultante'
  );
});

$('#ingreso_resultante').on('change', function () {
  $('#impuesto_renta').val(this.value).trigger('change');
  sumaArrayMonto(
    ['#ingreso_resultante', '#saldo_afavor_renta'],
    '#tributo_apagar_renta'
  );
});

$('#saldo_afavor_renta').on('change', function () {
  sumaArrayMonto(
    ['#ingreso_resultante', '#saldo_afavor_renta'],
    '#tributo_apagar_renta'
  );
});

$('#tributo_apagar_renta').on('change', function () {
  let monto = redondear($('#tributo_apagar_renta').val());
  if (monto < 0) {
    $('#impuesto_renta').val(0).trigger('change');
  } else {
    sumaArrayMonto(
      ['#tributo_apagar_renta', '#pagos_previos'],
      '#impuesto_renta'
    );
  }
});

$('#pagos_previos').on('change', function () {
  let monto = redondear($('#tributo_apagar_renta').val());
  if (monto < 0) {
    $('#impuesto_renta').val(0).trigger('change');
  } else {
    sumaArrayMonto(
      ['#tributo_apagar_renta', '#pagos_previos'],
      '#impuesto_renta'
    );
  }
});

//Formato

$('#ingreso_neto_total').on('change', function () {
  $('#ingreso_neto_formato').val(formatoMonto(this.value));
});

$('#total_compras_total').on('change', function () {
  $('#total_compras_formato').val(formatoMonto(this.value));
});

$('#importe_apagar').on('change', function () {
  let monto = formatoMonto(this.value);
  $('#importe_apagar_formato').val(monto);
  $('#impuesto_general_ventas_text').text(monto);
  $('#impuesto_general_ventas').val(this.value);
});

$('#impuesto_renta').on('change', function () {
  $('#impuesto_renta_total_text').text(formatoMonto(this.value));
  $('#impuesto_renta_total').val(this.value);
});

//
const crearBarChartLiquidacion = function (data) {
  let label = [],
    data_renta = [],
    data_igv = [];
  for (let { mes, impuesto_renta, impuesto_igv } of data) {
    label.unshift(mes);
    data_renta.unshift(impuesto_renta);
    data_igv.unshift(impuesto_igv);
  }
  window['graficoLiquidacion'] = new Chart(
    $('#barChart').get(0).getContext('2d'),
    {
      type: 'bar',
      data: {
        labels: label,
        datasets: [
          {
            label: 'IMPUESTO GENERAL A LAS VENTAS - IGV',
            backgroundColor: '#4F81BD',
            borderColor: '#4F81BD',
            pointRadius: false,
            pointColor: '#4F81BD',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: '#c1c7d1',
            data: data_igv,
          },
          {
            label: 'IMPUESTO A LA RENTA MYPE TRIBUTARIO',
            backgroundColor: '#C0504D',
            borderColor: '#C0504D',
            pointRadius: false,
            pointColor: '#C0504D',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: '#c1c7d1',
            data: data_renta,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
      },
    }
  );
};

const limpiarResumenLiquidacion = function () {
  $('#mesActual_text').text('-');
  $('#mesAnterior_text').text('-');
  $('#mesPasadoAnterior_text').text('-');
  $('#mesActual').val('-');
  $('#mesAnterior').val('-');
  $('#mesPasadoAnterior').val('-');

  $('#mesActualImpuesto_text').text(formatoMonto(0));
  $('#mesAnteriorImpuesto_text').text(formatoMonto(0));
  $('#mesPasadoAnteriorImpuesto_text').text(formatoMonto(0));
  $('#mesActualImpuesto').val(formatoMonto(0));
  $('#mesAnteriorImpuesto').val(formatoMonto(0));
  $('#mesPasadoAnteriorImpuesto').val(formatoMonto(0));

  $('#mesActualRenta_text').text(formatoMonto(0));
  $('#mesAnteriorRenta_text').text(formatoMonto(0));
  $('#mesPasadoAnteriorRenta_text').text(formatoMonto(0));
  $('#mesActualRenta').val(formatoMonto(0));
  $('#mesAnteriorRenta').val(formatoMonto(0));
  $('#mesPasadoAnteriorRenta').val(formatoMonto(0));

  if (window['graficoLiquidacion'] && window['graficoLiquidacion']['canvas']) {
    window['graficoLiquidacion'].clear();
    window['graficoLiquidacion'].destroy();
  }
};

const limpiarTodo = function () {
  $('#frmliquidaciones').get(0).reset();
  $('#impuesto_general_ventas_text').text(formatoMonto(0));
  $('#impuesto_general_ventas').val(0);
  $('#impuesto_renta_total_text').text(formatoMonto(0));
  $('#impuesto_renta_total').val(0);
  $('#idcliente_liquidacion').val(null).trigger('change');
  $('#elaborador').val(null);
  $('#revisor').val(null);
  $('#razonsocial').val(null);
  $('#ruc').val(null);
  $('#ingreso_neto_total').val(0).trigger('change');
  $('#total_compras_total').val(0).trigger('change');
  $('#total_impuesto').val(0).trigger('change');
  $('#importe_apagar').val(0).trigger('change');
  $('#nombreregimen_text').text('< Escoja un cliente>');
  limpiarResumenLiquidacion();
};

$('#idcliente_liquidacion')
  .change(function () {
    let element = $(this).find('option:selected');
    $('#coeficiente').val(element.attr('coeficiente'));
    $('#idregimen').val(element.attr('idregimen'));
    $('#nombreregimen_text').text(element.attr('nombreregimen'));
    $('#nombreregimen').val(element.attr('nombreregimen'));
  })
  .trigger('change');

$('#btnRegistrarLiquidacion').on('click', function () {
  let form = new FormData($('#frmliquidaciones').get(0));
  form.append('opcion', 'registrarLiquidacion');
  $.ajax({
    method: 'POST',
    url: 'ajax/liquidaciones.ajax.php',
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function ({ respuesta }) {
      if (respuesta) {
        Swal.fire({
          title: 'Registrado!',
          text: '¡Registro de Liquidacion correctamente!',
          icon: 'success',
          confirmButtonText: 'Ok',
        });
        limpiarTodo();
      } else {
        Swal.fire({
          title: 'Error!',
          text: '¡No se pudo Registrar la Liquidacion!',
          icon: 'error',
          confirmButtonText: 'Ok',
        });
      }
    },
  });
});

$(document).on('click', '.btn-revisado', function () {
  let datos = {
    opcion: 'RegistrarRevision',
    id_liquidacion: $(this).attr('idliquidacion'),
  };
  Swal.fire({
    title: '¿Seguro que desea marcarlo como revisado?',
    showCancelButton: true,
    confirmButtonText: `Si`,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST',
        url: 'ajax/liquidaciones.ajax.php',
        data: datos,
        dataType: 'json',
        success: function ({ respuesta }) {
          if (respuesta) {
            $('#btnBuscarLiquidaciones').trigger('click');
            Swal.fire({
              title: 'REVISADO!',
              text: '¡Se reviso correctamente el documento!',
              icon: 'success',
              confirmButtonText: 'Ok',
            });
          } else {
            Swal.fire({
              title: 'Error!',
              text: '¡No se pudo revisar correctamente el documento!',
              icon: 'error',
              confirmButtonText: 'Ok',
            });
          }
        },
      });
    }
  });
});

$('.buscar-meses-anteriores').on('change', function () {
  let periodo = $('#periodo').val();
  let idcliente = $('#idcliente_liquidacion').val();
  limpiarResumenLiquidacion();
  if (periodo && idcliente) {
    $.ajax({
      type: 'POST',
      url: 'ajax/liquidaciones.ajax.php',
      data: {
        periodo: periodo,
        idcliente: idcliente,
        opcion: 'listarResumenMeses',
      },
      dataType: 'json',
      success: function ({ respuesta }) {
        $('#mesActual_text').text(respuesta[0]['mes']);
        $('#mesAnterior_text').text(respuesta[1]['mes']);
        $('#mesPasadoAnterior_text').text(respuesta[2]['mes']);
        $('#mesActual').val(respuesta[0]['mes']);
        $('#mesAnterior').val(respuesta[1]['mes']);
        $('#mesPasadoAnterior').val(respuesta[2]['mes']);

        $('#mesActualImpuesto_text').text(
          formatoMonto(respuesta[0]['impuesto_igv'])
        );
        $('#mesAnteriorImpuesto_text').text(
          formatoMonto(respuesta[1]['impuesto_igv'])
        );
        $('#mesPasadoAnteriorImpuesto_text').text(
          formatoMonto(respuesta[2]['impuesto_igv'])
        );
        $('#mesActualImpuesto').val(formatoMonto(respuesta[0]['impuesto_igv']));
        $('#mesAnteriorImpuesto').val(
          formatoMonto(respuesta[1]['impuesto_igv'])
        );
        $('#mesPasadoAnteriorImpuesto').val(
          formatoMonto(respuesta[2]['impuesto_igv'])
        );

        $('#mesActualRenta_text').text(
          formatoMonto(respuesta[0]['impuesto_renta'])
        );
        $('#mesAnteriorRenta_text').text(
          formatoMonto(respuesta[1]['impuesto_renta'])
        );
        $('#mesPasadoAnteriorRenta_text').text(
          formatoMonto(respuesta[2]['impuesto_renta'])
        );
        $('#mesActualRenta').val(formatoMonto(respuesta[0]['impuesto_renta']));
        $('#mesAnteriorRenta').val(
          formatoMonto(respuesta[1]['impuesto_renta'])
        );
        $('#mesPasadoAnteriorRenta').val(
          formatoMonto(respuesta[2]['impuesto_renta'])
        );

        crearBarChartLiquidacion(respuesta);
      },
    });
  }
});

$('#btnBuscarLiquidaciones').on('click', function () {
  let form = new FormData($('#frmliquidacionesFiltrar')[0]);
  form.append('opcion', 'buscarLiquidacionxMes');
  $.ajax({
    method: 'POST',
    url: 'ajax/liquidaciones.ajax.php',
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function ({ respuesta }) {
      let tbl = $('#tablaLiquidaciones').DataTable();
      tbl.clear().draw();
      $.each(respuesta, function (index, value) {
        tbl.row
          .add([
            `<div class="row justify-content-center"><abbr title="Editar"><form method="POST" action="liquidaciones" target="_blank"><input type="hidden" name="id_liquidacion" value="${
              value.id_liquidacion
            }" /><button type="submit" class="btn btn-outline-warning mx-1"><i class="fas fa-edit"></i></button></form></abbr> 
            ${
              canEdit
                ? `<abbr title="Revisión"><button type="button" class="btn btn-outline-primary btn-revisado" idliquidacion="${value.id_liquidacion}"><i class="fas fa-clipboard-check"></i></button></abbr>`
                : ``
            }</div>
            `,
            value.razonsocial,
            formatoMonto(value.importe_apagar),
            formatoMonto(value.impuesto_renta),
            value.nombreregimen,
            value.periodo,
            value.fechavencimiento,
            value.revisor,
          ])
          .draw(false);
      });
    },
    error: function ({ respuesta }) {
      console.log('Error', respuesta);
    },
  });
});

$('#btnEditarLiquidacion').on('click', function () {
  let form = new FormData($('#frmliquidaciones').get(0));
  form.append('opcion', 'editarLiquidacion');
  $.ajax({
    method: 'POST',
    url: 'ajax/liquidaciones.ajax.php',
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function ({ respuesta }) {
      if (respuesta) {
        $('#btnRegistrarLiquidacion').removeClass('d-none');
        $('#btnEditarLiquidacion').addClass('d-none');
        $('#btnPDFLiquidacion').addClass('d-none');
        Swal.fire({
          title: 'Editado!',
          text: '¡Se Edito el Liquidacion correctamente!',
          icon: 'success',
          confirmButtonText: 'Ok',
        });
        limpiarTodo();
      } else {
        Swal.fire({
          title: 'Error!',
          text: '¡No se pudo Editar la Liquidacion!',
          icon: 'error',
          confirmButtonText: 'Ok',
        });
      }
    },
  });
});

$('#btnPDFLiquidacion').on('click', function () {
  if (window['graficoLiquidacion'] && window['graficoLiquidacion']['canvas']) {
    $('#grafico').val(graficoLiquidacion.toBase64Image());
  }
  $('#frmliquidaciones').trigger('submit');
});

if (window.idliquidacion_recibido) {
  $('#btnRegistrarLiquidacion').addClass('d-none');
  $('#btnEditarLiquidacion').removeClass('d-none');
  $('#btnPDFLiquidacion').removeClass('d-none');
  let datos = {
    id_liquidacion: idliquidacion_recibido,
    opcion: 'buscarLiquidacion',
  };
  $.ajax({
    type: 'POST',
    url: 'ajax/liquidaciones.ajax.php',
    data: datos,
    dataType: 'json',
    success: function ({ respuesta }) {
      if (respuesta) {
        $('#idliquidacion').val(respuesta['id_liquidacion']);
        $('#razonsocial').val(respuesta['razonsocial']);
        $('#ruc').val(respuesta['ruc']);
        $('#elaborador').val(respuesta['elaborador']);
        $('#revisor').val(respuesta['revisor']);
        $('#idcliente_liquidacion')
          .val(respuesta['idcliente'])
          .trigger('change');
        $('#fechavencimiento')
          .val(respuesta['fechavencimiento'])
          .trigger('change');
        $('#periodo')
          .val(respuesta['periodo'].substring(0, 7))
          .trigger('change');
        $('#ventas_netas').val(respuesta['ventas_netas']).trigger('change');
        $('#ventas_no_gravadas')
          .val(respuesta['ventas_no_gravadas'])
          .trigger('change');
        $('#exportaciones_facturada')
          .val(respuesta['exportaciones_facturada'])
          .trigger('change');
        $('#exportaciones_embarcadas')
          .val(respuesta['exportaciones_embarcadas'])
          .trigger('change');
        $('#nota_debito').val(respuesta['nota_debito']).trigger('change');
        $('#nota_credito').val(respuesta['nota_credito']).trigger('change');
        $('#comp_nacion_grava')
          .val(respuesta['comp_nacion_grava'])
          .trigger('change');
        $('#comp_importa_grava')
          .val(respuesta['comp_importa_grava'])
          .trigger('change');
        $('#comp_nacion_no_grava')
          .val(respuesta['comp_nacion_no_grava'])
          .trigger('change');
        $('#comp_importa_no_grava')
          .val(respuesta['comp_importa_no_grava'])
          .trigger('change');
        $('#saldo_afavor_anterior')
          .val(respuesta['saldo_afavor_anterior'])
          .trigger('change');
        $('#percepciones_periodo')
          .val(respuesta['percepciones_periodo'])
          .trigger('change');
        $('#percepciones_periodo_ant')
          .val(respuesta['percepciones_periodo_ant'])
          .trigger('change');
        $('#saldo_percepciones_no_apl')
          .val(respuesta['saldo_percepciones_no_apl'])
          .trigger('change');
        $('#retenciones_declaradas')
          .val(respuesta['retenciones_declaradas'])
          .trigger('change');
        $('#retenciones_declaradas_ant')
          .val(respuesta['retenciones_declaradas_ant'])
          .trigger('change');
        $('#saldo_retenciones_no_apl')
          .val(respuesta['saldo_retenciones_no_apl'])
          .trigger('change');
        $('#pagos_previos_compras')
          .val(respuesta['pagos_previos_compras'])
          .trigger('change');
        $('#coeficiente').val(respuesta['coeficiente']).trigger('change');
        $('#saldo_afavor_renta')
          .val(respuesta['saldo_afavor_renta'])
          .trigger('change');
        $('#pagos_previos').val(respuesta['pagos_previos']).trigger('change');
      }
    },
  });
}
