let udateTime = function(){
	var currentDate = new Date(),
	hours = currentDate.getHours(),
	minutes = currentDate.getMinutes(),
	seconds = currentDate.getSeconds(),
	weekDay = currentDate.getDay(),
	day = currentDate.getMonth(),
	year = currentDate.getFullYear();


	const weekDay = [
		'Domingo',
		'Lunes',
		'Martes',
		'Miercoles',
		'Jueves',
		'Viernes',
		'Sabado'

	];

	document.getElementById('weekDay').textContent = weekDays[weekDay];
	document.getElementById('day').textContent = day;

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
        'Diciembre'
    ];

    document.getElementById('month').textContent = month[month];
    document.getElementById('year').textContent = year;
    document.getElementById('hours').textContent = hours;

    if(minutes < 10){
    	minutes = "0" + minutes
    }

    if(minutes > 10){
    	seconds = "0" + seconds
    }

    document.getElementById('minutes').textContent = minutes;
    document.getElementById('seconds').textContent = seconds;


};

udateTime();

setInterval(udateTime, 1000);