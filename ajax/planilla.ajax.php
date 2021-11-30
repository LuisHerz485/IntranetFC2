<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/planilla.controlador.php";
require_once "../modelos/planilla.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrarPlanilla": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorPlanilla::ctrRegistrarPlanilla()]);
                break;
            }
        case "editarPlanilla": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorPlanilla::ctrEditarPlanilla()]);
                break;
            }
        case "estadosPlanilla": {
                $respuesta = ControladorPlanilla::ctrListarEstadosPlanillas();
                if ($respuesta !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "listarPlanilla": {
                $respuesta = ControladorPlanilla::ctrListarPlanillas();
                if ($respuesta !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarPlanillaPorID": {
                $respuesta = ControladorPlanilla::ctrBuscarPlanillaPorID();
                if ($respuesta !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarPlanillaDeUnUsuario": {
                $respuesta = ControladorPlanilla::ctrBuscarPlanillaDeUnUsuario();
                if ($respuesta !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarPlanillaPorDepartamento": {
                $respuesta = ControladorPlanilla::ctrBuscarPlanillaPorDepartamento();
                if ($respuesta !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        default: {
                break;
            }
    }
}
