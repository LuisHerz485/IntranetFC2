<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/cumpleanos.controlador.php";
require_once "../modelos/cumpleanos.modelo.php";

http_response_code(400);
if(isset($_POST["opcion"])){
    switch ($_POST["opcion"]){
        case "registrasCumpleanos":{
            http_response_code(200);
            echo json_encode(["respuesta" => ControladorCumpleanos::ctrRegistrarCumpleanos()]);
            break;
        }
        case "editarCumpleanos":{
            http_response_code(200);
            echo json_encode(["respuesta" => ControladorCumpleanos::ctrEditarCumpleanos()]);
            break;
        }
        case "listarCumpleanos":{
            $respuesta = ControladorCumpleanos::ctrListarCumpleanos();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarCumpleanosPorID":{
            $respuesta = ControladorCumpleanos::ctrBuscarCumpleanosPorID();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarCumpleanosDeUnUsuario": {
            $respuesta = ControladorCumpleanos::ctrBuscarCumpleanosDeUnUsuario();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }

        case "buscarCumpleanosDeUnUsuarioPorFecha": {
            $respuesta = ControladorCumpleanos::ctrBuscarPasajeDeUnCumpleanosPorFecha();
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