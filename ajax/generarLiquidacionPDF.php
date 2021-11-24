<?php

require_once "./validarsesion.php";
require_once "../google-api-php-client-2.9.1/vendor/autoload.php";

if (isset($_POST["id_liquidacion"])) {

  $periodo = explode("-", $_POST["periodo"]);

  $meses = ["", "ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];

  $mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',  'format' => [380, 210], 'margin_top' => 5
  ]);

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
            <h5><b> ' . $_POST["razonsocial"] . '</b></h5>
          </td>
          <td align="right">
            <h5><b> PERIODO: ' . $meses[intval($periodo[1])] . '</b></h5>
          </td>
        </tr>
        <tr>
          <td>
            <h5>RUC: ' . $_POST["ruc"] . '</h5>
          </td>
          <td align="right">
            <h5>VENCIMIENTO: ' . $_POST["fechavencimiento"] . '</h5>
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
              ><h5><u>HOJA DE TRABAJO - IMPUESTOS ' . $meses[intval($periodo[1])] . ' ' . $periodo[0] . '</u></h5></b
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
                          <h5>S/. ' . $_POST["ventas_netas"] . '</h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["ventas_netas_igv"] . '</h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["ventas_netas_total"] . '</h5>
                        </td>
                      </tr>

                      <tr align="left">
                        <td>
                          <h5>VENTAS NO GRAVADAS</h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["ventas_no_gravadas"] . '</h5>
                        </td>
                        <td>
                          <h5> - </h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["ventas_no_gravadas_total"] . '</h5>
                        </td>
                      </tr>

                      <tr align="left">
                        <td>
                          <h5>EXPORTACIONES FACTURADAS EN EL PERIODO</h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["exportaciones_facturada"] . '</h5>
                        </td>
                        <td>
                          <h5> - </h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["exportaciones_facturada_total"] . '</h5>
                        </td>
                      </tr>
                      
                      <tr align="left">
                        <td>
                          <h5>EXPORTACIONES EMBARCADAS EN EL PERIODO</h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["exportaciones_embarcadas"] . '</h5>
                        </td>
                        <td>
                          <h5> - </h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["exportaciones_embarcadas_total"] . '</h5>
                        </td>
                      </tr>

                      <tr align="left">
                      <td>
                        <h5>NOTAS DE DEBITO</h5>
                      </td>
                      <td>
                        <h5>S/. ' . $_POST["nota_debito"] . '</h5>
                      </td>
                      <td>
                        <h5>S/. ' . $_POST["nota_debito_igv"] . '</h5>
                      </td>
                      <td>
                        <h5>S/. ' . $_POST["nota_debito_total"] . '</h5>
                      </td>
                    </tr>

                      <tr align="left">
                        <td>
                          <h5>TOTAL INGRESOS</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(255,255,204);">S/. ' . $_POST["ingreso_bruto"] . '</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(255,255,204);">S/. ' . $_POST["ingreso_bruto_igv"] . '</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(255,255,204);">S/. ' . $_POST["ingreso_bruto_total"] . '</h5>
                        </td>
                      </tr>

                      <tr align="left">
                        <td>
                          <h5>NOTAS DE CREDITO</h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["nota_credito"] . '</h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["nota_credito_igv"] . '</h5>
                        </td>
                        <td>
                          <h5>S/. ' . $_POST["nota_credito_total"] . '</h5>
                        </td>
                      </tr>
                      
                      <tr align="left">
                        <td>
                          <h5>INGRESO NETO</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(204,255,204);">S/. ' . $_POST["ingreso_neto"] . '</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(204,255,204);">S/. ' . $_POST["ingreso_neto_igv"] . '</h5>
                        </td>
                        <td>
                          <h5 id="ruc" style="background-color: rgb(204,255,204);">S/. ' . $_POST["ingreso_neto_total"] . '</h5>
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
                        <h5>' . $_POST["nombreregimen"] . '</h5>
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
                        <h5 style="background-color: rgb(242,242,242);">S/. ' . $_POST["ingresos_netos"] . '</h5>
                      </td>
                      <td>
                        <h5>S/. ' . $_POST["coeficiente"] . '</h5>
                      </td>
                    </tr>

                    <tr align="left">
                      <td>
                        <h5>IMPUESTO RESULTANTE</h5>
                      </td>
                      <td>
                        <h5>S/. ' . $_POST["impuesto_resultante"] . '</h5>
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
                        <h5>S/. ' . $_POST["saldo_afavor_renta"] . '</h5>
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
                        <h5>S/. ' . $_POST["tributo_apagar_renta"] . '</h5>
                      </td>
                      <td>
                        <h5></h5>
                      </td>
                    </tr>  
                    <tr align="left">
                      <td>
                        <h5>PAGOS PREVIOS</h5>
                      </td>
                      <td>
                        <h5>S/. ' . $_POST["pagos_previos"] . '</h5>
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
                  <h5 style="background-color: rgb(255,255,0);">S/. ' . $_POST["impuesto_renta"] . '</h5>
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
                <h5>S/. ' . $_POST["impuesto_general_ventas"] . '</h5>
             </td>
           </tr>
           <tr>
            <td  align="left" id="ruc">
             <h5>IMPUESTO A LA RENTA MYPE TRIBUTARIO</h5>
            </td>
            <td  align="left" id="ruc">
               <h5>S/. ' . $_POST["impuesto_renta_total"] . '</h5>
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
                          <td>
                            <h5 id="ruc" style="background-color: rgb(216,216,216);">BASE</h5>
                          </td>
                          <td>
                            <h5 id="ruc" style="background-color: rgb(216,216,216);">IGV</h5>
                          </td>
                          <td>
                            <h5 id="ruc" style="background-color: rgb(216,216,216);">TOTAL</h5>
                          </td>                  
                        <tr>
                          <td>
                            <h5>COMPRAS NACIONALES GRAVADAS</h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_nacion_grava"] . '</h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_nacion_grava_igv"] . '</h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_nacion_grava_total"] . '</h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>COMPRAS IMPORTADAS GRAVADAS</h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_importa_grava"] . '</h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_importa_grava_igv"] . '</h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_importa_grava_total"] . '</h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>COMPRAS NACIONALES NO GRAVADAS</h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_nacion_no_grava"] . '</h5>
                          </td>
                          <td>
                            <h5> - </h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_nacion_no_grava_total"] . '</h5>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>COMPRAS IMPORTADAS NO GRAVADAS</h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_importa_no_grava"] . '</h5>
                          </td>
                          <td>
                            <h5> - </h5>
                          </td>
                          <td>
                            <h5>S/. ' . $_POST["comp_importa_no_grava_total"] . '</h5>
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
                            >S/. ' . $_POST["total_compras"] . '</h5>
                          </td>
                          <td>
                            <h5
                              id="ruc"
                              style="background-color: rgb(255, 255, 204)"
                            >S/. ' . $_POST["total_compras_igv"] . '</h5>
                          </td>
                          <td>
                            <h5
                              id="ruc"
                              style="background-color: rgb(255, 255, 204)"
                            >S/. ' . $_POST["total_compras_total"] . '</h5>
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
                            <h5 id="ruc">S/. ' . $_POST["total_impuesto"] . '</h5>
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
                            <h5>S/. ' . $_POST["saldo_afavor_anterior"] . '</h5>
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
                            <h5 id="ruc">S/. ' . $_POST["saldo_afavor"] . '</h5>
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
                            <h5>S/. ' . $_POST["percepciones_periodo"] . '</h5>
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
                            <h5>S/. ' . $_POST["percepciones_periodo_ant"] . '</h5>
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
                            <h5>S/. ' . $_POST["saldo_percepciones_no_apl"] . '</h5>
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
                            <h5>S/. ' . $_POST["retenciones_declaradas"] . '</h5>
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
                            <h5>S/. ' . $_POST["retenciones_declaradas_ant"] . '</h5>
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
                            <h5>S/. ' . $_POST["saldo_retenciones_no_apl"] . '</h5>
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
                            <h5>S/. ' . $_POST["pagos_previos_compras"] . '</h5>
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
                            <h5 id="ruc">S/. ' . $_POST["igv_a_pagar"] . '</h5>
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
                            >S/. ' . $_POST["importe_apagar"] . '</h5>
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
            <table id="tabla-general12" >
              <tbody> 
                <tr><td><img src="' . $_POST["grafico"] . '" alt="Grafico No Encontrado" ></td></tr>
                <tr>
                  <td>
                    <table align="left"> 
                      <tr>
                        <td id="ruc">
                          <h5>PERIODO</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $_POST["mesPasadoAnterior"] . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $_POST["mesAnterior"]  . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>' . $_POST["mesActual"]  . '</h5>
                        </td>
                      </tr>

                      <tr>
                        <td id="ruc">
                          <h5>IMPUESTO GENERAL A LAS VENTAS - IGV</h5>
                        </td>
                        <td id="ruc">
                          <h5>S/. ' . $_POST["mesPasadoAnteriorImpuesto"]  . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>S/. ' . $_POST["mesAnteriorImpuesto"]  . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>S/. ' . $_POST["mesActualImpuesto"]  . '</h5>
                        </td>
                      </tr>

                      <tr>
                        <td id="ruc">
                          <h5>IMPUESTO A LA RENTA MYPE TRIBUTARIO</h5>
                        </td>
                        <td id="ruc">
                          <h5>S/. ' . $_POST["mesPasadoAnteriorRenta"] . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>S/. ' . $_POST["mesAnteriorRenta"]   . '</h5>
                        </td>
                        <td id="ruc">
                          <h5>S/. ' . $_POST["mesActualRenta"]   . '</h5>
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
            <h5>ELABORADO POR: ' . $_POST["elaborador"] . '</h5>
          </td>
          <td width="50%" align="right">
            <h5 id="nospc">REVISADO POR: ' . $_POST["revisor"] . '</h5>
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
