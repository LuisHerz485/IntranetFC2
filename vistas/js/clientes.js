function init() {
    mostrarformC(false);
    mostrarDetformC(false);
}

function limpiar() {
    $("#editar").val("no");
    $("#ruc").val("");
    $("#idcliente").val("");
    $("#razonsocial").val("");
    $("#logincliente").val("");
    $("#contrasenacliente").val("");
    $("#iddrive").val("");
    $(".previsualizar").attr("src", "vistas/dist/img/avatar.png");
}

function limpiarAgenda() {
    $("#nombrecompleto").val("");
    $("#detallecargo").val("");
    $("#telefono1").val("");
    $("#telefono2").val("");
    $("#correo1").val("");
    $("#correo2").val("");
}

function mostrarformC(flag) {
    if (flag) {
        $("#listadoregistrosC").hide();
        $("#formularioregistrosC").show();
        $("#claves").css("display", "block");
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistrosC").show();
        $("#formularioregistrosC").hide();
        $("#btnagregar").show();
    }
}

function cancelarformC() {
    limpiar();
    $("#claves").css("display", "none");
    mostrarformC(false);
    mostrarDetformC(false);
}

function mostrarDetformC(flag) {
    if (flag) {
        $("#listadoregistrosC").hide();
        $("#formulariodetalleC").show();
        $("#btnagregar").hide();

    } else {
        $("#listadoregistrosC").show();
        $("#formulariodetalleC").hide();
    }
}

function cancelarDetformC() {
    limpiarAgenda();
    mostrarformC(false);
    mostrarDetformC(false);
}

function generar(longitud) {
    long = parseInt(longitud);
    var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHIJKLMNPQRTUVWXYZ2346789";
    var contraseña = "";
    for (i = 0; i < long; i++) contraseña += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    $("#contrasenacliente").val(contraseña);
}

$(".nuevaFoto").change(function() {
    var imagen = this.files[0];
    console.log("imagen", imagen["type"])

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

$(".btnActivarC").click(function() {
    var idcliente = $(this).attr("idcliente");
    var estado = $(this).attr("estado");
    var datos = new FormData();
    datos.append("idcliente", idcliente);
    datos.append("estado", estado);

    Swal.fire({
        title: '¿Seguro que deseas cambiar el estado al cliente?',
        showCancelButton: true,
        confirmButtonText: `Guardar`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/clientes.ajax.php",
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

$(".btnEditarCliente").click(function() {
    $("#editar").val("si");
    $("#claves").css("display", "none");
    var idcliente = $(this).attr("idcliente");
    var datos = new FormData();
    datos.append("idcliente", idcliente);
    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idcliente").val(respuesta['idcliente']);
            $("#ruc").val(respuesta['ruc']);
            $("#razonsocial").val(respuesta['razonsocial']);
            $("#logincliente").val(respuesta['logincliente']);
            $("#iddrive").val(respuesta['iddrive']);
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

$(".btnContraC").click(function() {
    var idcliente = $(this).attr("idcliente");
    var datos = new FormData();
    datos.append("idcliente", idcliente);
    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idusuario1").val(respuesta['idcliente']);
            $("#contra").val(respuesta['contrasenacliente']);
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

$(".btnEditarDetalleCliente").click(function() {
    $("#mostrarAgenda > tbody").empty();
    var idclienteA = $(this).attr("idcliente");
    $("#idclienteA").val(idclienteA);
    var datos = new FormData();
    datos.append("idclienteA", idclienteA);
    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $.each(respuesta, function(index, value) {
                /* Vamos agregando a nuestra tabla las filas necesarias */
                $("#mostrarAgenda").append("<tr><td><button class=\"btn btn-warning btn-xs btnEditarDepartamento\" onclick=\"mostrarformD(true)\" idrepre=" + value.idrepresentante + "><i class=\"fas fa-pencil-alt\"></i></button> <button class=\"btn btn-danger btn-xs btnEditarDepartamento\" onclick=\"mostrarformD(true)\" idrepre=" + value.idrepresentante + "><i class=\"fas fa-times-circle\"></i></button></td><td>" + value.cargo + "</td><td>" + value.nombrecompleto + "</td><td>" + value.telefono1 + "</td><td>" + value.telefono2 + "</td><td>" + value.correo1 + "</td><td>" + value.correo2 + "</td></tr>");
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

$(".btnAgregarAgenda").click(function() {
    $("#mostrarReporte > tbody").empty();
    var idclienteAg = $("#idclienteA").val();
    var nombrecompleto = $("#nombrecompleto").val();
    var detallecargo = $("#detallecargo").val();
    var telefono1 = $("#telefono1").val();
    var telefono2 = $("#telefono2").val();
    var correo1 = $("#correo1").val();
    var correo2 = $("#correo2").val();
    var datos = new FormData();
    datos.append("idclienteAg", idclienteAg);
    datos.append("nombrecompleto", nombrecompleto);
    datos.append("detallecargo", detallecargo);
    datos.append("telefono1", telefono1);
    datos.append("telefono2", telefono2);
    datos.append("correo1", correo1);
    datos.append("correo2", correo2);
    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            Swal.fire({
                title: 'Success!',
                text: '¡La Representante agregado correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.value) {
                    $("#mostrarAgenda").append("<tr><td><button class=\"btn btn-warning btn-xs btnEditarDepartamento\" onclick=\"mostrarformD(true)\" idrepre=" + respuesta['idrepresentante'] + "><i class=\"fas fa-pencil-alt\"></i></button></td><td>" + detallecargo + "</td><td>" + nombrecompleto + "</td><td>" + telefono1 + "</td><td>" + telefono2 + "</td><td>" + correo1 + "</td><td>" + correo2 + "</td></tr>");
                }
            })
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
    limpiarAgenda();
})

init();