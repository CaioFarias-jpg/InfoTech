<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<main class="container page-content py-5">
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h1 class="page-title h2">Produtos cadastrados</h1>
      <p class="text-muted mb-0">Gerencie os produtos registrados no sistema.</p>
    </div>
    <a href="/infotech/produto/cadastro" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Novo Produto
    </a>
</div>

<div class="card list-card shadow-sm">
<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-striped table-hover align-middle mb-0">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Status</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
   <?php
    // print_r($model);
        if (empty($model->rows)) {
            echo '<tr><td colspan="7" class="text-center text-muted py-4">Nenhum produto cadastrado.</td></tr>';
        } else {
        foreach($model->rows as $produto):
            $badge = ($produto->status_produto === 'ATIVO') ? 'bg-success' : 'bg-secondary';
            echo ' <tr>
                        <th scope="row"> '.$produto->id_produto.'  </th>
                        <td> '.$produto->nome.'  </td>
                        <td> '.$produto->descricao.'  </td>
                        <td>  R$ '.number_format((float) $produto->preco, 2, ",", ".").'  </td>
                        <td>  '.$produto->quantidade.'  </td>
                        <td>  <span class="badge '.$badge.'"> '.$produto->status_produto.' </span>  </td>
                        <td> 
                            <a class="btn btn-outline-dark btn-sm" title="Editar produto" href="/infotech/produto/cadastro?id_produto='.$produto->id_produto.'"> <i class="bi bi-pencil-square"></i> </a>
                            <a class="btn btn-outline-danger btn-sm" title="Excluir produto" onclick="return confirm(\'Excluir este produto?\');" href="/infotech/produto/exclusao?id_produto='.$produto->id_produto.'"> <i class="bi bi-trash-fill"></i> </a>
                        </td>
                    </tr>';
        endforeach;
        }
   ?>
  </tbody>
</table>
</div>
</div>
</div>
</main>

<?php
   include VIEW . "/Includes/footer.php";
?>
