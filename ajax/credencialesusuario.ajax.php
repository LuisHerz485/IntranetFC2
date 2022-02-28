<?php
/* AJAX de credenciales de usuario */

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/credencialesusuario.controlador.php";
require_once "../modelos/credencialesusuario.modelo.php";

http_response_code(400);
if(isset($_POST["opcion"])){
    switch ($_POST["opcion"]){
        case "listarcredencialesusuario":{
            $respuesta = controladorcredencialesusuario::ctrlistarcredencialesusuario();
            if($respuesta !== null){
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
        }
    }
}