function init() {
    mostrarformDC(false);
}

function mostrarformDC(flag) {
    if (flag) {
        $("#listadoGC").hide();
        $("#formularioGC").show();
        $("#fecha_emision").val(getFechaActual());
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
    $("#fecha_emision").val("");
    $("#descripcion").val("");
    $("#idplan").val([]).trigger("change");
    $("#precio").val("");
    $("#nota").val("");
}

function limpiarPreConstancia() {
    $("#fecha_pago").val("");
    $("#nota_const").val("");
    $("#monto_const").val("");
    $("#tipo_pago").val([]).trigger("change");
}

function cancelarGC() {
    limpiarCobranza();
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

function getFechaActual() {
    let fecha = new Date();
    let mes = fecha.getMonth() + 1;
    let dia = fecha.getDate();
    let anho = fecha.getFullYear();
    if (dia < 10)
        dia = '0' + dia;
    if (mes < 10)
        mes = '0' + mes
    return anho + "-" + mes + "-" + dia;
}

function getFechaMes() {
    let fecha = new Date();
    let mes = fecha.getMonth() + 1;
    let anho = fecha.getFullYear();
    if (mes < 10)
        mes = '0' + mes
    return anho + "-" + mes;
}

var btnSeleccion;
var totalCuota;

/* Lista de Cobranza principales por cliente*/

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
            $('#mostrarCobranza').DataTable().clear().draw();
            $.each(respuesta, function(index, value) {
                if (value.estado == 0) {
                    $('#mostrarCobranza').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button id='btnEstado"+index+"' estado='0' idcobranza="+value.idcobranza+" class=\"btn btn-warning btn-s btnConstancia\" target=\"_blank\"><i class=\"fas fa-paste\"></i></button></abbr></div>",value.fechaemision,value.direccion,value.plan,value.monto,value.fechavencimiento,"<button class='btn btn-primary btn-xs btnActivarC' iddetallecobranza='" + value.iddetallecobranza + "' idcobranza='" + value.idcobranza + "' indice="+index+" estado='0' onclick=\"limpiarPreConstancia()\" monto='" + value.monto + "'>Pendiente</button>"]).draw(false)
                } else if (value.estado == 1) {
                    $('#mostrarCobranza').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button id='btnEstado"+index+"' estado='1' idcobranza="+value.idcobranza+" class=\"btn btn-warning btn-s btnConstancia\" target=\"_blank\"><i class=\"fas fa-paste\"></i></button></abbr></div>",value.fechaemision,value.direccion,value.plan,value.monto,value.fechavencimiento,"<button class='btn btn-success btn-xs btnActivarC' iddetallecobranza='" + value.iddetallecobranza + "' idcobranza='" + value.idcobranza + "' indice="+index+" estado='1' onclick=\"limpiarPreConstancia()\" monto='" + value.monto + "'>Pagado</button>"]).draw(false)
                } else if (value.estado == 2) {
                    $('#mostrarCobranza').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button id='btnEstado"+index+"' estado='2' idcobranza="+value.idcobranza+" class=\"btn btn-warning btn-s btnConstancia\" target=\"_blank\"><i class=\"fas fa-paste\"></i></button></abbr></div>",value.fechaemision,value.direccion,value.plan,value.monto,value.fechavencimiento,"<button class='btn btn-warning btn-xs btnActivarC' iddetallecobranza='" + value.iddetallecobranza + "' idcobranza='" + value.idcobranza + "' indice="+index+" estado='2' onclick=\"limpiarPreConstancia()\" monto='" + value.monto + "'>A deuda</button>"]).draw(false)
                } else if (value.estado == 3) {
                    $('#mostrarCobranza').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button id='btnEstado"+index+"' estado='3' idcobranza="+value.idcobranza+" class=\"btn btn-warning btn-s btnConstancia\" target=\"_blank\"><i class=\"fas fa-paste\"></i></button></abbr></div>",value.fechaemision,value.direccion,value.plan,value.monto,value.fechavencimiento,"<button class='btn btn-danger btn-xs btnActivarC' iddetallecobranza='" + value.iddetallecobranza + "' idcobranza='" + value.idcobranza + "' indice="+index+" estado='3' onclick=\"limpiarPreConstancia()\" monto='" + value.monto + "'>Vencido</button>"]).draw(false)
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
                    $('#modalPlan').val(data[0].plan);
                    $('#modalMonto').val(data[0].monto);
                    $('#modalObservacion').val(data[0].observacion);
                  },
                });
            });

            $(".btnConstancia").click(function() {
                window.open("ajax/generarPDF.php?idcobranza="+$(this).attr("idcobranza"));                    
            });

            $(".btnActivarC").click(function() {
                Swal.fire({
                    title: '¿Seguro que deseas cambiar el estado de cobranza?',
                    showCancelButton: true,
                    confirmButtonText: `Continuar`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        btnSeleccion = this;
                        $("#modalConstancia").modal("show");
                        $("#mostrarSubPagos > tbody").empty();
                        var datos = new FormData();
                        datos.append("idcobranza", $(this).attr("idcobranza"));
                        $.ajax({
                            url: "ajax/constancia.ajax.php",
                            method: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            success: function(respuesta) {
                                totalCuota = 0; 
                                $.each(respuesta, function(index, value){
                                    $('#mostrarSubPagos > tbody').append("<tr><td>" + value.fecha_pago + "</td><td>" + value.monto_const+ "</td><td><a href=\"ajax/generarPDF.php?idconstancia="+value.idconstancia+"\" class=\"btn btn-warning btn-s\" target=\"_blank\"><i class=\"far fa-file-alt\"></i></a> <button class=\"btn btn-info btn-s btnMostrarHisCob\" idconstancia="+ value.idconstancia +" value='"+ index +"' data-dismiss=\"modal\" data-toggle=\"modal\" href=\"#modalDetHisCob\"><i class=\"far fa-eye\"></i></button></td></tr>")
                                    totalCuota += Number.parseFloat(value.monto_const);
                                });
                                $('.btnMostrarHisCob').click(function() {
                                    var datos = new FormData();
                                    datos.append('idconstancia', $(this).attr('idconstancia'));
                                    $.ajax({
                                      url: 'ajax/constancia.ajax.php',
                                      method: 'POST',
                                      cache: false,
                                      contentType: false,
                                      processData: false,
                                      dataType: 'json',
                                      data: datos,
                                      success: function (data) {
                                        $('#modalmediopago').val(data[0].tipo_pago);
                                        $('#modalfechapago').val(data[0].fecha_pago);
                                        $('#modalobservacion').val(data[0].nota_const);
                                        $('#modalmontopagado').val(data[0].monto_const);
                                      },
                                    });
                                });
                                $("#deuda").val((Number.parseFloat($(btnSeleccion).attr("monto")) - totalCuota).toFixed(2));
                                if (Number.parseFloat($("#deuda").val()) == 0.00){
                                    Swal.fire('Cliente no tiene monto pendiente!', '', 'info')
                                }
                            }
                        })                       
                    } else if (result.isDenied) {
                        Swal.fire('Cambios no realizado', '', 'info')
                    }
                })
            });
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
}


