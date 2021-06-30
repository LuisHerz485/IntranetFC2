function init() {
	mostrarformU(false);
}

function limpiar(){
	$("#direccion").val("");
}

function mostrarformU(flag) {
	if (flag) {
		$("#listadoregistrosU").hide();
		$("#formularioregistrosU").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
	} else {
		$("#listadoregistrosU").show();
		$("#formularioregistrosU").hide();
        $("#btnagregar").show();
	}
}

function cancelarformU() {
    limpiar();
    mostrarformU(false);
}

init();