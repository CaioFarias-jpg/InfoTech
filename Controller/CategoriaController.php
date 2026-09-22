<?php

namespace InfoTech\Controller;
use InfoTech\Model\Categoria;

class CategoriaController extends Controller
{
    private static function tipoValido(string $tipo): bool
    {
        return in_array($tipo, ['CLIENTE', 'PRODUTO'], true);
    }

    // GET /infotech/categoria/listar
    // Chamado pelo JS: devolve todas as categorias (getAllRows) em JSON
    public static function listar()
    {
        parent::isLoggedJson();

        try {
            $tipo = strtoupper(trim($_GET['tipo'] ?? ''));
            if (!self::tipoValido($tipo)) {
                parent::jsonResponse(['status' => 400, 'mensagem' => 'Tipo de categoria invalido.']);
            }

            $model = new Categoria();
            $model->getAllRows($tipo);

            // monta só os campos que o select precisa
            $categorias = array_map(fn($categoria) => [
                'id_categoria' => $categoria->id_categoria,
                'nome'         => $categoria->nome,
            ], $model->rows);
            
            $result = ['status' => 200, 'categorias' => $categorias];

        } catch (\Throwable $e) {
            $result = ['status' => 500, 'mensagem' => 'Não foi possível carregar as categorias.'];
        }

        parent::jsonResponse($result);
    }

    // POST /infotech/categoria/cadastro
    // Chamado pelo JS (modal): cadastra e devolve o ID da nova categoria
    public static function cadastro()
    {
        parent::isLoggedJson();

        $model = new Categoria();
        $model->nome      = trim($_POST['nome'] ?? '');
        $model->descricao = trim($_POST['descricao'] ?? '') ?: null;
        $model->tipo      = strtoupper(trim($_POST['tipo'] ?? ''));

        if ($model->nome === '' || !self::tipoValido($model->tipo)) {
            parent::jsonResponse(['status' => 400, 'mensagem' => 'Informe o nome da categoria.']);
        }

        try {
            $model->save();
            $result = [
                'status'       => 200,
                'mensagem'     => 'Categoria cadastrada.',
                'id_categoria' => $model->id_categoria,
            ];
        } catch (\PDOException $e) {
            // 23000 = violação de restrição (aqui, o UNIQUE do nome)
            $result = ($e->getCode() == '23000')
                ? ['status' => 409, 'mensagem' => "A categoria \"{$model->nome}\" já existe."]
                : ['status' => 500, 'mensagem' => 'Erro ao salvar a categoria.'];
        }

        parent::jsonResponse($result);
    }
}
