<?php
/*modelo de credenciales Facturas*/
require_once "conexion.php";
require_once "conexion-v2.php";

class modelofacturas{

     /* listar credenciales FACTURAS */
     public static function mdlListarFacturas(): mixed
     {
         $factura =  null;
         $conexion = null;
         try {
             $conexion = new ConexionV2();
             $factura = $conexion->getData("SELECT 
             f.idcliente,
             c.razonsocial,
             f.portal,
             f.usuariofacturas,
             f.contrasefacturas 
             FROM facturas f
             INNER JOIN cliente c on c.idcliente = f.idcliente ");
         }catch (PDOException $e){
             echo $e->getMessage();
         }finally{
             if ($conexion){
                 $conexion->close();
                 $conexion = null;
             }
         }
         return $factura;
     }
    
    //registrar credenciales AFP
    public static function mdlRegistrarFactura(int $idcliente, string $portal,string $usuariofacturas, string $contrasefacturas): int|false
    {
        $conexion = null;
        $resultado = false;
        try {
            $conexion = new ConexionV2();
            $resultado = $conexion->insert("INSERT INTO facturas (idcliente, portal, usuariofacturas, contrasefacturas) 
            VALUES (?,?,?,?)", [$idcliente, $portal, $usuariofacturas, $contrasefacturas]);
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

    //eliminar cuentas por pagar modelo
    public static function mdlEliminarFactura(array $datos): int|false
    {
        $idfactura = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idfactura = $conexion->updateOrDelete("DELETE FROM facturas WHERE idfacturas = ?;", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idfactura;
    }
}
?>