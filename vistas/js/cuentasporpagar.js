/*js para cuentasporpagar*/

let migv=1.18;

function calcularigv(){
    let num1 = parseFloat(Number(document.getElementById('base').value));
    let res=(num1 * IGV).toFixed(2);

    document.getElementById('igv').value=res;
}
function sumartotaligv(){
    let num1 = parseFloat(Number(document.getElementById('igv').value));
    let num2 = parseFloat(Number(document.getElementById('base').value));
    let res=(num1+num2).toFixed(2);

    document.getElementById('total').value=res;
}
function basedetotal(){
    let num1 = parseFloat(Number(document.getElementById('total').value));
    let res=(num1 / migv).toFixed(2);
    let num2= (num1 - res).toFixed(2);

    document.getElementById('base').value=res;
    document.getElementById('igv').value=num2;
}

//igv y base apartir de sumatotal
function basetotaltotal(){
    let num1 = parseFloat(Number(document.getElementById('totaltotal123').value));
    let res=(num1 / migv).toFixed(2);
    let num2= (num1 - res).toFixed(2);

    document.getElementById('totaltotalbase').value=res;
    document.getElementById('totaltotaligv').value=num2;
}

//sumar dias a emision
function sumardias(){
    var fechaemision = setDate(document.getElementById('fechaemision').value);
    let dias = parseFloat(Number(document.getElementById('vencimiento').value));
    let res=(fechaemision.getDate() + dias);
    let fecha = new Date(fechaemision.setDate(res));
    document.getElementById('fechapago').value=fecha;

}

var suma = 0;
$('.ttl').each(function(){
       suma += parseFloat($(this).val());
});
function sumartotal(){
    let suma = 0;
    $('.ttl').each(function(){
       suma += parseFloat($(this).val());
    });
    document.getElementById('totaltotal').value=suma;
}
$('#btntotal').on('click', function () {
    calcular();
});


$(document).on('click', '.btn-eliminar-cuentapp', function () {
    let datacuentapp=JSON.parse($(this).attr('datacuentapp'));
    if (datacuentapp) {
        $('#idcuentaporpagar').val(datacuentapp['idcuentaporpagar']);
        $('#opcionesRegistrarCuentapp').addClass('d-none');    
        $('#opcionesEliminarCuentapp').removeClass('d-none');       
    }
});

$(document).on('click', '.btn-modificar-cuentapp', function () {
    let datacuentapp=JSON.parse($(this).attr('datacuentapp'));
    if (datacuentapp) {
        $('#idcuentaporpagar').val(datacuentapp['idcuentaporpagar']);
        $('#ruc').val(datacuentapp['ruc']);
        $('#razonsocial').val(datacuentapp['proovedor']);
        $('#tipodoc').val(datacuentapp['idtipodoccuentapp']).trigger('change');
        $('#serie').val(datacuentapp['serie']);
        $('#numerodoc').val(datacuentapp['numdoc']);
        $('#fechaemision').val(datacuentapp['fechaemision']);
        $('#base').val(datacuentapp['base']);
        $('#igv').val(datacuentapp['igv']);
        $('#total').val(datacuentapp['total']);
        $('#estatus').val(datacuentapp['estatus']);
        $('#vencimiento').val(datacuentapp['vencimiento']);
        $('#fechapago').val(datacuentapp['fechapago']);
        $('#opcionesregistrarcuentapp').addClass('d-none');    
        $('#opcioneseditarcuentapp').removeClass('d-none');       
    }
});

$('#btnregresarcpp').on('click', function () {
    $('#opcionesregistrarcuentapp').removeClass('d-none');
    $('#opcioneseditarcuentapp').addClass('d-none');
    $('#btnlimpiarformcuentapp').trigger('click');
});

$('#btnlimpiarformcuentapp').on('click', function () {
    $('#idcuentaporpagar').val('');
    $('#ruc').val('');
    $('#razonsocial').val('');
    $('#tipodoc').val('').trigger('change');
    $('#serie').val('');
    $('#numerodoc').val('');
    $('#fechaemision').val('');
    $('#base').val('');
    $('#igv').val('');
    $('#total').val('');
    $('#estatus').val('');
    $('#vencimiento').val('');
    $('#fechapago').val('');
    $('form#cuentaporpagarform')[0].reset();

});



