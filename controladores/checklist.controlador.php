<?php

class ControladorChecklist
{
    public static function registrarChecklist(): bool
    {
        if (isset($_POST["idtipousuario"], $_POST["iddepartamento"], $_POST["idusuario"], $_POST["fecha"], $_POST["detalle"], $_POST["horainicio"], $_POST["horafin"])) {
            $idtipousuario = intval($_POST["idtipousuario"]);
            $iddepartamento = intval($_POST["iddepartamento"]);
            $idusuario = intval($_POST["idusuario"]);
            $fecha = $_POST["fecha"];
            if (!empty($fecha) && $idtipousuario && $iddepartamento && $idusuario) {
                $idchecklist = ChecklistModelo::registrarChecklist($idtipousuario, $iddepartamento, $idusuario, $fecha);
                if ($idchecklist) {
                    $cantidad = count($_POST["detalle"]);
                    if ($cantidad > 0) {
                        $actividades = [];
                        for ($i = 0; $i < $cantidad; $i++) {
                            $actividades[] = "( $idchecklist, " . $_POST["idestadochecklist"][$i] . ",'" . $_POST["detalle"][$i] . "','" . $_POST["horainicio"][$i] . "','" . $_POST["horafin"][$i] . "')";
                        }
                        $respuesta = ChecklistModelo::registrarDetalleChecklist($actividades);
                        if ($respuesta) {
                            return $respuesta;
                        }
                    }
                }
            }
        }
        return false;
    }
}
