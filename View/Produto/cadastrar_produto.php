<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<div class="p-5 center">
    <h1> Cadastrar Produtos </h1>
</div>

<form method="POST" action="/infotech/produto/cadastro">
  <div class="mb-3">
    <input type="hidden" name="id_produto" id="id_produto" value="<?= $model->id_produto ?? '' ?>" >
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?= $model->nome ?? '' ?>" >
  </div>
  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $model->descricao ?? '' ?>" >
  </div>

  <div class="mb-3">
    <label for="preco" class="form-label">Preço</label>
    <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?= $model->preco ?? '' ?>" >
  </div>

  <div class="mb-3">
    <label for="quantidade" class="form-label">Quantidade</label>
    <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?= $model->quantidade ?? '' ?>" >
  </div>

  <div class="mb-3">
            <select class="form-select" name="status_produto" id="status_produto">
                <option selected>Selecione o Status</option>
                <option value="ATIVO"> Ativo </option>
                <option value="INATIVO"> Inativo </option>
            </select>
  </div>
  
  <button type="submit" name="salvar" id="salvar" class="btn btn-primary">Salvar</button>
</form>

<?php
   include VIEW . "/Includes/footer.php";
?>
