<?php
require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/declaracionsunatple.controlador.php";
require_once "../modelos/declaracionplesunat.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "ConsultarDeclaracion": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorDeclaracionSunatPle::ctrConsultarDeclaracionSunatPle()]);
                break;
            }
        case "ConsultarDeclaracionClientes": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorDeclaracionSunatPle::ctrConsultarDeclaracionSunatPleClientes()]);
                break;
            }
        case "registrar": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorDeclaracionSunatPle::ctrRegistrarDeclaracionSunatPle()]);
                break;
            }
        case "actualizar": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorDeclaracionSunatPle::ctrActualizarDeclaracionSunatPle()]);
                break;
            }
        default: {
                break;
            }
    }
}
