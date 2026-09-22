<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<main class="container page-content py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">
      <div class="card form-card shadow-sm">
        <div class="card-body">
          <div class="text-center mb-4">
            <i class="bi bi-person-circle fs-1 text-primary"></i>
            <h1 class="page-title h3 mt-2">Acessar sistema</h1>
            <p class="text-muted mb-0">Informe seus dados para continuar.</p>
          </div>

<form method="POST" action="/infotech/login">
 
  <div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= $model->email ?? '' ?>" >
  </div>

  <div class="mb-3">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" >
  </div>

  <button type="submit" name="login" id="login" class="btn btn-primary w-100">
    <i class="bi bi-box-arrow-in-right"></i> Entrar
  </button>
</form>

        </div>
      </div>
    </div>
  </div>
</main>

<?php
   include VIEW . "/Includes/footer.php";
?>
