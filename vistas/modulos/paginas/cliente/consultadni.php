<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Consultas</a></li>
              <li class="breadcrumb-item active">Consulta RENIEC</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Consulta la información RENIEC</h3>
            </div>
            <div class="card-body panel-body text-center" id="listadoregistrosD">
              <h1><strong>Consulta RENIEC</strong></h1>
              <form name="consultadni" action="#" id="consultadni" method="POST">
                    <h4>Ingresa el numero de DNI a consultar:</h4>
                    <input type="text" name="numerodni" maxlength="8" pattern="[0-9]{8}" size="20" class="text-center" />
                    <br/>
                    <button  id="" type="submit" class="btn btn-primary mt-3 btn-lg"><i class="fas fa-search"> Consultar</i></button>
                    <?php
                        if(!empty($_POST['numerodni'])){
                            echo consultadni($_POST['numerodni']);
                        }else{
                                
                        }
                    ?>
                </form>
            </div>
          </div>
        </div>           
      </div>
    </div>
  </div>
</div>
