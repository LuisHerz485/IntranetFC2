<?php
    require_once "conexion.php";

    class ModeloAsistencia{

        static public function mdlMostrarAsistencia($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT U.codigopersona as codigo, U.nombre as nombre, U.apellidos as apellidos, D.nombre as area, A.fechahora as fecha, A.tipo as asistencia, A.estado as estado, A.detalle as detalle
                    FROM $tabla A
                    JOIN usuario U ON U.idusuario = A.idusuario
                    JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                    JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE U.codigopersona = $valor");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT A.estado as estado, A.detalle as detalle
                    FROM $tabla A
                    JOIN usuario U ON U.idusuario = A.idusuario WHERE U.codigopersona = $valor");
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT U.codigopersona as codigo, U.nombre as nombre, U.apellidos as apellidos, D.nombre as area, A.fechahora as fecha, A.tipo as asistencia, A.estado as estado, A.detalle as detalle
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
            $stmt = Conexion::conectar()->prepare("SELECT A.estado as estado, A.detalle as detalle, A.idasistencia as idasistencia, A.fechahora as fecha
            FROM $tabla A
            JOIN usuario U ON U.idusuario = A.idusuario WHERE $item1 = \"$valor1\" AND $item2 = \"$valor2\"");
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlIngresarDetalleAsitencia($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET detalle=:detalle,estado=:estado WHERE idasistencia=:idasistencia");
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

        static public function mdlConsultarAsistencia($valor){
            $stmt = Conexion::conectar()->prepare("SELECT A.fechahora as fechahora, A.tipo as tipo, U.idusuario as idusuario 
                FROM asistencia A 
                JOIN usuario U ON U.idusuario = A.idusuario
                WHERE U.idusuario=$valor ORDER BY A.fechahora DESC LIMIT 1");
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlMarcarAsistencia($tabla,$idusuario,$tipo){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idusuario, tipo, estado, detalle) VALUES ($idusuario, \"$tipo\", 2, \"\")");

            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }

            $stmt -> close();
            $stmt = null;
        }

    }