$(".btnEditarDetalle").click(function() {
    var codigo = $(this).attr("codigo");
    var fecha = $(this).attr("fecha");
    console.log(codigo);
    console.log(fecha);
    var datos = new FormData();
    datos.append("codigo", codigo);
    datos.append("fecha", fecha);
    console.log(datos);
    $.ajax({
        url: "ajax/asistencia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta['estado']);
            $("#estado option[value=" + respuesta['estado'] + "]").attr("selected", true);
            $("#idasistencia").val(respuesta['idasistencia']);
            $("#fecha").val(respuesta['fecha']);
            $("#detalle").val(respuesta['detalle']);
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})