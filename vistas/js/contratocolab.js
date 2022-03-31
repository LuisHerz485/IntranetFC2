
//boton editar contrato colab
$(document).on('click', '.btn-editar-contratocolab', function () {
    let dataContratoColab = JSON.parse($(this).attr('dataContratoColab'));
    if (dataContratoColab) {
        $('#idcontratousuario').val(dataContratoColab['idcontratousuario']);
        $('#idusuario').val(dataContratoColab['idusuario']).trigger('change');
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

//eliminar contrato colab
$(document).on('click', '.btn-eliminar-contratocolab', function () {
    let dataContratoColab = JSON.parse($(this).attr('dataContratoColab'));
    if (dataContratoColab) {
        $('#idcontratousuario10').val(dataContratoColab['idcontratousuario']).trigger('change');
    }
    //trigerclick boton eliminar
    $('#btneliminarcontratocolab').trigger('click');

});

//editar con modal no funcionan
$(document).on('click', '.btn-editar-contratocolabssss', function () {
    let btn=$(this);
    $("#modaleditarcontratocolab").modal("show");
});
$(".btn-editar-contratocolabsssss").click(function () {
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