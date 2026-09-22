<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<main class="container page-content py-5">
  <div class="mb-4">
    <h1 class="page-title h2">Cadastrar cliente</h1>
    <p class="text-muted mb-0">Preencha os dados abaixo para salvar o cliente.</p>
  </div>

<div class="card form-card shadow-sm">
<div class="card-body">
<form method="POST" action="/infotech/cliente/cadastro" id="form_cliente">
  <input type="hidden" name="id_cliente" id="id_cliente" value="<?= $model->id_cliente ?? '' ?>">

  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required
           value="<?= htmlspecialchars($model->nome ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="telefone" class="form-label">Fone</label>
    <input type="text" class="form-control" id="telefone" name="telefone"
           value="<?= htmlspecialchars($model->telefone ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="email" name="email"
           value="<?= htmlspecialchars($model->email ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="status_cliente" class="form-label">Status</label>
    <select class="form-select" name="status_cliente" id="status_cliente" required>
      <option value="" disabled <?= empty($model->status_cliente) ? 'selected' : '' ?>>Selecione o status</option>
      <option value="ATIVO"   <?= ($model->status_cliente ?? '') === 'ATIVO'   ? 'selected' : '' ?>>Ativo</option>
      <option value="INATIVO" <?= ($model->status_cliente ?? '') === 'INATIVO' ? 'selected' : '' ?>>Inativo</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="id_categoria" class="form-label">Categoria</label>
    <div class="input-group">
      <!-- as opções são carregadas pelo categoria.js; data-selecionado guarda a categoria atual na edição -->
      <select class="form-select" name="id_categoria" id="id_categoria" required
              data-selecionado="<?= $model->id_categoria ?? '' ?>">
        <option value="" disabled selected>Carregando categorias...</option>
      </select>
      <button type="button" class="btn btn-outline-secondary" id="btn_nova_categoria">
        <i class="bi bi-plus-lg"></i> Categoria
      </button>
    </div>
  </div>

  <div class="d-flex justify-content-end gap-2">
    <a href="/infotech/cliente/listar" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" name="salvar" id="salvar" class="btn btn-primary">
      <i class="bi bi-check-lg"></i> Salvar cliente
    </button>
  </div>
</form>
</div>
</div>
</main>

<?php
   include VIEW . "/Includes/modais/modal_categoria_cliente.php";
?>

<script src="<?= URL_BASE ?>/View/Includes/js/categoria.js" defer></script>

<?php
   include VIEW . "/Includes/footer.php";
?>
