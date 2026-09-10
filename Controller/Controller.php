<?php

namespace InfoTech\Controller;

use InfoTech\Model\Model;

abstract class Controller
{
    final protected static function isLogged()
    {
        if (!isset($_SESSION['usuario_logado'])) {
            header('Location: /infotech/login');
            exit;
        }
    }

    final protected static function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === "POST";
    }

    final protected static function redirect(string $route): void
    {
        header("Location: $route");
        exit;
    }

    final protected static function render(string $view, ?Model $model): void
    {
        $caminho = VIEW . $view;

        if (!file_exists($caminho)) {
            die("View não encontrada: $caminho");
        }

        include $caminho;
    }
}