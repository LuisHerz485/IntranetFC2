<?php
class ControladorReporte
{
	public static function ctrMostrarReporte(): mixed
	{
		if (isset($_POST["fecha_inicio"], $_POST["fecha_fin"], $_POST["idusuario"])) {
			$idusuario = ControladorValidacion::validarID($_POST["idusuario"]);
			$fechainicio = $_POST["fecha_inicio"];
			$fechafin = $_POST["fecha_fin"];
			if (ControladorValidacion::formatoFecha($fechainicio) && ControladorValidacion::formatoFecha($fechafin) && $idusuario) {
				return ModeloReportes::mdlMostrarReporte($idusuario, $fechainicio, $fechafin);
			}
		}
		return false;
	}

	public static function ctrMostrarTardanzas(): mixed
	{
		if (isset($_POST["fecha_inicio"], $_POST["fecha_fin"])) {
			$fechainicio = $_POST["fecha_inicio"];
			$fechafin = $_POST["fecha_fin"];
			if (ControladorValidacion::formatoFecha($fechainicio) && ControladorValidacion::formatoFecha($fechafin)) {
				return ModeloReportes::mdlReporteTardanzas($fechainicio, $fechafin);
			}
		}
		return false;
	}
}
