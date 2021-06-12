$(".btnMostrarArchivos").click(function() {
    $("#mostrarArchivo > tbody").empty();
    var idtipoarchivo = $("#idtipoarchivo").val();
    var idcliente = $("#idcliente").val();
    var datos = new FormData();
    datos.append("idtipoarchivo", idtipoarchivo);
    datos.append("idcliente", idcliente);
    $.ajax({
        url: "ajax/tributaria.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $.each(respuesta, function(index, value) {
                /* Vamos agregando a nuestra tabla las filas necesarias */
                $("#mostrarArchivo").append("<tr><td><a class=\"btn btn-primary btn-xs\" href=\"https://drive.google.com/file/d/" + value.ruta + "\" target=\"_blank\">Ver Documento</a></td><td>" + value.nombre + "</td><td>" + value.fechacreado + "</td></tr>");
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})