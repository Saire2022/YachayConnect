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
            $datosLogin=[
                'usuario' => trim($_POST['usuario']),
                'contrasena' => trim($_POST['contrasena'])
            ];

            $datosUsuario=$this->usuario->getUsuario($datosLogin['usuario']);

            if ($this->usuario->verificarContrasena($datosUsuario,$datosLogin['contrasena'])){
                echo "contrasena correcta";
            }else{
                $_SESSION['errorLogin'] = 'El usuario o la contraseña esta incorrectos';
                $this->view('pages/login');
                //redirection('/home/login');
            }
        } else {
            $this->view('pages/login');
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
                    $this->view('pages/login');
                    //redirection('/home/login');
                } else {
                }
            }else{
                $_SESSION['usarioError'] = 'El ususario no esta disponible, intenta con otro usuario';
                $this->view('pages/register');
             }
        } else {
            $this->view('pages/register');
        }
    }
}

