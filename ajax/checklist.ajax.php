<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/checklist.controlador.php";
require_once "../modelos/checklist.modelo.php";



http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrar": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorChecklist::ctrRegistrarChecklist()]);
                break;
            }
        case "editar": {
                http_response_code(200);
                echo json_encode(["respuesta" => ControladorChecklist::ctrEditarDetalleChecklist()]);
                break;
            }
        case "consulta": {
                $respuesta = ControladorChecklist::ctrCheckListActividades();
                if ($respuesta !== null) {
                    http_response_code(200);
                    echo json_encode($respuesta);
                }
                break;
            }
        case "consultaUsuarios": {
                $respuesta = ControladorChecklist::ctrCheckListActividadesUsuario();
                if ($respuesta !== null) {
                    http_response_code(200);
                    echo json_encode($respuesta);
                }
                break;
            }
        case "consultaAsignador": {
                $respuesta = ControladorChecklist::ctrListarCheckListSegunAsignador();
                if ($respuesta !== null) {
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
