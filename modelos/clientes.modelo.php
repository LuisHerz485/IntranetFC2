<?php
    require_once "conexion.php";

    class ModeloClientes{
        static public function mdlMostrarClientes($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre ASC");
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

        static public function mdlIngresarCliente($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruc,razonsocial,logincliente,contrasenacliente,iddrive,imagen,tipocliente,estado) VALUES (:ruc,:razonsocial,:logincliente,:contrasenacliente,:iddrive,:imagen,:tipocliente,:estado)");
            $stmt -> bindParam(":ruc", $datos["ruc"],PDO::PARAM_STR);
            $stmt -> bindParam(":razonsocial", $datos["razonsocial"],PDO::PARAM_STR);
            $stmt -> bindParam(":logincliente", $datos["logincliente"],PDO::PARAM_STR);
            $stmt -> bindParam(":contrasenacliente", $datos["contrasenacliente"],PDO::PARAM_STR);
            $stmt -> bindParam(":iddrive",$datos['iddrive'],PDO::PARAM_STR);
            $stmt -> bindParam(":imagen", $datos["imagen"],PDO::PARAM_STR);
            $stmt -> bindParam(":tipocliente",$datos['tipocliente'],PDO::PARAM_STR);
            $stmt -> bindParam(":estado",$datos['estado'],PDO::PARAM_STR);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlActualizarCliente($tabla,$item1,$valor1,$item2,$valor2){
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

        static public function mdlEditarCliente($tabla,$datos){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET ruc=:ruc,razonsocial=:razonsocial,logincliente=:logincliente,iddrive=:iddrive,imagen=:imagen WHERE idcliente=:idcliente");
			$stmt -> bindParam(":ruc", $datos["ruc"],PDO::PARAM_STR);
            $stmt -> bindParam(":razonsocial", $datos["razonsocial"],PDO::PARAM_STR);
            $stmt -> bindParam(":logincliente", $datos["logincliente"],PDO::PARAM_STR);
            $stmt -> bindParam(":iddrive",$datos['iddrive'],PDO::PARAM_STR);
            $stmt -> bindParam(":imagen", $datos["imagen"],PDO::PARAM_STR);
            $stmt -> bindParam(":idcliente",$datos['idcliente'],PDO::PARAM_STR);

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

    }