$(".btnPreConstancia").click(function() {
    var iddetallecobranza = $(btnSeleccion).attr("iddetallecobranza");
    var idcobranza = $(btnSeleccion).attr("idcobranza");
    var fecha_pago = $("#fecha_pago").val();
    var tipo_pago = $("#tipo_pago").val();
    var monto_const = $("#monto_const").val();
    var nota_const = $("#nota_const").val();
    var datos = new FormData();
    datos.append("iddetallecobranza", iddetallecobranza);
    datos.append("idcobranza", idcobranza);
    datos.append("fecha_pago", fecha_pago);
    datos.append("tipo_pago", tipo_pago);
    datos.append("monto_const", monto_const);
    datos.append("nota_const", nota_const);

    if (Number.parseFloat(monto_const) <= Number.parseFloat($("#deuda").val()) && Number.parseFloat(monto_const) > 0.00) {
        if (fecha_pago) {
            if (tipo_pago) {
                $.ajax({
                url: "ajax/constancia.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                error: function(respuesta) {
                    console.log("Error", respuesta);
                }
            })

            $(btnSeleccion).removeClass('btn-success btn-warning btn-danger btn-primary');
            var deuda = Number.parseFloat($("#deuda").val());
            var monto = deuda - Number.parseFloat($("#monto_const").val());
            if (monto == Number.parseFloat($(btnSeleccion).attr("monto"))) {
                $(btnSeleccion).addClass('btn-primary');
                $(btnSeleccion).html('Pendiente');
                $(btnSeleccion).attr('estado', 0);
                $("#btnEstado"+$(btnSeleccion).attr('indice')).attr("estado", 0);
            } else if (monto == 0.00){    
                $(btnSeleccion).addClass('btn-success');
                $(btnSeleccion).html('Pagado');
                $(btnSeleccion).attr('estado', 1);
                $("#btnEstado"+$(btnSeleccion).attr('indice')).attr("estado", 1);
            } else if ((monto < Number.parseFloat($(btnSeleccion).attr("monto"))) && monto > 1){    
                $(btnSeleccion).addClass('btn-warning');
                $(btnSeleccion).html('A deuda');
                $(btnSeleccion).attr('estado', 2);
                $("#btnEstado"+$(btnSeleccion).attr('indice')).attr("estado", 2);
            } else if (estado == 3){    
                $(btnSeleccion).addClass('btn-danger');
                $(btnSeleccion).html('Vencido');
                $(btnSeleccion).attr('estado', 3);
                $("#btnEstado"+$(btnSeleccion).attr('indice')).attr("estado", 3);
            } 

            var idcobranza = $(btnSeleccion).attr("idcobranza");
            var estado = $(btnSeleccion).attr("estado");
            var datos = new FormData();
            datos.append("idcobranza", idcobranza);
            datos.append("estado", estado);
            $.ajax({
                url: "ajax/cobranza.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {}
            })
            $("#modalConstancia").modal("hide"); 
            Swal.fire('Cambio Realizado!', '', 'success')
            } else {
                Swal.fire('Seleccion medio de pago!', '', 'error') 
            }
            
        }else {
           Swal.fire('Fecha de pago no se ingreso!', '', 'error') 
        }
    } else if (!Number.parseFloat(monto_const) ){
        Swal.fire('Ingrese un monto!', '', 'error')
    } else if (Number.parseFloat($("#deuda").val()) == 0.00){
        Swal.fire('Cliente no tiene monto pendiente!', '', 'info')
    } else {
        Swal.fire('El monto ingresado es mayor al monto pendiente!', '', 'error')
    }
})

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

