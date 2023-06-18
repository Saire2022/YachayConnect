<?php

class Home extends Controller
{
    public function __construct()
    {
        $this->usuario = $this->model("usuario");
    }
    
    public function index()
    {
        if (isset($_SESSION['logueado']))
        {
            $this->view('pages/home');
        }else {
            redirection('/home/login');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lógica de inicio de sesión
            $datosLogin=[
                'usuario' => trim($_POST['usuario']),
                'contrasena' => trim($_POST['contrasena'])
            ];

            $datosUsuario=$this->usuario->getUsuario($datosLogin['usuario']);

            if ($this->usuario->verificarContrasena($datosUsuario,$datosLogin['contrasena'])){
                $_SESSION['logueado'] = $datosUsuario->idPrivilegio;
                $_SESSION['usuario'] = $datosUsuario->usuario;
                redirection('/home');
            }else{
                $_SESSION['errorLogin'] = 'El usuario o la contraseña esta incorrectos';
                redirection('/home');
                //redirection('/home/login');
            }
        } else {
            if (isset($_SESSION['logueado'])){
                redirection('/home');
            }else{
                $this->view('pages/login');
            }
            
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosRegistro = [
                'privilegio' => '2',
                'email' => trim($_POST['email']),
                'usuario' => trim($_POST['usuario']),
                'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT)
            ];
            if($this->usuario->verificarUsuario($datosRegistro))
            {
                if ($this->usuario->register($datosRegistro)) {
                    // Registro exitoso
                    $_SESSION['LoginComplete'] = 'Tu registro ha sido completado con exito, ahora puedes ingresar';
                    redirection('/home');
                    //redirection('/login');
                } else {
                }
            }else{
                $_SESSION['usarioError'] = 'El ususario no esta disponible, intenta con otro usuario';
                $this->view('pages/register');
             }
        } else {
            if (isset($_SESSION['logueado'])){
                redirection('/home');
            }else{
                $this->view('pages/register');
            }
            
        }
    }
    public function logout()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        redirection('/home');
    }
    
}

