<?php
require_once "../google-api-php-client-2.9.1/vendor/autoload.php";
require_once "../modelos/constancia.modelo.php";

use Dompdf\Dompdf;
use Luecano\NumeroALetras\NumeroALetras;

session_start();
if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {

  $dataConstancia = null;
  if (isset($_GET["idcobranza"])) {
    $dataConstancia = ModeloConstancia::mdlDataConstancia($_GET["idcobranza"]);
  } else if (isset($_GET["idconstancia"])) {
    $dataConstancia = ModeloConstancia::mdlDataPreConstancia($_GET["idconstancia"]);
  }

  if ($dataConstancia && isset($dataConstancia['iddetallecobranza'])) {
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    $firmaSVG = file_get_contents('../vistas/img/sello/sello.svg');

    $info = [
      "fechaEmision" => date_parse_from_format("Y-m-d", $dataConstancia['fechaEmision']),
      "fechaPago" => date_parse_from_format("Y-m-d", $dataConstancia['fechaPago']),
      "cliente" => ["razonsocial" => $dataConstancia['razonsocial'], "ruc" => $dataConstancia['ruc']],
      "totalRecibido" => $dataConstancia['totalRecibido'], "montoTotal" => $dataConstancia['montoTotal'], "concepto" => "POR EL SERVICIO CONTABLE",
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
                      <span>RUC: 20600626397</span> <br />
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
                        <u> ' . $info["fechaPago"]["day"] . ' </u>
                      </span>
                      de
                      <span style="margin-left: 25px; margin-right: 25px">
                        <u> ' . $meses[$info["fechaPago"]["month"] - 1] . ' </u>
                      </span>
                      del
                      <span style="margin-left: 25px; margin-right: 25px">
                        <u> ' . $info["fechaPago"]["year"] . ' </u>
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
                      <span><u> ' . $info["concepto"] . ' - ' . strtoupper($meses[$info["fechaEmision"]["month"] - 1]) . ' ' . $info["fechaEmision"]["year"] . ' </u></span>
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
                      <p style="margin-top: 0px">Pagado</p>
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
                        Monto Total A Pagar: <u> S/. ' . $info["montoTotal"] . ' </u>
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
    $nombreArchivo = 'CONSTANCIA ' . $info["cliente"]["razonsocial"] . ' - ' . $info["fechaPago"]["month"] . ' ' . $info["fechaPago"]["year"] . '.pdf';
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream($nombreArchivo,array('Attachment'=>0));
  } else {
    http_response_code(400);
  }
} else {
  http_response_code(401);
}