<?php
class Publicaciones extends Controller
{
    public function __construct()
    {
        $this->publicar= $this->model('publicar');
    }
    public function publicar($idUsuario)
    {
        if (isset($_FILES['imagen'])){
            $carpeta="C:/xampp/htdocs/YachayConnect/public/img/imagenesPublicaciones/";
            opendir($carpeta);
            $rutaImagen= 'img/imagenesPublicaciones/' .  $_FILES['imagen']['name'];
            $ruta=$carpeta . $_FILES['imagen']['name'];
            copy($_FILES['imagen']['tmp_name'], $ruta);
        } else{
            $rutaImagen='Sin imagen';
        }

        $datos=[
            'iduser'=>trim($idUsuario),
            'contenido'=> trim($_POST['contenido']),
            'foto'=> $rutaImagen
        ];
        
        if ($this->publicar->publicar($datos)){
            redirection('/home');
        } else{
            echo 'Algo ocurrio';
        }
    }
    public function eliminar($idpublicacion)
    {
        $publicacion= $this->publicar->getPublicaion($idpublicacion);
        var_dump($publicacion);
        if($this->publicar->eliminarPublicacion($publicacion)){
            unlink('C:/xampp/htdocs/YachayConnect/public/' . $publicacion->fotoPublicacion);
            redirection('/home');
        }else{

        }
    }
    public function megusta($idpublicacion, $idusuario)
    {
        $datos=[
            'idpublicacion'=>$idpublicacion,
            'idusuario'=>$idusuario
        ];

        $datosPublicacion= $this->publicar->getPublicacion($idpublicacion);
        #var_dump($datosPublicacion);
        if ($this->publicar->rowLikes($datos)){
            if ($this->publicar->eliminarLike($datos)){
                $this->publicar->deleteLikeCount($datosPublicacion);
            }
            redirection('/home');
        }else {
            if ($this->publicar->agregarLike($datos)){
                $this->publicar->addLikeCount($datosPublicacion);
            }
            redirection('/home');
        }
    }
}