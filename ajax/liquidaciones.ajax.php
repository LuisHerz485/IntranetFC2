<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/liquidaciones.controlador.php";
require_once "../modelos/liquidaciones.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrarLiquidacion": {
                if (($respuesta = ControladorLiquidaciones::ctrRegistrarLiquidacion()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "editarLiquidacion": {
                if (($respuesta = ControladorLiquidaciones::ctrEditarLiquidacion()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarLiquidacion": {
                if (($respuesta = ControladorLiquidaciones::ctrBuscarLiquidacion()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarLiquidacionxClientes": {
                if (($respuesta = ControladorLiquidaciones::ctrBuscarLiquidacionxClientes()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarLiquidacionxMes": {
                if (($respuesta = ControladorLiquidaciones::ctrBuscarLiquidacionesxMes()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "listarLiquidaciones": {
                if (($respuesta = ControladorLiquidaciones::ctrListarLiquidaciones()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "listarRegimenesTributario": {
                if (($respuesta = ControladorLiquidaciones::ctrListarRegimenesTributario()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "listarResumenMeses": {
                if (($respuesta = ControladorLiquidaciones::ctrListarResumen()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
            }
            break;
        case "RegistrarRevision": {
                if (($respuesta = ControladorLiquidaciones::ctrRegistrarRevision()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
            }
            break;


        default: {
                break;
            }
    }
}
