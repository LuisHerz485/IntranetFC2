<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../google-api-php-client-2.9.1/vendor/autoload.php";
require_once "../modelos/constancia.modelo.php";

use Luecano\NumeroALetras\NumeroALetras;

function getCodigoRecibo(string $id = "")
{
  $formato = "001-0000000000";
  $longitud = strlen($id);
  return substr_replace($formato, $id, -$longitud);
}

$dataConstancia = null;
if (isset($_POST["idcobranza"])) {
  $dataConstancia = ModeloConstancia::mdlDataConstancia(intval($_POST["idcobranza"]));
} else if (isset($_POST["idconstancia"])) {
  $dataConstancia = ModeloConstancia::mdlDataPreConstancia(intval($_POST["idconstancia"]));
}

if ($dataConstancia && isset($dataConstancia['iddetallecobranza'])) {
  $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

  $info = [
    "fechaEmision" => date_parse_from_format("Y-m-d", $dataConstancia['fechaEmision']),
    "fechaPago" => date_parse_from_format("Y-m-d", $dataConstancia['fechaPago']),
    "cliente" => ["razonsocial" => $dataConstancia['razonsocial'], "ruc" => $dataConstancia['ruc']],
    "totalRecibido" => floatval($dataConstancia['totalRecibido']), "montoTotal" => floatval($dataConstancia['montoTotal']), "concepto" => $dataConstancia['concepto'],
  ];

  $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
  $formatter = new NumeroALetras();

  $css = '
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        #tablaEncabezado{
            text-align: center; 
            margin: 0 auto;
            border-spacing: 20px;
        }
        #ruc{
            border: 2px solid black;
            padding: 10px;
            border-radius: 3mm/3mm;
        
        }
        .td-background{
            background-color: #EBEBEB;
        }';

  $plantilla = '
    <body>
        <div style="padding: 0px 0px 0px 0px; padding-top: 100px">
          <table id="tablaEncabezado">
            <tr>
              <td colspan="3">
                <div>
                  <img
                    style="width: 120px; height: auto"
                    src="../vistas/img/sello/logo.png"
                    alt="firma"
                  /> 
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <p>
                    <b>FREDY JUNIOR SOLANO FERNANDEZ</b>
                  </p>
                  <p><b>Contador & Auditor</b></p>
                  <p>
                    <small>
                      Urb. Brisas de Sta. Rosa Mz J Lt. 2 - SMP - LIMA
                    </small>
                  </p>
                  <p><small>Telefono 933 159 089/ 942 601 274</small></p>
                </div>
              </td>
              <td></td>
              <td>
                <div>
                  <table id="ruc">
                    <tr>
                      <td>
                        <p>RUC: 20600626397</p>
                        <p>RECIBO</p>
                        <p>' . ((isset($_POST["idcobranza"])) ? getCodigoRecibo($_POST["idcobranza"]) : getCodigoRecibo($_POST["idconstancia"])) . '</p>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>
    
          <table style="margin: 0 auto">
            <tr>
              <td width="150" class="td-background">
                <span><b>Recibí de: </b></span>
              </td>
              <td width="300" class="td-background">' . $info["cliente"]["razonsocial"]  . '</td>
            </tr>
            <tr>
              <td class="td-background">
                <span><b>Identificado con: </b></span>
              </td>
              <td class="td-background"> RUC </td>
            </tr>
            <tr>
              <td class="td-background">
                <span><b>Número: </b></span>
              </td>
              <td class="td-background">' . $info["cliente"]["ruc"] . '</td>
            </tr>
            <tr>
              <td class="td-background">
                <span><b>La suma neta de: </b></span>
              </td>
              <td class="td-background">' .  $formatter->toMoney($info["totalRecibido"], 2, 'SOLES', 'CENTIMOS') . '</td>
            </tr>
            <tr>
              <td class="td-background">
                <span> <b>Por concepto de: </b> </span>
              </td>
              <td class="td-background">' . $info["concepto"] . ' - ' . strtoupper($meses[$info["fechaEmision"]["month"] - 1]) . ' ' . $info["fechaEmision"]["year"] . '</td>
            </tr>
          </table>
          <br />
          <table style="margin: 0 auto">
            <tr>
              <td colspan="2" align="center">
                <b>Lima, ' . $info["fechaPago"]["day"] . ' de ' . $meses[$info["fechaPago"]["month"] - 1] . ' ' . $info["fechaPago"]["year"] . '</b>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <table>
                    <tr>
                      <td
                        class="td-background"
                        style="text-align: right"
                        width="200"
                      >
                        <b>Total Recibo:</b>
                      </td>
                      <td class="td-background" style="text-align: left" width="90">
                        <b>S/.' . $info["totalRecibido"] . '</b>
                      </td>
                    </tr>
                    <tr>
                      <td class="td-background" style="text-align: right">
                        <b>Monto Total A Pagar:</b>
                      </td>
                      <td class="td-background" style="text-align: left">
                        <b>S/.' . $info["montoTotal"] . '</b>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </body>';
  if (($info["montoTotal"] - $info["totalRecibido"]) == 0) {
    $mpdf->SetWatermarkImage('../vistas/img/sello/watermark_cancelado.png', 1, "P");
  } else {
    $mpdf->SetWatermarkImage('../vistas/img/sello/watermark.png', 1, "P");
  }
  $mpdf->showWatermarkImage = true;
  $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
  $mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
  $mpdf->Output();
} else {
  http_response_code(400);
}
