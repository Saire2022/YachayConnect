<?php
class Perfil extends Controller
{
    public function  __construct()
    {
        $this-> perfil= $this->model('perfilUsuario');
        $this-> usuario= $this->model('usuario');
        $this->publicaciones = $this->model("publicar");
    }
    public function index($user)
    {
        if (isset($_SESSION['logueado'])){
            $datosUsuario= $this->usuario->getUsuario($user);
            $datosPerfil= $this->usuario->getPerfil($datosUsuario->idusuario);

            $datosPerfil2=$this->usuario->getPerfil($_SESSION['logueado']);
            $datosPublicaciones= $this->publicaciones->getPublicaciones();
            $datosPublicacionesUser= $this->publicaciones->getPublicacionesUser($datosPerfil->idUsuario);
            $datosPublicacionesMain= $this->publicaciones->getPublicacionesMain($datosPerfil->idUsuario);
            $verificarLikes = $this->publicaciones->misLikes($_SESSION['logueado']);
            $comentarios=$this->publicaciones->getComentarios();
            $informacionComentarios=$this->publicaciones->getInformacionComentarios($comentarios);
            $misNotificaciones =$this->publicaciones->getNotificaciones($_SESSION['logueado']);
            $datos=[
                'perfil'=> $datosPerfil,
                'perfil2'=>$datosPerfil2,
                'usuario'=> $datosUsuario,
                'publicaciones'=>$datosPublicaciones,
                'publicacionesUser'=>$datosPublicacionesUser,
                'publicacionesMain'=>$datosPublicacionesMain,
                'misLikes'=> $verificarLikes,
                'comentarios'=>$informacionComentarios,
                'misNotificaciones'=> $misNotificaciones
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