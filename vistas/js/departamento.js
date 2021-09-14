function init() {
    mostrarformD(false);
}

function limpiarFormDepartamento() {
    $("#editarD").val("no");
    $("#nombre").val("");
    $("#descripcion").val("");
}

function mostrarformD(flag) {
    if (flag) {
        $("#listadoregistrosD").hide();
        $("#formularioregistrosD").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistrosD").show();
        $("#formularioregistrosD").hide();
        $("#btnagregar").show();
    }
}

$("#btnCancelarFormDepartamento").on("click", function () {
    limpiarFormDepartamento();
    mostrarformD(false);
    
}); 

$(".btnEditarDepartamento").click(function() {
    $("#editarD").val("si");
    var nombre = $(this).attr("nombre");
    var datos = new FormData();
    datos.append("nombre", nombre);
    $.ajax({
        url: "ajax/departamento.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#iddepartamento").val(respuesta['iddepartamento']);
            $("#nombre").val(respuesta['nombre']);
            $("#descripcion").val(respuesta['descripcion']);
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

$(".btnActivarD").click(function() {
    var nombre = $(this).attr("nombre");
    var estado = $(this).attr("estado");
    var datos = new FormData();
    datos.append("nombre", nombre);
    datos.append("estado", estado);

    Swal.fire({
        title: '¿Seguro que deseas cambiar el estado del Área?',
        showCancelButton: true,
        confirmButtonText: `Guardar`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/departamento.ajax.php",
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