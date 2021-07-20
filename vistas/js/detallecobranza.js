function init() {
    mostrarformDetC(false);
}

function mostrarformDetC(flag) {
    if (flag) {
        $("#formularioGC").hide();
		$("#formularioS").show();
    } else {
        $("#formularioGC").show();
        $("#formularioS").hide();
    }
}

function limpiar() {
    $("#iddistrito").find('option').remove();
    $("#iddireccion").find('option').remove();
    $("#fecha_vencimiento").val("");
    $("#descripcion").val("");
}

function cancelarDetC() {
    limpiar();
    mostrarformDetC(false);
}

function listarDetCobranzas(idcobranza) {
    $("#mostrarDetCobranza > tbody").empty();
    $("#idcobranza").val(idcobranza);
    var datos = new FormData();
    datos.append("idcobranza", idcobranza);
    $.ajax({
        url: "ajax/detallecobranza.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $.each(respuesta, function(index, value) {
                if (value.estado != 1) {
                    $("#mostrarDetCobranza").append("<tr><th scope=\"row\"><button class=\"btn btn-info btn-xs btnEditarDetCobranza\" iddetallecobranza="+ value.iddetallecobranza +" onclick=\"mostrarformDetC(true)\"><i class=\"fas fa-pencil-alt\"></i></button></th><td>" + value.servicio + "</td><td>" + value.distrito + "</td><td>" + value.direccion + "</td><td>" + value.fechaemision + "</td><td>" + value.fechavencimiento + "</td><td><button class='btn btn-warning btn-xs btnActivarC' idcliente='" + value.estado + "' estado='1'>Pendiente</button></td><td>" + value.descripcion + "</td></tr>");

                } else {
                    $("#mostrarDetCobranza").append("<tr><th scope=\"row\"><button class=\"btn btn-info btn-xs btnEditarDetCobranza\" iddetallecobranza="+ value.iddetallecobranza +" onclick=\"mostrarformDetC(true)\"><i class=\"fas fa-pencil-alt\"></i></button></th><td>" + value.servicio + "</td><td>" + value.distrito + "</td><td>" + value.direccion + "</td><td>" + value.fechaemision + "</td><td>" + value.fechavencimiento + "</td><td><button class='btn btn-success btn-xs btnActivarC' idcliente='" + value.estado + "' estado='1'>Pagado</button></td><td>" + value.descripcion + "</td></tr>");
                }
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
}

$(".btnMostraDetCob").click(function() {
    var idcobranza = $(this).attr("idcobranza");
    var datos = new FormData();
    datos.append("idcobranza", idcobranza);
    $.ajax({
        url: "ajax/detallecobranza.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#descripcion").val(respuesta['descripcion']);
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

init();