<?php
require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../modelos/cronogramaLibros.modelo.php";

http_response_code(400);
if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "ConsultarCronogramaLibros": {
                http_response_code(200);
                echo json_encode(["respuesta" => ModeloCronogramaLibros::mdlConsularCronogramaxAnyoLibros($_POST["idano1"])]);
                break;
            }

        default: {
                break;
            }
    }
}
