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
    $("#fecha_vencimiento").val("");
    $("#descripcion").val("");
}

function cancelarGC() {
    limpiar();
    mostrarformDC(false);
}

function listarLocal(idcliente) {
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
}

function listarCobranzas(idcliente) {
    $("#mostrarCobranza > tbody").empty();
    $("#idcliente").val(idcliente);
    var datos = new FormData();
    datos.append("idcliente", idcliente);
    $.ajax({
        url: "ajax/cobranza.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $.each(respuesta, function(index, value) {
                if (value.estado != 1) {
                    $("#mostrarCobranza").append("<tr><th scope=\"row\"><button class=\"btn btn-info btn-xs btnDetCobranza\" idcobranza="+ value.idcobranza +" onclick=\"mostrarformDetC(true)\"><i class=\"fas fa-pencil-alt\"></i></button></th><td>" + value.departamento + "</td><td>" + value.distrito + "</td><td>" + value.direccion + "</td><td>" + value.fechaemision + "</td><td>" + value.fechavencimiento + "</td><td><button class='btn btn-warning btn-xs btnActivarC' idcliente='" + value.estado + "' estado='1'>Pendiente</button></td><td>" + value.descripcion + "</td></tr>");

                } else {
                    $("#mostrarCobranza").append("<tr><th scope=\"row\"><button class=\"btn btn-info btn-xs btnDetCobranza\" idcobranza="+ value.idcobranza +" onclick=\"mostrarformDetC(true)\"><i class=\"fas fa-pencil-alt\"></i></button></th><td>" + value.departamento + "</td><td>" + value.distrito + "</td><td>" + value.direccion + "</td><td>" + value.fechaemision + "</td><td>" + value.fechavencimiento + "</td><td><button class='btn btn-success btn-xs btnActivarC' idcliente='" + value.estado + "' estado='1'>Pagado</button></td><td>" + value.descripcion + "</td></tr>");
                }
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
}

$(".btnListarLocal").click(function() {
    var idcliente = $(this).attr("idcliente");
    listarLocal(idcliente);
    listarCobranzas(idcliente);
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

$("#iddepartamento").change(function() {
    $("#idubicacion").val($(this).val());
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

$("#iddireccion").change(function() {
    $("#idlocalcliente").val($(this).val());
});

$(".btnAgregarCobranza").click(function() {
    $("#mostrarCobranza > tbody").empty();
    var idlocalcliente = $("#idlocalcliente").val();
    var idcliente = $("#idcliente").val();
    var idubicacion = $("#idubicacion").val();
    var fecha_vencimiento = $("#fecha_vencimiento").val();
    var descripcion = $("#descripcion").val();
    var idplan = $("#idplan").val();
    var precio = $('#precio').val();
    var nota = $('#nota').val();
    var datos = new FormData();
    datos.append("idlocalcliente", idlocalcliente);
    datos.append("idcliente", idcliente);
    datos.append("idubicacion", idubicacion);
    datos.append("fecha_vencimiento", fecha_vencimiento);
    datos.append("descripcion", descripcion);
    datos.append("idplan", idplan);
    datos.append("precio", precio);
    datos.append("nota", nota);
    $.ajax({
        url: "ajax/cobranza.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            Swal.fire({
                title: 'Success!',
                text: '¡La cobranza se agregado correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.value) {
                    listarCobranzas(idcliente);
                }
            })
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
    limpiar();
})

init();