<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<div class="p-5 center">
    <h1> Produtos Cadastrados </h1>
</div>

<div class="d-flex justify-content-end mb-3">
    <a href="/infotech/produto/cadastro" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Novo Produto
    </a>
</div>

<table class="table table-striped table-hover">
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
                            <a class="btn btn-dark" href="/infotech/produto/cadastro?id_produto='.$produto->id_produto.'"> <i class="bi bi-pencil-square"></i>  </a>
                            <a class="btn btn-danger" href="/infotech/produto/exclusao?id_produto='.$produto->id_produto.'"> <i class="bi bi-trash-fill"></i> </a>
                        </td>
                    </tr>';
        endforeach;
   ?>
  </tbody>
</table>

<?php
   include VIEW . "/Includes/footer.php";
?>