<?php
require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/declaracionAnualSunat.controlador.php";
require_once "../modelos/declaracionAnualSunat.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "ConsultarDeclaracionAnual": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorDeclaracionAnualSunat::ctrConsultarDeclaracionAnualSunat()]);
                break;
            }
        case "RegistroAnual": {
            http_response_code(200);
            echo json_encode(["respuesta" => ControladorDeclaracionAnualSunat::ctrRegistrarDeclaracionAnualSunat()]);
            break;
        }
        case "ActualizarAnual": {
            http_response_code(200);
            echo json_encode(["respuesta" => ControladorDeclaracionAnualSunat::ctrActualizarDeclaracionAnualSunat()]);
            break;
        }    
        default: {
            break;
        }
    }
}
