<?php
//AJAX de contrato de colaboradores
require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/contratousuario.controlador.php";
require_once "../modelos/contratousuario.modelo.php";


http_response_code(400);
if(isset($_POST["opcion"])){
    switch ($_POST["opcion"]){
        case "listarcontratocolab":{
            $respuesta = controladorcontratocolab::ctrlistarcontratocolab();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "registrarcontratocolab":{
            $respuesta = controladorcontratocolab::ctrregistrarcontratocolab();
            if ($respuesta) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case "buscarcontratocolabporid":{
            $respuesta=controladorcontratocolab::ctrbuscarcontratocolabporid();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
        case"editarcontratocolab":{
            http_response_code(200);
            echo json_encode(["respuesta" => controladorcontratocolab::ctreditarcontratocolab()]);
            break;
        }
        default: {
            break;
        }
        
    }
}
/*
class Ajaxcontratocolab{

    public function ajaxeditarcontrato()
    {
        $item ="idcontratousuario";
        $valor = $this->idusuario;
        $respuesta = controladorcontratocolab::ctreditarcontratocolabo($item,$valor);
        echo json_encode($respuesta);
    }
}*/

?>