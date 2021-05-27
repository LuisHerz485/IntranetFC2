<?php
    class ControladorAsistencia{
        static public function ctrMostrarAsistencia($item,$valor){
			$tabla = "asistencia";
			$respuesta = ModeloAsistencia::mdlMostrarAsistencia($tabla,$item,$valor);
			return $respuesta;
		}
		
    }
