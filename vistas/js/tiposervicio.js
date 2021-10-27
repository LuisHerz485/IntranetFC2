function init() {
  mostrarform(false);
}

function limpiar() {
  $("#editar").val("no");
  $("#idcategoriaservicio option:selected").removeAttr("selected");
  $("#idcategoriaservicio option[value=0]").attr("selected", true);
  $("#nombre").val("");
  $("#descripcion").val("");
  $("#precio").val("");
}

function mostrarform(flag) {
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("#btnagregar").show();
  }
}

function cancelarform() {
  limpiar();
  mostrarform(false);
}

$(document).on("click", ".btnEditarTS", function () {
  $("#modalservicio").modal("show");
  $("#editarS").val("si");
  var idservicio = $(this).attr("idservicio");
  var datos = new FormData();
  datos.append("idservicio", idservicio);
  $.ajax({
    url: "ajax/tiposervicio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idservicioS").val(respuesta[0]["idservicio"]);
      $("#idcategoriaservicioS").val(respuesta[0]["idcategoriaservicio"]);
      $("#nombreS").val(respuesta[0]["nombre"]);
      $("#descripcionS").val(respuesta[0]["descripcion"]);
      $("#precioS").val(respuesta[0]["precio"]);
    },
    error: function (respuesta) {
      console.log("Error", respuesta);
    },
  });
});

$(".btnMostrarArchivosS").click(function () {
  var idcategoria = $("#idcategoriaservicio").val();
  var datos = new FormData();
  datos.append("idcategoriaservicio", idcategoria);
  $.ajax({
    url: "ajax/tiposervicio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#mostrarArchivoS").DataTable().clear().draw();
      $.each(respuesta, function (index, value) {
        $("#mostrarArchivoS")
          .DataTable()
          .row.add([
            '<button class="btn btn-warning btnEditarTS btn-circle btn-xl" idservicio=' +
              value.idservicio +
              '><i class="fas fa-pencil-alt"></i></button>',
            value.nombre,
            value.descripcion,
            value.precio,
          ])
          .draw(false);
      });
    },
    error: function (respuesta) {
      console.log("Error", respuesta);
    },
  });
});

init();
