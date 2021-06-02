<?php
    require_once "conexion.php";

    class ModeloUsuarios{
        static public function mdlMostrarUsuarios($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre ASC");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT U.idusuario as idusuario, D.iddepartamento as iddepartamento, TU.idtipousuario as idtipousuario, U.estado as estado, U.nombre AS nombre, U.apellidos AS apellidos, U.login AS usuario, U.password1 as password1, U.imagen as imagen, TU.nombre as tipousuario, D.nombre as departamento, U.email as email, U.codigopersona as codigopersona
                    FROM $tabla U
                    JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                    JOIN departamento D ON U.iddepartamento = D.iddepartamento WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT U.idusuario as idusuario, D.iddepartamento as iddepartamento, TU.idtipousuario as idtipousuario, U.estado as estado, U.nombre AS nombre, U.apellidos AS apellidos, U.login AS usuario, U.password1 as password1, U.imagen as imagen, TU.nombre as tipousuario, D.nombre as departamento, U.email as email, U.codigopersona as codigopersona
                FROM $tabla U
                JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario
                JOIN departamento D ON U.iddepartamento = D.iddepartamento");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlIngresarUsuario($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(iddepartamento,idtipousuario,nombre,apellidos,login,email,password1,imagen,estado,codigopersona) VALUES (:iddepartamento,:idtipousuario,:nombre,:apellidos,:login,:email,:password1,:imagen,:estado,:codigopersona)");
            $stmt -> bindParam(":iddepartamento", $datos["iddepartamento"],PDO::PARAM_STR);
            $stmt -> bindParam(":idtipousuario", $datos["idtipousuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":apellidos", $datos["apellidos"],PDO::PARAM_STR);
            $stmt -> bindParam(":login",$datos['login'],PDO::PARAM_STR);
            $stmt -> bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt -> bindParam(":password1", $datos["clave"],PDO::PARAM_STR);
            $stmt -> bindParam(":imagen",$datos['imagen'],PDO::PARAM_STR);
            $stmt -> bindParam(":estado",$datos['estado'],PDO::PARAM_STR);
            $stmt -> bindParam(":codigopersona",$datos['codigo_persona'],PDO::PARAM_STR);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2){
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

        static public function mdlEditarUsuario($tabla,$datos){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET idtipousuario=:idtipousuario,iddepartamento=:iddepartamento,nombre=:nombre,apellidos=:apellidos,email=:email,login=:login,codigopersona=:codigopersona,imagen=:imagen WHERE idusuario=:idusuario");
			$stmt -> bindParam(":iddepartamento", $datos["iddepartamento"],PDO::PARAM_STR);
            $stmt -> bindParam(":idtipousuario", $datos["idtipousuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":apellidos", $datos["apellidos"],PDO::PARAM_STR);
            $stmt -> bindParam(":login",$datos['login'],PDO::PARAM_STR);
            $stmt -> bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt -> bindParam(":imagen",$datos['imagen'],PDO::PARAM_STR);
            $stmt -> bindParam(":codigopersona",$datos['codigo_persona'],PDO::PARAM_STR);
            $stmt -> bindParam(":idusuario",$datos['idusuario'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

        static public function mdlEditarContra($tabla,$datos){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET password1=:password1 WHERE idusuario=:idusuario");
			$stmt -> bindParam(":password1", $datos["password1"],PDO::PARAM_STR);
            $stmt -> bindParam(":idusuario", $datos["idusuario"],PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}


        static public function mdlConsultarUsuario($codigopersona){ 
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE codigopersona = \"$codigopersona\"");
            $stmt -> execute();
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        }

    }