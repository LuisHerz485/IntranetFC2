<?php
    require_once "conexion.php";

    class ModeloAsistencia{
        static public function mdlMostrarAsistencia($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT u.codigopersona as codigo, u.nombre as nombre, u.apellidos as apellidos, d.nombre as area, a.fechahora as fecha, a.tipo as asistencia, a.estado as estado, a.detalle as detalle
                    FROM $tabla A
                    JOIN usuario U ON U.idusuario = A.idusuario
                    JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                    JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE u.codigopersona = $valor");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT u.codigopersona as codigo, u.nombre as nombre, u.apellidos as apellidos, d.nombre as area, a.fechahora as fecha, a.tipo as asistencia, a.estado as estado, a.detalle as detalle
                FROM $tabla A
                JOIN usuario U ON U.idusuario = A.idusuario
                JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                JOIN departamento D ON U.iddepartamento = D.iddepartamento");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }
        

    }