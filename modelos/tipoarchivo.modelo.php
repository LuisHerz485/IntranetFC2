<?php
require_once "conexion.php";

class ModeloTipoArchivo
{
    static public function mdlMostrarTipoArchivo($tabla, $item, $valor)
    {
        if ($item != null) {
            if ($item === 1) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE categoria = 1 ORDER by descripcion");
                $stmt->execute();
                return $stmt->fetchAll();
            } else if ($item === 2) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE categoria = 2 ORDER by descripcion");
                $stmt->execute();
                return $stmt->fetchAll();
            } else if ($item === 3) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE categoria = 3 ORDER by descripcion");
                $stmt->execute();
                return $stmt->fetchAll();
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
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
