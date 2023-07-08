<?php

include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container">
    <div class="container-fluid">
        <img src="<?php echo URL_PROJECT ?>/img/RegisterBackground.png" class="imagen-portada-perfil" width=100% height=400px>
        <div class="row h-100">
            <!-- Perfil -->
            <div class="col-md-4">
                <div class="containerPer">
                    <div class="cardP">
                        <div class="imgBxP">
                            <img src="<?php echo URL_PROJECT?>/<?php echo $datos['perfil']->fotoPerfil?>" class="imagen-perfil-usuario" alt="FotoPerfil">
                            <?php if ($datos['usuario']->idusuario==$_SESSION['logueado']) : ?>
                                <div class="imagen-perfil-cambiar">
                                    <form action="<?php echo URL_PROJECT?>/perfil/cambiarImagen" method="POST" enctype="multipart/form-data">
                                        <label for="imagen" class="camera-icon">
                                            <i class="fas fa-camera" id="camera-icon" style="position: absolute; top: -75px; left: 200px;font-size: 2em;"></i>
                                        </label>
                                        <input type="file" name="imagen" id="imagen" style="display: none;">

                                        <div class="editar-perfil">
                                                <button class="btn btn-primary btn-block">Editar</button>
                                            </div>
                                        <div class="input-file">
                                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado']?>">
                                        </div>
                                            
                                </form>
                                </div>
                            <?php endif ?>
                            <div class="datos-personales-usuario">
                                <h3><?php echo ucwords ($datos['usuario']->usuario)?></h3>
                                <div class="descripcion-usuario">
                                    <span><?php echo $datos['perfil']->nombreCompleto?></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publicar -->
            <div class="col-md-6">
                <div class="ContainerPublic">
                    <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) : ?>
                            <a href="<?php echo URL_PROJECT?>/perfil/<?php echo $datos['usuario']->usuario?>">
                            <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt=""></a>
                            <form action="" class="form-publicar ml-2">
                                <textarea name="" id="" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
                                <div class="imgBx">
                                    <div class="upload-photo">
                                        <label for="imagen" class="btnSubirFoto">
                                            <div class="upload-photo">
                                                <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                                                <span class="btn btn-primary btn-block">Subir foto</span>    
                                            </div>
                                        </label>
                                        <button class="btn btn-primary btn-block">Publicar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endif ?>  
                </div>      
            </div>
            <!-- Mensajeria -->  

            <!-- <div class="col-md-1">
                <div class="container-usuario-contact">
                    <a href="" class="btn btn-primary btn-block"><span class="big"><i class="far fa-envelope"></i></span>Mensaje</a>
                </div>
            </div> -->
            <!-- <?php var_dump($datos['publicaciones'][0]->idUserPublico);?>
            <?php var_dump($datos['publicaciones'])->idUserPublico;?> -->
            <?php if ($datos['publicaciones']->idUserPublico==$_SESSION['logueado']) : ?>
                <?php foreach ($datos['publicaciones'] as $datosPublicacion) :?>
          <div class="container-usuarios-publicaciones">
            <div class="usuarios-publicaciones-top">
              <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil?>" alt="" class="image-border">
              <div class="informacion-usuario-publico">
                <h6 class="mb-0"><a href="<?php echo URL_PROJECT?>/perfil/index/<?php echo $datosPublicacion->usuario?>"><?php echo ucwords
                ($datosPublicacion->usuario)?></a></h6>
                <span><?php echo $datosPublicacion->fechaPublicacion?></span>
              </div>
              <?php if ($datosPublicacion->idusuario == $_SESSION['logueado']):?>
                <div class =" acciones-publicacion-usuario">
                  <a href="<?php echo URL_PROJECT?>/publicaciones/eliminar/<?php echo $datosPublicacion->idpublicacion?>"><i class="far 
                  fa-trash-alt"></i></a>
                </div>
              <?php endif ?>
            </div>
            <div class="cotenido-pubicacion-usuario">
                <p class="mb-1"><?php echo $datosPublicacion-> contenidoPublicacion?></p>
                <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion?>" alt="" class="imagen-publicacion-usuario">
            </div>
            <hr>
            <!-- likes -->
            <div class="acciones-usuario-publicar mt-2">
              <a href="<?php echo URL_PROJECT ?>/publicaciones/megusta/<?php echo $datosPublicacion->idpublicacion . '/' . $_SESSION['logueado'] . '/'
              . $datosPublicacion->idusuario?>"
              class="
                     
                     <? foreach ($datos['misLikes'] as $misLikesUser){
                      if ($misLikesUser->idPublicacion==$datosPublicacion->idpublicacion){
                        echo 'like-active';
                      }
                    }
                    ?>
              "><i class="fas fa-heart mr-1"></i>Me gusta <span><?php echo $datosPublicacion->num_likes?></span></a>
            </div>
            <!-- Comentarios -->
            <hr>
            <div class="formulario-comentarios">
              <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" alt="" class='image-border mr-2'>
              <div class="acciones-formulario-comentario">
                <form action="<?php echo URL_PROJECT ?>/publicaciones/comentar" method="POST">
                  <input type="hidden" name="iduserPropietario" value="<?php echo $datosPublicacion->idusuario?>">
                  <input type="hidden" name="iduser" value="<?php echo $datos['usuario']->idusuario?>">
                  <input type="hidden" name="idpublicacion" value="<?php echo $datosPublicacion->idpublicacion?>">
                  <input type="text" name="comentario"class='form-comentario-usuario' placeholder="Agregar un comentario">
                  <div class="btn-comentario-container">
                    <button class="btn-purple">Comentar</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- Comentarios cajones -->
            <?php foreach ($datos['comentarios'] as $datosComentarios):?>
              <?php if ($datosComentarios->idPublicacion == $datosPublicacion->idpublicacion):?>
                <div class="contianer-contenido-comentario">
                <img src="<?php echo URL_PROJECT . '/' . $datosComentarios->fotoPerfil?>" alt="" class='image-border mr-2'>
                <div class="contenido-comentario-usuario">
                  <?php if ($datosComentarios->idusuario == $_SESSION['logueado']): ?>
                  <a href="<?php echo URL_PROJECT?>/publicaciones/eliminarComentario/<?php echo $datosComentarios->idcomentario?>"
                  class="float-right"><i class="far fa-trash-alt"></i></a>
                  <?php endif ?>
                  
                  <a href="<?php echo URL_PROJECT?>/perfil/index/<?php echo $datosComentarios->usuario?>" class="big mr-2"><?php echo
                  $datosComentarios->usuario?></a>

                  <span><?php echo $datosComentarios->fechaComentario?></span>
                  <p><?php echo $datosComentarios->contenidoComentario?></p>

                </div>
                </div>
              <?php endif?>
            <?php endforeach?>
          </div>
          <?php endforeach ?>

            <?php endif  ?>
            
        </div>
    </div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>