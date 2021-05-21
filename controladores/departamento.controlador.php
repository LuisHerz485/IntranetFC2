<?php
    class ControladorDepartamento{
        static public function ctrMostrarDepartamento($item,$valor){
			$tabla = "departamento";
			$respuesta = ModeloDepartamento::mdlMostrarDepartamento($tabla,$item,$valor);
			return $respuesta;
		}

        
    
    
    }

