<?php

class ControladorPermiso
{
    public static function registrarPermiso(): bool
    {
        if (isset($_POST["idusuario"], $_POST["idtipopermiso"], $_POST["detalle"], $_POST["fechainicio"], $_POST["fechafin"])) {
            $idusuario = intval($_POST["idusuario"]);
            $idtipopermiso = intval($_POST["idtipopermiso"]);
            $detalle = $_POST["detalle"];
            $fechainicio = $_POST["fechainicio"];
            $fechafin = $_POST["fechafin"];
            if (!empty($detalle) && !empty($fechainicio) && !empty($fechafin) && $idusuario && $idtipopermiso) {
                $respuesta = ModeloPermiso::registrarPermiso($idusuario, $idtipopermiso, $detalle, $fechainicio, $fechafin);
                if ($respuesta) {
                    return $respuesta;
                }
            }
        }
        return false;
    }
}
