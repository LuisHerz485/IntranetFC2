<?php 
	require_once "conexion.php";
	class ModeloCobranza{
		static public function mdlMostrarCobranza($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre ASC");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT C.idcobranza as idcobranza,LC.idlocalcliente as idlocalcliente,LC.idcliente as idcliente, LC.idubicacion as idubicacion, C.fechaemision AS fechaemision, C.fechavencimiento AS fechavencimiento, C.estado as estado, C.descripcion as descripcion
                    FROM $tabla C
                    JOIN localcliente LC ON C.idcliente = LC.idcliente
                    JOIN localcliente LC ON C.idubicacion = LC.idubicacion
                    JOIN localcliente LC ON C.idlocalcliente = LC.idlocalcliente WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT C.idcobranza as idcobranza,LC.idlocalcliente as idlocalcliente,LC.idcliente as idcliente, LC.idubicacion as idubicacion, C.fechaemision AS fechaemision, C.fechavencimiento AS fechavencimiento, C.estado as estado, C.descripcion as descripcion
                    FROM $tabla C
                    JOIN localcliente LC ON C.idcliente = LC.idcliente
                    JOIN localcliente LC ON C.idubicacion = LC.idubicacion
                    JOIN localcliente LC ON C.idlocalcliente = LC.idlocalcliente");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
		}
         static public function mdlIngresarCobranza($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idlocalcliente, idcliente, idubicacion, fechaemision, fechavencimiento, estado, descripcion) VALUES (:idlocalcliente, :idcliente, :idubicacion, :fechaemision, :fechavencimiento, :estado, :descripcion)");
            $stmt -> bindParam(":idlocalcliente", $datos["idlocalcliente"],PDO::PARAM_STR);
            $stmt -> bindParam(":idcliente", $datos["idcliente"],PDO::PARAM_STR);
            $stmt -> bindParam(":idubicacion", $datos["idubicacion"],PDO::PARAM_STR);
            $stmt -> bindParam(":fechaemision", $datos["fechaemision"],PDO::PARAM_STR);
            $stmt -> bindParam(":fechavencimiento", $datos["fechavencimiento"],PDO::PARAM_STR);
            $stmt -> bindParam(":estado",$datos['estado'],PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion",$datos['descripcion'],PDO::PARAM_STR);
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        } 

        static public function mdlActualizarCobranza($tabla,$item1,$valor1,$item2,$valor2){
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

		static public function mdlConsultarCobranza($idcobranza){ 
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cobranza WHERE idcobranza = \"$idcobranza\"");
            $stmt -> execute();
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        }
	}