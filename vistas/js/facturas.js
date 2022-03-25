
$(document).on('click', '.btn-eliminar-factura', function () {
    let datafactura=JSON.parse($(this).attr('datafactura'));
    if (datafactura) {
        $('#idfacturas').val(datafactura['idfacturas']);
        $('#opcionesRegistrarCuentapp').addClass('d-none');
        $('#opcionesEliminarCuentapp').removeClass('d-none');
    }
});