<?php
    require_once "conexion.php";

    class ModeloLocal{
        static public function mdlMostrarDepartamento($valor){
            $stmt = Conexion::conectar()->prepare("SELECT LC.idlocalcliente as idlocalcliente, LC.idcliente as idcliente, LC.idubicacion as idubicacion, U.departamento as departamento, U.distrito as distrito, LC.direccion as direccion
             FROM localcliente LC
            JOIN ubicacion U ON U.idubicacion = LC.idubicacion WHERE LC.idcliente = $valor");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlMostrarDistrito($valor1,$valor2){
            $stmt = Conexion::conectar()->prepare("SELECT LC.idlocalcliente as idlocalcliente, LC.idcliente as idcliente, LC.idubicacion as idubicacion, U.departamento as departamento, U.distrito as distrito, LC.direccion as direccion
            FROM localcliente LC
            JOIN ubicacion U ON U.idubicacion = LC.idubicacion WHERE LC.idcliente = $valor1 AND LC.idubicacion = $valor2");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

    }