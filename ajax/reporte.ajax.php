<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
	switch ($_POST["opcion"]) {
		case "consultaAsistencia": {
				http_response_code(200);
				echo json_encode(["respuesta" => ControladorReporte::ctrMostrarReporte()]);
				break;
			}
		case "consultaTardanza": {
				http_response_code(200);
				echo json_encode(["respuesta" => ControladorReporte::ctrMostrarTardanzas()]);
				break;
			}

		default: {
				break;
			}
	}
}
