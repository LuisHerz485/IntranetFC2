<?php

class ControladorPruebas
{

    public static function ctrRegistrarPrueba(): int|false
    {
        $data = ControladorValidacion::validar([
            "efectivo" => "flotante",
            "inversiones" => "flotante",
            "totalactivo" => "flotante",
            "fechacoti" => "fecha",
            "id_elaborador" => "enteroPositivo",
            "periodo" => "fechaMes",
            "idcliente" => "enteroPositivo",
        ]);
        if (is_array($data) && !in_array(false, $data, true)) {
            if (!ModeloPruebas::mdlExistePrueba($_POST["periodo"], $_POST["idcliente"])) {
                return ModeloPruebas::mdlRegistrarPruebas($data);
            }
        }
        return false;
    }

    public static function ctrEditarPrueba(): int|false
    {
        $data = ControladorValidacion::validar([
            "efectivo" => "flotante",
            "inversiones" => "flotante",
            "totalactivo" => "flotante",
            "fechacoti" => "fecha",
            "id_elaborador" => "enteroPositivo",
            "periodo" => "fechaMes",
            "idcliente" => "enteroPositivo",
            "id_prueba" => "enteroPositivo",
        ]);
        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloPruebas::mdlActualizarPruebas($data);
        }
        return false;
    }

    public static function ctrRegistrarRevision(): mixed
    {
        $_POST["id_revisor"] = $_SESSION["idusuario"];
        $data = ControladorValidacion::validar([
            "id_revisor" => "enteroPositivo",
            "id_prueba" => "enteroPositivo",
        ]);
        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloPruebas::mdlRegistrarRevision($data);
        }
        return false;
    }

    public static function ctrBuscarPrueba(): mixed
    {
        if (isset($_POST["id_liquidacion"])) {
            if ($idpruebas = ControladorValidacion::validarID($_POST["id_prueba"])) {
                return ModeloPruebas::mdlBuscarPrueba($idpruebas);
            }
        }
        return false;
    }

    public static function ctrBuscarPruebaxClientes(): mixed
    {
        if (isset($_POST["idcliente"])) {
            if ($idcliente = ControladorValidacion::validarID($_POST["idcliente"])) {
                return ModeloPruebas::mdlBuscarPruebasxClientes($idcliente);
            }
        }
        return false;
    }

    public static function ctrBuscarPruebasxMes(): mixed
    {
        if (isset($_POST["mesyanyo"])) {
            if ($mesyanyo = ControladorValidacion::fechaMes($_POST["mesyanyo"])) {
                return ModeloPruebas::mdlBuscarPruebasxMes($mesyanyo);
            }
        }
        return false;
    }

    public static function ctrListarPruebas(): mixed
    {
        return ModeloPruebas::mdlListarPruebas();
    }


}

?>