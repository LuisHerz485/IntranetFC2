function init() {
    mostrarformDC(false);
}

function mostrarformDC(flag) {
    if (flag) {
        $("#listadoGC").hide();
        $("#formularioGC").show();
    } else {
        $("#listadoGC").show();
        $("#formularioGC").hide();
    }
}

function limpiar() {
    $("#iddistrito").find('option').remove();
    $("#iddireccion").find('option').remove();
}

function cancelarGC() {
    limpiar();
    mostrarformDC(false);
}

$(".btnListarLocal").click(function() {
    var idcliente = $(this).attr("idcliente");
    $("#idcliente").val(idcliente);
    var datos = new FormData();
    datos.append("idcliente", idcliente);
    $.ajax({
        url: "ajax/local.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#iddepartamento").find('option').remove();

            $("#iddepartamento").append('<option value="0">Seleccione ... </option>');
            $.each(respuesta, function(index, value) {
                $("#iddepartamento").append('<option value="' + value.idubicacion + '">' + value.departamento + '</option>');
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})


$(document).ready(function() {
    $("#iddepartamento").change(function() {
        var idcliente1 = $("#idcliente").val();
        var iddepartamento = $(this).val();
        var datos = new FormData();
        datos.append("idcliente1", idcliente1);
        datos.append("iddepartamento", iddepartamento);
        $.ajax({
            url: "ajax/local.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#iddistrito").find('option').remove();

                $("#iddistrito").append('<option value="0">Seleccione ... </option>');
                $.each(respuesta, function(index, value) {
                    $("#iddistrito").append('<option value="' + value.idubicacion + '">' + value.distrito + '</option>');
                });
            },
            error: function(respuesta) {
                console.log("Error", respuesta);
            }
        });
    });

    $("#iddistrito").change(function() {
        var idcliente1 = $("#idcliente").val();
        var iddepartamento = $(this).val();
        var datos = new FormData();
        datos.append("idcliente1", idcliente1);
        datos.append("iddepartamento", iddepartamento);
        $.ajax({
            url: "ajax/local.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#iddireccion").find('option').remove();

                $("#iddireccion").append('<option value="0">Seleccione ... </option>');
                $.each(respuesta, function(index, value) {
                    $("#iddireccion").append('<option value="' + value.idlocalcliente + '">' + value.direccion + '</option>');
                });
            },
            error: function(respuesta) {
                console.log("Error", respuesta);
            }
        });
    });
});



init();