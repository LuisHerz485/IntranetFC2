bsCustomFileInput.init();

$("#archivos").on("change", function (e) {
  var files = [];
  for (var i = 0; i < $(this)[0].files.length; i++) {
    files.push($(this)[0].files[i].name);
  }
  $("#txtArchivos").html(files.join(", "));
});

function getArchivoInfo(mimeType) {
  switch (mimeType) {
    case "application/pdf": {
      return {
        icono: '<i class="fas fa-file-pdf" style="color:red" ></i>',
        tipo: "Adobe Acrobat Document",
      };
    }
    case "application/vnd.ms-excel": {
      return {
        icono: '<i class="fas fa-file-excel" style="color:green"></i>',
        tipo: "Hoja de cálculo de Microsoft Excel",
      };
    }
    case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet": {
      return {
        icono: '<i class="fas fa-file-excel" style="color:green"></i>',
        tipo: "Hoja de cálculo de Microsoft Excel",
      };
    }
    case "application/vnd.openxmlformats-officedocument.wordprocessingml.document": {
      return {
        icono: '<i class="fas fa-file-word" style="color:blue"></i>',
        tipo: "Documento de Microsoft Word",
      };
    }
    case "image/jpeg": {
      return {
        icono: '<i class="fas fa-file-image" style="color:DodgerBlue"></i>',
        tipo: "Archivo JPEG",
      };
    }
    case "image/png": {
      return {
        icono: '<i class="fas fa-file-image" style="color:DodgerBlue"></i>',
        tipo: "Archivo PNG",
      };
    }
    case "image/jpg": {
      return {
        icono: '<i class="fas fa-file-image" style="color:DodgerBlue"></i>',
        tipo: "Archivo JPG",
      };
    }
    case "image/webp": {
      return {
        icono: '<i class="fas fa-file-image" style="color:DodgerBlue"></i>',
        tipo: "Archivo WEBP",
      };
    }
    case "video/mp4": {
      return {
        icono: '<i class="fas fa-file-video"  style="color:SlateBlue"></i>',
        tipo: "Archivo MP4",
      };
    }
    case "application/rar": {
      return {
        icono: '<i class="fas fa-file-archive" style="color:Tomato"></i>',
        tipo: "Archivo WinRAR",
      };
    }
    case "application/tar": {
      return {
        icono: '<i class="fas fa-file-archive" style="color:Tomato"></i>',
        tipo: "Archivo TAR",
      };
    }
    case "application/zip": {
      return {
        icono: '<i class="fas fa-file-archive" style="color:Tomato"></i>',
        tipo: "Archivo WinRAR ZIP",
      };
    }
    case "text/plain": {
      return {
        icono: '<i class="fas fa-file-alt"></i>',
        tipo: "Archivo de Texto",
      };
    }
    case "application/vnd.google-apps.folder": {
      return {
        icono: '<i class="fas fa-folder" style="color:orange"></i>',
        tipo: "Carpeta de Archivos",
      };
    }
    default: {
      return {
        icono: '<i class="fas fa-file"></i>',
        tipo: "Archivo",
      };
    }
  }
}

