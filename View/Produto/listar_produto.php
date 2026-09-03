<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<div class="p-5 center">
    <h1> Produtos Cadastrados </h1>
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
            echo ' <tr>
                        <th scope="row"> '.$produto->id_produto.'  </th>
                        <td> '.$produto->nome.'  </td>
                        <td> '.$produto->descricao.'  </td>
                        <td>  '.$produto->preco.'  </td>
                        <td>  '.$produto->quantidade.'  </td>
                        <td>  '.$produto->status_produto.'  </td>
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
