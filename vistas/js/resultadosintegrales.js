function sumarResulInte()
{
    let num1 = parseFloat(Number(document.getElementById('ventas_netas_servicios').value));
    let num2 = parseFloat(Number(document.getElementById('descuentos_concedidos').value));
    let res = (num1 + num2).toFixed(3);

    document.getElementById('total_ventas_netas').value = res;
}


function restaTotal1(){
    let num1 = parseFloat(Number(document.getElementById('total_ventas_netas').value));
    let num2 = parseFloat(Number(document.getElementById('costo_de_ventas').value));
    let num3 = parseFloat(Number(document.getElementById('costo_de_servicios').value));
    let res = (num1 + num2 + num3).toFixed(3);

    document.getElementById('utilidad_bruta').value = res;
}

function sumaImpuestoRenta(){
    let num1 = parseFloat(Number(document.getElementById('utilidad_operativa').value));
    let num2 = parseFloat(Number(document.getElementById('ingresos_financieros').value));
    let num3 = parseFloat(Number(document.getElementById('gastos_financieros').value));
    let res = (num1 + num2 + num3).toFixed(3);

    document.getElementById('utilidad_de_parti').value = res;
}