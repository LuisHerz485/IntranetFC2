<?php
/*modelo de credenciales de clientes */
require_once "conexion.php";
require_once "conexion-v2.php";

class modelocredencialesclientes{

    /* listar credenciales de clientes */
    public static function mdlcredencialesclientes(): mixed
    {
        $credencialesclientes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $credencialesclientes = $conexion->getData("SELECT u.razonsocial, u.ruc , hc.Gerente, u.logincliente, hc.contrase FROM Credencliente hc 
            INNER JOIN cliente u ON hc.idcliente = u.idcliente");
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $credencialesclientes;
    }
}