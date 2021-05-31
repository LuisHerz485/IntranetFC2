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

        static public function mdlMostrarAgendaCliente($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre ASC");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT r.idrepresentante as idrepresentante, R.nombrecompleto as nombrecompleto, r.detallecargo as cargo, a.telefono1 as telefono1, a.telefono2 as telefono2, a.correo1 as correo1, a.correo2 as correo2
                    FROM agenda A
                    JOIN representante R ON R.idrepresentante = A.idrepresentante WHERE A.idcliente = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where ");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlRepresentante($valor2, $valor3){
            $stmt = Conexion::conectar()->prepare("INSERT INTO representante(detallecargo,nombrecompleto) VALUES (:detallecargo,:nombrecompleto)");
            $stmt -> bindParam(":detallecargo", $valor3,PDO::PARAM_STR);
            $stmt -> bindParam(":nombrecompleto", $valor2,PDO::PARAM_STR);
            
            if($stmt -> execute()){
                $stmt2 = Conexion::conectar()->prepare("SELECT * FROM representante ORDER by idrepresentante DESC LIMIT 1");
                $stmt2 -> execute();
                return $stmt2 -> fetch();
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;

            $stmt2 -> close();
            $stmt2 = null;
        }

        static public function mdlAgregarAgenda($valor1, $idrepresentante, $valor4, $valor5, $valor6, $valor7){
            $stmt = Conexion::conectar()->prepare("INSERT INTO agenda(idcliente,idrepresentante,telefono1,telefono2,correo1,correo2) VALUES (:idcliente,:idrepresentante,:telefono1,:telefono2,:correo1,:correo2)");
            $stmt -> bindParam(":idcliente", $valor1,PDO::PARAM_STR);
            $stmt -> bindParam(":idrepresentante", $idrepresentante,PDO::PARAM_STR);
            $stmt -> bindParam(":telefono1", $valor4,PDO::PARAM_STR);
            $stmt -> bindParam(":telefono2", $valor5,PDO::PARAM_STR);
            $stmt -> bindParam(":correo1", $valor6,PDO::PARAM_STR);
            $stmt -> bindParam(":correo2", $valor7,PDO::PARAM_STR);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        }

        

    }