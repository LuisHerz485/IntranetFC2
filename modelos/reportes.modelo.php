<?php
require_once "conexion.php";

class ModeloReportes
{
    /**
     * Retorna un array de todas las asistencias dentro de un rango de fechas para cada usuario
     */
    static public function mdlMostrarReporte($tabla, $idusuario, $fechadesde, $fechahasta)
    {
        $stmt = Conexion::conectar()->prepare("SELECT U.codigopersona as codigo, U.nombre as nombre, U.apellidos as apellidos, D.nombre as area, A.fechahora as fecha, A.tipo as asistencia, A.estado as estado, A.detalle as detalle
            FROM $tabla A
            JOIN usuario U ON U.idusuario = A.idusuario
            JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
            JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE (A.fechahora >= \"$fechadesde 00:00:00\" and A.fechahora <= \"$fechahasta 23:59:59\") AND U.idusuario = $idusuario");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