function sumardays(){

    var calcfecha = new Date($("#fechaemision").val()+"T00:00:00"); // fuerza la zona horaria  al formato yyyy-MM-ddT00:00:00, si no se hace esto los dias se resta uno
    var calctiempopermiso = parseInt($('#vencimiento').val()); //los dias a sumar

    calcfecha.setDate(calcfecha.getDate() + calctiempopermiso); // se suman los dias mediante setdate
    calcfecha.setMonth(calcfecha.getMonth()); //no se debe sumar 1 porque el metodo botaria error

    var finanno = calcfecha.getFullYear();//guardo año
    var finmes = calcfecha.getMonth();//guardo mes
    var findia = calcfecha.getDate() < 10 ? '0' + calcfecha.getDate() : '' + calcfecha.getDate();// formato a dia para que sea de 2 dígitos "01", "05", "10", etc.

    finmes = finmes + 1; // sume + 1 por que parece que los meses inician desde "0" es decir que enero seria 0 y diciembre seria 11 (para que lo acepte el input date que tengo) 
    finmes = finmes < 10 ? '0' + finmes : '' + finmes; // el mismo tratamiento del día

    let res =  (finanno+"-"+finmes+"-"+findia);

    document.getElementById('fechapago').value = res; // mandamos la respuesta a nuestro input 

}

$('#btnfiltrarcuentas').on('click', function () {
    let formulariocuentacpp = new FormData($('#formcuentaconsulta')[0]);
    formulariocuentacpp.append('opcion', 'filtrartipodoc');

    $.ajax({
        method: 'POST',
        url:'ajax/cuentasporpagar.ajax.php',
        data: formulariocuentacpp,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function ({ respuesta }) {
            let sumatm=0;
            let sumabase=0;
            let sumaigv=0;
            $('#tablacuentas').DataTable().clear().draw();
            $.each(respuesta, function (index, value) {

                $('#tablacuentas')
                .DataTable()
                .row.add([
                  value.ruc,
                  value.proovedor,
                  value.tipodoc,
                  value.serie,
                  value.numdoc,
                  value.fechaemision,
                  value.base,
                  value.igv,
                  value.total,
                  value.estatus,
                  value.vencimiento,
                  value.fechapago,
                  `<button class="btn btn-info btn-sm btn-modificar-cuentapp" datacuentapp='${JSON.stringify(value)}'><i class="fas fa-edit"></i></button>
                    <button id="btneliminarcuentapp" class="btn btn-danger btn-sm btn-eliminar-cuentapp" datacuentapp='${JSON.stringify(value)}'><i class="fas fa-trash-alt"></i></button>
                  `,
                  
                ])
                .draw(false);
                sumatm +=+value.total;
                sumatm2 = sumatm.toFixed(2);

                sumabase +=+value.base;
                sumabase2 = sumabase.toFixed(2);

                sumaigv +=+value.igv;
                sumaigv2 = sumaigv.toFixed(2);
            });
            
            document.getElementById('totaltotal123').value=sumatm2;
            document.getElementById('totaltotalbase').value=sumabase2;
            document.getElementById('totaltotaligv').value=sumaigv2;

        },
        error: function ({ respuesta }) {
            console.log('Error',respuesta,'hola');
        },
    });
});

//eliminar cuentas por pagar con id
$('#tablacuentas').on('click', '.btn-eliminar-cuentapp', function () {
    let datacuentapp = JSON.parse($(this).attr('datacuentapp'));
    let idcuentapp = datacuentapp['idcuentaporpagar'];
    Swal.fire({
        title: '¿Está seguro de eliminar la cuenta por pagar?',
        text: "¡Si no lo está puede cancelar la acción!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar cuenta por pagar!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: 'POST',
                url: 'ajax/cuentasporpagar.ajax.php',
                data: {
                    'opcion': 'eliminarcuentaporpagar',
                    'idcuentapp': idcuentapp,
                },
                dataType: 'json',
                success: function ({ respuesta }) {
                    if (respuesta) {
                        Swal.fire(
                            '¡Eliminado!',
                            'La cuenta por pagar ha sido eliminada.',
                            'success'
                        )
                        $('#btneliminarcuentapp').attr('datacuentapp', '');
                        $('#btnfiltrarcuentas').trigger('click');
                    } else {
                        Swal.fire(
                            'Error',
                            'No se pudo eliminar la cuenta por pagar.',
                            'error'
                        )
                    }
                },
                error: function ({ respuesta }) {
                    console.log('Error', respuesta,'hola');
                    $('#btneliminarcuentapp').attr('datacuentapp', '');
                        $('#btnfiltrarcuentas').trigger('click');
                },
            });
        }
    });
});


