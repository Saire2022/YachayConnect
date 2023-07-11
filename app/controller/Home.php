<?php

class Home extends Controller
{
    public function __construct()
    {
        $this->usuario = $this->model("usuario");
        $this->publicaciones = $this->model("publicar");
    }
    
    public function index()
    {
        if (isset($_SESSION['logueado']))
        {
            $datosUsuario= $this->usuario->getUsuario($_SESSION['usuario']);
            $datosPefil= $this->usuario->getPerfil($_SESSION['logueado']);
            $datosPublicaciones= $this->publicaciones->getPublicaciones();
            $datosPerfil2=$this->usuario->getPerfil($_SESSION['logueado']);
            $verificarLikes = $this->publicaciones->misLikes($_SESSION['logueado']);
            $comentarios=$this->publicaciones->getComentarios();
            $informacionComentarios=$this->publicaciones->getInformacionComentarios($comentarios);
            $misNotificaciones =$this->publicaciones->getNotificaciones($_SESSION['logueado']);
            if ($datosPefil){
                $datosRed = [
                    'usuario' => $datosUsuario,
                    'perfil2'=>$datosPerfil2,
                    'perfil' => $datosPefil,
                    'publicaciones'=>$datosPublicaciones,
                    'misLikes'=> $verificarLikes,
                    'comentarios'=>$informacionComentarios,
                    'misNotificaciones'=> $misNotificaciones
                ];
                /* var_dump($datosRed['perfil']); */
                $this->view('pages/home', $datosRed);
            }
            #Si no completo su perfil
            else {
                $this->view('pages/completarPerfil',$_SESSION['logueado']);
            }
            
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
                $_SESSION['logueado'] = $datosUsuario->idusuario;
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
                'brithday'=>trim($_POST['date']),
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


    public function insertarRegistrosPerfil()
    {
        $carpeta="C:/xampp/htdocs/YachayConnect/public/img/imagenesPefil/";
        opendir($carpeta);
        $rutaImagen= 'img/imagenesPefil/' .  $_FILES['imagen']['name'];
        $ruta=$carpeta . $_FILES['imagen']['name'];
        copy($_FILES['imagen']['tmp_name'], $ruta);
        $datos= [
            'idusuario' => trim($_POST['id_user']),
            'nombre' => trim($_POST['nombre']),
            'ruta' => $rutaImagen,
            'carrer'=> trim($_POST['carrer']),
            'salary'=>trim($_POST['salario']),
            'major'=>trim($_POST['major']),
            'paisactual'=>trim($_POST['paisactual'])
        ];
        if ($this->usuario->insertarPerfil($datos))
        {
            redirection('/home');
        }else{
            echo 'El perfil no se ha guardado';
        }
    }
    public function logout()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        redirection('/home');
    }

    public function accederCompletarPefil()
    {
        $datos= [
            'idusuario' => trim($_POST['btnGraduado']),
            'nombre' => trim($_POST['btnEstudiante']),
        ];
    }
    
}

