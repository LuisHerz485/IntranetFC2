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
                    $stmt = Conexion::conectar()->prepare("SELECT LC.idcliente as idcliente, DC.estado as estado,LC.idubicacion as idubicacion, DS.iddetalleservicio as iddetalleservicio, C.idcobranza as idcobranza, DS.idservicio as idservicio, DC.fechaemision AS fechaemision, DC.fechavencimiento AS fechavencimiento
                    FROM $tabla DC
                    JOIN localcliente LC ON DC.idcliente = LC.idcliente
                    JOIN localcliente LC ON DC.idubicacion = LC.idubicacion
                    JOIN detalleservicio DS ON DC.iddetalleservicio = DS.iddetalleservicio
                    JOIN detalleservicio DS ON DC.idservicio = DS.idservicio
                    JOIN cobranza C ON DC.idcobranza = C.idcobranza WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT LC.idcliente as idcliente, DC.estado as estado,LC.idubicacion as idubicacion, DS.iddetalleservicio as iddetalleservicio, C.idcobranza as idcobranza, DS.idservicio as idservicio, DC.fechaemision AS fechaemision, DC.fechavencimiento AS fechavencimiento
                    FROM $tabla DC
                    JOIN localcliente LC ON DC.idcliente = LC.idcliente
                    JOIN localcliente LC ON DC.idubicacion = LC.idubicacion
                    JOIN detalleservicio DS ON DC.iddetalleservicio = DS.iddetalleservicio
                    JOIN detalleservicio DS ON DC.idservicio = DS.idservicio
                    JOIN cobranza C ON DC.idcobranza = C.idcobranza");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
		}
         static public function mdlIngresarCobranza($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idcliente,idubicacion,idcobranza,iddetalleservicio,idservicio,fechaemision,fechavencimiento,estado) VALUES (:idcliente,:idubicacion,:idcobranza,:iddetalleservicio,:idservicio,:fechaemision,:fechavencimiento,:estado)");
            $stmt -> bindParam(":idcliente", $datos["idcliente"],PDO::PARAM_STR);
            $stmt -> bindParam(":idubicacion", $datos["idubicacion"],PDO::PARAM_STR);
            $stmt -> bindParam(":idcobranza", $datos["idcobranza"],PDO::PARAM_STR);
            $stmt -> bindParam(":iddetalleservicio", $datos["iddetalleservicio"],PDO::PARAM_STR);
            $stmt -> bindParam(":idservicio",$datos['idservicio'],PDO::PARAM_STR);
            $stmt -> bindParam(":fechaemision", $datos["fechaemision"],PDO::PARAM_STR);
            $stmt -> bindParam(":fechavencimiento", $datos["fechavencimiento"],PDO::PARAM_STR);
            $stmt -> bindParam(":estado",$datos['estado'],PDO::PARAM_STR);
            
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
            $stmt = Conexion::conectar()->prepare("SELECT * FROM detallecobranza WHERE idcobranza = \"$idcobranza\"");
            $stmt -> execute();
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        }
	}