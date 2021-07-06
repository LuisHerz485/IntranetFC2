<?php
    class ControladorLocal{
        static public function ctrMostrarLocal($item,$valor){
			$tabla = "localcliente";
			$respuesta = ModeloLocal::mdlMostrarLocal($tabla,$item,$valor);
			return $respuesta;
		}

		

		

    }

