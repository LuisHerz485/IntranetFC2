<?php

require_once "../google-api-php-client-2.9.1/vendor/autoload.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/liquidaciones.controlador.php";
require_once "../modelos/liquidaciones.modelo.php";

function redondear($val)
{
  return ("S/. " . number_format(floatval($val)));
}
function igv($val)
{
  return $val * 0.18;
}

$dataLiquidacion = null;
if (isset($_POST["id_liquidacion"])) {
  $dataLiquidacion = ModeloLiquidaciones::mdlBuscarLiquidaciones(intval($_POST["id_liquidacion"]));
}

if (isset($dataLiquidacion)) {
  $_POST["periodo"] = substr($dataLiquidacion[0]["periodo"], 0, -3);
  $_POST["idcliente"] = $dataLiquidacion[0]["idcliente"];
  $datameses = ControladorLiquidaciones::ctrListarResumen();

  $meses = ["", "ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];

  $mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',  'format' => [380, 210], 'margin_top' => 5
  ]);
  $info = [
    "liquidacion" => [
      "ventas_netas" => redondear($dataLiquidacion[0]["ventas_netas"]),
      "ventas_netas_igv" => redondear(igv($dataLiquidacion[0]["ventas_netas"])),
      "ventas_netas_total" => redondear($dataLiquidacion[0]["ventas_netas"] + igv($dataLiquidacion[0]["ventas_netas"])),
      "ventas_no_gravadas" => redondear($dataLiquidacion[0]["ventas_no_gravadas"]),
      "exportaciones_facturada" => redondear($dataLiquidacion[0]["exportaciones_facturada"]),
      "exportaciones_embarcadas" => redondear($dataLiquidacion[0]["exportaciones_embarcadas"]),
      "ingreso_bruto" => redondear($dataLiquidacion[0]["ingreso_bruto"]),
      "ingreso_bruto_igv" => redondear(igv($dataLiquidacion[0]["ingreso_bruto"])),
      "ingreso_bruto_total" => redondear($dataLiquidacion[0]["ingreso_bruto"] + igv($dataLiquidacion[0]["ingreso_bruto"])),
      "nota_credito" => redondear($dataLiquidacion[0]["nota_credito"]),
      "nota_credito_igv" => redondear(igv($dataLiquidacion[0]["nota_credito_igv"])),
      "nota_credito_total" => redondear($dataLiquidacion[0]["nota_credito_igv"] + igv($dataLiquidacion[0]["nota_credito_igv"])),
      "nota_debito" => redondear($dataLiquidacion[0]["nota_debito"]),
      "nota_debito_igv" => redondear(igv($dataLiquidacion[0]["nota_debito"])),
      "nota_debito_total" => redondear($dataLiquidacion[0]["nota_debito"] + igv($dataLiquidacion[0]["nota_debito"])),
      "ingreso_neto" => redondear($dataLiquidacion[0]["ingreso_neto"]),
      "ingreso_neto_igv" => redondear(igv($dataLiquidacion[0]["ingreso_neto"])),
      "ingreso_neto_total" => redondear($dataLiquidacion[0]["ingreso_neto"] + igv($dataLiquidacion[0]["ingreso_neto"])),
      "comp_nacion_grava" => redondear($dataLiquidacion[0]["comp_nacion_grava"]),
      "comp_nacion_grava_igv" => redondear(igv($dataLiquidacion[0]["comp_nacion_grava"])),
      "comp_nacion_grava_total" => redondear($dataLiquidacion[0]["comp_nacion_grava"] + igv($dataLiquidacion[0]["comp_nacion_grava"])),
      "comp_importa_grava" => redondear($dataLiquidacion[0]["comp_importa_grava"]),
      "comp_importa_grava_igv" => redondear(igv($dataLiquidacion[0]["comp_importa_grava"])),
      "comp_importa_grava_total" => redondear($dataLiquidacion[0]["comp_importa_grava"] + igv($dataLiquidacion[0]["comp_importa_grava"])),
      "comp_nacion_no_grava" => redondear($dataLiquidacion[0]["comp_nacion_no_grava"]),
      "comp_importa_no_grava" => redondear($dataLiquidacion[0]["comp_importa_no_grava"]),
      "total_compras" => redondear($dataLiquidacion[0]["total_compras"]),
      "total_compras_igv" => redondear(igv($dataLiquidacion[0]["total_compras"])),
      "total_compras_total" => redondear($dataLiquidacion[0]["total_compras"] + igv($dataLiquidacion[0]["total_compras"])),
      "total_impuesto" => redondear($dataLiquidacion[0]["total_impuesto"]),
      "saldo_afavor" => redondear($dataLiquidacion[0]["saldo_afavor"]),
      "importe_apagar" => redondear($dataLiquidacion[0]["saldo_afavor"] < 0 ? 0 : $dataLiquidacion[0]["saldo_afavor"]),
      "impuesto_resultante" => redondear($dataLiquidacion[0]["impuesto_resultante"]),
      "coeficiente" => $dataLiquidacion[0]["coeficiente"],
      "pagos_previos" => redondear($dataLiquidacion[0]["pagos_previos"]),
      "impuesto_renta" => redondear($dataLiquidacion[0]["impuesto_renta"]),
      "fechavencimiento" => $dataLiquidacion[0]["fechavencimiento"],
      "periodo" => $dataLiquidacion[0]["periodo"],
      "saldo_afavor_renta" => redondear($dataLiquidacion[0]["saldo_afavor_renta"]),
      "tributo_apagar_renta" => redondear($dataLiquidacion[0]["tributo_apagar_renta"]),
    ],
    "cliente" => ["nombreCliente" => $dataLiquidacion[0]["razonsocial"], "ruc" => $dataLiquidacion[0]["ruc"]],
    "fecha" => ["fechavencimiento" => $dataLiquidacion[0]["fechavencimiento"], "periodo" => $meses[intval(explode("-", $dataLiquidacion[0]["periodo"])[1])], "anyo" => explode("-", $dataLiquidacion[0]["periodo"])[0]],
    "regimen" => ["nombreregimen" => $dataLiquidacion[0]["nombreregimen"]],
    "meses" => ["nom_mesactual" => $datameses[0]["mes"], "nom_mesanterior" => $datameses[1]["mes"], "nom_anterior2" => $datameses[2]["mes"], "mesactual_impuesto_renta" => redondear($datameses[0]["impuesto_renta"]), "mesanterior_impuesto_renta" => redondear($datameses[1]["impuesto_renta"]), "mesanterior2_impuesto_renta" => redondear($datameses[2]["impuesto_renta"]), "mesactual_impuesto_igv" => redondear($datameses[0]["impuesto_igv"] < 0 ? 0 : $datameses[0]["impuesto_igv"]), "mesanterior_impuesto_igv" => redondear($datameses[1]["impuesto_igv"]), "mesanterior2_impuesto_igv" => redondear($datameses[2]["impuesto_igv"])],
    "elaborador" => ["nom_elaborador" => $dataLiquidacion[0]["elaborador"]],
    "revisor" => ["nom_revisor" => $dataLiquidacion[0]["revisor"]],
  ];
  $css = '
  body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px
  }
  #tabla-principal{
      width: 143%;
      margin: 9px 9px;
      padding: 0px;
      border: 1px solid black;
      border-radius: 3px;
  }
  #tabla-general{
      width: 100%;
  }
  #tabla-general12{
    width: 100%;
     text-align: center;
}
  #tabla-secundaria{
      width: 100%;
      margin: 0px;
      padding: 0px;
      border: 1px solid black;
      border-radius: 3px;
  }
  h5{
      margin: 0px auto;
      padding: 0px;
  } 
  h3{
      margin: 0px auto;
      padding: 0px;
  }
  #tg-col1{
      width:1000px;
      height:3px;
      margin: 0px;
      padding:0px;
  }
  #tg-col2{
      width:500px;
      height:3px;
      margin: 0px;
      padding:0px;
  }
  #izquierda{
      text-align: left;  
      padding-left: 3px;
  } 
  #derecha{ 
      text-align: right;   
  } 
  #ruc{
      border: 1px solid black;
  }
  .td-background{
      background-color: #EBEBEB;
  }
  #font{
      font-weight: 200;
  }
  #nospc{

  }
