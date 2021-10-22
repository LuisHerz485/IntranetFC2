<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>404 Pagina de error</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Pagina de error 404</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-warning"> 404</h2>
      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Pagina no encontrada.</h3>
        <p>
          Podrias volver a la navegacion dando clic en <a href="<?php echo (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") ? "escritorio" : "./"; ?>">volver al inicio</a>
        </p>
      </div>
    </div>
  </section>
</div>