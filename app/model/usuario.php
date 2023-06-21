<?php 

class usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }
    public function getUsuario($usuario)
    {
        $this->db->query('SELECT *FROM usuarios WHERE usuario= :user');
        $this->db->bind(':user',$usuario);
        return $this->db->register();
    }
     public function getPerfil($idusuario)
     {
        $this->db->query('SELECT *FROM perfil WHERE idUsuario= :id');
        $this->db->bind(':id',$idusuario);
        return $this->db->register();
     }

    public function verificarContrasena($datosUsuario,$contrasena)
    {
        if(password_verify($contrasena,$datosUsuario->contrasena)){
            return true;
        } else{
            return false;
        }
         
    }
   
    public function verificarUsuario($datosUsuario)
    {
        $this->db->query('SELECT usuario FROM usuarios WHERE  usuario = :user');
        $this->db->bind(':user' , $datosUsuario['usuario'] );
        $this->db->register();
        if($this->db->rowCount())
        {
            return false;
        }else{
            return true;
        }
    }

    public function register($datosUsuario)
    {
        //var_dump($datoUsuario);
        $this->db->query('INSERT INTO usuarios(idPrivilegio, correo, usuario, contrasena) VALUES(:privilegio, :correo, :usuario, :contrasena)');
        $this->db->bind(':privilegio', $datosUsuario['privilegio']); 
        $this->db->bind(':correo', $datosUsuario['email']); 
        $this->db->bind(':usuario', $datosUsuario['usuario']); 
        $this->db->bind(':contrasena', $datosUsuario['contrasena']); 

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }   

    public function insertarPerfil($datos)
    {
        $this->db->query('INSERT INTO perfil (Carrer,Salary,Major,idUsuario,PaisActual,nombreCompleto,fotoPerfil	
        ) VALUES(:carrer, :salary, :major, :id, :paisactual, :nombre, :rutaFoto)');
        $this->db->bind(':carrer', $datos['carrer']); 
        $this->db->bind(':salary', $datos['salary']); 
        $this->db->bind(':major', $datos['major']); 
        $this->db->bind(':id', $datos['idusuario']); 
        $this->db->bind(':paisactual', $datos['paisactual']); 
        $this->db->bind(':nombre', $datos['nombre']); 
        $this->db->bind(':rutaFoto', $datos['ruta']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
}

