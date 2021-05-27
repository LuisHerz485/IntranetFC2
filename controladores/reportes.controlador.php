<?php
    class ControladorReporte{
        static public function ctrMostrarReporte($valor1, $valor2, $valor3){
			$tabla = "asistencia";
			$respuesta = ModeloReportes::mdlMostrarReporte($tabla,$valor1,$valor2,$valor3);
			return $respuesta;
		}
		

    }
