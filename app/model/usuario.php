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
        $this->db->query(' SELECT  Pi.idPrivilegio, P.idperfil, P.Carrer, P.Salary, P.idUsuario, P.PaisActual, P.nombreCompleto, P.fotoPerfil,
        P.fi_estudio, P.f_grado, P.ca_estudio, P.profesion, P.cedula, P.facebook, P.instagram, P.github,
        P.linkedin FROM perfil P 
        INNER JOIN usuarios U ON P.idUsuario= U.idusuario
        INNER JOIN privilegios Pi ON Pi.idPrivilegio= U.idPrivilegio WHERE U.idusuario=:id');
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
        $this->db->query('INSERT INTO usuarios(idPrivilegio, correo,BrithDay, usuario, contrasena) VALUES(:privilegio, :correo, :nacimiento, :usuario, :contrasena)');
        $this->db->bind(':privilegio', $datosUsuario['privilegio']); 
        $this->db->bind(':correo', $datosUsuario['email']);
        $this->db->bind(':nacimiento', $datosUsuario['brithday']); 
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
        $this->db->query('INSERT INTO perfil (Carrer,Salary,idUsuario,PaisActual,nombreCompleto,fotoPerfil,fi_estudio,
        f_grado,ca_estudio,profesion,cedula,facebook,instagram,github,linkedin	
        ) VALUES(:carrer, :salary, :id, :paisactual, :nombre, :rutaFoto, :estudio, :grado, :caestudio, :profesion, 
        :cedula, :facebook, :instagram, :github, :linkedin)');
        $this->db->bind(':carrer', $datos['carrer']); 
        $this->db->bind(':salary', $datos['salary']);  
        $this->db->bind(':id', $datos['idusuario']); 
        $this->db->bind(':paisactual', $datos['paisactual']); 
        $this->db->bind(':nombre', $datos['nombre']); 
        $this->db->bind(':rutaFoto', $datos['ruta']);
        $this->db->bind(':estudio', $datos['festudio']);
        $this->db->bind(':grado', $datos['fgrado']);
        $this->db->bind(':caestudio', $datos['caestudio']);
        $this->db->bind(':profesion', $datos['profesion']);
        $this->db->bind(':cedula', $datos['cedula']);
        $this->db->bind(':facebook', $datos['facebook']);
        $this->db->bind(':instagram', $datos['instagram']);
        $this->db->bind(':github', $datos['github']);
        $this->db->bind(':linkedin', $datos['linkedin']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function actlizaredes($datos)
    {
        $this->db->query('UPDATE perfil SET facebook = :facebook, instagram = :instagram, github= :github, linkedin=:linkedin WHERE idUsuario = :iduser');
        $this->db-> bind(':facebook', $datos['facebook']);
        $this->db-> bind(':instagram', $datos['instagram']);
        $this->db-> bind(':github', $datos['github']);
        $this->db-> bind(':linkedin', $datos['linkedin']);
        $this->db-> bind(':iduser',$datos['idusuario']);

        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function actinfor($datos)
    {
        $this->db->query('UPDATE perfil SET profesion = :profesion, Salary = :salario, cedula= :cedula, 
        PaisActual=:pais,fi_estudio=:fi_estudio,f_grado=:f_grado WHERE idUsuario = :iduser');
        $this->db-> bind(':profesion', $datos['profesion']);
        $this->db-> bind(':salario', $datos['salario']);
        $this->db-> bind(':cedula', $datos['cedula']);
        $this->db-> bind(':pais', $datos['paisactual']);
        $this->db-> bind(':fi_estudio',$datos['fiestudio']);
        $this->db-> bind(':f_grado',$datos['fgrado']);
        $this->db-> bind(':iduser',$datos['idusuario']);

        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}

