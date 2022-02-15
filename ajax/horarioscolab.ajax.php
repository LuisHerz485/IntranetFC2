<?php
// AJAX de horarios de colaboradores

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/horarioscolab.controlador.php";
require_once "../modelos/horarioscolab.modelo.php";

http_response_code(400);
if(isset($_POST["opcion"])){
    switch ($_POST["opcion"]){
        case "registrarhorarioscolab":{
            http_response_code(200);
            echo json_encode(["respuesta" => controladorhorarioscolab::ctrRegistrarhorarioscolab()]);
            break;
        }
        case "listarhorarioscolab":{
            $respuesta = controladorhorarioscolab::ctrListhorarioscolab();
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