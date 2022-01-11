<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/cumpleclientes.controlador.php";
require_once "../modelos/cumpleanosclientes.modelo.php";

http_response_code(400);
if(isset($_POST["opcion"])){
    switch ($_POST["opcion"]){
        case "registrasCumpleanos":{
            http_response_code(200);
            echo json_encode(["respuesta" => ControladorCumpleClientes::ctrRegistrarCumpleClientes()]);
            break;
        }
        case "editarCumpleanos":{
            http_response_code(200);
            echo json_encode(["respuesta" => ControladorCumpleClientes::ctrEditarCumpleaClientes()]);
            break;
        }
        case "listarCumpleanos":{
            $respuesta = ControladorCumpleClientes::ctrListarCumpleClientes();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarCumpleanosPorID":{
            $respuesta = ControladorCumpleClientes::ctrBuscarCumpleanosClientesPorID();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarCumpleanosDeUnUsuario": {
            $respuesta = ControladorCumpleClientes::ctrBuscarCumpleanosDeUnCliente();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }

        case "buscarCumpleanosDeUnUsuarioPorFecha": {
            $respuesta = ControladorCumpleClientes::ctrBuscarCumpleClientePorFecha();
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




