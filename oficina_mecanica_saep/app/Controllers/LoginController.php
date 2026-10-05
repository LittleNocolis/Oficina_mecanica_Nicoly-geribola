<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('sistema/login');
    }

    public function autenticar()
    {
        $model = new UsuarioModel();

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $usuario = $model
            ->where('USU_EMAIL', $email)
            ->where('USU_SENHA', $senha)
            ->first();

        if($usuario){
            session()->set('usuario', $usuario);
            return redirect()->to(base_url('inicio'));
        }
        else{
            return redirect()
                ->to(base_url('login'))
                ->with('erro_login', '<br>Email ou senha inválidos!<br>');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}