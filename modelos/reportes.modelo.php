<?php
    require_once "conexion.php";

    class ModeloReportes{
        static public function mdlMostrarReporte($tabla,$valor1,$valor2,$valor3){
            $stmt = Conexion::conectar()->prepare("SELECT u.codigopersona as codigo, u.nombre as nombre, u.apellidos as apellidos, d.nombre as area, a.fechahora as fecha, a.tipo as asistencia, a.estado as estado, a.detalle as detalle
            FROM $tabla A
            JOIN usuario U ON U.idusuario = A.idusuario
            JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
            JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE (a.fechahora >= \"$valor2 00:00:00\" and a.fechahora <= \"$valor3 23:59:59\") AND u.idusuario = $valor1");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

    }