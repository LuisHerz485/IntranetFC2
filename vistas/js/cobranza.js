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

$(".btnAgregarCobranza").click(function() {
    /*
    $("#mostrarReporte > tbody").empty();
    var idclienteAg = $("#idclienteA").val();
    var nombrecompleto = $("#nombrecompleto").val();
    var detallecargo = $("#detallecargo").val();
    var telefono1 = $("#telefono1").val();
    var telefono2 = $("#telefono2").val();
    var correo1 = $("#correo1").val();
    var correo2 = $("#correo2").val();
    var editarAg = $("#editarAg").val();
    var idrepresentante = $("#idrepresentante").val();
    var datos = new FormData();
    datos.append("idclienteAg", idclienteAg);
    datos.append("nombrecompleto", nombrecompleto);
    datos.append("detallecargo", detallecargo);
    datos.append("telefono1", telefono1);
    datos.append("telefono2", telefono2);
    datos.append("correo1", correo1);
    datos.append("correo2", correo2);
    datos.append("editarAg", editarAg);
    datos.append("idrepresentante", idrepresentante);
    $.ajax({
        url: "ajax/agenda.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            Swal.fire({
                title: 'Success!',
                text: '¡La Agenda agregado correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.value) {
                    listarAgenda();
                }
            })
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
    limpiarAgenda();*/
})


init();