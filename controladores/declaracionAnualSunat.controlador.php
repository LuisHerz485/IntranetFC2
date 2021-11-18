<?php
class ControladorDeclaracionAnualSunat
{
    public static function ctrConsultarDeclaracionAnualSunat(): mixed
    {
        if (isset($_POST["anyo"], $_POST["idestadodeclaracion"])) {

            $anyo = $_POST["anyo"];
            $idestadodeclaracion = $_POST["idestadodeclaracion"];
            if ($anyo && $idestadodeclaracion >= 0) {
                if ($idestadodeclaracion == 0) {
                    return ModeloDeclaracionAnualSunat::mdlConsularDeclaracionesAnualSunat($anyo);
                } else {
                    return ModeloDeclaracionAnualSunat::mdlConsularDeclaracionAnualSunat($anyo, $idestadodeclaracion);
                }
            }
        }
        return false;
    }
    public static function ctrRegistrarDeclaracionAnualSunat(): mixed
    {
        if (isset($_POST["iddeclaracionAS"], $_POST["fechadeclarada"], $_POST["numOrden"], $_SESSION["idusuario"])) {
            $numerorden = $_POST["numOrden"];
            $idusuario = $_SESSION["idusuario"];
            $iddeclaracion = ControladorValidacion::validarID($_POST["iddeclaracionAS"]);
            $fechadeclarada = strtotime($_POST["fechadeclarada"]);
            $fechavencimiento = strtotime($_POST["fechavencimiento"]);
            if ($iddeclaracion && ControladorValidacion::formatoFecha($_POST["fechadeclarada"]) && !empty($numerorden)) {
                if ($fechavencimiento >= $fechadeclarada) {
                    return ModeloDeclaracionAnualSunat::mdlRegistrarDetalleDeclaracionAnualSunat($iddeclaracion, 2, $_POST["fechadeclarada"], $numerorden, $idusuario);
                } else {
                    return ModeloDeclaracionAnualSunat::mdlRegistrarDetalleDeclaracionAnualSunat($iddeclaracion, 3, $_POST["fechadeclarada"], $numerorden, $idusuario);
                }
            }
        }
        return false;
    }

    public static function ctrActualizarDeclaracionAnualSunat(): mixed
    {
        if (isset($_POST["iddetalledeclaracionanual"], $_POST["iddeclaracionAS"], $_POST["idestado"], $_POST["fechadeclarada"], $_POST["numOrden"])) {
            $iddetalledeclaracionanual =  ControladorValidacion::validarID($_POST["iddetalledeclaracionanual"]);
            $idestado =  ControladorValidacion::validarID($_POST["idestado"]);
            $numerorden = $_POST["numOrden"];
            $iddeclaracion = ControladorValidacion::validarID($_POST["iddeclaracionAS"]);
            if ($iddetalledeclaracionanual && $iddeclaracion && $idestado && ControladorValidacion::formatoFecha($_POST["fechadeclarada"]) && !empty($numerorden)) {
                return ModeloDeclaracionAnualSunat::mdlActualizarDeclaracionAnualSunat($iddetalledeclaracionanual, $idestado, $_POST["fechadeclarada"], $numerorden);
            }
        }
        return false;
    }
}