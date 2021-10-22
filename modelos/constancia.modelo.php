<?php
require_once "conexion.php";
class ModeloConstancia
{
    static public function mdlMostrarConstancia($valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT CO.idconstancia as idconstancia, CO.idcobranza as idcobranza, CO.iddetallecobranza as iddetallecobranza, CO.fechapago as fecha_pago, CO.tipopago as tipo_pago, CO.monto as monto_const, CO.nota as nota_const
                FROM constancia CO
                WHERE CO.idcobranza = $valor");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlMostrarHistorialPago($valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT CO.idconstancia as idconstancia, CO.idcobranza as idcobranza, CO.iddetallecobranza as iddetallecobranza, CO.fechapago as fecha_pago, CO.tipopago as tipo_pago, CO.monto as monto_const, CO.nota as nota_const
                FROM constancia CO
                WHERE CO.idconstancia = $valor");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlMostrarIngresoMes($valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT SUM(C.monto) as monto, ELT(MONTH(Co.fechavencimiento), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') as mes FROM constancia C JOIN detallecobranza DC ON C.iddetallecobranza = DC.iddetallecobranza JOIN cobranza Co ON C.idcobranza = Co.idcobranza WHERE (DC.estado = 1 OR DC.estado = 2) AND YEAR(Co.fechavencimiento) = $valor GROUP BY mes ORDER BY Co.fechavencimiento");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlMostrarIngresoAnualCliente($anho, $idcliente)
    {
        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT SUM(C.monto) AS monto, ELT( MONTH(C.fechapago), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') AS mes FROM constancia C JOIN detallecobranza DC ON C.iddetallecobranza = DC.iddetallecobranza JOIN cobranza Co ON C.idcobranza = Co.idcobranza JOIN cliente Cli ON Cli.idcliente = Co.idcliente WHERE (DC.estado = 1 OR DC.estado = 2) AND YEAR(fechapago) = $anho AND Cli.idcliente = $idcliente GROUP BY mes ORDER BY fechapago");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlMostrarIngresoCliente($anho)
    {
        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT SUM(C.monto) AS monto, Cli.razonsocial as razonsocial, Cli.estado as estado FROM constancia C JOIN detallecobranza DC ON C.iddetallecobranza = DC.iddetallecobranza JOIN cobranza Co ON C.idcobranza = Co.idcobranza JOIN cliente Cli ON Cli.idcliente = Co.idcliente WHERE (DC.estado = 1 OR DC.estado = 2) AND YEAR(fechapago) = $anho GROUP BY razonsocial ORDER BY estado asc, monto desc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlIngresarConstancia($valor1, $valor2, $valor3, $valor4, $valor5, $valor6)
    {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO constancia(idcobranza, iddetallecobranza, fechapago, tipopago, monto, nota) VALUES ( :idcobranza, :iddetallecobranza, :fechapago, :tipopago, :monto, :nota)");
        $stmt->bindParam(":idcobranza", $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":iddetallecobranza", $valor2, PDO::PARAM_STR);
        $stmt->bindParam(":fechapago", $valor3, PDO::PARAM_STR);
        $stmt->bindParam(":tipopago", $valor4, PDO::PARAM_STR);
        $stmt->bindParam(":monto", $valor5, PDO::PARAM_STR);
        $stmt->bindParam(":nota", $valor6, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlDataConstancia($valor)
    {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT co.idcobranza, detco.iddetallecobranza, cli.razonsocial, cli.ruc, DATE(co.fechaemision) AS fechaEmision, IFNULL(DATE(const.fechapago),DATE(co.fechaemision)) AS fechaPago, IFNULL(SUM(const.monto),0) totalRecibido, detco.precio AS montoTotal FROM cobranza AS co INNER JOIN cliente AS cli ON cli.idcliente = co.idcliente INNER JOIN detallecobranza AS detco ON detco.idcobranza = co.idcobranza LEFT JOIN constancia AS const ON const.idcobranza = co.idcobranza AND const.iddetallecobranza = detco.iddetallecobranza WHERE co.idcobranza = $valor LIMIT 1");
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    static public function mdlDataPreConstancia($valor)
    {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT const.idconstancia, const.idcobranza, const.iddetallecobranza, cli.razonsocial, cli.ruc, DATE(co.fechaemision) AS fechaEmision, DATE(const.fechapago) AS fechaPago, const.monto AS totalRecibido, detco.precio AS montoTotal FROM constancia AS const INNER JOIN cobranza AS co ON const.idcobranza = co.idcobranza INNER JOIN detallecobranza AS detco ON const.iddetallecobranza = detco.iddetallecobranza INNER JOIN cliente AS cli ON co.idcliente = cli.idcliente WHERE idconstancia = $valor LIMIT 1");
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}
