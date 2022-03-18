










$('#btnRegistrarPrueba').on('click', function () {
  let form = new FormData($('#frmpruebapdf').get(0));
  form.append('opcion', 'registrarPrueba');
  $.ajax({
    method: 'POST',
    url: 'ajax/prueba.ajax.php',
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





  $('#btnPDFPrueba').on('click', function () {
    if (window['graficopdf'] && window['graficopdf']['canvas']) {
      $('#grafico').val(graficoLiquidacion.toBase64Image());
    }
    $('#frmpdf').trigger('submit');
  });


  const crearBarChartLiquidacion = function (data) {
    let label = [],
      data_renta = [],
      data_igv = [];
    for (let { mes, impuesto_renta, impuesto_igv } of data) {
      label.unshift(mes);
      data_renta.unshift(impuesto_renta);
      data_igv.unshift(impuesto_igv);
    }
    window['graficopdf'] = new Chart(
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

  $('#btnBuscarPruebas').on('click', function () {
    let form = new FormData($('#frmpruebaListar')[0]);
    form.append('opcion', 'buscarprueba');
    $.ajax({
      method: 'POST',
      url: 'ajax/prueba.ajax.php',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function ({ respuesta }) {
        let tbl = $('#tablaPruebas').DataTable();
        tbl.clear().draw();
        $.each(respuesta, function (index, value) {
          tbl.row
            .add([
              `<div class="row justify-content-center"><abbr title="Editar"><form method="POST" action="prueba" target="_blank"><input type="hidden" name="id_prueba" value="${
                value.id_prueba
              }" /><button type="submit" class="btn btn-outline-warning mx-1"><i class="fas fa-edit"></i></button></form></abbr> 
              ${
                canEdit
                  ? `<abbr title="Revisión"><button type="button" class="btn btn-outline-primary btn-revisado" idprueba="${value.id_prueba}"><i class="fas fa-clipboard-check"></i></button></abbr>`
                  : ``
              }</div>
              `,
              value.efectivo,
              value.inversiones,
              value.totalactivo,
              value.periodo,
              value.fechacoti,
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
  