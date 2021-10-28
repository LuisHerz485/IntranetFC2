<?php
class ControladorDeclaracionSunat
{
    public static function ctrConsultarDeclaracionSunat(): mixed
    {
        if (isset($_POST["mesanyo"], $_POST["idestadodeclaracion"])) {

            $mesanyo = $_POST["mesanyo"];
            $idestadodeclaracion = ControladorValidacion::validarID($_POST["idestadodeclaracion"]);
            if (ControladorValidacion::formatoFechaMes($_POST["mesanyo"])) {
                if ($_POST["idestadodeclaracion"] == 0) {
                    return ModeloDeclaracionSunat::mdlConsularDeclaracionesSunat($mesanyo);
                } else {
                    return ModeloDeclaracionSunat::mdlConsularDeclaracionSunat($mesanyo, $idestadodeclaracion);
                }
            }
        }
        return false;
    }
    public static function ctrRegistrarDeclaracionSunat(): mixed
    {
        if (isset($_POST["iddeclaracionS"], $_POST["fechadeclarada"], $_POST["numOrden"], $_SESSION["idusuario"])) {
            $numerorden = $_POST["numOrden"];
            $idusuario = $_SESSION["idusuario"];
            $iddeclaracion = ControladorValidacion::validarID($_POST["iddeclaracionS"]);
            $fechadeclarada = strtotime($_POST["fechadeclarada"]);
            $fechavencimiento = strtotime($_POST["fechavencimiento"]);
            $numerorden = $_POST["numOrden"];
            if ($iddeclaracion && ControladorValidacion::formatoFecha($_POST["fechadeclarada"])) {
                if ($fechavencimiento > $fechadeclarada) {
                    return ModeloDeclaracionSunat::mdlEditarDeclaracionSunat($iddeclaracion, 2, $_POST["fechadeclarada"], $numerorden, $idusuario);
                } else {
                    return ModeloDeclaracionSunat::mdlEditarDeclaracionSunat($iddeclaracion, 3, $_POST["fechadeclarada"], $numerorden, $idusuario);
                }
            }
        }
        return false;
    }
}