';

  $plantilla = '
  <body>
    <table id="tabla-principal">
      <tbody>
        <tr>
          <td>
            <h5><b> ' . $info["cliente"]["nombreCliente"] . '</b></h5>
          </td>
          <td align="right">
            <h5><b> PERIODO: ' . $info["fecha"]["periodo"] . '</b></h5>
          </td>
        </tr>
        <tr>
          <td>
            <h5>RUC: ' . $info["cliente"]["ruc"] . '</h5>
          </td>
          <td align="right">
            <h5>VENCIMIENTO: ' . $info["fecha"]["fechavencimiento"] . '</h5>
          </td>
        </tr>
        <tr style="background-color: rgb(253, 233, 217)">
          <td
            width="100%"
            height="5px"
            align="center"
            style="background-color: rgb(253, 233, 217)"
            colspan="2"
          >
            <h5>PDT 621 IGV - RENTA</h5>
          </td>
        </tr>
        <tr style="background-color: rgb(216, 216, 216); height: 5px">
          <td
            width="100%"
            align="center"
            style="background-color: rgb(216, 216, 216)"
            colspan="2"
          >
            <b
              ><h5><u>HOJA DE TRABAJO - IMPUESTOS ' . $info["fecha"]["periodo"] . ' ' . $info["fecha"]["anyo"] . '</u></h5></b
            >
          </td>
        </tr>
        <tr>
          <td>
            <table id="tabla-general">
              <tbody>
                <tr>
                  <td>
                    <table align="left">
                      <tbody>
                      <tr align="left">
                        <td>
                          <h3 style="margin: 0px auto;"><u>DETERMINACION DEL IGV</u></h3>
                          <h3 style="color: rgb(1,114,196);"><u>INGRESOS</u></h3>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(216,216,216);">BASE</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(216,216,216);">IGV</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(216,216,216);">TOTAL</h5>
                        </td>
                      </tr>
                      
                      <tr align="left">
                        <td>
                          <h5>VENTAS NETAS</h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["ventas_netas"] . '</h5>
                        </td>
                        <td>
                          <h5> ' . $info["liquidacion"]["ventas_netas_igv"] . '</h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["ventas_netas_total"] . '</h5>
                        </td>
                      </tr>

                      <tr align="left">
                        <td>
                          <h5>VENTAS NO GRAVADAS</h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["ventas_no_gravadas"] . '</h5>
                        </td>
                        <td>
                          <h5> - </h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["ventas_no_gravadas"] . '</h5>
                        </td>
                      </tr>

                      <tr align="left">
                        <td>
                          <h5>EXPORTACIONES FACTURADAS EN EL PERIODO</h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["exportaciones_facturada"] . '</h5>
                        </td>
                        <td>
                          <h5> - </h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["exportaciones_facturada"] . '</h5>
                        </td>
                      </tr>
                      
                      <tr align="left">
                        <td>
                          <h5>EXPORTACIONES EMBARCADAS EN EL PERIODO</h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["exportaciones_embarcadas"] . '</h5>
                        </td>
                        <td>
                          <h5> - </h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["exportaciones_embarcadas"] . '</h5>
                        </td>
                      </tr>

                      <tr align="left">
                      <td>
                        <h5>NOTAS DE DEBITO</h5>
                      </td>
                      <td>
                        <h5>' . $info["liquidacion"]["nota_debito"] . '</h5>
                      </td>
                      <td>
                        <h5>' . $info["liquidacion"]["nota_debito_igv"] . '</h5>
                      </td>
                      <td>
                        <h5>' . $info["liquidacion"]["nota_debito_total"] . '</h5>
                      </td>
                    </tr>

                      <tr align="left">
                        <td>
                          <h5>TOTAL INGRESOS</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(255,255,204);">' . $info["liquidacion"]["ingreso_bruto"] . '</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(255,255,204);">' . $info["liquidacion"]["ingreso_bruto_igv"] . '</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(255,255,204);">' . $info["liquidacion"]["ingreso_bruto_total"] . '</h5>
                        </td>
                      </tr>

                      <tr align="left">
                        <td>
                          <h5>NOTAS DE CREDITO</h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["nota_credito"] . '</h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["nota_credito_igv"] . '</h5>
                        </td>
                        <td>
                          <h5>' . $info["liquidacion"]["nota_credito_total"] . '</h5>
                        </td>
                      </tr>
                      
                      <tr align="left">
                        <td>
                          <h5>INGRESO NETO</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(204,255,204);">' . $info["liquidacion"]["ingreso_neto"] . '</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(204,255,204);">' . $info["liquidacion"]["ingreso_neto_igv"] . '</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(204,255,204);">' . $info["liquidacion"]["ingreso_neto_total"] . '</h5>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
