function init(){
	mostrarDetCob(false);
	mostrarformGC(false);
}

function mostrarDetCob(flag) {
    if (flag) {
        $("#listadoCobranza").hide();
        $("#mostrarformGC").hide();
        $("#mostrarDetCob").show();
    } else {
        $("#listadoCobranza").show();
        $("#mostrarDetCob").hide();
        $("#mostrarformGC").hide();
    }
}

function mostrarformGC(flag) {
    if (flag) {
        $("#listadoCobranza").hide();
        $("#mostrarformGC").show();
        $("#mostrarDetCob").hide();
    } else {
        $("#listadoCobranza").show();
        $("#mostrarDetCob").hide();
        $("#mostrarformGC").hide();
    }
}

function cancelarformGC(flag){
	mostrarformGC(false);
}

init();