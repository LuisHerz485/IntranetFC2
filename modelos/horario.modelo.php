<?php
require_once "conexion-v2.php";

class ModeloHorario
{
    /** 
     * Registra los permisos de los usuarios 
     */
    public static function mdlRegistrarHorario(string $horainicio, string $horafin): int|false
    {
        $idhorarioactual = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idhorarioactual = $conexion->insert("INSERT INTO horario (horaInicio, horafin, estado) VALUES(?, ?,1)", [$horainicio, $horafin]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idhorarioactual;
    }
    public static function mdlActulizarEstado($idhorario): mixed
    {
        $filasactualizadas = 0;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasactualizadas = $conexion->updateOrDelete("UPDATE horario SET estado=2 WHERE idhorario=?", [$idhorario]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasactualizadas;
    }
    public static function mdlConsultarHorario(): mixed
    {
        $idhorario = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idhorario = $conexion->getDataSingle("SELECT  MAX(idhorario) AS idhorario,horaInicio,horafin from horario WHERE idhorario=(SELECT MAX(idhorario) FROM horario WHERE estado=1)");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idhorario;
    }
}
