<?php
    require_once "conexion.php";

    class ModeloUsuarios{
        static public function mdlMostrarUsuarios($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by CODIGO_GENERAL DESC LIMIT 1");
                    $stmt -> execute();
                    return $stmt -> fetch();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT U.estado as estado, U.nombre AS nombre, U.apellidos AS apellidos, u.login AS usuario, u.password1 as password1, u.imagen as imagen, tu.nombre as tipousuario FROM $tabla U JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }

    }