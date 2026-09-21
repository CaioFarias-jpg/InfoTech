<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<div class="p-5 center">
    <h1> Cadastrar Produtos </h1>
</div>

<form method="POST" action="/infotech/produto/cadastro" id="form_produto">
  <input type="hidden" name="id_produto" id="id_produto" value="<?= $model->id_produto ?? '' ?>">

  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required
           value="<?= htmlspecialchars($model->nome ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao"
           value="<?= htmlspecialchars($model->descricao ?? '') ?>">
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

  <button type="submit" name="salvar" id="salvar" class="btn btn-primary">Salvar produto</button>
</form>

<?php
   include VIEW . "/Includes/footer.php";
?>