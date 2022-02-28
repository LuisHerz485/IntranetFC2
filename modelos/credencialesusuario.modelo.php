<?php
/*modelo de credenciales de usuario */
require_once "conexion.php";
require_once "conexion-v2.php";

class modelocredencialesusuario{

    /* listar credenciales de usuario */
    public static function mdlcredencialesusuario(): mixed
    {
        $credencialesusuario =  null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $credencialesusuario = $conexion->getData("SELECT c.idcredenusuario, u.estado ,d.nombre , CONCAT(u.nombre,'',u.apellidos) AS nombrecompleto,u.login ,c.contrase 	FROM credenusuario c 
            INNER JOIN usuario u ON c.idusuario = u.idusuario
            INNER JOIN departamento d ON d.iddepartamento = u.iddepartamento");
        }catch (PDOException $e){
            echo $e->getMessage();
        }finally{
            if ($conexion){
                $conexion->close();
                $conexion = null;
            }
        }
        return $credencialesusuario;
    }
}
?>

