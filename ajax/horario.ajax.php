<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/horario.controlador.php";
require_once "../modelos/horario.modelo.php";



http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrar": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorHorario::ctrRegistrarHorario()]);
                break;
            }
        case "consultar": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorHorario::ctrConsultarHorario()]);
                break;
            }

        default: {
                break;
            }
    }
}
