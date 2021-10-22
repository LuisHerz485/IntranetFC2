const weekDays = [
  "Domingo",
  "Lunes",
  "Martes",
  "Miércoles",
  "Jueves",
  "Viernes",
  "Sabado",
];

const months = [
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Julio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre",
];

let udateTime = function () {
  var currentDate = new Date(),
    hours = currentDate.getHours(),
    minutes = currentDate.getMinutes(),
    seconds = currentDate.getSeconds(),
    weekDay = currentDate.getDay(),
    day = currentDate.getDay(),
    month = currentDate.getMonth(),
    year = currentDate.getFullYear();

  $("#weekDay").text(weekDays[weekDay]);
  $("#day").text(day);
  $("#month").text(months[month]);
  $("#year").text(year);
  $("#hours").text(hours);

  if (minutes < 10) {
    minutes = "0" + minutes;
  }

  if (seconds < 10) {
    seconds = "0" + seconds;
  }

  $("#minutes").text(minutes);
  $("#seconds").text(seconds);
};

$("#reloj").ready(function () {
  udateTime();
  setInterval(udateTime, 1000);
});

$("#datetimepicker3").datetimepicker({
  format: "LT",
  autoclose: true,
});
$("#datetimepicker4").datetimepicker({
  format: "LT",
  autoclose: true,
});
function init() {
  CargarHorario();
}

function CargarHorario() {
  $.ajax({
    method: "POST",
    url: "ajax/horario.ajax.php",
    data: {
      opcion: "consultar",
    },
    dataType: "json",
    success: function ({ respuesta }) {
      if (respuesta) {
        $("#horainicio").val(respuesta["horaInicio"]);
        $("#horafin").val(respuesta["horafin"]);
      }
    },
  });
}
$("#btnCambiarHorario").on("click", function () {
  $("#horainicio").removeAttr("disabled");
  $("#horafin").removeAttr("disabled");
  $("#btnCambiarHorario").attr("disabled", true);
  $("#btnCancelar").removeAttr("disabled");
});
$("#btnCancelar").on("click", function () {
  $("#horainicio").attr("disabled", true);
  $("#horafin").attr("disabled", true);
  $("#btnCancelar").attr("disabled", true);
  $("#btnCambiarHorario").removeAttr("disabled");
});

init();