------------------
          <td>
            <table id="tabla-secundaria" colspan="2">
              <tbody>
                <tr>
                  <td>
                    <h3>IMPUESTO A LA RENTA</h3>
                  </td>
                  <tr align="left">
                      <td>
                        <h5>' . $info["regimen"]["nombreregimen"] . '</h5>
                      </td>
                      <td>
                        <h5>TOTAL</h5>
                      </td>
                      <td>
                        <h5>PORCENTAJE</h5>
                      </td>
                    </tr>
                    
                    <tr align="left">
                      <td>
                        <h5>INGRESOS NETOS</h5>
                      </td>
                      <td>
                        <h5 style="background-color: rgb(242,242,242);">' . $info["liquidacion"]["ingreso_neto"] . '</h5>
                      </td>
                      <td>
                        <h5>' . $info["liquidacion"]["coeficiente"] . '</h5>
                      </td>
                    </tr>

                    <tr align="left">
                      <td>
                        <h5>IMPUESTO RESULTANTE</h5>
                      </td>
                      <td>
                        <h5>' . $info["liquidacion"]["impuesto_resultante"] . '</h5>
                      </td>
                      <td>
                        <h5> -</h5>
                      </td>
                    </tr>

                    <tr align="left">
                      <td>
                        <h5>SALDO A FAVOR DEL PERIODO ANTERIOR</h5>
                      </td>
                      <td>
                        <h5>' . $info["liquidacion"]["saldo_afavor_renta"] . '</h5>
                      </td>
                      <td>
                        <h5></h5>
                      </td>
                    </tr>
                    
                    <tr align="left">
                      <td>
                        <h5>TRIBUTO A PAGAR O SALDO A FAVOR</h5>
                      </td>
                      <td>
                        <h5>' . $info["liquidacion"]["tributo_apagar_renta"] . '</h5>
                      </td>
                      <td>
                        <h5></h5>
                      </td>
                    </tr>

                    <tr align="left">
                      <td>
                        <h5>COMPENSACION SALDO A FAVOR DEL EXPORTADOR</h5>
                      </td>
                      <td>
                        <h5>-</h5>
                      </td>
                      <td>
                        <h5>-</h5>
                      </td>
                    </tr>

                    <tr align="left">
                      <td>
                        <h5>ITAN</h5>
                      </td>
                      <td>
                        <h5>-</h5>
                      </td>
                      <td>
                        <h5>-</h5>
                      </td>
                    </tr>
                    
                    <tr align="left">
                      <td>
                        <h5>PAGOS PREVIOS</h5>
                      </td>
                      <td>
                        <h5>' . $info["liquidacion"]["pagos_previos"] . '</h5>
                      </td>
                      <td>
                        <h5></h5>
                      </td>
                    </tr>
                </tr>
                <tr align="left">
                <td>
                  <h5 style="color: red;">RENTA A PAGAR</h5>
                </td>
                <td>
                  <h5 style="background-color: rgb(255,255,0);">' . $info["liquidacion"]["impuesto_renta"] . '</h5>
                </td>
              </tr>
              <tr>
              <td  align="left" id="ruc">
               <h5>RESUMEN IMPUESTO POR PAGAR</h5>
              </td>
              <td  align="left" id="ruc">
                 <h5>IMPORTE</h5>
              </td>
            </tr>
            <tr>
             <td  align="left" id="ruc">
              <h5>IMPUESTO GENERAL A LAS VENTAS - IGV</h5>
             </td>
             <td  align="left" id="ruc">
                <h5> ' . $info["liquidacion"]["importe_apagar"] . '</h5>
             </td>
           </tr>
           <tr>
            <td  align="left" id="ruc">
             <h5>IMPUESTO A LA RENTA MYPE TRIBUTARIO</h5>
            </td>
            <td  align="left" id="ruc">
               <h5>' . $info["liquidacion"]["impuesto_renta"] . '</h5>
            </td>
          </tr>
              </tbody>
            </table>
          </td>
