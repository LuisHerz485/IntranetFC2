<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/permiso.controlador.php";
require_once "../modelos/permiso.modelo.php";


http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "pendientes": {
                $respuesta =  ControladorPermiso::ctrCantidadPermisosPendientes();
                if ($respuesta !== null) {
                    http_response_code(200);
                    echo json_encode(["cantidad" => $respuesta]);
                }
                break;
            }

        default: {
                break;
            }
    }
}