<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/prueba.controlador.php";
require_once "../modelos/prueba.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrarPrueba": {
                if (($respuesta = ControladorPruebas::ctrRegistrarPrueba()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "editarPrueba": {
                if (($respuesta = ControladorPruebas::ctrEditarPrueba()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarPrueba": {
                if (($respuesta = ControladorPruebas::ctrBuscarPrueba()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarPruebaxClientes": {
                if (($respuesta = ControladorPruebas::ctrBuscarPruebaxClientes()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "buscarPruebaxMes": {
                if (($respuesta = ControladorPruebas::ctrBuscarPruebasxMes()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "listarPruebas": {
                if (($respuesta = ControladorPruebas::ctrListarPruebas()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }

        /*
        case "listarResumenMeses": {
                if (($respuesta = ControladorLiquidaciones::ctrListarResumen()) !== null) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
            }
        */

            break;
        case "RegistrarRevision": {
                if (($respuesta = ControladorPruebas::ctrRegistrarRevision()) !== null) {
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
