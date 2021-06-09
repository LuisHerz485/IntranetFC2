<?php 

ob_start();
session_start();

$razon = $_SESSION['razonsocial'];
if(!isset($razon)){
	header("Location:login.html");
}else{

	require 'headerCliente.php';
?>

	<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Subir Archivos</h1>
  <div class="box-tools pull-right">
    
  </div>

  	<form action="../ajax/upload.php" method="POST" enctype="multipart/form-data">
  		</br>
		Elige un archivo:
		<input type="file" name="archivos">

		</br>
		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>Subir</button>

      <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

      

	</form>

    

      
    </div>
  </form>
</div>
<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
  </div>

</div>





<?php 
require 'footer.php';
 ?>



<?php  
	};


ob_end_flush();

	?>