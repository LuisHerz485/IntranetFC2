function sumarResulInte()
{
    let num1 = parseFloat(Number(document.getElementById('ventas_netas_servicios').value));
    let num2 = parseFloat(Number(document.getElementById('descuentos_concedidos').value));
    let res = (num1 + num2).toFixed(3);

    document.getElementById('total_ventas_netas').value = res;
}

function restaTotal1()
{
    let num1 = parseFloat(Number(document.getElementById('total_ventas_netas').value));
    let num2 = parseFloat(Number(document.getElementById('costo_de_ventas').value));
    let num3 = parseFloat(Number(document.getElementById('costo_de_servicios').value));
    let res = (num1 + num2 + num3).toFixed(3);

    document.getElementById('utilidad_bruta').value = res;
}

function sumaImpuestoRenta()
{
    let num1 = parseFloat(Number(document.getElementById('utilidad_operativa').value));
    let num2 = parseFloat(Number(document.getElementById('ingresos_financieros').value));
    let num3 = parseFloat(Number(document.getElementById('gastos_financieros').value));
    let res = (num1 + num2 + num3).toFixed(3);

    document.getElementById('utilidad_de_parti').value = res;
}

function sumarUIT()
{
    let num1 = parseFloat(Number(document.getElementById('uit').value));
    let num2 = parseFloat(Number(document.getElementById('exceso').value));
    let res = (num1 + num2).toFixed(3);

    document.getElementById('impuesto_renta').value = res;
}

function prueba1()
{
    let num1 = parseFloat(Number(document.getElementById('impuesto_renta').value));
    let num2 = parseFloat(Number(document.getElementById('utilidad_de_parti').value));
    let res = (num1 + num2).toFixed(3);

    document.getElementById('resultado_ejercicio').value = res;
}

function restaTot()
{
    let num1 = parseFloat(Number(document.getElementById('impuesto_renta').value));
    let num2 = parseFloat(Number(document.getElementById('pagos_cuentas').value));
    let res = (num1 + num2).toFixed(3);

    document.getElementById('regularizacion_de_renta').value = res;
}

function prueba2()
{
    let num1 = parseFloat(Number(document.getElementById('utilidad_bruta').value));
    let num2 = parseFloat(Number(document.getElementById('gastos_de_venta').value));
    let num3 = parseFloat(Number(document.getElementById('gastos_de_administracion').value));
    let num4 = parseFloat(Number(document.getElementById('ganancias_por_activos').value));
    let num5 = parseFloat(Number(document.getElementById('otros_ingresos').value));
    let num6 = parseFloat(Number(document.getElementById('otros_gastos').value));
    let res = (num1 + num2 + num3 + num4 + num5 + num6).toFixed(3);

    document.getElementById('utilidad_operativa').value = res;
}

