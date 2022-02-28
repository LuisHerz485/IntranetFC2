
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
$('#inverfinan').on('change', function () {
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
$('#cobrarcomerci').on('change', function () {
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
$('#cobrarterceras').on('change', function () {
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
$('#totalactivoc').on('change', function () {
  sumaArrayMonto(
    [
      '#totalactivoc',
      '#totalactivonoc',
    ],
    '#totalactivo'
);
});



$('#btnjsprueba').on('click', function () {
    $('#btnremove').addclass('d-none');
});
  