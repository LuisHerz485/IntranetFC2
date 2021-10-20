<?php

class ControladorHorario
{
    public static function ctrRegistrarHorario(): bool
    {
        if (isset($_POST["horainicio"], $_POST["horafin"], $_POST["idhorario"])) {
            $horainicio = date("H:i", strtotime($_POST["horainicio"]));
            $horafin = date("H:i", strtotime($_POST["horafin"]));
            $idhorario = ControladorValidacion::validarID($_POST["idhorario"]);
            if (ControladorValidacion::formatoHoraMinutos($horainicio) && ControladorValidacion::formatoHoraMinutos($horafin)) {

                if (ModeloHorario::mdlRegistrarHorario($horainicio, $horafin) && $idhorario) {
                    return ModeloHorario::mdlActulizarEstado($idhorario);
                }
            }
        }
        return false;
    }
    public static function ctrConsultarHorario(): mixed
    {
        $horarioActual = ModeloHorario::mdlConsultarHorario();
        if ($horarioActual) {
            return array_replace($horarioActual, ["horaInicio" => date("g:i A", strtotime($horarioActual["horaInicio"])), "horafin" => date("g:i A", strtotime($horarioActual["horafin"]))]);
        }
        return false;
    }
}
