<?php

require_once "./validarsesion.php";
require_once "../google-api-php-client-2.9.1/vendor/autoload.php";


if (isset($_POST["id_prueba"])) {

    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',  'format' => [380, 210], 'margin_top' => 5
      ]);
      $css = '
  body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px
  }';
    $plantilla=
    '<div class="content-wrapper">
    
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header" style="background-color: rgb(204,0,0);">
                        <div class="row">
                            <b class="h4" style="color: white; font-size: 27px;">Cotizaciones</b>
                            <div class="col" align="right">
                                <abbr title="Ayuda"><button class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modalAyuda"><i class="fas fa-question-circle"></i></button></abbr>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <form>
                                <div class="row">
                        
                                    <div class="col-12 col-xl-6">
                                        <div class="card card-secondary">
                                            <div class="card-header text-center">
                                                <b class="h4">ACTIVO</b>
                                            </div>
                                            <div class="card-body panel-body">
                                                <table>
                                                    
                                                    <thead>
                                                        <th>NOMBRE</th>
                                                        <th>ANEXO</th>
                                                        <th>VALOR</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><div class="text-white" style="background-color: #1E83C7;" align="center">ACTIVO CORRIENTE</div></td>
                                                        </tr>
                                                    
                                                        <tr>
                                                            <td>Efectivo y equivalente de Efectivo</td>
                                                            <td> <input type="text"  class="form-control text-center col-sm-6" readonly></td>
                                                            <td> ' . $_POST["efectivo"] . '</td>                                                    
                                                        </tr>
                                                        <tr>
                                                            <td>Inversiones Financieras</td>
                                                            <td> <input type="text"  style="text-align: center;" class="form-control text-center col-sm-6" readonly></td>
                                                            <td> <input type="number"  name ="inverfinan" id="inverfinan" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                        </tr>

                                                        <!--TOTAL-->
                                                        <tr>
                                                            <td class="h5"><b>TOTAL ACTIVO CORRIENTE</b></td>
                                                            <td> <input type="text" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                            <td> <input type="number" name="totalactivoc" id="totalactivoc" class="form-control text-center bg-warning"  onchange="sumaTotal1();" readonly></td>
                                                        </tr>
                                                    <tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output();
}

?>