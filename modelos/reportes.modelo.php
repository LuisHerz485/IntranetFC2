<?php
    require_once "conexion.php";

    class ModeloReportes{
        static public function mdlMostrarReporte($tabla,$valor1,$valor2,$valor3){
            $stmt = Conexion::conectar()->prepare("SELECT U.codigopersona as codigo, U.nombre as nombre, U.apellidos as apellidos, D.nombre as area, A.fechahora as fecha, A.tipo as asistencia, A.estado as estado, A.detalle as detalle
            FROM $tabla A
            JOIN usuario U ON U.idusuario = A.idusuario
            JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
            JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE (A.fechahora >= \"$valor2 00:00:00\" and A.fechahora <= \"$valor3 23:59:59\") AND U.idusuario = $valor1");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

    }