<?php  

//modelo del modulo cumplea単os cliente
require_once "conexion.php";
require_once "conexion-v2.php";

class modelocumplecliente{
    public static function mdlRegistrarCumpleCliente(array $datos): int|false
    {
        $idcumplecliente = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcumplecliente = $conexion->insert("INSERT INTO cumplecliente (idcliente, fechacumplecliente) VALUES(? ,?);
            ", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
    return $idcumplecliente;
    }
    public static function mdlEditarCumpleCliente(array $datos): int|false
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

    public static function mdlListarCumpleCliente(): mixed
    {
        $cumplecliente = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cumplecliente = $conexion->getData("SELECT C.idcumplecliente,C.idcliente,C.fechacumplecliente,CL.razonsocial,CL.imagen FROM cumplecliente AS C
            INNER JOIN cliente CL ON CL.idcliente = C.idcliente ");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cumplecliente;
    }

    public static function mdlBuscarCumpleclientePorID(): mixed{
        $uncumplecliente = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $uncumplecliente = $conexion->getDataSingle("SELECT C.idcumplecliente,C.idcliente,C.fechacumplecliente,CL.razonsocial,CL.imagen FROM cumplecliente AS C
            INNER JOIN cliente CL ON CL.idcliente = C.idcliente WHERE C.idcumplecliente = ?", $datos);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $uncumplecliente;
    }

    public static function mdlBuscarCumpledeunCliente(): mixed{
        $uncumplecliente = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $uncumplecliente = $conexion->getData("SELECT C.idcumplecliente,C.idcliente,C.fechacumplecliente,CL.razonsocial,CL.imagen FROM cumplecliente AS C
            INNER JOIN cliente CL ON CL.idcliente = C.idcliente WHERE CL.idcliente = ?", $datos);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $uncumplecliente;
    }

    public static function mdlBuscarCumpleClienteporfecha():mixed{
        $uncumplecliente = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $uncumplecliente = $conexion->getData("SELECT C.idcumplecliente,C.idcliente,C.fechacumplecliente,CL.razonsocial,CL.imagen FROM cumplecliente AS C
            INNER JOIN cliente CL ON CL.idcliente = C.idcliente WHERE C.fechacumplecliente = ?", $datos);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $uncumplecliente;
    }

}