<?php 
	require_once "conexion.php";
	class ModeloDetalleCobranza{
		static public function mdlMostrarDetalleCobranza(int $valor){
            $stmt = Conexion::conectar()->prepare("SELECT DC.iddetallecobranza, DC.estado, DC.precio AS monto, DC.nota AS observacion, P.idplan,P.nombre AS plan FROM detallecobranza AS DC INNER JOIN plan AS P ON P.idplan = DC.idplan WHERE DC.idcobranza = $valor");
            $stmt -> execute();
            return $stmt -> fetchAll(); 
        }

        static public function mdlAgregarDetCobranza($valor1,$valor2,$valor3,$valor4){
            $estado = "0";
            $servicio = "1";
            $nombre = "";
            $stmt = Conexion::conectar()->prepare("INSERT INTO detallecobranza(idcobranza, idplan, idservicio, estado, nombre, precio, nota) VALUES (:idcobranza, :idplan, :idservicio, :estado, :nombre, :precio, :nota)");
            $stmt -> bindParam(":idcobranza", $valor1,PDO::PARAM_STR);
            $stmt -> bindParam(":idplan", $valor2,PDO::PARAM_STR);  
            $stmt -> bindParam(":idservicio", $servicio,PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $nombre,PDO::PARAM_STR);
            $stmt -> bindParam(":estado", $estado,PDO::PARAM_STR);
            $stmt -> bindParam(":precio",$valor3,PDO::PARAM_STR);
            $stmt -> bindParam(":nota",$valor4,PDO::PARAM_STR);
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

        static public function mdlMostrarServicio($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idservicio != 1");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE $item = :$item");
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

        static public function mdlMostrarPlanes($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idplan != 1");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE $item = :$item");
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


        /*static public function mdlMostrarPlan(){
            
        }*/
	}