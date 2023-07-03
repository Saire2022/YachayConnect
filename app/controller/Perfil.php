<?php
class Perfil extends Controller
{
    public function  __construct()
    {
        $this-> perfil= $this->model('perfilUsuario');
        $this-> usuario= $this->model('usuario');
    }
    public function index($user)
    {
        if (isset($_SESSION['logueado'])){
            $datosUsuario= $this->usuario->getUsuario("A0204");
            $datosPerfil= $this->usuario->getPerfil($datosUsuario->idusuario);
            $datos=[
                'perfil'=> $datosPerfil,
                'usuario'=> $datosUsuario
            ];

            $this->view('pages/perfil', $datos);
        }
    }
    public function cambiarImagen()
    {
        $carpeta="C:/xampp/htdocs/YachayConnect/public/img/imagenesPefil/";
        opendir($carpeta);
        $rutaImagen= 'img/imagenesPefil/' .  $_FILES['imagen']['name'];
        $ruta=$carpeta . $_FILES['imagen']['name'];
        copy($_FILES['imagen']['tmp_name'], $ruta);
        $datos= [
            'idusuario' => trim($_POST['id_user']),
            'ruta' => $rutaImagen
        ];

        $imagenActual= $this->usuario->getPerfil($datos['idusuario']);
        unlink('C:/xampp/htdocs/YachayConnect/public/' . $imagenActual->fotoPerfil);
        if ($this->perfil->editarFoto($datos))
        {
            redirection('/home');
        }else{
            echo 'El perfil no se ha guardado';
        }
    }
}