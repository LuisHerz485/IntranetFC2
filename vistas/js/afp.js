$(document).on('click','.btn-editar-afp',function(){
    let dataafp=JSON.parse($(this).attr('dataafp'));
    if(dataafp){
        $('#idafp').val(dataafp['idafp']);
        $('#idcliente').val(dataafp['idcliente']).trigger('change');
        $('#usuarioafp').val(dataafp['usuarioafp']);
        $('#contraseafp').val(dataafp['contraseafp']);
        $('#opcioneseditarafp').removeClass('d-none');
        $('#opcionesregistrarafp').addClass('d-none');
    }
});

$('#btncancelarafp').on('click', function () {
    $('#opcionesregistrarafp').removeClass('d-none');
    $('#opcioneseditarafp').addClass('d-none');
    $('#btnlimpiarformafp').trigger('click');
});