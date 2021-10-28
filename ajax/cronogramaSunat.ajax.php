<?php
require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../modelos/cronogramaSunat.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "ConsultarCronograma": {
                http_response_code(200);
                echo json_encode(["respuesta" => ModeloCronogramaSunat::mdlConsularCronogramaxAnyo($_POST["idano"])]);
                break;
            }

        default: {
                break;
            }
    }
}
