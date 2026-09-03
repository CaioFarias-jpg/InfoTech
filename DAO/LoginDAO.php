<?php

namespace InfoTech\DAO;

use InfoTech\Model\Vendedor;

class LoginDAO extends DAO
{
    public function __construct(){
        parent::__construct();
    }

    public function auth (Vendedor $model)
    {
        $sql = "SELECT * FROM vendedor WHERE email = :email AND senha = :senha";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $model->email);
        $stmt->bindValue(':senha', $model->senha);
        $stmt->execute();

        return $stmt->fetchObject(Vendedor::class);
    }
}