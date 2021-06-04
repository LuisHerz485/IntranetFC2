<?php
    require_once "conexion.php";

    class ModeloRepresentante{
        static public function mdlAgregarRepresentante($valor2, $valor3){
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

        static public function mdlEditarRepresentante($valor2, $valor3, $valor8){
			$stmt = conexion::conectar()->prepare("UPDATE representante SET nombrecompleto=:nombrecompleto, detallecargo=:detallecargo WHERE idrepresentante=:idrepresentante");
			$stmt -> bindParam(":nombrecompleto", $valor2, PDO::PARAM_STR);
            $stmt -> bindParam(":detallecargo", $valor3, PDO::PARAM_STR);
            $stmt -> bindParam(":idrepresentante", $valor8  , PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}
        
        static public function mdlEliminarRepresentante($valor){
			$stmt = conexion::conectar()->prepare("DELETE FROM representante WHERE idrepresentante=:idrepresentante");
			$stmt -> bindParam(":idrepresentante", $valor,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

    }

    
