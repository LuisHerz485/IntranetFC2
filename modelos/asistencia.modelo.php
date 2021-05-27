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
                    $stmt = Conexion::conectar()->prepare("SELECT a.estado as estado, a.detalle as detalle
                    FROM $tabla A
                    JOIN usuario U ON U.idusuario = A.idusuario WHERE u.codigopersona = $valor");
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

        static public function mdlMostrarDetalleAsistencia($tabla,$item1,$valor1,$item2,$valor2){
            $stmt = Conexion::conectar()->prepare("SELECT a.estado as estado, a.detalle as detalle, a.idasistencia as idasistencia, a.fechahora as fecha
            FROM $tabla A
            JOIN usuario U ON U.idusuario = A.idusuario WHERE $item1 = \"$valor1\" AND $item2 = \"$valor2\"");
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlIngresarDetalleAsitencia($tabla,$datos){
            $stmt = conexion::conectar()->prepare("UPDATE $tabla SET detalle=:detalle,estado=:estado WHERE idasistencia=:idasistencia");
			$stmt -> bindParam(":detalle", $datos["detalle"],PDO::PARAM_STR);
            $stmt -> bindParam(":estado", $datos["estado"],PDO::PARAM_STR);
            $stmt -> bindParam(":idasistencia", $datos["idasistencia"],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
        }
        

    }