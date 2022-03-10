<?php
/*modelo de credenciales AFP */
require_once "conexion.php";
require_once "conexion-v2.php";

class modeloafp{

    /* listar credenciales AFP */
    public static function mdllistarafp(): mixed
    {
        $afp =  null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $afp = $conexion->getData("SELECT a.idcliente, c.razonsocial, a.usuarioafp, a.contraseafp FROM AFP a 
            INNER JOIN cliente c on c.idcliente =a.idcliente ");
        }catch (PDOException $e){
            echo $e->getMessage();
        }finally{
            if ($conexion){
                $conexion->close();
                $conexion = null;
            }
        }
        return $afp;
    }
    
    //registrar credenciales AFP
    public static function mdlregistrarafp(int $idcliente,string $usuarioafp, string $contraseafp): int|false
    {
        $conexion = null;
        $resultado = false;
        try {
            $conexion = new ConexionV2();
            $resultado = $conexion->insert("INSERT INTO AFP (idcliente, usuarioafp, contraseafp) 
            VALUES (?,?,?)", [$idcliente, $usuarioafp, $contraseafp]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $resultado;
    }

    //editar credenciales AFP
    public static function mdleditarafp(int $idcliente, int $idafp, string $usuarioafp,string $contraseafp): bool
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE AFP SET idcliente=?, usuarioafp=?, contraseafp=? WHERE idafp=?", [$idcliente, $usuarioafp, $contraseafp, $idafp]);
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
?>