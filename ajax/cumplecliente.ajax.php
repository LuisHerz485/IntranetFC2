<?php
// AJAX de cumplecliente

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/cumplecliente.controlador.php";
require_once "../modelos/cumplecliente.modelo.php";

http_response_code(400);
if(isset($_POST["opcion"])){
    switch ($_POST["opcion"]){
        case "registrasCumpleCliente":{
            http_response_code(200);
            echo json_encode(["respuesta" => controladorcumplecliente::ctrRegistrarCumplecliente()]);
            break;
        }
        case "editarCumpleCliente":{
            http_response_code(200);
            echo json_encode(["respuesta" => controladorcumplecliente::ctrEditarCumplecliente()]);
            break;
        }
        case "listarCumpleCliente":{
            $respuesta = controladorcumplecliente::ctrListarCumplecliente();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarCumpleClientePorID":{
            $respuesta = controladorcumplecliente::ctrBuscarCumpleclientePorID();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "BuscarCumpledeunCliente": {
            $respuesta = controladorcumplecliente::ctrBuscarCumpleclienteDeUnCliente();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }

        case "BuscarCumpledeunClienteporFecha": {
            $respuesta = controladorcumplecliente::crtBuscarCumpleclienteporfecha();
            if ($respuesta !== null)
            {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
    }
}
