var opcion = false;
$("#idplan").change(function() {
	if (this.value == 6) {
		var datos = new FormData();
		datos.append("listar", true);
		$.ajax({
        url: "ajax/servicio.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
        	var opciones = "";
        	opcion = true;
        	$.each(respuesta, function(index, value) {
                opciones += '<option>' + value.nombre + '</option>';
            });
            $("#descripcion").replaceWith('<select name="descripcion" id="descripcion" class="form-control select2" data-live-search="true" required>' + 
        		opciones + '</select>');
            $('#descripcion').select2({
			    theme: "bootstrap4",
			    placeholder: "Seleccione una opción",
			});
        },
        error: function(respuesta) {
            console.log("Error", respuesta);
        }
    });
	} else {
		if (opcion == true){
			$('#descripcion').select2('destroy');
			$("#descripcion").replaceWith('<input type="text" class="form-control" name="descripcion" id="descripcion">');
			opcion = false;
		}
	}
})