$('#listarregistros').on('click', function () {
    let formulariocuentacpp = new FormData($('#formcuentaconsulta')[0]);
    formulariocuentacpp.append('opcion', 'listarcuentasporpagar');

    $.ajax({
        method: 'POST',
        url:'ajax/cuentasporpagar.ajax.php',
        data: formulariocuentacpp,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function ({ respuesta }) {
            let sumatm=0;
            let sumabase=0;
            let sumaigv=0;
            $('#tablacuentas').DataTable().clear().draw();
            $.each(respuesta, function (index, value) {

                $('#tablacuentas')
                .DataTable()
                .row.add([
                  value.ruc,
                  value.proovedor,
                  value.tipodoc,
                  value.serie,
                  value.numdoc,
                  value.fechaemision,
                  value.base,
                  value.igv,
                  value.total,
                  value.estatus,
                  value.vencimiento,
                  value.fechapago,
                  `<button class="btn btn-info btn-sm btn-modificar-cuentapp" datacuentapp='${JSON.stringify(value)}'><i class="fas fa-edit"></i></button>
                    <button id="btneliminarcuentapp" class="btn btn-danger btn-sm btn-eliminar-cuentapp" datacuentapp='${JSON.stringify(value)}'><i class="fas fa-trash-alt"></i></button>
                  `,
                ])
                .draw(false);
                sumatm +=+value.total;
                sumatm2 = sumatm.toFixed(2);
                
                sumabase +=+value.base;
                sumabase2 = sumabase.toFixed(2);

                sumaigv +=+value.igv;
                sumaigv2 = sumaigv.toFixed(2);
            });
            document.getElementById('totaltotal123').value=sumatm2;
            document.getElementById('totaltotalbase').value=sumabase2;
            document.getElementById('totaltotaligv').value=sumaigv2;

        },
        error: function ({ respuesta }) {
            console.log('Error',respuesta,'hola');
        },
    });
});
/*

$('#btnfiltrarCliente').on('click', function () {
    let formularioDeclaracioncliente = new FormData(
      $('#fomularioFiltroDeclaracionClientes')[0]
    );
    formularioDeclaracioncliente.append('opcion', 'ConsultarDeclaracionClientes');
    $.ajax({
      url: 'ajax/declaracionSunat.ajax.php',
      method: 'POST',
      data: formularioDeclaracioncliente,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function ({ respuesta }) {
        $('#tblReporteDeclaracionSunat').DataTable().clear().draw();
        $.each(respuesta, function (index, value) {
          if (value.estado === null) {
            rowestado = `<h3><span class="badge badge-primary">Pendiente</span></h3>`;
          } else if (value.estado == 'Dentro de plazo') {
            rowestado = `<h3><span class="badge badge-success">${value.estado}</span></h3>`;
          } else if (value.estado == 'Fuera de plazo') {
            rowestado = `<h3><span class="badge badge-danger">${value.estado}</span></h3>`;
          }
          $('#tblReporteDeclaracionSunat')
            .DataTable()
            .row.add([
              value.mes,
              value.fechavencimiento,
              rowestado,
              value.fechadeclarada,
              value.numOrden,
            ])
            .draw(false);
        });
      },
      error: function ({ respuesta }) {
        console.log('Error', respuesta);
      },
    });
  });




/*
function sumardias(){
    var fecha = new Date($('#fechaemision').val());
    var dias = parseFloat(Number(document.getElementById('vencimiento').value));
    fecha.setDate(fecha.getDate() + dias + 1 );
    console.info(fecha)
    document.getElementById('fechapago').value=fecha;
}
*/