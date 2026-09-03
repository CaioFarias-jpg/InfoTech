<?php

namespace InfoTech\Model; // localizando onde está a classe ProdutoModel

use InfoTech\DAO\ProdutoDAO; // vou chamar um método da class DAO, use ProdutoDAO

final class Produto extends Model
{
    public ?int $id_produto = null;
    public string $nome = '';
    public string $descricao = '';
    public float $preco = 0;
    public int $quantidade = 0;
    public string $status_produto = '';

    public function getAllRows()
    {
        $objProd = new ProdutoDAO();
        $this->rows = $objProd->select();
        return $this->rows;
    }

    public static function getById($id)
    {
        //recebemos o ID capturado via GET
        $objProd = new ProdutoDAO();
        return $objProd->selectById($id);
    }

    public function save()
    {
        $objProd = new ProdutoDAO();
        return $objProd->save($this);
    }

    public function delete(int $id)
    {
        $objProd = new ProdutoDAO();
        return $objProd->delete($id);
    }
}
