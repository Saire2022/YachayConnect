<?php 

class Users
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function verificarUsuario($datoUsuario)
    {
        $this->db->query('SELECT usuario FROM usuarios WHERE  usuario = :user');
        $this->db->bind(':user' , $datoUsuario['usuario'] );
        if($this->db->rowCount())
        {
            return false;
        }else{
            return true;
        }
    }

    public function register($datoUsuario)
    {
        //var_dump($datoUsuario);
       $this->db->query('INSERT INTO usuarios(idPrivilegio, correo, usuario, contrasena) VALUES(:privilegio, :correo, :usuario, :contrasena)');
        $this->db->bind(':privilegio', $datoUsuario['privilegio']); 
        $this->db->bind(':correo', $datoUsuario['email']); 
        $this->db->bind(':usuario', $datoUsuario['usuario']); 
        $this->db->bind(':contrasena', $datoUsuario['contrasena']); 

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }   

}

