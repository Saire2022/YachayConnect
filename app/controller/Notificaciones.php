<?php 

class Notificaciones extends Controller
{
    public function __construct()
    {
        $this->usuario = $this->model("usuario");
        $this->publicaciones = $this->model("publicar");
        $this->notificar= $this->model('notificacion');
    }

    public function index()
    {
        if(isset($_SESSION['logueado']))
        {
            $datosUsuario=$this->usuario->getUsuario($_SESSION['logueado']);
            $datosPefil= $this->usuario->getPerfil($_SESSION['logueado']);
            $misNotificaciones =$this->publicaciones->getNotificaciones($_SESSION['logueado']);
            $notificaciones=$this->notificar->obtenerNotificaciones($_SESSION['logueado']);

            $datos=[
                'perfil'=>$datosPefil,
                'usuario'=>$datosUsuario,
                'misNotificaciones'=>$misNotificaciones,
                'notificaciones'=> $notificaciones
            ];

            $this->view('pages/notificaciones',$datos);
        }else{
            redirection('/home');
        }
    }
     public function eliminar($id)
     {
        if(isset($_SESSION['logueado'])){
            if($this->notificar->eliminarNotificacion($id)){
                redirection('/notificaciones');
            }else{
                redirection('/notificaciones');
            }
        }else{
            redirection('/home');
        }
     }
}