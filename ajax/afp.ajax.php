<?php
/* AJAX de credenciales <AFP></AFP>*/

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/afp.controlador.php";
require_once "../modelos/afp.modelo.php";

http_response_code(400);
    if(isset($_POST["opcion"])){
        switch ($_POST["opcion"]){
            case "listar afp":{
                $respuesta = controladorafp::ctrlistarafp();
                if($respuesta !== null){
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
            }
        }
    }
?>
