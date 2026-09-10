<?php

$router->add('GET', '/infotech', 'InicioController@index');

$router->add('GET','/infotech/login','LoginController@login');
$router->add('POST','/infotech/login','LoginController@login');
$router->add('GET','/infotech/login','LoginController@login');

$router->add('GET','/infotech/cliente/listar','ClienteController@index');
$router->add('GET','/infotech/cliente/cadastro','ClienteController@cadastro');
$router->add('POST','/infotech/cliente/cadastro','ClienteController@cadastro');
$router->add('GET','/infotech/cliente/exclusao','ClienteController@exclusao');