<?php
require_once "conexion.php";
require_once "conexion-v2.php";

class ModeloUsuarios
{
    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        if ($item != null) {
            if ($item === 1) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre ASC");
                $stmt->execute();
                return $stmt->fetchAll();
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT U.idusuario as idusuario, D.iddepartamento as iddepartamento, TU.idtipousuario as idtipousuario, U.estado as estado, U.nombre AS nombre, U.apellidos AS apellidos, U.login AS usuario, U.password1 as password1, U.imagen as imagen, TU.nombre as tipousuario, D.nombre as departamento, U.email as email, U.codigopersona as codigopersona
                    FROM $tabla U
                    JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                    JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE $item = :$item ORDER BY estado asc, departamento desc");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch();
            }
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT U.idusuario as idusuario, D.iddepartamento as iddepartamento, TU.idtipousuario as idtipousuario, U.estado as estado, U.nombre AS nombre, U.apellidos AS apellidos, U.login AS usuario, U.password1 as password1, U.imagen as imagen, TU.nombre as tipousuario, D.nombre as departamento, U.email as email, U.codigopersona as codigopersona
                FROM $tabla U
                JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                JOIN departamento D ON U.iddepartamento = D.iddepartamento ORDER BY estado desc, departamento asc");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }


    public static function mdlMostrarUsuariosActivo(): mixed
    {
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $estadoschecklist = $conexion->getData("SELECT U.idusuario as idusuario, D.iddepartamento as iddepartamento, TU.idtipousuario as idtipousuario, U.estado as estado, U.nombre AS nombre, U.apellidos AS apellidos, U.login AS usuario, U.password1 as password1, U.imagen as imagen, TU.nombre as tipousuario, D.nombre as departamento, U.email as email, U.codigopersona as codigopersona
                    FROM usuario U
                    JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                    JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE U.estado = 1");
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


    public static function mdlMostrarUsuariosNombre(): mixed
    {
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $estadoschecklist = $conexion->getData("SELECT idusuario, nombre , apellidos FROM usuario WHERE estado=1");
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


    public static function mdlMostrarUsuariosContabilidad(): mixed
    {
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $estadoschecklist = $conexion->getData("SELECT U.idusuario as idusuario, D.iddepartamento as iddepartamento, TU.idtipousuario as idtipousuario, U.estado as estado, U.nombre AS nombre, U.apellidos AS apellidos, U.login AS usuario, U.password1 as password1, U.imagen as imagen, TU.nombre as tipousuario, D.nombre as departamento, U.email as email, U.codigopersona as codigopersona
                    FROM usuario U
                    JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                    JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE U.estado = 1 AND D.nombre=\"Laboral\" OR D.nombre=\"Contabilidad\" OR D.nombre=\"Área Legal\" OR D.nombre=\"Tributaria\" OR D.nombre=\"Área de Auditoria\" OR D.nombre=\"Requerimiento\" OR D.nombre=\"Facturación Electronica\" OR D.nombre=\"Practicante\" ");
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

    static public function mdlIngresarUsuario($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(iddepartamento,idtipousuario,nombre,apellidos,login,email,password1,imagen,estado,codigopersona) VALUES (:iddepartamento,:idtipousuario,:nombre,:apellidos,:login,:email,:password1,:imagen,:estado,:codigopersona)");
        $stmt->bindParam(":iddepartamento", $datos["iddepartamento"], PDO::PARAM_STR);
        $stmt->bindParam(":idtipousuario", $datos["idtipousuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":login", $datos['login'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password1", $datos["clave"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        $stmt->bindParam(":codigopersona", $datos['codigo_persona'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
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

    static public function mdlEditarUsuario($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET idtipousuario=:idtipousuario,iddepartamento=:iddepartamento,nombre=:nombre,apellidos=:apellidos,email=:email,login=:login,codigopersona=:codigopersona,imagen=:imagen WHERE idusuario=:idusuario");
        $stmt->bindParam(":iddepartamento", $datos["iddepartamento"], PDO::PARAM_STR);
        $stmt->bindParam(":idtipousuario", $datos["idtipousuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":login", $datos['login'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(":codigopersona", $datos['codigo_persona'], PDO::PARAM_STR);
        $stmt->bindParam(":idusuario", $datos['idusuario'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEditarContra($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET password1=:password1 WHERE idusuario=:idusuario");
        $stmt->bindParam(":password1", $datos["password1"], PDO::PARAM_STR);
        $stmt->bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }


    static public function mdlConsultarUsuario($codigopersona)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE codigopersona = \"$codigopersona\"");
        $stmt->execute();
        return $stmt->fetch();
    }


    public static function mdlListarUsuariosPorDepartamento(string $iddepartamento): array
    {
        $usuarios = [];
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $usuarios = $conexion->getData("SELECT U.idusuario AS idusuario, D.iddepartamento AS iddepartamento, TU.idtipousuario AS idtipousuario, U.email AS email,  U.nombre AS nombre, U.apellidos AS apellidos, TU.nombre AS tipousuario, D.nombre AS departamento FROM usuario U JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE U.estado = 1 AND U.iddepartamento = ?", [$iddepartamento]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $usuarios;
    }
}
