<?php 

require_once "conexion.php";
require_once "conexion-v2.php";

class ModeloCumpleClientes
{
    public static function mdlRegistrarCumpleanosClientes(array $datos): int|false
    {
        $idcumpleanosclientes = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcumpleanosclientes = $conexion->insert("INSERT INTO cumplecliente (idcliente, fechacumplecliente) VALUES(? ,?);
            ", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
    return $idcumpleanosclientes;
    }

    public static function mdlEditarCumpleClientes(array $datos): int|false
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE cumplecliente SET idcliente=?, fechacumplecliente=? WHERE idcumplecliente=?;
            ", $datos);
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

    public static function mdlListarCumpleClientes(): mixed
    {
        $cumpleclientes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cumpleclientes = $conexion->getData("SELECT CUMCLI.idcumplecliente, CL.razonsocial, CL.imagen ,CUMCLI.idcliente, CUMCLI.fechacumplecliente FROM cumplecliente AS CUMCLI INNER JOIN cliente CL ON CL.idcliente = CUMCLI.idcliente");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cumpleclientes;
    }

    public static function mdlBuscarCumpleanosClientesPorID(array $datos): mixed
    {
        $uncumplecliente = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $uncumplecliente = $conexion->getDataSingle("SELECT CUMCLI.idcumplecliente, CL.razonsocial, CL.imagen ,CUMCLI.idcliente, CUMCLI.fechacumplecliente FROM cumplecliente AS CUMCLI INNER JOIN cliente CL ON CL.idcliente = CUMCLI.idcliente WHERE CUMCLI.idcumplecliente = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $uncumplecliente;
    }

    public static function mdlBuscarCumpleanosDeUnCliente(array $datos): mixed
    {
        $cumpleclientes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cumpleclientes = $conexion->getData("SELECT CUMCLI.idcumplecliente, CL.razonsocial, CL.imagen ,CUMCLI.idcliente, CUMCLI.fechacumplecliente FROM cumplecliente AS CUMCLI INNER JOIN cliente CL ON CL.idcliente = CUMCLI.idcliente WHERE CL.idcliente = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cumpleclientes;
    }

    public static function mdlBuscarCumpleClientePorFecha(array $datos): mixed
    {
        $cumpleclientes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cumpleclientes = $conexion->getData("SELECT CUMCLI.idcumplecliente, CL.razonsocial, CL.imagen ,CUMCLI.idcliente, CUMCLI.fechacumplecliente FROM cumplecliente AS CUMCLI INNER JOIN cliente CL ON CL.idcliente = CUMCLI.idcliente WHERE CUMCLI.fechacumplecliente = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cumpleclientes;
    }


}