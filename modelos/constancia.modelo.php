<?php 
	require_once "conexion.php";
	class ModeloConstancia{
		static public function mdlMostrarConstancia($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre ASC");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT CS.idconstancia as idconstancia, C.idcobranza as idcobranza, DC.iddetallecobranza as iddetallecobranza, CS.fechapago as fechapago, CS.tipopago as tipopago, CS.monto as monto, CS.nota as nota
                    FROM $tabla CS
                    JOIN cobranza C ON CS.idcobranza = C.idcobranza
                    JOIN detalleconstancia DC ON CS.iddetallecobranza = DC.iddetallecobranza WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT CS.idconstancia as idconstancia, C.idcobranza as idcobranza, DC.iddetallecobranza as iddetallecobranza, CS.fechapago as fechapago, CS.tipopago as tipopago, CS.monto as monto, CS.nota as nota
                    FROM $tabla CS
                    JOIN cobranza C ON CS.idcobranza = C.idcobranza
                    JOIN detalleconstancia DC ON CS.iddetallecobranza = DC.iddetallecobranza");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
		}
         static public function mdlIngresarConstancia($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idcobranza, iddetallecobranza, fechapago, tipopago, monto, nota) VALUES ( :idcobranza, :iddetallecobranza, :fechapago, :tipopago, :monto, :nota)");
            $stmt -> bindParam(":idcobranza", $datos["idcobranza"],PDO::PARAM_STR);
            $stmt -> bindParam(":iddetallecobranza", $datos["iddetallecobranza"],PDO::PARAM_STR);
            $stmt -> bindParam(":fechapago", $datos["fechapago"],PDO::PARAM_STR);
            $stmt -> bindParam(":tipopago",$datos['tipopago'],PDO::PARAM_STR);
            $stmt -> bindParam(":monto", $datos["monto"],PDO::PARAM_STR);
            $stmt -> bindParam(":nota",$datos['nota'],PDO::PARAM_STR);
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        } 

        static public function mdlActualizarConstancia($tabla,$item1,$valor1,$item2,$valor2){
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

		static public function mdlConsultarConstancia($idconstacia){ 
            $stmt = Conexion::conectar()->prepare("SELECT * FROM constancia WHERE idconstacia = \"$idconstacia\"");
            $stmt -> execute();
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        }
	}