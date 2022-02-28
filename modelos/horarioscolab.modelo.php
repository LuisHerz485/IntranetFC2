<?php
/*modelo de horarios de colaboradores */
require_once "conexion.php";
require_once "conexion-v2.php";

class modelohorariocolab{

    public static function mdlRegistrarHorarioColab(int $idusuario,string $horaentrada, string $horasalida, string $detalle): int|false
    {
        $idhorariocolab = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idhorariocolab = $conexion->insert("INSERT INTO horarioscolab (idusuario,horaentrada, horasalida, detalle) VALUES(?, ?, ?, ?)", [$idusuario,$horaentrada, $horasalida, $detalle]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idhorariocolab;
    }
    
    

    /*listar horarios de colaboradores con nombre de usuario */
    public static function mdlListarHorarioColab(): mixed
    {
        $horariocolab = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $horariocolab = $conexion->getData("SELECT hc.idhorario, hc.horaentrada, hc.horasalida, hc.detalle, CONCAT(u.nombre,'', u.apellidos)AS nombrecompleto FROM horarioscolab hc 
            INNER JOIN usuario u ON hc.idusuario = u.idusuario");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $horariocolab;
    }

    public static function mdlBuscarHorarioColabporID(): mixed{
        $unhorariocolab = null;
        $conexion = null;
        try {
            $conexion = new Conexion();
            $unhorariocolab = $conexion->getDataSingle("SELECT hc.idhorario, hc.horaentrada, hc.horasalida, hc.detalle, CONCAT(u.nombre,'', u.apellidos)AS nombrecompleto FROM horarioscolab hc 
            INNER JOIN usuario u ON hc.idusuario = u.idusuario WHERE hc.idhorariocolab=?, $datos");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $unhorariocolab;
    }

    public static function mdlEditarHorarioColab(array $datos):int|false
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateorDelete("UPDATE horarioscolab SET idusuario=?, horaentrada=?, horasalida=?, detalle=? WHERE idhorario=?;", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasActualizadas;

    }
}