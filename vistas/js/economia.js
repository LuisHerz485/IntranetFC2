$(".btnIngreso").click(function() {
    $("#tablaIngresoMes").DataTable().clear().draw(false);
    var fecha_ingreso = $("#fecha_ingreso").val();
    var datos = new FormData();
    datos.append("fecha_ingreso", fecha_ingreso);
    $.ajax({
        url: "ajax/constancia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            let ingresoAnual = 0;
            $.each(respuesta, function(index, value) {
                /* Vamos agregando a nuestra tabla las filas necesarias */
                ingresoAnual += parseFloat(value.monto);
                $("#tablaIngresoMes").DataTable().row.add([value.mes, value.monto]).draw(false);
            });
            $('#TotalAnyo').text(ingresoAnual);
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
    }
);