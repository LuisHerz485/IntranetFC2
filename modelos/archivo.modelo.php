<?php
require_once "conexion.php";

class ModeloArchivo
{
    static public function mdlMostrarAchivo($tabla, $valor1, $valor2)
    {
        $stmt = Conexion::conectar()->prepare("SELECT A.ruta as ruta, A.nombre as nombre, A.fechacreado as fechacreado
            FROM $tabla A
            JOIN cliente C ON C.idcliente = A.idcliente
            JOIN tipoarchivo TA ON TA.idtipoarchivo = A.idtipoarchivo WHERE A.idtipoarchivo = $valor1 AND A.idcliente = $valor2");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
