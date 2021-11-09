<?php
require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../modelos/cronogramaAnualSunat.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "ConsultarCronogramaAnual": {
                http_response_code(200);
                echo json_encode(["respuesta" => ModeloCronogramaAnualSunat::mdlConsularCronogramaAnual($_POST["idAnual"])]);
                break;
            }

        default: {
                break;
            }
    }
}
