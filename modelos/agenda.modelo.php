<?php
require_once "conexion.php";

class ModeloAgenda
{
    static public function mdlMostrarAgendaCliente($tabla, $item, $valor)
    {
        if ($item != null) {
            if ($item === 1) {
                $stmt = Conexion::conectar()->prepare("SELECT R.idrepresentante as idrepresentante, R.nombrecompleto as nombrecompleto, R.detallecargo as cargo, A.telefono1 as telefono1, A.telefono2 as telefono2, A.correo1 as correo1, A.correo2 as correo2
                    FROM $tabla A
                    JOIN representante R ON R.idrepresentante = A.idrepresentante WHERE R.idrepresentante = $valor");
                $stmt->execute();
                return $stmt->fetch();
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT R.idrepresentante as idrepresentante, R.nombrecompleto as nombrecompleto, R.detallecargo as cargo, A.telefono1 as telefono1, A.telefono2 as telefono2, A.correo1 as correo1, A.correo2 as correo2
                    FROM agenda A
                    JOIN representante R ON R.idrepresentante = A.idrepresentante WHERE A.idcliente = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetchAll();
            }
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where ");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    static public function mdlAgregarAgenda($valor1, $idrepresentante, $valor4, $valor5, $valor6, $valor7)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO agenda(idcliente,idrepresentante,telefono1,telefono2,correo1,correo2) VALUES (:idcliente,:idrepresentante,:telefono1,:telefono2,:correo1,:correo2)");
        $stmt->bindParam(":idcliente", $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":idrepresentante", $idrepresentante, PDO::PARAM_STR);
        $stmt->bindParam(":telefono1", $valor4, PDO::PARAM_STR);
        $stmt->bindParam(":telefono2", $valor5, PDO::PARAM_STR);
        $stmt->bindParam(":correo1", $valor6, PDO::PARAM_STR);
        $stmt->bindParam(":correo2", $valor7, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEditarAgenda($valor1, $valor8, $valor4, $valor5, $valor6, $valor7)
    {
        $stmt = conexion::conectar()->prepare("UPDATE agenda SET telefono1=:telefono1, telefono2=:telefono2, correo1=:correo1, correo2=:correo2 WHERE idcliente=:idcliente AND idrepresentante=:idrepresentante");
        $stmt->bindParam(":telefono1", $valor4, PDO::PARAM_STR);
        $stmt->bindParam(":telefono2", $valor5, PDO::PARAM_STR);
        $stmt->bindParam(":correo1", $valor6, PDO::PARAM_STR);
        $stmt->bindParam(":correo2", $valor7, PDO::PARAM_STR);
        $stmt->bindParam(":idcliente", $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":idrepresentante", $valor8, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliminarRepresentanteAgenda($valor)
    {
        $stmt = conexion::conectar()->prepare("DELETE FROM agenda WHERE idrepresentante=:idrepresentante");
        $stmt->bindParam(":idrepresentante", $valor, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
