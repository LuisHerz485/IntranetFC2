<?php

// controlador horarios de colaboradores

class controladorhorarioscolab
{
    public static function ctrRegistrarhorarioscolab(): bool
    {
        if(isset($_POST["idusuario"], $_POST["horaentrada"], $_POST["horasalida"], $_POST["detalle"]))
        {
            $idusuario = ControladorValidacion::validarID($_POST["idusuario"]);
            $horaentrada = $_POST["horaentrada"];
            $horasalida = $_POST["horasalida"];
            $detalle = $_POST["detalle"];
            if(
                $idusuario && $horaentrada && $horasalida && $detalle
                && ControladorValidacion::formatoHoraMinutos($horaentrada)
                && ControladorValidacion::formatoHoraMinutos($horasalida)
                && ControladorValidacion::longitud($detalle, 300, 0)
            )
            {
                return modelohorariocolab::mdlRegistrarHorarioColab($idusuario, $horaentrada, $horasalida, $detalle);
            }
        }
        return false;
        

    }
    public static function ctrListhorarioscolab(): mixed
    {
        return modelohorariocolab::mdlListarHorarioColab();
    }

}
