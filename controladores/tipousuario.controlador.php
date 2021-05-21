<?php
    class ControladorTipoUsuario{
        static public function ctrMostrarTipoUsuario($item,$valor){
			$tabla = "tipousuario";
			$respuesta = ModeloTipoUsuario::mdlMostrarTipoUsuario($tabla,$item,$valor);
			return $respuesta;
		}
    
    }