----------------------         
      </tr>
        <tr>
          <td>
            <table id="tabla-general">
              <tbody>
                <tr>
                  <td>
                    <table align="left">
                      <tbody>
                        <tr>
                          <td>
                            <h3 style="color: rgb(1, 114, 196)">
                              <u>COMPRAS</u>
                            </h3>
                          </td>                     
                        <tr>
                          <td>
                            <h5>COMPRAS NACIONALES GRAVADAS</h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_nacion_grava"] . '</h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_nacion_grava_igv"] . '</h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_nacion_grava_total"] . '</h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>COMPRAS IMPORTADAS GRAVADAS</h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_importa_grava"] . '</h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_importa_grava_igv"] . '</h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_importa_grava_total"] . '</h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>COMPRAS NACIONALES NO GRAVADAS</h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_nacion_no_grava"] . '</h5>
                          </td>
                          <td>
                            <h5> - </h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_nacion_no_grava"] . '</h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>COMPRAS IMPORTADAS NO GRAVADAS</h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_importa_grava_total"] . '</h5>
                          </td>
                          <td>
                            <h5> - </h5>
                          </td>
                          <td>
                            <h5>' . $info["liquidacion"]["comp_importa_grava_total"] . '</h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5 id="ruc">TOTAL COMPRAS</h5>
                          </td>
                          <td>
                            <h5
                              id="ruc"
                              style="background-color: rgb(255, 255, 204)"
                            >
                            ' . $info["liquidacion"]["total_compras"] . '
                            </h5>
                          </td>
                          <td>
                            <h5
                              id="ruc"
                              style="background-color: rgb(255, 255, 204)"
                            >
                            ' . $info["liquidacion"]["total_compras_igv"] . '
                            </h5>
                          </td>
                          <td>
                            <h5
                              id="ruc"
                              style="background-color: rgb(255, 255, 204)"
                            >
                            ' . $info["liquidacion"]["total_compras_total"] . '
                            </h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>IMPUESTO RESULTANTE</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5 id="ruc"> ' . $info["liquidacion"]["total_impuesto"] . '</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>SALDO FAVOR-PERIODO ANTERIOR</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5>' . $info["meses"]["mesanterior_impuesto_igv"] . '</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>TRIBUTO A PAGAR O SALDO A FAVOR</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5 id="ruc">' . $info["liquidacion"]["saldo_afavor"] . '</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>PERCEPCIONES DEL PERIODO</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5>S/ -</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>PERCEPCIONES DEL PERIODO ANTERIOR</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5>S/ -</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>SALDO DE PERCEPCIONES NO APLICADAS</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5>S/ -</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>RETENCIONES DECLARADAS EN EL PERIODO</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>
                              RETENCIONES DECLARADAS EN PERIODO ANTERIORES
                            </h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5>S/ -</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>SALDO DE RETENCIONES NO APLICADAS</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5>S/ -</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>PAGOS PREVIOS</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5>S/ -</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>IGV A PAGAR</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5 id="ruc">' . $info["liquidacion"]["saldo_afavor"] . '</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5 style="color: red">IMPORTE A PAGAR</h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                          <td>
                            <h5
                              id="ruc"
                              style="background-color: rgb(255, 255, 0)"
                            >
                            ' . $info["liquidacion"]["importe_apagar"] . '
                            </h5>
                          </td>
                          <td>
                            <h5></h5>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
          <td>
            <table id="tabla-general12" style="margin-top: 350px">
              <tbody>
                <tr>
                  <td>
                    <table align="left">
                      <tr>
                        <td id="ruc">
                          <h5>PERIODO</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["nom_anterior2"] . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["nom_mesanterior"] . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["nom_mesactual"] . '</h5>
                        </td>
                      </tr>

                      <tr>
                        <td id="ruc">
                          <h5>IMPUESTO GENERAL A LAS VENTAS - IGV</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["mesanterior2_impuesto_igv"] . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["mesanterior_impuesto_igv"] . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["mesactual_impuesto_igv"] . '</h5>
                        </td>
                      </tr>

                      <tr>
                        <td id="ruc">
                          <h5>IMPUESTO A LA RENTA MYPE TRIBUTARIO</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["mesanterior2_impuesto_renta"] . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["mesanterior_impuesto_renta"] . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $info["meses"]["mesactual_impuesto_renta"] . '</h5>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr class="tabla-secundaria">
          <td width="50%">
            <h5>ELABORADO POR: ' . $info["elaborador"]["nom_elaborador"] . '</h5>
          </td>
          <td width="50%" align="right">
            <h5 id="nospc">REVISADO POR: ' . $info["revisor"]["nom_revisor"] . '</h5>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
  ';
  $mpdf->SetDisplayMode('fullpage');
  $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
  $mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
  $mpdf->Output();
} else {
  http_response_code(400);
}
