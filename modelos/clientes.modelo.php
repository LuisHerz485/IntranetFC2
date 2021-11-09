<?php
require_once "conexion.php";
require_once "conexion-v2.php";

class ModeloClientes
{
    static public function mdlMostrarClientes($tabla, $item, $valor): mixed
    {
        if ($item != null) {
            if ($item === 1) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll();
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch();
            }
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by estado desc, razonsocial asc");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    /**
     * Registra los clientes
     */
    static public function mdlIngresarCliente($tabla, $datos): int|bool
    {
        $insertar = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $insertar = $conexion->insert(
                "INSERT INTO $tabla(ruc,razonsocial,logincliente,contrasenacliente,iddrive,imagen,tipocliente,estado,usuariosunat,clavesunat) VALUES (?,?,?,?,?,?,?,?,?,?)",
                [$datos["ruc"], $datos["razonsocial"], $datos["logincliente"], $datos["contrasenacliente"], $datos["iddrive"], $datos["imagen"], $datos["tipocliente"], $datos["estado"], $datos["usuariosunat"], $datos["clavesunat"]]
            );
        } catch (PDOException $e) {
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
            return $insertar;
        }
    }

    /**
     * 
     */
    static public function mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    /**
     * Actualiza los clientes en la base de datos
     */
    static public function mdlEditarCliente($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET ruc=:ruc,razonsocial=:razonsocial,logincliente=:logincliente,iddrive=:iddrive,imagen=:imagen, usuariosunat=:usuariosunat, clavesunat=:clavesunat WHERE idcliente=:idcliente");
        $stmt->bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);
        $stmt->bindParam(":razonsocial", $datos["razonsocial"], PDO::PARAM_STR);
        $stmt->bindParam(":logincliente", $datos["logincliente"], PDO::PARAM_STR);
        $stmt->bindParam(":iddrive", $datos['iddrive'], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":usuariosunat", $datos["usuariosunat"], PDO::PARAM_STR);
        $stmt->bindParam(":clavesunat", $datos["clavesunat"], PDO::PARAM_STR);
        $stmt->bindParam(":idcliente", $datos['idcliente'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    /**
     * Actualiza la contraseña de los clientes
     */
    static public function mdlEditarContra($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET contrasenacliente=:contrasenacliente WHERE idcliente=:idcliente");
        $stmt->bindParam(":contrasenacliente", $datos["contrasenacliente"], PDO::PARAM_STR);
        $stmt->bindParam(":idcliente", $datos["idcliente"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
