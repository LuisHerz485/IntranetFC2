<?php
require_once "conexion.php";

class ModeloDepartamento
{
    static public function mdlMostrarDepartamento($tabla, $item, $valor)
    {
        if ($item != null) {
            if ($item === 1) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
                $stmt->execute();
                return $stmt->fetchAll();
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch();
            }
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    static public function mdlMostrarDepUser($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT U.idusuario AS idusuario, U.estado as estado, D.iddepartamento AS iddepartamento, TU.idtipousuario AS idtipousuario, U.email AS email,  U.nombre AS nombre, U.apellidos AS apellidos, TU.nombre AS tipousuario, D.nombre AS departamento FROM $tabla U JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario JOIN departamento D ON D.iddepartamento = U.iddepartamento WHERE U.iddepartamento = $valor");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlIngresarDepartamento($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,descripcion,estado) VALUES (:nombre,:descripcion,:estado)");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEditarDepartamento($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,descripcion=:descripcion WHERE iddepartamento=:iddepartamento");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":iddepartamento", $datos["iddepartamento"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlActualizarDepartamento($tabla, $item1, $valor1, $item2, $valor2)
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


    public static function mdlMostrarAreasContabilidad(): mixed
    {
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $estadoschecklist = $conexion->getData("SELECT * FROM departamento D WHERE D.nombre=\"Laboral\" OR D.nombre=\"Contabilidad\" OR D.nombre=\"Tributaria\" OR D.nombre=\"Área de Auditoria\" OR D.nombre=\"Requerimiento\" OR D.nombre=\"Facturación Electronica\" OR D.nombre=\"Practicante\"");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $estadoschecklist;
    }
}
