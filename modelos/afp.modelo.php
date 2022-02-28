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
            $afp = $conexion->getData("SELECT c.razonsocial, a.usuarioafp, a.contraseafp FROM AFP a 
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
}
?>
