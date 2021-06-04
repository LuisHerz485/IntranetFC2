function init() {
    mostrarDetformC(false);
}

function limpiarAgenda() {
    $("#nombrecompleto").val("");
    $("#detallecargo").val("");
    $("#telefono1").val("");
    $("#telefono2").val("");
    $("#correo1").val("");
    $("#correo2").val("");
    $("#editarAg").val("no");
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
    mostrarDetformC(false);
}

function listarAgenda() {
    $("#mostrarAgenda > tbody").empty();
    var idclienteA = $("#idclienteA").val();
    $("#idclienteA").val(idclienteA);
    var datos = new FormData();
    datos.append("idclienteA", idclienteA);
    $.ajax({
        url: "ajax/agenda.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $.each(respuesta, function(index, value) {
                /* Vamos agregando a nuestra tabla las filas necesarias */
                $("#mostrarAgenda").append("<tr><th scope=\"row\"><button class=\"btn btn-warning btn-xs\" onclick=\"btnEditarDetAgen(" + value.idrepresentante + ")\"><i class=\"fas fa-pencil-alt\"></i></button> <button class=\"btn btn-danger btn-xs btnEditarDepartamento\" onclick=\"mostrarformD(true)\" idrepre=" + value.idrepresentante + "><i class=\"fas fa-times-circle\"></i></button></th><td>" + value.cargo + "</td><td>" + value.nombrecompleto + "</td><td>" + value.telefono1 + "</td><td>" + value.telefono2 + "</td><td>" + value.correo1 + "</td><td>" + value.correo2 + "</td></tr>");
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
}

$(".btnEditarDetalleCliente").click(function() {
    listarAgenda();
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
    var editarAg = $("#editarAg").val();
    var idrepresentante = $("#idrepresentante").val();
    var datos = new FormData();
    datos.append("idclienteAg", idclienteAg);
    datos.append("nombrecompleto", nombrecompleto);
    datos.append("detallecargo", detallecargo);
    datos.append("telefono1", telefono1);
    datos.append("telefono2", telefono2);
    datos.append("correo1", correo1);
    datos.append("correo2", correo2);
    datos.append("editarAg", editarAg);
    datos.append("idrepresentante", idrepresentante);
    $.ajax({
        url: "ajax/agenda.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            Swal.fire({
                title: 'Success!',
                text: '¡La Agenda agregado correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (editarAg == "no") {
                    if (result.value) {
                        $("#mostrarAgenda").append("<tr><td><button class=\"btn btn-warning btn-xs btnEditarDetAgen\" idrepre=" + respuesta['idrepresentante'] + "><i class=\"fas fa-pencil-alt\"></i></button> <button class=\"btn btn-danger btn-xs btnEliminarDetAgen\" idrepre=" + respuesta['idrepresentante'] + "><i class=\"fas fa-times-circle\"></i></button></td><td>" + detallecargo + "</td><td>" + nombrecompleto + "</td><td>" + telefono1 + "</td><td>" + telefono2 + "</td><td>" + correo1 + "</td><td>" + correo2 + "</td></tr>");
                    }
                } else {
                    listarAgenda();
                }
            })
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
    limpiarAgenda();
})

function btnEditarDetAgen(idrepresentante) {
    $("#editarAg").val("si");
    var idrepre = idrepresentante;
    var datos = new FormData();
    datos.append("idrepre", idrepre);
    $.ajax({
        url: "ajax/agenda.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idrepresentante").val(respuesta['idrepresentante']);
            $("#nombrecompleto").val(respuesta['nombrecompleto']);
            $("#detallecargo").val(respuesta['detallecargo']);
            $("#telefono1").val(respuesta['telefono1']);
            $("#telefono2").val(respuesta['telefono2']);
            $("#correo1").val(respuesta['correo1']);
            $("#correo2").val(respuesta['correo2']);
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
}

init();