<?php

require_once "../controladores/permiso.controlador.php";
require_once "../modelos/permiso.modelo.php";


if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrar": {
                $respuesta = ["registrado" => ControladorPermiso::registrarPermiso()];
                echo json_encode($respuesta);
                break;
            }
        default: {
                break;
            }
    }
}
