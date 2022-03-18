
const sumaArrayMontos = function (ids, idTotal) {
    $(idTotal).val(getSumaArrayMontos(ids)).trigger('change');
  };

const getSumaArrayMontos = function (ids) {
    let total = 0;
    for (let index = 0; index < ids.length; index++) {
      total += $(ids[index]).val();
    }
    return total;
};


//SUMAACTIVOSCORRIENTE

$('#efectivo').on('change', function () {
    
    sumaArrayMontos(
      [
        '#totalactivoc',
        '#totalactivonoc',
      ],
      '#totalactivo',
    );
});

$('#inverfinan').on('change', function () {
    sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});

$('#cobrarcomerci').on('change', function () {
    sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});

$('#cobrarterceras').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});
$('#cmatsumi').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});
$('#mercad').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});
$('#otrosac').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});

$('#inmaqui').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});
$('#actintan').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});
$('#actdife').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});
$('#depamorti').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo',
  );
});
// SUMA DE PASIVOS CORRIENTES
$('#sobregi').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo',
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#tribupag').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo',
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#remupag').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo',
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#cuencomer').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo',
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#oblifinan').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo',
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#divterce').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo',
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#ingredif').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo',
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#oblilargo').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo',
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
//patrimonio con total
$('#capital').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});

$('#capadic').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#reservleg').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#resultacu').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});
$('#resultejer').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});








/*
$('#totalactivoc').on('change', function () {
    sumaArrayMonto(
      [
        '#efectivo',
        '#inverfinan',
        '#cobrarcomerci',
        '#cobraraccion',
        '#cobrarterceras',
      ],
      '#totalactivoc' 
    );
});
*/
$('#totalpasivoc').on('change', function () {
  sumaArrayMontos(
    [
      '#totalpasivoc',
      '#totalpasivonoc',
    ],
    '#totalpasivo'
  );
  sumaArrayMontos(
    [
      '#totalpasivo',
      '#totalpatrimo',
    ],
    '#totalpasivopat'
  );
});

$('#totalactivoc').on('change', function () {
  sumaArrayMontos(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo'
  );
  
});


//////
//SUMA DE ACTIVOS

function sumarActiCorr()
{
  const $total = document.getElementById('totalactivoc');
  let subtotal = 0;
  let total90 = 0;
  [ ...document.getElementsByClassName( "monto1" ) ].forEach( function ( element ) {
    if(element.value !== '') {
      subtotal += parseFloat(element.value);
    }
  });
  total90 = subtotal.toFixed(2);

  $total.value = total90;
}

function sumarActiNoCorr()
{
  const $total = document.getElementById('totalactivonoc');
  let subtotal = 0;
  let total90 = 0;
  let numres = parseFloat(Number(document.getElementById('depamorti').value));
  let numfix = 0;
  [ ...document.getElementsByClassName( "monto2" ) ].forEach( function ( element ) {
    if(element.value !== '') {
        subtotal += parseFloat(element.value);
    }
  });
  numfix = (2*numres).toFixed(2);
  total90 = (subtotal.toFixed(2) - (2*numres)).toFixed(2);

  $total.value = total90;
}

//SUMA DE PASIVOS

function sumarPasivo()
{
  const $total = document.getElementById('totalpasivoc');
  let subtotal = 0;
  let total90 = 0;
  [ ...document.getElementsByClassName( "mon" ) ].forEach( function ( element ) {
    if(element.value !== '') {
      subtotal += parseFloat(element.value);
    }
  });
  total90 = subtotal.toFixed(2);

  $total.value = total90;
}

function sumarPasivoNoCorr(){
  const $total = document.getElementById('totalpasivonoc');
  let subtotal = 0;
  let total90 = 0;
  [ ...document.getElementsByClassName( "mon2" ) ].forEach( function ( element ) {
    if(element.value !== ''){
      subtotal += parseFloat(element.value);
    }
  });
  total90 = subtotal.toFixed(2);

  $total.value = total90;
}

function sumarPatrimonio(){
  const $total = document.getElementById('totalpatrimo');
  let subtotal = 0;
  let total90 = 0;
  [ ...document.getElementsByClassName( "mon3" ) ].forEach( function ( element ){
    if(element.value !== ''){
      subtotal += parseFloat(element.value);
    }
  });
  total90 = subtotal.toFixed(2);

  $total.value = total90;
}

//SUMA DE TOTALES

function sumaTotal1(){
    let num1 = parseFloat(Number(document.getElementById('totalactivoc').value));
    let num2 = parseFloat(Number(document.getElementById('totalactivonoc').value));
    let res = (num1 + num2).toFixed(2);

    document.getElementById('totalactivo').value = res;
}
function sumaTotal2(){
  let num1 = parseFloat(Number(document.getElementById('totalpasivoc').value));
  let num2 = parseFloat(Number(document.getElementById('totalpasivonoc').value));
  let res = (num1 + num2).toFixed(2);

  document.getElementById('totalpasivo').value = res;
}
function sumaTotal3(){
  let num1 = parseFloat(Number(document.getElementById('totalpasivo').value));
  let num2 = parseFloat(Number(document.getElementById('totalpatrimo').value));
  let res = (num1 + num2).toFixed(2);

  document.getElementById('totalpasivopat').value = res;
}


// DIFERENCIA DE PASIVO - ACTIVO

function diferenciaAcpa()
{
  let num1 = parseFloat(Number(document.getElementById('totalactivo').value));
  let num2 = parseFloat(Number(document.getElementById('totalpasivopat').value));
  let res = (num1 - num2).toFixed(2);

  document.getElementById('diferencia_acpa').value = res;
}

//FIN DEL JS DE ESTADO FINANCIERO



$('#btnjsprueba').on('click', function () {
    $('#btnremove').addclass('d-none');
});
  

//generar pdf
$('#btnPDFestadofinanciero').on('click', function () {
  $('#frmestadofinanciero').trigger('submit');
});