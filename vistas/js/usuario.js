function init() {
    mostrarform(false);
}

function limpiar() {
    $("#editar").val("no");
    $("#iddepartamento option:selected").removeAttr("selected");
    $("#iddepartamento option[value=0]").attr("selected", true);
    $("#idtipousuario option:selected").removeAttr("selected");
    $("#idtipousuario option[value=0]").attr("selected", true);
    $("#nombre").val("");
    $("#apellidos").val("");
    $("#direccion").val("");
    $("#email").val("");
    $("#login").val("");
    $("#clave").val("");
    $("#codigo_persona").val("");
    $(".previsualizar").attr("src", "vistas/dist/img/avatar.png");
    $("#idusuario").val("");
}

function mostrarform(flag) {
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#claves").css("display", "block");
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

function cancelarform() {
    limpiar();
    $("#claves").css("display", "none");
    mostrarform(false);
}

function generarU(longitud) {
    long = parseInt(longitud);
    var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHIJKLMNPQRTUVWXYZ2346789";
    var password = "";
    for (i = 0; i < long; i++) password += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    $("#codigo_persona").val(password);
}

$(".nuevaFoto").change(function() {
    var imagen = this.files[0];

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaFoto").val("");
        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (imagen["size"] > 2000000) {
        $(".nuevaFoto").val("");
        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function(event) {
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }
})

$(".btnActivarUs").click(function() {
    var login = $(this).attr("login");
    var estado = $(this).attr("estado");
    var datos = new FormData();
    datos.append("login", login);
    datos.append("estado", estado);

    Swal.fire({
        title: '¿Seguro que deseas cambiar el estado del usuario?',
        showCancelButton: true,
        confirmButtonText: `Guardar`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/usuarios.ajax.php",
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

$(".btnEditarUsuario").click(function() {
    $("#editar").val("si");
    $("#iddepartamento option:selected").removeAttr("selected");
    $("#idtipousuario option:selected").removeAttr("selected");
    $("#claves").css("display", "none");
    var login = $(this).attr("login");
    var datos = new FormData();
    datos.append("login", login);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idusuario").val(respuesta['idusuario']);
            $("#idtipousuario option[value=" + respuesta['idtipousuario'] + "]").attr("selected", true);
            $("#iddepartamento option[value=" + respuesta['iddepartamento'] + "]").attr("selected", true);
            $("#nombre").val(respuesta['nombre']);
            $("#apellidos").val(respuesta['apellidos']);
            $("#email").val(respuesta['email']);
            $("#login").val(respuesta['usuario']);
            $("#codigo_persona").val(respuesta['codigopersona']);
            $("#fotoaux").val(respuesta['imagen']);
            if (respuesta['imagen'] != "") {
                $(".previsualizar").attr("src", respuesta['imagen']);
            }
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

$(".btnContra").click(function() {
    var login = $(this).attr("login");
    var datos = new FormData();
    datos.append("login", login);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idusuario1").val(respuesta['idusuario']);
            $("#contra").val(respuesta['password1']);
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

init();