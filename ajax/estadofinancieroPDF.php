<?php

require_once "./validarsesion.php";
require_once "../google-api-php-client-2.9.1/vendor/autoload.php";



    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',  'format' => [380, 210], 'margin_top' => 5
      ]);
    $css = '
    body {
        aling-items: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 33px
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
        align:right;
        width: 100%;
        text-align: right;
    }
    #tabla-secundaria{
        width: 100%;
        margin: 0px;
        padding: 0px;

    }
    h5{
        margin: 0px auto;
        padding: 0px;
        font-size: 18px;
    } 
    h3{
        margin: 0px auto;
        padding: 0px;
        font-size: 25px;
    }
    h6{
        margin: 0px auto;
        padding: 0px;
        font-size: 15px;
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
    $plantilla='
    <body>
        <table id="tabla-principal">
            <tbody>
                <tr>
                    <td>
                        <h5>Razón Social: ' . $_POST["razonsocial"] . ' - RUC: ' . $_POST["ruc"] . '</h5>
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
                    ESTADO DE SITUACIÓN FINANCIERA
                </td>
                </tr>
                <tr style="background-color: rgb(216, 216, 216); height: 5px font-size: 20px;">
                <td
                    width="100%"
                    align="center"
                    style="background-color: rgb(216, 216, 216)"
                    colspan="2"
                > <h5>expresado en soles (S/. )</h5>
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
                                            <h3 style="margin: 0px auto;"><u>ACTIVO</u></h3>
                                            <h3 style="color: rgb(1,114,196);"><u>ACTIVO CORRIENTE</u></h3>
                                            </td>
                                            <td>
                                            <h5 style="background-color: rgb(216,216,216);">ANEXO</h5>
                                            </td>
                                            <td>
                                            <h5 style="background-color: rgb(216,216,216);">VALOR</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                                <h5>Efectivo</h5>
                                            </td>
                                            <td>
                                                <h5> ' . $_POST["anexoefectivo"] . '</h5>
                                            </td>
                                            <td>
                                                <h5>S/. ' . $_POST["efectivo"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Inversiones Financieras</h5>
                                            </td>
                                            <td>
                                            <h5> ' . $_POST["anexoinverfinan"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["inverfinan"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Cuentas por cobrar comerciales - Terceros</h5>
                                            </td>
                                            <td>
                                            <h5> ' . $_POST["anexocobrarcomerci"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["cobrarcomerci"] . '</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                            <h5>Cuentas por cobrar Accionistas, Gerentes y Personal  </h5>
                                            </td>
                                            <td>
                                            <h5> ' . $_POST["anexocobraraccion"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["cobraraccion"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>Cuentas por cobrar diversas - Terceros</h5>
                                            </td>
                                            <td>
                                                <h5> ' . $_POST["anexocobrarterceras"] . '</h5>
                                            </td>
                                            <td>
                                                <h5>S/. ' . $_POST["cobrarterceras"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>Materiales, suministros y repuestos</h5>
                                            </td>
                                            <td>
                                                <h5> ' . $_POST["anexomatsumi"] . '</h5>
                                            </td>
                                            <td>
                                                <h5>S/. ' . $_POST["matsumi"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>Mercaderia</h5>
                                            </td>
                                            <td>
                                                <h5> ' . $_POST["anexomercad"] . '</h5>
                                            </td>
                                            <td>
                                                <h5>S/. ' . $_POST["mercad"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>Otros activos corrientes</h5>
                                            </td>
                                            <td>
                                                <h5> ' . $_POST["anexootrosac"] . '</h5>
                                            </td>
                                            <td>
                                                <h5>S/. ' . $_POST["otrosac"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>TOTAL ACTIVO CORRIENTE</h5>
                                            </td>
                                            <td>
                                                <h5> ' . $_POST["anexototalactivoc"] . '</h5>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(255, 195, 0 );">S/. ' . $_POST["totalactivoc"] . '</h5>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <br> </br>

                                <table align="left">
                                    <body>
                                        <tr align="left">
                                            <td>
                                                <h3 style="color: rgb(1,114,196);"><u>ACTIVO NO CORRIENTE</u></h3>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(216,216,216);">ANEXO</h5>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(216,216,216);">VALOR</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Inmueble, Maquinaria y Equipo</h5>
                                            </td>
                                            <td>
                                            <h5> ' . $_POST["anexoinmaqui"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["inmaqui"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Activos Intangibles</h5>
                                            </td>
                                            <td>
                                            <h5> ' . $_POST["anexoactintan"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["actintan"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Activo diferido</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexoactdife"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["actdife"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Depreciacion, Amortizacion y agotamiento acumulado</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexodepamorti"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["depamorti"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>TOTAL ACTIVO NO CORRIENTE</h5>
                                            </td>
                                            <td> </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(255, 195, 0 );">S/. ' . $_POST["totalactivonoc"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>TOTAL ACTIVO</h5>
                                            </td>
                                            <td> </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(255, 195, 0 );">S/. ' . $_POST["totalactivo"] . '</h5>
                                            </td>
                                        </tr>

                                    </body>
                                </table>
                            </td>

                        </tr>
                        </tbody>
                    </table>

                </td>

-------------------------------------------------

                        <td>
                            <table id="tabla-secundaria" colspan="2">
                                <tbody>
                                    <tr>
                                        <tr align="left">
                                            <td>
                                                <h3 style="margin: 0px auto;"><u>PASIVO</u></h3>
                                                <h3 style="color: rgb(1,114,196);"><u>PASIVO CORRIENTE</u></h3>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(216,216,216);">ANEXO</h5>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(216,216,216);">VALOR</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                            <h5>Sobregiros bancarios</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexosobregi"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["sobregi"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Tributos por pagar</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexotribupag"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["tribupag"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Remuneraciones por pagar</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexoremupag"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["remupag"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Cuentas por pagar comerciales - Terceros</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexocuencomer"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["cuencomer"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Obligaciones financieras</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexooblifinan"] . '</h5>
                                            </td>   
                                            <td>
                                            <h5>S/. ' . $_POST["oblifinan"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Cuentas por pagar Diversas - Terceros</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexodivterce"] . '</h5>
                                            </td>   
                                            <td>
                                            <h5>S/. ' . $_POST["divterce"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Pasivo Diferidos</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexoingredif"] . '</h5>
                                            </td>   
                                            <td>
                                            <h5>S/. ' . $_POST["ingredif"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>TOTAL PASIVO CORRIENTE</h5>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(255, 195, 0 );">S/. ' . $_POST["totalpasivoc"] . '</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                                <h3 style="color: rgb(1,114,196);"><u>PASIVO NO CORRIENTE</u></h3>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(216,216,216);">ANEXO</h5>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(216,216,216);">VALOR</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                            <h5>Obligaciones financieras largo plazo</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexooblilargo"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["oblilargo"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>TOTAL PASIVO NO CORRIENTE</h5>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(255, 195, 0 );">S/. ' . $_POST["totalpasivonoc"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>TOTAL PASIVO</h5>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(255, 195, 0 );">S/. ' . $_POST["totalpasivo"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h3 style="color: rgb(1,114,196);"><u>PATRIMONIO</u></h3>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(216,216,216);">ANEXO</h5>
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(216,216,216);">VALOR</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                            <h5>Capital</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexocapital"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["capital"] . '</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                            <h5>Capital adicional</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexocapadic"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["capadic"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Reserva legal</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexoreservleg"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["reservleg"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                            <h5>Resultados acumulados</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexoresultacu"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["resultacu"] . '</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                            <h5>Resultado del ejercicio</h5>
                                            </td>
                                            <td>
                                            <h5>' . $_POST["anexoresultejer"] . '</h5>
                                            </td>
                                            <td>
                                            <h5>S/. ' . $_POST["resultejer"] . '</h5>
                                            </td>
                                        </tr>
                                        
                                        <tr align="left">
                                            <td>
                                                <h5>TOTAL PATRIMONIO</h5>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(255, 195, 0 );">S/. ' . $_POST["totalpatrimo"] . '</h5>
                                            </td>
                                        </tr>

                                        <tr align="left">
                                            <td>
                                                <h5>TOTAL PASIVO Y PATRIMONIO</h5>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <h5 id="ruc" style="background-color: rgb(255, 195, 0 );">S/. ' . $_POST["totalpasivopat"] . '</h5>
                                            </td>
                                        </tr>
                               
                                </tbody>
                            </table>

                        </td>

            </tbody>

        </table>
        <table align="center">
            <tr align="left">
                <td>
                    <h3 style="color: rgb(37, 183, 44);"><u>DIFERENCIA ACTIVO - PASIVO</u></h3>
                </td>
                <td>
                                    
                </td>
                <td>
                    <h5 id="ruc" style="background-color: rgb(132, 228, 52 );">S/. ' . $_POST["diferencia_acpa"] . '</h5>
                </td>
            </tr>
        </table>

        <table id="tabla-principal">
            <tbody>
                <tr>
     
                </tr>
            </body>
        </table>
        <h6>Generado por: ' . $_POST["username"] .' '. $_POST['apellido'] . '</h6>
    </body>
    ';


    $mpdf->SetWatermarkImage('../vistas/img/sello/logo.png');

    $mpdf->showWatermarkImage = true;

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output();

?>