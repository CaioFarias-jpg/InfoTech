<?php

use InfoTech\Controller\{ 
                        VendedorController, 
                        ClienteController, 
                        ProdutoController,
                        LoginController,
                    InicioController  };


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// echo $url;

switch($url)
{
    case "/infotech/":
        InicioController::index();
    break;

    case "/infotech/cliente/listar":
        ClienteController::index();
    break;

    case "/infotech/cliente/cadastro":
        ClienteController::cadastro();
    break;

    case "/infotech/cliente/exclusao":
        ClienteController::exclusao();
    break;

    case "/infotech/produto/listar":
        ProdutoController::index();
    break;

    case "/infotech/produto/cadastro":
        ProdutoController::cadastro();
    break;

    case "/infotech/produto/exclusao":
        ProdutoController::exclusao();
    break;

    case "/infotech/admin":
        InicioController::notFound();
    break;

    case "/infotech/login":
        LoginController::login();
    break;
}