$('#fecha_busqueda').val(getFechaMes());

$(".btnAgregarCobranza").click(function() {
    $("#mostrarCobranza > tbody").empty();
    var idlocalcliente = $("#idlocalcliente").val();
    var idcliente = $("#idcliente").val();
    var idubicacion = $("#idubicacion").val();
    var fecha_vencimiento = $("#fecha_vencimiento").val();
    var fecha_emision = $("#fecha_emision").val();
    var descripcion = $("#descripcion").val();
    var idplan = $("#idplan").val();
    var precio = $('#precio').val();
    var nota = $('#nota').val();
    var datos = new FormData();
    datos.append("idlocalcliente", idlocalcliente);
    datos.append("idcliente", idcliente);
    datos.append("idubicacion", idubicacion);
    datos.append("fecha_vencimiento", fecha_vencimiento);
    datos.append("fecha_emision", fecha_emision);
    datos.append("descripcion", descripcion);
    datos.append("idplan", idplan);
    datos.append("precio", precio);
    datos.append("nota", nota);
    if (idlocalcliente && idubicacion && fecha_vencimiento && fecha_emision && idplan && precio > 0) {
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
                title: 'Cobranza Generada!',
                text: '¡La cobranza se agregado correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.value) {
                    limpiarCobranza();
                    listarCobranzas(idcliente);
                }
            })
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
    } else {
        Swal.fire('Ingresar Datos en el formulario!!', '', 'error')
        listarCobranzas(idcliente)
    }
    
})

