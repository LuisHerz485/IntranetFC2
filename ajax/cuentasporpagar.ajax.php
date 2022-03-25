<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/cuentasporpagar.controlador.php";
require_once "../modelos/cuentasporpagar.modelo.php";


http_response_code(400);
if(isset($_POST["opcion"])){
    switch($_POST["opcion"]){
        case "listarcuentasporpagar":{
            $respuesta = controladorcuentasporpagar::ctrlistarcuentasporpagar();
            if($respuesta !== null){
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "registrarcuentaporpagar":{
            $respuesta = controladorcuentasporpagar::ctrregistrarcuentasporpagar();
            if($respuesta !== false){
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "eliminarcuentaporpagar":{
            http_response_code(200);
            echo json_encode(["respuesta" => controladorcuentasporpagar::ctreliminarcuentaporpagar()]);
        }
        default: {
            break;
        }
    }
}
?>