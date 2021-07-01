function init(){
	mostrarDetCob(false);
	mostrarformGC(false);
}

function mostrarDetCob(flag) {
    if (flag) {
        $("#listadoCobranza").hide();
        $("#modalCobranza").hide();
        $("#mostrarDetCob").show();
    } else {
        $("#listadoCobranza").show();
        $("#mostrarDetCob").hide();
        $("#modalCobranza").hide();
    }
}

function mostrarformGC(flag) {
    if (flag) {
        $("#listadoCobranza").hide();
        $("#modalCobranza").show();
        $("#mostrarDetCob").hide();
    } else {
        $("#listadoCobranza").show();
        $("#mostrarDetCob").hide();
        $("#modalCobranza").hide();
    }
}

function cancelarformGC(flag){
	mostrarformGC(false);
}

$(".btnMostrarCli").click(function() {
    $("#mostrarCliCob > tbody").empty();
    var idcliente = $("#idcliente").val();
    console.log(idcliente);
    var datos = new FormData();
    datos.append("idcliente", idusuario);
    $.ajax({
        url: "ajax/reporte.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $.each(respuesta, function(index, value) {
                /* Vamos agregando a nuestra tabla las filas necesarias */
                var estado = "";
                if (value.codigo == "0") {
                    estado = "Injustificado";
                } else if (value.codigo == "1") {
                    estado = "Justificado";
                } else {
                    estado = "Correcto";
                }
                $("#mostrarCliCob").append("<tr><td>" + value.estado + "</td><td>" + value.ruc + " " + value.razonsocial + "</td></tr>");
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

init();