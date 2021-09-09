<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/checklist.controlador.php";
require_once "../modelos/checklist.modelo.php";


if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrar": {
                echo json_encode(["respuesta" => ControladorChecklist::ctrRegistrarChecklist()]);
                break;
            }
        case "editar": {
                echo json_encode(["respuesta" => ControladorChecklist::ctrEditarDetalleChecklist()]);
                break;
            }
        default: {
                break;
            }
    }
}