$("#btnListarArchivos").on("click", function () {
  Swal.fire({
    title: "Listando archivos y carpetas",
    allowEscapeKey: false,
    allowOutsideClick: false,
    onOpen: () => {
      Swal.showLoading();
    },
  });
  let carpetaPadreId = $(this).attr("carpetaPadreId");
  $.ajax({
    method: "POST",
    url: "ajax/drive.ajax.php",
    data: {
      opcion: "listar",
      carpetaPadreId: carpetaPadreId,
    },
    dataType: "json",
    success: function (response) {
      Swal.close();
      let tabla = $("#mostrarArchivos").DataTable();
      tabla.clear().draw();
      $.each(response, (index, item) => {
        let archivo = getArchivoInfo(item["mimeType"]);
        if (item["mimeType"] == "application/vnd.google-apps.folder") {
          tabla.row
            .add([
              `<button class="btn btn-warning mx-1 btn-ingresar-archivo" carpetaPadreId="${item["id"]}" carpetanombre="${item["name"]}"><i class="fas fa-sign-in-alt"></i></button>`,
              `${archivo.icono} ${item["name"]}`,
              archivo.tipo,
              new Date(item["createdTime"]).toLocaleString(),
            ])
            .draw();
        } else {
          tabla.row
            .add([
              `<a href="${item["webContentLink"]}" class="btn btn-success mx-1 btn-descargar-archivo"><i class="fas fa-arrow-down"></i></a><a href="${item["webViewLink"]}" target="_blank" class="btn btn-primary mx-1 btn-ver-archivo"><i class="fas fa-eye"></i></a><button class="btn btn-danger mx-1 btn-eliminar-archivo" archivoID="${item["id"]}" ><i class="fas fa-trash-alt"></i></button>`,
              `${archivo.icono} ${item["name"]}`,
              archivo.tipo,
              new Date(item["createdTime"]).toLocaleString(),
            ])
            .draw();
        }
      });
    },
    error: function () {
      Swal.close();
      Swal.fire({
        title: "Error!",
        text: "¡Error desconocido!",
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
  });
});

$("#btnVolverAlInicio").on("click", function () {
  $("#btnListarArchivos").attr("carpetaPadreId", "").click();
  $("#direcciones li:not(:first-child)").remove();
});

$("#btnSubirNivel").on("click", function () {
  Swal.fire({
    title: "Subiendo de carpeta",
    allowEscapeKey: false,
    allowOutsideClick: false,
    onOpen: () => {
      Swal.showLoading();
    },
  });
  carpetaPadreIds = $("#btnListarArchivos").attr("carpetaPadreId");
  $("#direcciones li:last-child").remove();
  $.ajax({
    method: "POST",
    url: "ajax/drive.ajax.php",
    data: {
      opcion: "subir-nivel",
      carpetaPadreId: carpetaPadreIds,
    },
    dataType: "json",
    success: function (response) {
      Swal.close();
      let tabla = $("#mostrarArchivos").DataTable();
      tabla.clear().draw();
      $.each(response, (index, item) => {
        let archivo = getArchivoInfo(item["mimeType"]);
        $("#btnSubirNivel").attr("carpetaPadreId", item["parents"][0]);
        $("#btnListarArchivos").attr("carpetaPadreId", item["parents"][0]);
        if (item["mimeType"] == "application/vnd.google-apps.folder") {
          tabla.row
            .add([
              `<button class="btn btn-warning mx-1 btn-ingresar-archivo" carpetaPadreId="${item["id"]}" carpetanombre="${item["name"]}"><i class="fas fa-sign-in-alt"></i></button>`,
              `${archivo.icono} ${item["name"]}`,
              archivo.tipo,
              new Date(item["createdTime"]).toLocaleString(),
            ])
            .draw();
        } else {
          tabla.row
            .add([
              `<a href="${item["webContentLink"]}" class="btn btn-success mx-1 btn-descargar-archivo"><i class="fas fa-arrow-down"></i></a><a href="${item["webViewLink"]}" target="_blank" class="btn btn-primary mx-1 btn-ver-archivo"><i class="fas fa-eye"></i></a><button class="btn btn-danger mx-1 btn-eliminar-archivo" archivoID="${item["id"]}" ><i class="fas fa-trash-alt"></i></button>`,
              `${archivo.icono} ${item["name"]}`,
              archivo.tipo,
              new Date(item["createdTime"]).toLocaleString(),
            ])
            .draw();
        }
      });
    },
    error: function () {
      Swal.close();
      Swal.fire({
        title: "Error!",
        text: "¡Error no se puede subir!",
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
  });
});

$(document).on("click", ".btn-ingresar-archivo", function () {
  $("#btnListarArchivos")
    .attr("carpetaPadreId", $(this).attr("carpetaPadreId"))
    .attr("carpetanombre", $(this).attr("carpetanombre"))
    .click();

  $("#direcciones").append(
    '<li class="breadcrumb-item active"><a>' +
      $(this).attr("carpetanombre") +
      "</a></li>"
  );
});

$("#btnCrearCarpeta").on("click", function () {
  Swal.fire({
    title: "Creando carpeta",
    allowEscapeKey: false,
    allowOutsideClick: false,
    onOpen: () => {
      Swal.showLoading();
    },
  });
  let form = new FormData($("#frmCrearCarpeta").get(0));
  $("#icoCargandoCrearCarpeta").removeClass("d-none");
  form.append("carpetaPadreId", $("#btnListarArchivos").attr("carpetaPadreId"));
  form.append("opcion", "crear-carpeta");
  $.ajax({
    method: "POST",
    url: "ajax/drive.ajax.php",
    data: form,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    success: function ({ respuesta }) {
      Swal.close();
      $("#icoCargandoCrearCarpeta").addClass("d-none");
      if (respuesta) {
        $("#btnListarArchivos").click();
        $("#frmCrearCarpeta").get(0).reset();
        $("#modalCrearCarpeta").modal("hide");
        Swal.fire({
          title: "Creado!",
          text: "¡Se creo la carpeta correctamente!",
          icon: "success",
          confirmButtonText: "Ok",
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: "¡No se pudo crear la carpeta!",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
    error: function () {
      Swal.close();
      Swal.fire({
        title: "Error!",
        text: "¡Error desconocido!",
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
  });
});

$(document).on("click", ".btn-eliminar-archivo", function () {
  Swal.fire({
    title: "¿Seguro que desea eliminar la carpeta o archivo?",
    showCancelButton: true,
    confirmButtonText: `Si`,
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminando el Archivo",
        allowEscapeKey: false,
        allowOutsideClick: false,
        onOpen: () => {
          Swal.showLoading();
        },
      });
      let archivoID = $(this).attr("archivoID");
      $.ajax({
        method: "POST",
        url: "ajax/drive.ajax.php",
        data: {
          opcion: "eliminar-archivo",
          archivoID: archivoID,
        },
        dataType: "json",
        success: function ({ respuesta }) {
          Swal.close();
          if (respuesta) {
            $("#btnListarArchivos").click();
            Swal.fire({
              title: "Eliminado!",
              text: "¡Se elimino correctamente!",
              icon: "success",
              confirmButtonText: "Ok",
            });
          } else {
            Swal.fire({
              title: "Error!",
              text: "¡No se pudo eliminar!",
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
        error: function () {
          Swal.close();
          Swal.fire({
            title: "Error!",
            text: "¡Error desconocido!",
            icon: "error",
            confirmButtonText: "Ok",
          });
        },
      });
    }
  });
});

$("#btnSubirArchivos").on("click", function () {
  Swal.fire({
    title: "Subiendo los archivos",
    allowEscapeKey: false,
    allowOutsideClick: false,
    onOpen: () => {
      Swal.showLoading();
    },
  });
  let form = new FormData($("#frmSubirArchivo").get(0));
  $("#icoSubirArchivo").removeClass("d-none");
  form.append("carpetaPadreId", $("#btnListarArchivos").attr("carpetaPadreId"));
  form.append("opcion", "subir-archivo");
  $.ajax({
    method: "POST",
    url: "ajax/drive.ajax.php",
    data: form,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    success: function ({ respuesta }) {
      Swal.close();
      $("#icoSubirArchivo").addClass("d-none");
      if (respuesta) {
        $("#modalSubirArchivo").modal("hide");
        $("#frmSubirArchivo").get(0).reset();
        $("#btnListarArchivos").click();
        Swal.fire({
          title: "Subido!",
          text: "¡Se subio el archivo correctamente!",
          icon: "success",
          confirmButtonText: "Ok",
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: "¡No se pudo subir el archivo!",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
    error: function () {
      Swal.close();
      Swal.fire({
        title: "Error!",
        text: "¡Error desconocido!",
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
    complete: function () {
      $("#audio")[0].play();
    },
  });
});

$("#btnFormSubirArchivo").on("click", function () {
  $("#modalSubirArchivo").modal("show");
});

$("#btnFormCrearCarpeta").on("click", function () {
  $("#modalCrearCarpeta").modal("show");
});

//Cliente
let recibo = false;
$("#btnListarArchivosCliente").on("click", function () {
  Swal.fire({
    title: "Listando archivos y carpetas",
    allowEscapeKey: false,
    allowOutsideClick: false,
    onOpen: () => {
      Swal.showLoading();
    },
  });
  let carpetaPadreId = $(this).attr("carpetaPadreId");
  $.ajax({
    method: "POST",
    url: "ajax/drive.ajax.php",
    data: {
      opcion: "listar",
      carpetaPadreId: carpetaPadreId,
    },
    dataType: "json",
    success: function (response) {
      Swal.close();
      let tabla = $("#mostrarArchivos").DataTable();
      tabla.clear().draw();
      $.each(response, (index, item) => {
        let archivo = getArchivoInfo(item["mimeType"]);
        if (item["mimeType"] == "application/vnd.google-apps.folder") {
          tabla.row
            .add([
              `<button class="btn btn-warning mx-1 btn-ingresar-archivo-cliente" recibido="${
                item["name"] == "Recibidos" ? "true" : "false"
              }"" carpetaPadreId="${
                item["id"]
              }"><i class="fas fa-sign-in-alt"></i></button>${
                recibo
                  ? `<button class="btn btn-danger mx-1 btn-eliminar-archivo-cliente" archivoID="${item["id"]}"><i class="fas fa-trash-alt"></button>`
                  : ``
              }`,
              `${archivo.icono} ${item["name"]}`,
              archivo.tipo,
              new Date(item["createdTime"]).toLocaleString(),
            ])
            .draw();
        } else {
          tabla.row
            .add([
              `<a href="${
                item["webContentLink"]
              }" class="btn btn-success mx-1 btn-descargar-archivo"><i class="fas fa-arrow-down"></i></a><a href="${
                item["webViewLink"]
              }" target="_blank" class="btn btn-primary mx-1 btn-ver-archivo"><i class="fas fa-eye"></i></a>${
                recibo
                  ? `<button class="btn btn-danger mx-1 btn-eliminar-archivo-cliente" archivoID="${item["id"]}" ><i class="fas fa-trash-alt"></i></button>`
                  : ``
              }`,
              `${archivo.icono} ${item["name"]}`,
              archivo.tipo,
              new Date(item["createdTime"]).toLocaleString(),
            ])
            .draw();
        }
      });
    },
    error: function () {
      Swal.close();
      Swal.fire({
        title: "Error!",
        text: "¡Error desconocido!",
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
  });
});

$("#btnVolverAlInicioCliente").on("click", function () {
  $(".recibido").addClass("d-none");
});

$(document).on("click", ".btn-ingresar-archivo-cliente", function () {
  if ((recibo = $(this).attr("recibido") === "true")) {
    $(".recibido").removeClass("d-none");
  } else {
    $(".recibido").addClass("d-none");
  }
  $("#btnListarArchivosCliente")
    .attr("carpetaPadreId", $(this).attr("carpetaPadreId"))
    .click();
});

$("#btnSubirNivelCliente").on("click", function () {
  Swal.fire({
    title: "Subiendo de carpeta",
    allowEscapeKey: false,
    allowOutsideClick: false,
    onOpen: () => {
      Swal.showLoading();
    },
  });
  carpetaPadreIds = $("#btnListarArchivosCliente").attr("carpetaPadreId");
  $.ajax({
    method: "POST",
    url: "ajax/drive.ajax.php",
    data: {
      opcion: "subir-nivel",
      carpetaPadreId: carpetaPadreIds,
    },
    dataType: "json",
    success: function (response) {
      Swal.close();
      recibo = false;
      $(".recibido").addClass("d-none");
      let tabla = $("#mostrarArchivos").DataTable();
      tabla.clear().draw();
      $.each(response, (index, item) => {
        let archivo = getArchivoInfo(item["mimeType"]);
        $("#btnSubirNivelCliente").attr("carpetaPadreId", item["parents"][0]);
        $("#btnListarArchivosCliente").attr(
          "carpetaPadreId",
          item["parents"][0]
        );
        if (item["mimeType"] == "application/vnd.google-apps.folder") {
          tabla.row
            .add([
              `<button class="btn btn-warning mx-1 btn-ingresar-archivo-cliente" recibido="${
                item["name"] == "Recibidos" ? "true" : "false"
              }"" carpetaPadreId="${
                item["id"]
              }"><i class="fas fa-sign-in-alt"></i></button>${
                recibo
                  ? `<button class="btn btn-danger mx-1 btn-eliminar-archivo-cliente" archivoID="${item["id"]}" ><i class="fas fa-trash-alt"></button>`
                  : ``
              }`,
              `${archivo.icono} ${item["name"]}`,
              archivo.tipo,
              new Date(item["createdTime"]).toLocaleString(),
            ])
            .draw();
        } else {
          tabla.row
            .add([
              `<a href="${
                item["webContentLink"]
              }" class="btn btn-success mx-1 btn-descargar-archivo"><i class="fas fa-arrow-down"></i></a><a href="${
                item["webViewLink"]
              }" target="_blank" class="btn btn-primary mx-1 btn-ver-archivo"><i class="fas fa-eye"></i></a>${
                recibo
                  ? `<button class="btn btn-danger mx-1 btn-eliminar-archivo-cliente" archivoID="${item["id"]}" ><i class="fas fa-trash-alt"></i></button>`
                  : ``
              }`,
              `${archivo.icono} ${item["name"]}`,
              archivo.tipo,
              new Date(item["createdTime"]).toLocaleString(),
            ])
            .draw();
        }
      });
    },
    error: function () {
      Swal.close();
      Swal.fire({
        title: "Error!",
        text: "¡Error no se puede subir!",
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
  });
});

$("#btnFormCrearCarpetaCliente").on("click", function () {
  $("#modalCrearCarpeta").modal("show");
});

$("#btnCrearCarpetaCliente").on("click", function () {
  if (!recibo) return;
  Swal.fire({
    title: "Creando carpeta",
    allowEscapeKey: false,
    allowOutsideClick: false,
    onOpen: () => {
      Swal.showLoading();
    },
  });
  let form = new FormData($("#frmCrearCarpeta").get(0));
  $("#icoCargandoCrearCarpeta").removeClass("d-none");
  form.append(
    "carpetaPadreId",
    $("#btnListarArchivosCliente").attr("carpetaPadreId")
  );
  form.append("opcion", "crear-carpeta");
  $.ajax({
    method: "POST",
    url: "ajax/drive.ajax.php",
    data: form,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    success: function ({ respuesta }) {
      Swal.close();
      $("#icoCargandoCrearCarpeta").addClass("d-none");
      if (respuesta) {
        $("#btnListarArchivosCliente").click();
        $("#frmCrearCarpeta").get(0).reset();
        $("#modalCrearCarpeta").modal("hide");
        Swal.fire({
          title: "Creado!",
          text: "¡Se creo la carpeta correctamente!",
          icon: "success",
          confirmButtonText: "Ok",
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: "¡No se pudo crear la carpeta!",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
    error: function () {
      Swal.close();
      Swal.fire({
        title: "Error!",
        text: "¡Error desconocido!",
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
  });
});

$("#btnFormSubirArchivoCliente").on("click", function () {
  $("#modalSubirArchivo").modal("show");
});

$("#btnSubirArchivosCliente").on("click", function () {
  if (!recibo) return;
  Swal.fire({
    title: "Subiendo los archivos",
    allowEscapeKey: false,
    allowOutsideClick: false,
    onOpen: () => {
      Swal.showLoading();
    },
  });
  let form = new FormData($("#frmSubirArchivo").get(0));
  $("#icoSubirArchivo").removeClass("d-none");
  form.append(
    "carpetaPadreId",
    $("#btnListarArchivosCliente").attr("carpetaPadreId")
  );
  form.append("opcion", "subir-archivo");
  $.ajax({
    method: "POST",
    url: "ajax/drive.ajax.php",
    data: form,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    success: function ({ respuesta }) {
      Swal.close();
      $("#icoSubirArchivo").addClass("d-none");
      if (respuesta) {
        $("#modalSubirArchivo").modal("hide");
        $("#frmSubirArchivo").get(0).reset();
        $("#btnListarArchivosCliente").click();
        Swal.fire({
          title: "Subido!",
          text: "¡Se subio el archivo correctamente!",
          icon: "success",
          confirmButtonText: "Ok",
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: "¡No se pudo subir el archivo!",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
    error: function () {
      Swal.close();
      Swal.fire({
        title: "Error!",
        text: "¡Error desconocido!",
        icon: "error",
        confirmButtonText: "Ok",
      });
    },
  });
});

$(document).on("click", ".btn-eliminar-archivo-cliente", function () {
  if (!recibo) return;
  Swal.fire({
    title: "¿Seguro que desea eliminar la carpeta o archivo?",
    showCancelButton: true,
    confirmButtonText: `Si`,
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminando el Archivo",
        allowEscapeKey: false,
        allowOutsideClick: false,
        onOpen: () => {
          Swal.showLoading();
        },
      });
      let archivoID = $(this).attr("archivoID");
      $.ajax({
        method: "POST",
        url: "ajax/drive.ajax.php",
        data: {
          opcion: "eliminar-archivo",
          archivoID: archivoID,
        },
        dataType: "json",
        success: function ({ respuesta }) {
          Swal.close();
          if (respuesta) {
            $("#btnListarArchivosCliente").click();
            Swal.fire({
              title: "Eliminado!",
              text: "¡Se elimino correctamente!",
              icon: "success",
              confirmButtonText: "Ok",
            });
          } else {
            Swal.fire({
              title: "Error!",
              text: "¡No se pudo eliminar!",
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
        error: function () {
          Swal.close();
          Swal.fire({
            title: "Error!",
            text: "¡Error desconocido!",
            icon: "error",
            confirmButtonText: "Ok",
          });
        },
      });
    }
  });
});
$("#btnListarArchivos").click();
$("#btnListarArchivosCliente").click();
