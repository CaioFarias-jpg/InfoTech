<?php
    include VIEW . "/Includes/header.php";
    include VIEW . "/Includes/navbar.php";
?>

<main class="container page-content py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h1 class="page-title h2">Clientes cadastrados</h1>
      <p class="text-muted mb-0">Gerencie os clientes registrados no sistema.</p>
    </div>
    <a href="/infotech/cliente/cadastro" class="btn btn-primary">
      <i class="bi bi-plus-lg"></i> Novo cliente
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
      <th scope="col">Telefone</th>
      <th scope="col">E-mail</th>
      <th scope="col">Status</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
   <?php
    // print_r($model);
        if (empty($model->rows)) {
            echo '<tr><td colspan="6" class="text-center text-muted py-4">Nenhum cliente cadastrado.</td></tr>';
        } else {
        foreach($model->rows as $cliente):
            $badge = ($cliente->status_cliente === 'ATIVO') ? 'bg-success' : 'bg-secondary';
            echo ' <tr>
                        <th scope="row"> '.$cliente->id_cliente.'  </th>
                        <td> '.$cliente->nome.'  </td>
                        <td> '.$cliente->telefone.'  </td>
                        <td>  '.$cliente->email.'  </td>
                        <td><span class="badge '.$badge.'"> '.$cliente->status_cliente.' </span></td>
                        <td> 
                            <a class="btn btn-outline-dark btn-sm" title="Editar cliente" href="/infotech/cliente/cadastro?id_cliente='.$cliente->id_cliente.'"> <i class="bi bi-pencil-square"></i> </a>
                            <a class="btn btn-outline-danger btn-sm" title="Excluir cliente" onclick="return confirm(\'Excluir este cliente?\');" href="/infotech/cliente/exclusao?id_cliente='.$cliente->id_cliente.'"> <i class="bi bi-trash-fill"></i> </a>
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
