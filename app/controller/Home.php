<?php

class Home extends Controller
{
    public function __construct()
    {
        $this->usuario = $this->model("Users");
    }

    public function index()
    {
        //$users = $this->usuario->connect();
        //$this->view("pages/register");
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lógica de inicio de sesión
        } else {
            $this->view('pages/login');
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datoRegistro = [
                'privilegio' => '1',
                'email' => trim($_POST['email']),
                'usuario' => trim($_POST['usuario']),
                'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT)
            ];
            if($this->usuario->verificarUsuario($datoRegistro))
            {
                if ($this->usuario->register($datoRegistro)) {
                    // Registro exitoso
                    $_SESSION['usuario']=$datoRegistro['usuario'];
                    $_SESSION['LoginComplete'] = 'Tu registro ha sido completado con exito, ahora puedes ingresar';
                    $this->view('pages/login');
                    //redirection('/home/login');
                } else {
                    // Error en el registro
                    //$this->view('pages/Login');
                }
            }else{
                $_SESSION['usarioError'] = 'El ususario no esta disponible, intenta con otro usuario';
                $this->view('pages/register');
                //redirection('/home/register');
             }
        } else {
            $this->view('pages/register');
        }
    }
}

