/*     PAGOS ACTA IMPUESTOS       */
//js para pagosactaimpuestos

function sumaimpuestototal(){
    let num1 = parseFloat(Number(document.getElementById('monto1').value));
    let num2 = parseFloat(Number(document.getElementById('monto2').value));
    let num3 = parseFloat(Number(document.getElementById('monto3').value));
    let num4 = parseFloat(Number(document.getElementById('monto4').value));
    let num5 = parseFloat(Number(document.getElementById('monto5').value));
    let num6 = parseFloat(Number(document.getElementById('monto6').value));
    let num7 = parseFloat(Number(document.getElementById('monto7').value));
    let num8 = parseFloat(Number(document.getElementById('monto8').value));
    let num9 = parseFloat(Number(document.getElementById('monto9').value));
    let num10 = parseFloat(Number(document.getElementById('monto10').value));
    let num11 = parseFloat(Number(document.getElementById('monto11').value));
    let num12 = parseFloat(Number(document.getElementById('monto12').value));
    let res=(num1 + num2 + num3 + num4 + num5 + num6 + num7 + num8 + num9 + num10 + num11 + num12).toFixed(2);

    document.getElementById('totalgeneral1').value=res;
}
//meses enero a diciembre
function sumaenero(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo1').value));
    let num2 = parseFloat(Number(document.getElementById('citan1').value));
    let num3 = parseFloat(Number(document.getElementById('monto1').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totalenero').value=res;
}
function sumafebrero(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo2').value));
    let num2 = parseFloat(Number(document.getElementById('citan2').value));
    let num3 = parseFloat(Number(document.getElementById('monto2').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totalfebrero').value=res;
}
function sumamarzo(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo3').value));
    let num2 = parseFloat(Number(document.getElementById('citan3').value));
    let num3 = parseFloat(Number(document.getElementById('monto3').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totalmarzo').value=res;
}
function sumaabril(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo4').value));
    let num2 = parseFloat(Number(document.getElementById('citan4').value));
    let num3 = parseFloat(Number(document.getElementById('monto4').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totalabril').value=res;
}
function sumamayo(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo5').value));
    let num2 = parseFloat(Number(document.getElementById('citan5').value));
    let num3 = parseFloat(Number(document.getElementById('monto5').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totalmayo').value=res;
}
function sumajunio(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo6').value));
    let num2 = parseFloat(Number(document.getElementById('citan6').value));
    let num3 = parseFloat(Number(document.getElementById('monto6').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totaljunio').value=res;
}
function sumajulio(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo7').value));
    let num2 = parseFloat(Number(document.getElementById('citan7').value));
    let num3 = parseFloat(Number(document.getElementById('monto7').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totaljulio').value=res;
}
function sumaagosto(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo8').value));
    let num2 = parseFloat(Number(document.getElementById('citan8').value));
    let num3 = parseFloat(Number(document.getElementById('monto8').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totalagosto').value=res;
}
function sumasetiembre(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo9').value));
    let num2 = parseFloat(Number(document.getElementById('citan9').value));
    let num3 = parseFloat(Number(document.getElementById('monto9').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totalsetiembre').value=res;
}
function sumaoctubre(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo10').value));
    let num2 = parseFloat(Number(document.getElementById('citan10').value));
    let num3 = parseFloat(Number(document.getElementById('monto10').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totaloctubre').value=res;
}
function sumanoviembre(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo11').value));
    let num2 = parseFloat(Number(document.getElementById('citan11').value));
    let num3 = parseFloat(Number(document.getElementById('monto11').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totalnoviembre').value=res;
}
function sumadiciembre(){
    let num1 = parseFloat(Number(document.getElementById('utisaldo12').value));
    let num2 = parseFloat(Number(document.getElementById('citan12').value));
    let num3 = parseFloat(Number(document.getElementById('monto12').value));
    let res=(num1+num2+num3).toFixed(2);
    document.getElementById('totaldicimebre').value=res;
    //cambiar background color si es mayor a cero
    if(res>0){
        document.getElementById('totaldicimebre').style.backgroundColor='#00ff00';
    }
    //cambiar background color si es menor a cero
    if(res<0){
        document.getElementById('totaldicimebre').style.backgroundColor='#FF3D3D';
    }
}


