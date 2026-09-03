<?php

namespace InfoTech\Model; // localizando onde está a classe ClienteModel

use InfoTech\DAO\VendedorDAO; // vou chamar um método da class DAO, use ClienteDAO

final class Vendedor extends Model
{
    public ?int $id_vendedor;
    public string $nome;
    public string $cpf;
    public string $telefone;
    public string $email;

    public function logar()
    {
        $objLogin = new LoginDAO();
        return $objLogin->auth($this);
    }
}
