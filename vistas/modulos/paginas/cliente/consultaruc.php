<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Consultas</a></li>
            <li class="breadcrumb-item active">Consulta RUC</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Consulta la informacion RUC</h3>
          </div>
          <div class="card-body panel-body text-center" id="listadoregistrosD">
            <h1><strong>Consulta RUC</strong></h1>
            <form name="consultaruc" action="#" id="consultaruc" method="POST">
              <h4>Ingresa el número de RUC:</h4>
              <input type="text" name="numeroruc" maxlength="11" pattern="[0-9]{11}" class="text-center" size="25" />

              <?php
              if (!empty($_POST['numeroruc'])) {
                echo consultaruc($_POST['numeroruc']);
              } else {
              }
              ?>
              <br />
              <button id="" type="submit" class="btn btn-primary mt-3 btn-lg"><i class="fas fa-search"> Consultar</i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>