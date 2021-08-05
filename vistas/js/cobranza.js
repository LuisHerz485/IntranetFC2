function init() {
    mostrarformDC(false);
}

function mostrarformDC(flag) {
    if (flag) {
        $("#listadoGC").hide();
        $("#formularioGC").show();  
    } else {
        $("#listadoGC").show();
        $("#formularioGC").hide();
    }
}

function limpiarCobranza() {
    $("#iddepartamento").val([]).trigger("change");
    $("#iddistrito").find('option').remove();
    $("#iddireccion").find('option').remove();
    $("#fecha_vencimiento").val("");
    $("#descripcion").val("");
    $("#precio").val("");
    $("#nota").val("");
}

function cancelarGC() {
    limpiar();
    mostrarformDC(false);
}

function listarLocal(idcliente) {
    $("#idcliente").val(idcliente);
    var datos = new FormData();
    datos.append("idcliente", idcliente);
    $.ajax({
        url: "ajax/local.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#iddepartamento").find('option').remove();

            $("#iddepartamento").append('<option value="0">Seleccione ... </option>');
            $.each(respuesta, function(index, value) {
                $("#iddepartamento").append('<option value="' + value.idubicacion + '">' + value.departamento + '</option>');
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
}

function listarCobranzas(idcliente) {
    $("#mostrarCobranza > tbody").empty();
    $("#idcliente").val(idcliente);
    var datos = new FormData();
    datos.append("idcliente", idcliente);
    $.ajax({
        url: "ajax/cobranza.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $.each(respuesta, function(index, value) {
                if (value.estado != 1) {
                    $('#mostrarCobranza').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button class=\"btn btn-success btn-s btnConstancia\"><i class=\"fas fa-paste\"></i></button></abbr></div>",value.departamento,value.distrito,value.direccion,value.fechaemision,value.fechavencimiento,"<button class='btn btn-warning btn-xs btnActivarC' idcobranza='" + value.idcobranza + "' estado='1'>Pendiente</button>"]).draw(false)
                    } else {
                    $('#mostrarCobranza').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button class=\"btn btn-success btn-s btnConstancia\"><i class=\"fas fa-paste\"></i></button></abbr></div>",value.departamento,value.distrito,value.direccion,value.fechaemision,value.fechavencimiento,"<button class='btn btn-success btn-xs btnActivarC' idcobranza='" + value.idcobranza + "' estado='0'>Pagado</button>"]).draw(false)
                    }
            });
            $('.btnMostraDetCob').click(function() {
                var datos = new FormData();
                datos.append('idcobranza', $(this).attr('idcobranza'));
                $('#modalDepartamento').val(respuesta[this.value].departamento);
                $('#modalDistrito').val(respuesta[this.value].distrito);
                $('#modalDireccion').val(respuesta[this.value].direccion);
                $('#modalFechaEmision').val(respuesta[this.value].fechaemision);
                $('#modelFechaVencimiento').val(respuesta[this.value].fechavencimiento);
                $('#modalDescripcion').val(respuesta[this.value].descripcion);
                $.ajax({
                  url: 'ajax/detallecobranza.ajax.php',
                  method: 'POST',
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: 'json',
                  data: datos,
                  success: function (data) {
                    console.log(data);
                    $('#modalPlan').val(data[0].plan);
                    $('#modalMonto').val(data[0].monto);
                    $('#modalObservacion').val(data[0].observacion);
                  },
                });
            });
            $(".btnActivarC").click(function() {
                var idcobranza = $(this).attr("idcobranza");
                var estado = $(this).attr("estado");
                var datos = new FormData();
                datos.append("idcobranza", idcobranza);
                datos.append("estado", estado);

                Swal.fire({
                    title: '¿Seguro que deseas cambiar el estado de cobranza?',
                    showCancelButton: true,
                    confirmButtonText: `Guardar`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "ajax/cobranza.ajax.php",
                            method: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(respuesta) {}
                        })
                        if (estado == 0) {
                            $(this).removeClass('btn-success');
                            $(this).addClass('btn-warning');
                            $(this).html('Pendiente');
                            $(this).attr('estado', 1);
                        } else {    
                            $(this).removeClass('btn-warning');
                            $(this).addClass('btn-success');
                            $(this).html('Pagado');
                            $(this).attr('estado', 0);
                            
                        }
                        Swal.fire('Cambio Realizado!', '', 'success')
                    } else if (result.isDenied) {
                        Swal.fire('Cambios no realizado', '', 'info')
                    }
                })
            })
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
}

$(".btnListarLocal").click(function() {
    var idcliente = $(this).attr("idcliente");
    listarLocal(idcliente);
    listarCobranzas(idcliente);
})

$("#iddepartamento").change(function() {
    var idcliente1 = $("#idcliente").val();
    var iddepartamento = $(this).val();
    var datos = new FormData();
    datos.append("idcliente1", idcliente1);
    datos.append("iddepartamento", iddepartamento);
    $.ajax({
        url: "ajax/local.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#iddistrito").find('option').remove();

            $("#iddistrito").append('<option value="0">Seleccione ... </option>');
            $.each(respuesta, function(index, value) {
                $("#iddistrito").append('<option value="' + value.idubicacion + '">' + value.distrito + '</option>');
            });


        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
});

$("#iddepartamento").change(function() {
    $("#idubicacion").val($(this).val());
});

$("#iddistrito").change(function() {
    var idcliente1 = $("#idcliente").val();
    var iddepartamento = $(this).val();
    var datos = new FormData();
    datos.append("idcliente1", idcliente1);
    datos.append("iddepartamento", iddepartamento);
    $.ajax({
        url: "ajax/local.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#iddireccion").find('option').remove();

            $("#iddireccion").append('<option value="0">Seleccione ... </option>');
            $.each(respuesta, function(index, value) {
                $("#iddireccion").append('<option value="' + value.idlocalcliente + '">' + value.direccion + '</option>');
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
});

$("#iddireccion").change(function() {
    $("#idlocalcliente").val($(this).val());
});

$("#idplan").change(function(){
    $('#precio').val($('#plan'+this.value).attr('precio'));
});

$(".btnAgregarCobranza").click(function() {
    $("#mostrarCobranza > tbody").empty();
    var idlocalcliente = $("#idlocalcliente").val();
    var idcliente = $("#idcliente").val();
    var idubicacion = $("#idubicacion").val();
    var fecha_vencimiento = $("#fecha_vencimiento").val();
    var descripcion = $("#descripcion").val();
    var idplan = $("#idplan").val();
    var precio = $('#precio').val();
    var nota = $('#nota').val();
    var datos = new FormData();
    datos.append("idlocalcliente", idlocalcliente);
    datos.append("idcliente", idcliente);
    datos.append("idubicacion", idubicacion);
    datos.append("fecha_vencimiento", fecha_vencimiento);
    datos.append("descripcion", descripcion);
    datos.append("idplan", idplan);
    datos.append("precio", precio);
    datos.append("nota", nota);
    $.ajax({
        url: "ajax/cobranza.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            Swal.fire({
                title: 'Success!',
                text: '¡La cobranza se agregado correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.value) {
                    listarCobranzas(idcliente);
                }
            })
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
    limpiar();
})

init();