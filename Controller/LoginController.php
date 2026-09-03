<?php

namespace InfoTech\Controller;

use InfoTech\Model\Vendedor;

class LoginController extends Controller
{
    public static function login()
    {
       $model = new Vendedor();

       if(parent::isPost())
       {
            $model->email = $_POST['email'];
            $model->senha = $_POST['senha'];
            $usuario_logado = $model->logar();

            if($usuario_logado === false){
                parent::redirect('/infotech/login');
            }
            else{
                $_SESSION['usuario_logado'] = $usuario_logado;
                parent::redirect('/infotech/cliente/listar');
            }
       }
       parent::render('/Login/login.php', $model);
    }

    public function logout()
    {
        session_destroy();
        parent::redirect('/infotech/login');
    }
}