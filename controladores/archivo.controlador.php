<?php
    class ControladorArchivo{
        static public function ctrMostrarArchivo($valor1, $valor2){
			$tabla = "archivo";
			$respuesta = ModeloArchivo::mdlMostrarAchivo($tabla,$valor1,$valor2);
			return $respuesta;
		}
		

    }
