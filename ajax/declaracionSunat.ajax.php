<?php
require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/declaracionSunat.controlador.php";
require_once "../modelos/declaracionSunat.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "ConsultarDeclaracion": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorDeclaracionSunat::ctrConsultarDeclaracionSunat()]);
                break;
            }
        case "registrar": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorDeclaracionSunat::ctrRegistrarDeclaracionSunat()]);
                break;
            }
        default: {
                break;
            }
    }
}
