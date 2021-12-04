<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/pasajes.controlador.php";
require_once "../modelos/pasajes.modelo.php";

http_response_code(400);
if(isset($_POST["opcion"])){
    switch ($_POST["opcion"]){
        case "registrasPasaje":{
            http_response_code(200);
            echo json_encode(["respuesta" => ControladorPasaje::ctrRegistrarPasaje()]);
            break;
        }
        case "editarPasaje":{
            http_response_code(200);
            echo json_encode(["respuesta" => ControladorPasaje::ctrEditarPasaje()]);
            break;
        }
        case "listarPasaje":{
            $respuesta = ControladorPasaje::ctrListarPasaje();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarPasajePorID":{
            $respuesta = ControladorPasaje::ctrBuscarPasajePorID();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarPasajePorDepartamento": {
            $respuesta = ControladorPasaje::ctrBuscarPasajePorDepartamento();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarPasajeDeUnUsuario": {
            $respuesta = ControladorPasaje::ctrBuscarPasajeDeUnUsuario();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }

        case "buscarPasajeDeUnUsuarioPorFecha": {
            $respuesta = ControladorPasaje::ctrBuscarPasajeDeUnUsuarioPorFecha();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }

        case "MontoTotalPasaje": {
            $respuesta = ControladorPasaje::ctrMontoTotalPasajes();
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