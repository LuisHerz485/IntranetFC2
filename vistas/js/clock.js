const weekDays = [
  'Domingo',
  'Lunes',
  'Martes',
  'Miércoles',
  'Jueves',
  'Viernes',
  'Sabado',
];

const months = [
  'Enero',
  'Febrero',
  'Marzo',
  'Abril',
  'Mayo',
  'Junio',
  'Julio',
  'Agosto',
  'Septiembre',
  'Octubre',
  'Noviembre',
  'Diciembre',
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

  $('#weekDay').text(weekDays[weekDay]);
  $('#day').text(day);
  $('#month').text(months[month]);
  $('#year').text(year);
  $('#hours').text(hours);

  if (minutes < 10) {
    minutes = '0' + minutes;
  }

  if (seconds < 10) {
    seconds = '0' + seconds;
  }

  $('#minutes').text(minutes);
  $('#seconds').text(seconds);
};

$('#reloj').ready(function () {
  udateTime();
  setInterval(udateTime, 1000);
});