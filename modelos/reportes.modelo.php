<?php
require_once "conexion-v2.php";

class ModeloReportes
{
    /**
     * Retorna un array de todas las asistencias dentro de un rango de fechas para cada usuario
     */
    static public function mdlMostrarReporte(int $idusuario, string $fechadesde, string $fechahasta): mixed
    {
        $reporteAsistencia = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $reporteAsistencia = $conexion->getData("SELECT U.codigopersona as codigo, U.nombre as nombre, U.apellidos as apellidos, D.nombre as area, A.fechahora as fecha, A.tipo as asistencia, A.estado as estado, A.detalle as detalle
            FROM asistencia A
            JOIN usuario U ON U.idusuario = A.idusuario
            JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
            JOIN departamento D ON U.iddepartamento = D.iddepartamento  WHERE (DATE(A.fechahora) BETWEEN ? AND ?) AND U.idusuario=?", [$fechadesde, $fechahasta, $idusuario]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $reporteAsistencia;
    }

    static public function mdlReporteTardanzas(string $fechadesde, string $fechahasta): mixed
    {
        $reporteAsistencia = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $reporteAsistencia = $conexion->getData("SELECT u.codigopersona AS codigo, CONCAT(u.nombre, ' ', u.apellidos) AS colaborador, d.nombre AS area, COUNT(a.idasistencia) as numeroTardanzas FROM asistencia a JOIN horario h ON h.idhorario = a.idhorario JOIN usuario u ON u.idusuario = a.idusuario JOIN departamento d ON d.iddepartamento = u.iddepartamento WHERE ( a.tipo = 'Entrada' AND a.estado = 5) AND ( DATE(a.fechahora) BETWEEN ? AND ? ) GROUP BY colaborador", [$fechadesde, $fechahasta]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $reporteAsistencia;
    }
}