$(".btnFiltroMes").click(function() {
    $('#mostrarPendiente').DataTable().clear().draw(false);
    $('#mostrarPagado').DataTable().clear().draw(false);
    var fecha_busqueda = $("#fecha_busqueda").val();
    var datos = new FormData();
    datos.append("fecha_busqueda", fecha_busqueda);
    $.ajax({
        url: "ajax/cobranza.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $('#mostrarPendiente').DataTable().clear().draw();
            $('#mostrarPagado').DataTable().clear().draw();
            $.each(respuesta, function(index, value) {
                if (value.estado == 0) {
                    $('#mostrarPendiente').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button id='btnEstado"+index+"' estado='0' idcobranza="+value.idcobranza+" class=\"btn btn-warning btn-s btnConstancia\" target=\"_blank\"><i class=\"fas fa-paste\"></i></button></abbr></div>", value.ruc,value.razonsocial, value.plan,value.monto, value.fechavencimiento, "<button class='btn btn-primary btn-xs btnActivarC' iddetallecobranza='" + value.iddetallecobranza + "' idcobranza='" + value.idcobranza + "' indice="+index+" estado='0' onclick=\"limpiarPreConstancia()\" monto='" + value.monto + "'>Pendiente</button>"]).draw(false)
                } else if (value.estado == 2) {
                    $('#mostrarPendiente').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button id='btnEstado"+index+"' estado='2' idcobranza="+value.idcobranza+" class=\"btn btn-warning btn-s btnConstancia\" target=\"_blank\"><i class=\"fas fa-paste\"></i></button></abbr></div>", value.ruc,value.razonsocial, value.plan,value.monto, value.fechavencimiento, "<button class='btn btn-warning btn-xs btnActivarC' iddetallecobranza='" + value.iddetallecobranza + "' idcobranza='" + value.idcobranza + "' indice="+index+" estado='2' onclick=\"limpiarPreConstancia()\" monto='" + value.monto + "'>A deuda</button>"]).draw(false)
                } else if (value.estado == 3) {
                    $('#mostrarPendiente').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button id='btnEstado"+index+"' estado='3' idcobranza="+value.idcobranza+" class=\"btn btn-warning btn-s btnConstancia\" target=\"_blank\"><i class=\"fas fa-paste\"></i></button></abbr></div>", value.ruc,value.razonsocial, value.plan,value.monto, value.fechavencimiento, "<button class='btn btn-danger btn-xs btnActivarC' iddetallecobranza='" + value.iddetallecobranza + "' idcobranza='" + value.idcobranza + "' indice="+index+" estado='3' onclick=\"limpiarPreConstancia()\" monto='" + value.monto + "'>Vencido</button>"]).draw(false)
                } else if (value.estado == 1) {
                    $('#mostrarPagado').DataTable().row.add(["<div scope=\"row\" class=\"text-center\"><abbr title=\"Ver Detalles\"><button class=\"btn btn-info btn-s btnMostraDetCob\" idcobranza="+ value.idcobranza +" value='"+ index +"' data-toggle=\"modal\" data-target=\"#modalDetCob\"><i class=\"far fa-eye\"></i></button></abbr> <abbr title=\"Constancia\"><button id='btnEstado"+index+"' estado='1' idcobranza="+value.idcobranza+" class=\"btn btn-warning btn-s btnConstancia\" target=\"_blank\"><i class=\"fas fa-paste\"></i></button></abbr></div>", value.ruc,value.razonsocial, value.plan,value.monto, value.fechavencimiento, "<button class='btn btn-success btn-xs btnActivarC' iddetallecobranza='" + value.iddetallecobranza + "' idcobranza='" + value.idcobranza + "' indice="+index+" estado='1' onclick=\"limpiarPreConstancia()\" monto='" + value.monto + "'>Pagado</button>"]).draw(false)
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
                    $('#modalPlan').val(data[0].plan);
                    $('#modalMonto').val(data[0].monto);
                    $('#modalObservacion').val(data[0].observacion);
                  },
                });
            });

            $(".btnConstancia").click(function() {
                window.open("ajax/generarPDF.php?idcobranza="+$(this).attr("idcobranza"));                    
            });

            $(".btnActivarC").click(function() {
                Swal.fire({
                    title: '¿Seguro que deseas cambiar el estado de cobranza?',
                    showCancelButton: true,
                    confirmButtonText: `Continuar`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        btnSeleccion = this;
                        $("#modalConstancia").modal("show");
                        $("#mostrarSubPagos > tbody").empty();
                        var datos = new FormData();
                        datos.append("idcobranza", $(this).attr("idcobranza"));
                        $.ajax({
                            url: "ajax/constancia.ajax.php",
                            method: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            success: function(respuesta) {
                                totalCuota = 0; 
                                $.each(respuesta, function(index, value){
                                    $('#mostrarSubPagos > tbody').append("<tr><td>" + value.fecha_pago + "</td><td>" + value.monto_const+ "</td><td><a href=\"ajax/generarPDF.php?idconstancia="+value.idconstancia+"\" class=\"btn btn-warning btn-s\" target=\"_blank\"><i class=\"far fa-file-alt\"></i></a> <button class=\"btn btn-info btn-s btnMostrarHisCob\" idconstancia="+ value.idconstancia +" value='"+ index +"' data-dismiss=\"modal\" data-toggle=\"modal\" href=\"#modalDetHisCob\"><i class=\"far fa-eye\"></i></button></td></tr>")
                                    totalCuota += Number.parseFloat(value.monto_const);
                                });
                                $('.btnMostrarHisCob').click(function() {
                                    var datos = new FormData();
                                    datos.append('idconstancia', $(this).attr('idconstancia'));
                                    $.ajax({
                                      url: 'ajax/constancia.ajax.php',
                                      method: 'POST',
                                      cache: false,
                                      contentType: false,
                                      processData: false,
                                      dataType: 'json',
                                      data: datos,
                                      success: function (data) {
                                        $('#modalmediopago').val(data[0].tipo_pago);
                                        $('#modalfechapago').val(data[0].fecha_pago);
                                        $('#modalobservacion').val(data[0].nota_const);
                                        $('#modalmontopagado').val(data[0].monto_const);
                                      },
                                    });
                                });
                                $("#deuda").val((Number.parseFloat($(btnSeleccion).attr("monto")) - totalCuota).toFixed(2));
                                if (Number.parseFloat($("#deuda").val()) == 0.00){
                                    Swal.fire('Cliente no tiene monto pendiente!', '', 'info')
                                }
                            }
                        })                       
                    } else if (result.isDenied) {
                        Swal.fire('Cambios no realizado', '', 'info')
                    }
                })
            });
           
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
})

init();
