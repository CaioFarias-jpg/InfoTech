<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<main class="container page-content py-5">
  <div class="mb-4">
    <h1 class="page-title h2">Cadastrar produto</h1>
    <p class="text-muted mb-0">Preencha os dados abaixo para salvar o produto.</p>
  </div>

<div class="card form-card shadow-sm">
<div class="card-body">
<form method="POST" action="/infotech/produto/cadastro" id="form_produto">
  <input type="hidden" name="id_produto" id="id_produto" value="<?= $model->id_produto ?? '' ?>">

  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required
           value="<?= htmlspecialchars($model->nome ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="preco" class="form-label">Preço</label>
    <input type="number" step="0.01" min="0" class="form-control" id="preco" name="preco" required
           value="<?= htmlspecialchars($model->preco ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="quantidade" class="form-label">Quantidade</label>
    <input type="number" min="0" class="form-control" id="quantidade" name="quantidade" required
           value="<?= htmlspecialchars($model->quantidade ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="status_produto" class="form-label">Status</label>
    <select class="form-select" name="status_produto" id="status_produto" required>
      <option value="" disabled <?= empty($model->status_produto) ? 'selected' : '' ?>>Selecione o status</option>
      <option value="ATIVO"   <?= ($model->status_produto ?? '') === 'ATIVO'   ? 'selected' : '' ?>>Ativo</option>
      <option value="INATIVO" <?= ($model->status_produto ?? '') === 'INATIVO' ? 'selected' : '' ?>>Inativo</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="id_categoria" class="form-label">Categoria</label>
    <div class="input-group">
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
    <a href="/infotech/produto/listar" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" name="salvar" id="salvar" class="btn btn-primary">
      <i class="bi bi-check-lg"></i> Salvar produto
    </button>
  </div>
</form>
</div>
</div>
</main>

<?php
   include VIEW . "/Includes/modais/modal_categoria_produto.php";
?>

<script src="<?= URL_BASE ?>/View/Includes/js/categoria_produto.js" defer></script>

<?php
   include VIEW . "/Includes/footer.php";
?>
