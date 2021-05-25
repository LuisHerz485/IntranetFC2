<?php
    require_once "conexion.php";

    class ModeloTipoUsuario{
        static public function mdlMostrarTipoUsuario($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado <> 0 ORDER by nombre");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
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

        static public function mdlIngresarTipoUsuario($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,descripcion,estado) VALUES (:nombre,:descripcion,:estado)");
            $stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion", $datos["descripcion"],PDO::PARAM_STR);
            $stmt -> bindParam(":estado", $datos["estado"],PDO::PARAM_STR);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlEditarTipoUsuario($tabla,$datos){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,descripcion=:descripcion WHERE idtipousuario=:idtipousuario");
			$stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion", $datos["descripcion"],PDO::PARAM_STR);
            $stmt -> bindParam(":idtipousuario", $datos["idtipousuario"],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

        static public function mdlActualizarTipoUsuario($tabla,$item1,$valor1,$item2,$valor2){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
			$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

    }