
//boton editar contrato colab
$(document).on('click', '.btn-editar-contratocolabs', function () {
    let dataContratoColab = JSON.parse($(this).attr('dataContratoColab'));
    if (dataContratoColab) {
        $('#idcontratousuario').val(dataContratoColab['idcontratousuario']);
        $('#idusuario2').val(dataContratoColab['idusuario']).trigger('change');
        $('#iniciocontrato').val(dataContratoColab['iniciocontrato']);
        $('#fincontrato').val(dataContratoColab['fincontrato']);
        $('#Pago').val(dataContratoColab['Pago']);
        $('#opcioneseditarcontratocolab').removeClass('d-none');
        $('#opcionesregistrarcontratocolab').addClass('d-none');
    }
});

$('#btncancelarcontratocolab').on('click', function () {
    $('#opcionesregistrarcontratocolab').removeClass('d-none');
    $('#opcioneseditarcontratocolab').addClass('d-none');
    $('#btnlimpiarformcontratocolab').trigger('click');
});

//editar con modal
$(document).on('click', '.btn-editar-contratocolab', function () {
    let btn=$(this);
    $("#modaleditarcontratocolab").modal("show");
});
$(".btn-editar-contratocolab").click(function () {
    var idcontratousuario = $(this).attr("idcontratousuario");
    var datos = new FormData();
    datos.append("idcontratousuario", idcontratousuario);
    $.ajax({
        url: "ajax/contratousuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#idusuario5").val(respuesta["idusuario"]);
        },
        error: function (respuesta) {
            console.log("Error", respuesta);
        },
    });
});