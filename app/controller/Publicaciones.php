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
        $publicacion= $this->publicar->getPublicacion($idpublicacion);
        var_dump($publicacion);
        if($this->publicar->eliminarPublicacion($publicacion)){
            unlink('C:/xampp/htdocs/YachayConnect/public/' . $publicacion->fotoPublicacion);
            redirection('/home');
        }else{

        }
    }
    public function megusta($idpublicacion, $idusuario,$idusuarioPropietario)
    {
        $datos=[
            'idpublicacion'=>$idpublicacion,
            'idusuario'=>$idusuario,
            'idusuarioPropietario'=> $idusuarioPropietario
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
                $this->publicar->addNotificacionLike($datos);
                
            }
            redirection('/home');
        }
    }

    public function comentar()
    {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos=[
                'iduserPropietario'=>trim($_POST['iduserPropietario']),
                'iduser'=>trim($_POST['iduser']),
                'idpublicacion'=>trim($_POST['idpublicacion']),
                'comentario'=>trim($_POST['comentario'])
            ];
            if ( $this->publicar->publicarComentario($datos)){
                $this->publicar->addNotificacionComentario($datos);
                redirection('/home');
            }else{
                redirection('/home');
            }
        }else{
            redirection('/home');
        }
    }

    public function eliminarComentario($id)
    {
        if($this->publicar->eliminarComentarioUsuario($id)){
            redirection('/home');
        }else{
            redirection('/home');
        }
    }
}