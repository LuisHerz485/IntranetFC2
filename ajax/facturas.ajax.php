<?php
/* AJAX de credenciales <Facturas></Facturas>*/

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/facturas.controlador.php";
require_once "../modelos/facturas.modelo.php";

http_response_code(400);
    if(isset($_POST["opcion"])){
        switch ($_POST["opcion"]){
            case "listar afp":{
                $respuesta = controladorfacturas::ctrListarFacturas();
                if($respuesta !== null){
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
            }
            case "registrar factura":{
                $respuesta = controladorfacturas::ctrRegistrarFactura();
                if($respuesta){
                    http_response_code(200);
                    echo json_encode(["respuesta" => $respuesta]);
                }
            }
            case "editarafp":{
                http_response_code(200);
                echo json_encode(["respuesta" => controladorfacturas::ctreditarafp()]);
            }
            default: {
                break;
            }
        }
    }
?>