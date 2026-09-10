<?php

session_start();

include 'config.php';
include 'autoload.php';
// include 'routes.php';

use InfoTech\Core\Router;

$router = new Router();
include './Core/routes.php';
$router->dispatch();