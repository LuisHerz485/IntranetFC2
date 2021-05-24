function init() {
    mostrarformTU(false);
}

function limpiar() {
    $("#editar").val("no");
    $("#nombre").val("");
    $("#descripcion").val("");
}

function mostrarformTU(flag) {
    if (flag) {
        $("#listadoregistrosTU").hide();
        $("#formularioregistrosTU").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistrosTU").show();
        $("#formularioregistrosTU").hide();
        $("#btnagregar").show();
    }
}

function cancelarformTU() {
    limpiar();
    mostrarformTU(false);
}

$(".btnEditarTipoUsuario").click(function() {
    $("#editar").val("si");
    var nombre = $(this).attr("nombre");
    var datos = new FormData();
    datos.append("nombre", nombre);
    $.ajax({
        url: "ajax/tipousuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idtipousuario").val(respuesta['idtipousuario']);
            $("#nombre").val(respuesta['nombre']);
            $("#descripcion").val(respuesta['descripcion']);
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

init();