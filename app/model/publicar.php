<?php
class publicar
{
    public function __construct()
    {
        $this->db =new Base;
    }
    public function publicar($datos)
    {
        $this->db->query('INSERT INTO publicaciones (idUserPublico, contenidoPublicacion, fotoPublicacion) VALUES (:iduser, :contenido, :foto)');
        $this->db->bind(':iduser',$datos['iduser']);
        $this->db->bind(':contenido',$datos['contenido']);
        $this->db->bind(':foto',$datos['foto']);

        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }
    public function getPublicaciones()
    {
        $this->db->query('SELECT U.idusuario, P.idUserPublico, P.num_likes, P.idpublicacion, P.contenidoPublicacion, P.fotoPublicacion, P.fechaPublicacion, U.usuario, Per.fotoPerfil FROM publicaciones P
        INNER JOIN usuarios U ON U.idusuario = P.idUserPublico
        INNER JOIN perfil Per ON Per.idUsuario=P.idUserPublico');
        return $this->db->registers();
    }

    public function getPublicacionesMain($id)
    {
        $this->db->query('SELECT U.idusuario, P.idUserPublico, P.num_likes, P.idpublicacion, P.contenidoPublicacion, P.fotoPublicacion, P.fechaPublicacion, U.usuario, Per.fotoPerfil FROM publicaciones P
        INNER JOIN usuarios U ON U.idusuario = P.idUserPublico
        INNER JOIN perfil Per ON Per.idUsuario=P.idUserPublico WHERE U.idusuario=:id');
        $this->db->bind(':id', $id);
        return $this->db->registers();
    }
    public function getPublicacionesUser($id)
    {
        $this->db->query('SELECT idUserPublico FROM publicaciones WHERE idUserPublico =:id');
        $this->db->bind(':id', $id);
        return $this->db->register();
    }

    public function getPublicacion($id)
    {
        $this->db->query('SELECT *FROM publicaciones WHERE idpublicacion=:id');
        $this->db->bind(':id', $id);
        return $this->db->register();
    }

    public function eliminarPublicacion($publicacion)
    {
        $this->db->query('DELETE FROM publicaciones WHERE idpublicacion=:id');
        $this->db->bind(':id', $publicacion->idpublicacion);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function rowLikes($datos)
    {
        $this->db->query('SELECT *FROM likes WHERE idPublicacion=:publicacion AND idUser=:iduser');
        $this->db->bind(':publicacion', $datos['idpublicacion']);
        $this->db->bind(':iduser', $datos['idusuario']);
        $this->db->execute();
        return $this->db->rowCount();
        
    }

    public function numPublicaciones($id)
    {
        $this->db->query('SELECT *FROM publicaciones WHERE idUserPublico=:iduser');
        $this->db->bind(':iduser', $id);
        $this->db->execute();
        return $this->db->rowCount();
        
    }

    public function agregarLike($datos)
    {
        $this->db->query('INSERT INTO likes (idPublicacion,idUser) VALUES (:publicacion,:iduser)');
        $this->db->bind(':publicacion', $datos['idpublicacion']);
        $this->db->bind(':iduser', $datos['idusuario']);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function eliminarLike($datos)
    {
        $this->db->query('DELETE FROM likes WHERE idPublicacion=:publicacion AND idUser=:iduser');
        $this->db->bind(':publicacion', $datos['idpublicacion']);
        $this->db->bind(':iduser', $datos['idusuario']);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function addLikeCount($datos)
    {
        $this->db->query('UPDATE publicaciones SET num_likes = :countLike WHERE idpublicacion=:idPublicacion');
        $this->db->bind(':countLike',($datos->num_likes+1));
        $this->db->bind(':idPublicacion', $datos->idpublicacion);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function deleteLikeCount($datos)
    {
        $this->db->query('UPDATE publicaciones SET num_likes = :countLike WHERE idpublicacion=:idPublicacion');
        $this->db->bind(':countLike',($datos->num_likes-1));
        $this->db->bind(':idPublicacion', $datos->idpublicacion);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }
    public function misLikes($user)
    {
        $this->db->query('SELECT *FROM likes WHERE idUser=:id');
        $this->db->bind(':id', $user);
        return $this->db->register();
    }
    public function publicarComentario($datos)
    {
        $this->db->query('INSERT INTO comentarios (idPublicacion,idUser,contenidoComentario) VALUES (:idpubli,:iduser,:comentario)');
        $this->db->bind(':idpubli', $datos['idpublicacion']);
        $this->db->bind(':iduser', $datos['iduser']);
        $this->db->bind(':comentario', $datos['comentario']);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function getComentarios()
    {
        $this->db->query('SELECT *FROM comentarios');
        return $this->db->registers();
    }

    public function getInformacionComentarios($comentarios)
    {
        $this->db->query('SELECT C.idcomentario, C.idPublicacion, C.contenidoComentario, C.fechaComentario, P.fotoPerfil, U.usuario, U.idusuario FROM comentarios C
        INNER JOIN perfil P ON P.idUsuario=C.idUser
        INNER JOIN usuarios U ON U.idusuario =C.idUser');
        return $this->db->registers();
    }

    public function eliminarComentarioUsuario($id)
    {
        $this->db->query('DELETE FROM comentarios WHERE idcomentario =:id'); 
        $this->db->bind(':id',$id);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }
    public function addNotificacionLike($datos)
    {
        $this->db->query('INSERT INTO notificaciones (idUsuario,tipoNotificaion,usuarioAccion,id_publicacion) VALUES (:idusuario,:tipo,:usuarioAccion,:idpublicacion)');
        $this->db->bind(':idusuario',$datos['idusuarioPropietario']);
        $this->db->bind(':tipo',1);
        $this->db->bind(':usuarioAccion',$datos['idusuario']);
        $this->db->bind(':idpublicacion',$datos['idpublicacion']);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }
    public function addNotificacionComentario($datos)
    {
        $this->db->query('INSERT INTO notificaciones (idUsuario,tipoNotificaion,usuarioAccion,id_publicacion) VALUES (:idusuario,:tipo,:usuarioAccion,:idpublicacion)');
        $this->db->bind(':idusuario',$datos['iduserPropietario']);
        $this->db->bind(':tipo',2);
        $this->db->bind(':usuarioAccion',$datos['iduser']);
        $this->db->bind(':idpublicacion',$datos['idpublicacion']);
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function getNotificaciones($id)
    {
        $this->db->query('SELECT idnotificacion FROM notificaciones WHERE idUsuario =:id');
        $this->db->bind(':id',$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    /* Carreraaaaaaaas */
    public function numcarreras()
    {
        $this->db->query("SELECT ca_estudio, COUNT(ca_estudio) AS total_carreras FROM perfil 
        WHERE ca_estudio IS NOT NULL AND ca_estudio <> '' GROUP BY ca_estudio");
        return $this->db->registers();
    }
    /* Estuadiantes por paises */
    public function grdpais()
    {
        $this->db->query("SELECT PaisActual, COUNT(PaisActual) AS graduados_pais
        FROM perfil WHERE PaisActual IS NOT NULL AND PaisActual <> ''  GROUP BY PaisActual");
        return $this->db->registers();
    }
    /* carreras mejores pagadas */
    public function mejorespagadas()
    {
        $this->db->query("SELECT profesion, COUNT(profesion) AS mejor_carreras
        FROM perfil WHERE profesion IS NOT NULL AND profesion <> '' AND Salary> 1000 GROUP BY profesion");
        return $this->db->registers();
    }
}
