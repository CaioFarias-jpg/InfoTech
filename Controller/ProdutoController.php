<?php

namespace InfoTech\Controller;

use InfoTech\Model\Produto;

class ProdutoController extends Controller
{

    public static function index() 
    {
        $model = new Produto();
        $model->getAllRows(); //pega os dados da model
        parent::render('/Produto/listar_produto.php', $model);
    }

    public static function cadastro() //ENVIAR OS DADOS RECEBIDOS VIA POST
    {
        $model = new Produto();
        if(parent::isPost())
        {
            $model->id_produto = !empty($_POST['id_produto']) ? $_POST['id_produto'] : null;
            $model->nome = $_POST['nome'];
            $model->descricao = $_POST['descricao'];
            $model->preco = $_POST['preco'];
            $model->quantidade = $_POST['quantidade'];
            $model->status_produto = $_POST['status_produto'];
            // print_r($model);
            // exit;
            $model = $model->save();
            if($model){
                parent::redirect('/infotech/produto/listar');
            }
        }
        else{
            if(isset($_GET['id_produto'])){

                 $id = $_GET['id_produto'];
                 $model = Produto::getById($id); // solicita ao banco o produto com esse id
                //  print_r($model);
                //  exit;
            }

            parent::render('/Produto/cadastrar_produto.php', $model);
        }

    }

    public static function exclusao()
    {
        if(isset($_GET['id_produto'])){

            $id = $_GET['id_produto']; //captura o id que veio via GET
            $model = new Produto();
            $model->delete($id);
            parent::redirect('/infotech/produto/listar');
       }
        
    }
}
