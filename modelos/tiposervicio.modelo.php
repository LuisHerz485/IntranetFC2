<?php
require_once "conexion.php";

class ModeloTipoServicio
{
    /**
     * Retorna un array de los tipos de servicio
     */
    static public function mdlMostrarTipoServicio($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT S.idservicio as idservicio,S.nombre as nombre, S.descripcion as descripcion, S.precio as precio 
            FROM $tabla S 
            JOIN categoriaservicio CS ON CS.idcategoriaservicio = S.idcategoriaservicio WHERE S.idcategoriaservicio = $valor");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retorna un array con todos los servicios excepto el servicio auxiliar
     */
    static public function mdlMostrarServicios()
    {
        $stmt = Conexion::conectar()->prepare("SELECT idservicio, idcategoriaservicio, nombre, descripcion, precio FROM servicio WHERE idservicio != 1");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retorna un array de un servicio con sus detalles
     */
    static public function mdlMostrarServicio($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT S.idservicio as idservicio, CS.idcategoriaservicio as idcategoriaservicio, S.nombre as nombre, S.descripcion as descripcion, S.precio as precio 
            FROM $tabla S 
            JOIN categoriaservicio CS ON S.idcategoriaservicio = CS.idcategoriaservicio WHERE S.idservicio = $valor");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Registra el tipo de servicio
     */
    static public function mdlIngresarTipoServicio($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idcategoriaservicio,nombre,descripcion,precio) VALUES (:idcategoriaservicio,:nombre,:descripcion,:precio)");
        $stmt->bindParam("idcategoriaservicio", $datos["idcategoriaservicio"], PDO::PARAM_STR);
        $stmt->bindParam("nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam("descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam("precio", $datos["precio"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    /**
     * Actualiza el tipo de servicio
     */
    static public function mdlEditarTipoServicio($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET idcategoriaservicio=:idcategoriaservicio,nombre=:nombre,descripcion=:descripcion,precio=:precio WHERE idservicio=:idservicio");
        $stmt->bindParam(":idcategoriaservicio", $datos["idcategoriaservicio"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }


    /**
     * Retorna un array de todas la categorias de un servicio
     */
    static public function mdlMostrarCategoriaServicio($tabla, $item, $valor)
    {
        if ($item != null) {
            if ($item === 1) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
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
}
