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
    $("#editarTU").val("si");
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

$(".btnActivarTU").click(function() {
    var nombre = $(this).attr("nombre");
    var estado = $(this).attr("estado");
    var datos = new FormData();
    datos.append("nombre", nombre);
    datos.append("estado", estado);

    Swal.fire({
        title: '¿Seguro que deseas cambiar el estado del tipo usuario?',
        showCancelButton: true,
        confirmButtonText: `Guardar`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/tipousuario.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {}
            })
            if (estado == 0) {
                $(this).removeClass('btn-success');
                $(this).addClass('btn-danger');
                $(this).html('Inactivo');
                $(this).attr('estado', 1);

            } else {
                $(this).removeClass('btn-danger');
                $(this).addClass('btn-success');
                $(this).html('Activo');
                $(this).attr('estado', 0);
            }
            Swal.fire('Cambio Realizado!', '', 'success')
        } else if (result.isDenied) {
            Swal.fire('Cambios no realizado', '', 'info')
        }
    })
})


init();