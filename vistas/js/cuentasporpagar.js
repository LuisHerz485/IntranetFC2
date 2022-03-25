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

$('#btnfiltrarcuentas').on('click', function () {
    
    $.ajax({

    success: function ({ respuesta }) {
        $('#tblDeclaracionSunat').DataTable().clear().draw();

    }
    });
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




/*
function sumardias(){
    var fecha = new Date($('#fechaemision').val());
    var dias = parseFloat(Number(document.getElementById('vencimiento').value));
    fecha.setDate(fecha.getDate() + dias + 1 );
    console.info(fecha)
    document.getElementById('fechapago').value=fecha;
}
*/