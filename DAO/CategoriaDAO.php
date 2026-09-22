<?php

namespace InfoTech\DAO;

use InfoTech\Model\Categoria;

class CategoriaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Categoria $model)
    {
        return ($model->id_categoria === null) ? $this->insert($model) : $this->update($model);
    }

    public function select(string $tipo)
    {
        $sql = "SELECT id_categoria, nome, descricao, tipo FROM categoria WHERE tipo = ? ORDER BY nome";
        $stmt = parent::$connection->prepare($sql);
        $stmt->bindValue(1, $tipo);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, Categoria::class);
    }

    public function insert(Categoria $model)
    {
        $sql = "INSERT INTO categoria (nome, descricao, tipo) VALUES (?, ?, ?)";
        $stmt = parent::$connection->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->tipo);
        $stmt->execute();

        $model->id_categoria = parent::$connection->lastInsertId();
        return $model;
    }

    public function update(Categoria $model)
    {
        $sql = "UPDATE categoria SET nome = ?, descricao = ?, tipo = ? WHERE id_categoria = ?";
        $stmt = parent::$connection->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->tipo);
        $stmt->bindValue(4, $model->id_categoria);

        return $stmt->execute();
    }
}
