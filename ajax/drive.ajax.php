<?php

require_once "./validarsesion.php";
require_once "../controladores/drive.controlador.php";
http_response_code(400);

if (isset($_POST["opcion"])) {
    $driverApi = new ControladorDrive();
    switch ($_POST["opcion"]) {
        case "listar": {
                $respuesta = $driverApi->listarTodo(false);
                if ($respuesta !== false) {
                    http_response_code(200);
                    echo json_encode($respuesta);
                }
                break;
            }
        case "crear-carpeta": {
                http_response_code(200);
                echo json_encode(["respuesta" => $driverApi->crearCarpeta()]);
                break;
            }
        case "subir-archivo": {
                http_response_code(200);
                echo json_encode(["respuesta" => $driverApi->guardarArchivo()]);
                break;
            }
        case "buscar-archivo": {
                if ($respuesta = $driverApi->buscarArchivo()) {
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
                break;
            }
        case "eliminar-archivo": {
                http_response_code(200);
                echo json_encode(["respuesta" => $driverApi->eliminarArchivo()]);
                break;
            }
        case "subir-nivel": {
                $respuesta = $driverApi->listarTodo(true);
                if ($respuesta !== false) {
                    http_response_code(200);
                    echo json_encode($respuesta);
                }
                break;
            }
    }
}
