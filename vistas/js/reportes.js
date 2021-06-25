$(".btnMostrar").click(function() {
    $("#mostrarReporte > tbody").empty();
    var idusuario = $("#idusuario").val();
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    console.log(idusuario);
    console.log(fecha_inicio);
    console.log(fecha_fin);
    var datos = new FormData();
    datos.append("idusuario", idusuario);
    datos.append("fecha_inicio", fecha_inicio);
    datos.append("fecha_fin", fecha_fin);
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
                $("#mostrarReporte").append("<tr><td>" + value.codigo + "</td><td>" + value.nombre + " " + value.apellidos + "</td><td>" + value.area + "</td><td>" + value.fecha + "</td><td>" + value.asistencia + "</td><td>" + estado + "</td><td>" + value.detalle + "</td></tr>");
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})
