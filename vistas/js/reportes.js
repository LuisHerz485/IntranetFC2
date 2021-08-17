$(".btnMostrar").click(function() {
    $('#mostrarReporte').DataTable().clear().draw(false);
    var idusuario = $("#idusuario").val();
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
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
                if (value.estado == "0") {
                    estado = "Injustificado";
                } else if (value.estado == "1") {
                    estado = "Justificado";
                } else {
                    estado = "Correcto";
                }
                $('#mostrarReporte').DataTable().row.add([value.codigo,value.nombre + " " + value.apellidos,value.area, value.fecha, value.asistencia , estado ,value.detalle]).draw(false)
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})
