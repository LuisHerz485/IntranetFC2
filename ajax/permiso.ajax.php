<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/permiso.controlador.php";
require_once "../modelos/permiso.modelo.php";


http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrar": {
                $respuesta =  ControladorPermiso::ctrRegistrarPermiso();
                if ($respuesta) {
                    http_response_code(200);
                    echo json_encode($respuesta);
                }
                break;
            }
        case "buscar": {
                $respuesta =  ControladorPermiso::ctrBuscarPermiso();
                if ($respuesta) {
                    http_response_code(200);
                    echo json_encode($respuesta);
                }
                break;
            }
        case "filtrar": {
                $respuesta =  ControladorPermiso::ctrFiltroPermiso();
                if ($respuesta) {
                    http_response_code(200);
                    echo json_encode($respuesta);
                }
                break;
            }

        default: {
                break;
            }
    }
}
