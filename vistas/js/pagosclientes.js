function listarpendiente(idcliente){
    $("#mostrarPendiente > tbody").empty();
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
                   
                        $("#mostrarPendiente").append("<tr><th scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-xs btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button class=\"btn btn-success btn-xs btnConstancia\"><i class=\"fas fa-paste\"></i></button></abbr></th><td>" + value.departamento + "</td><td>" + value.distrito + "</td><td>" + value.direccion + "</td><td>" + value.fechaemision + "</td><td>" + value.fechavencimiento + "</td><td><button class='btn btn-warning btn-xs btnActivarC' idcobranza='" + value.idcobranza + "' estado='1'>Pendiente</button></td></tr>");
            });
        },
    });
}
