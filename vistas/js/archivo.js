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
                $("#mostrarArchivo").DataTable().row.add(["<a class=\"btn btn-primary btn-xs\" href=\"https://drive.google.com/file/d/" + value.ruta + "\" target=\"_blank\">Ver Documento</a>", value.nombre,value.fechacreado]).draw(false);
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})