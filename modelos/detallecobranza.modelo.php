<?php 
	require_once "conexion.php";
	class ModeloDetalleCobranza{
		static public function mdlMostrarDetalleCobranza($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre ASC");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT DC.iddetallecobranza as iddetallecobranza, C.idcobranza as idcobranza, P.idplan as idplan, S.idservicio as idservicio, DC.estado as estado, DC.precio as precio, DC.nota as nota
                    FROM $tabla DC
                    JOIN cobranza C ON DC.idcobranza = C.idcobranza
                    JOIN plan P ON DC.idplan = P.idplan
                    JOIN servicio S ON DC.idservicio = S.idservicio WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT DC.iddetallecobranza as iddetallecobranza, C.idcobranza as idcobranza, P.idplan as idplan, S.idservicio as idservicio, DC.estado as estado, DC.precio as precio, DC.nota as nota
                    FROM $tabla DC
                    JOIN cobranza C ON DC.idcobranza = C.idcobranza
                    JOIN plan P ON DC.idplan = P.idplan
                    JOIN servicio S ON DC.idservicio = S.idservicio");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
		}
         static public function mdlIngresarDetalleCobranza($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idcobranza, idplan, idservicio, estado, precio, nota) VALUES ( :idcobranza, :idplan, :idservicio, :estado, :precio, :nota)");
            $stmt -> bindParam(":idcobranza", $datos["idcobranza"],PDO::PARAM_STR);
            $stmt -> bindParam(":idplan", $datos["idplan"],PDO::PARAM_STR);
            $stmt -> bindParam(":idservicio", $datos["idservicio"],PDO::PARAM_STR);
            $stmt -> bindParam(":estado",$datos['estado'],PDO::PARAM_STR);
            $stmt -> bindParam(":precio", $datos["precio"],PDO::PARAM_STR);
            $stmt -> bindParam(":nota",$datos['nota'],PDO::PARAM_STR);
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        } 

        static public function mdlActualizarDetalleCobranza($tabla,$item1,$valor1,$item2,$valor2){
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

		static public function mdlConsultarDetalleCobranza($iddetallecobranza){ 
            $stmt = Conexion::conectar()->prepare("SELECT * FROM detallecobranza WHERE iddetallecobranza = \"$iddetallecobranza\"");
            $stmt -> execute();
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        }
	}