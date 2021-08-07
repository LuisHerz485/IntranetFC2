<?php

require_once "../google-api-php-client-2.9.1/vendor/autoload.php";

use Dompdf\Dompdf;
use Luecano\NumeroALetras\NumeroALetras;

/*
SELECT co.idcobranza, cli.idcliente, detco.iddetallecobranza, cli.razonsocial, cli.ruc, date_format(co.fechaemision, '%e') AS dia,date_format(co.fechaemision, '%c') AS mes, date_format(co.fechaemision, '%Y') AS anho, detco.precio FROM cobranza AS co INNER JOIN cliente AS cli ON cli.idcliente = co.idcliente INNER JOIN detallecobranza AS detco ON detco.idcobranza = co.idcobranza WHERE co.idcobranza = 8;
*/

$mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

$firmaSVG = file_get_contents('../../img/sello/sello.svg');

$info = [
  "fechaHoy" => [
    "dia" => date('d'), "mes" => $mes[date('n') - 1],
    "anho" => date('Y')
  ],
  "fechaPago" => [
    "dia" => date('d'), "mes" => $mes[date('n') - 1],
    "anho" => date('Y')
  ],
  "cliente" => ["razonsocial" => "PRESTIGE PERU GROUP S.A.C.", "ruc" => "20606368411"],
  "totalRecibido" => 1020, "aCuenta" => 0,
  "montoTotal" => 0, "concepto" => "POR EL SERVICIO CONTABLE",

];

$dompdf = new Dompdf();
$formatter = new NumeroALetras();

$dompdf->loadHtml('
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Constancia de Pago</title>
    <style>
      td {
        padding-bottom: 5px;
        padding-top: 7px;
      }
    </style>
  </head>
  <body style="font-family: Arial, Helvetica, sans-serif">
    <div>
      <table style="border: 2px solid; text-align: center; margin: 0 auto">
        <tbody>
          <tr>
            <td>
              <div style="margin-left: 50px">
                <p style="margin-bottom: 5px">
                  <b>FREDY JUNIOR SOLANO FERNANDEZ</b>
                </p>
                <p style="margin-top: 5px"><small>Contador & Auditor</small></p>
              </div>
            </td>
            <td>
              <div
                style="
                  border: 5px solid;
                  border-color: #0063d9;
                  color: black;
                  margin-right: 50px;
                  margin-left: 50px;
                  width: 180px;
                "
              >
                <span>RUC: 10441367878</span> <br />
                <span>RECIBO</span> <br />
                <span>001 - 000411</span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div style="text-align: left; margin-left: 50px">
                Lima,
                <span style="margin-left: 25px; margin-right: 25px">
                  <u> ' . $info["fechaHoy"]["dia"] . ' </u>
                </span>
                de
                <span style="margin-left: 25px; margin-right: 25px">
                  <u> ' . $info["fechaHoy"]["mes"] . ' </u>
                </span>
                del
                <span style="margin-left: 25px; margin-right: 25px">
                  <u> ' . $info["fechaHoy"]["anho"] . ' </u>
                </span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div style="text-align: left; margin-left: 50px">
                <span style="margin-right: 48px">Recibi de: </span>
                <span><u> ' . $info["cliente"]["razonsocial"]  . ' </u></span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div style="text-align: left; margin-left: 50px">
                <span style="margin-right: 53px">con RUC </span>
                <span><u> ' . $info["cliente"]["ruc"] . ' </u></span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div style="text-align: left; margin-left: 50px">
                <span style="margin-right: 30px">La suma de: </span>
                <span><u> ' .  $formatter->toMoney($info["totalRecibido"], 2, 'SOLES', 'CENTIMOS') . ' </u></span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div style="text-align: left; margin-left: 50px">
                <span style="margin-right: 50px">Por concepto de:</span>
                <span><u> ' . $info["concepto"] . ' - ' . strtoupper($info["fechaPago"]["mes"]) . ' ' . $info["fechaPago"]["anho"] . ' </u></span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div
                style="text-align: left; margin-left: 50px; margin-right: 50px"
              >
                <span
                  >________________________________________________________________</span
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div>
                <p style="margin-bottom: 0px; margin-top: 10px">
                  __
                  <span style="margin-left: 15px; margin-right: 15px">
                    <img
                      style="width: 200px; height: auto"
                      src="data:image/svg+xml;base64,' . base64_encode($firmaSVG) . '"
                      alt="firma"
                    />
                  </span>
                  __
                </p>
                <p style="margin-top: 0px">Cancelado</p>
              </div>
            </td>
            <td>
              <div
                style="
                  text-align: right;
                  margin-right: 50px;
                  margin-bottom: 10px;
                "
              >
                <p style="margin-top: 0px; margin-bottom: 0px">
                  Total Recibo: <u> S/. ' . $info["totalRecibido"] . ' </u>
                </p>
                <p style="margin-top: 10px; margin-bottom: 0px">
                  A cuenta: <u> S/. ' . $info["aCuenta"] . ' </u>
                </p>
                <p style="margin-top: 10px; margin-bottom: 0px">
                  Monto Total: <u> S/. ' . $info["montoTotal"] . ' </u>
                </p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html> 
');
$nombreArchivo = 'CONSTANCIA ' . $info["cliente"]["razonsocial"] . ' - ' . $info["fechaPago"]["mes"] . ' ' . $info["fechaPago"]["anho"] . '.pdf';
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($nombreArchivo);