<?php
// AJAX de credenciales de clientes

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/credencialesclientes.controlador.php";
require_once "../modelos/credencialesclientes.modelo.php";

http_response_code(400);
if(isset($_POST["opcion"])){
    switch ($_POST["opcion"]){
        case "listarcredencialesclientes":{
            $respuesta = controladorcredencialesclientes::ctrlistarcredencialesclientes();
            if($respuesta !== null){
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
        }
    }
}