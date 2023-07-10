<?php

include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>
<body>
  <div class="container-fluid">
    <div class="container-cover">
      <img src="<?php echo URL_PROJECT ?>/img/RegisterBackground.png" class="imagen-portada-perfil">
    </div>
      <div class="row h-100">
        <!-- Perfil -->
        <div class="col-md-4 overflow-auto">
          <div class="containerPerfil">
            <div class="cardPerfil">
              <div class="imgBxPerfil">
                <img src="<?php echo URL_PROJECT?>/<?php echo $datos['perfil']->fotoPerfil?>" class="imagen-perfil-usuario" alt="FotoPerfil">
                <?php if ($datos['usuario']->idusuario==$_SESSION['logueado']) : ?>
                  <div class="imagen-perfil-cambiar">
                    <form action="<?php echo URL_PROJECT?>/perfil/cambiarImagen" method="POST" enctype="multipart/form-data">
                      <button class="btn btn-primary btn-block">Editar</button>
                      <label for="imagen" class="camera-icon">
                        <i class="fas fa-camera" id="camera-icon" style="position: absolute; top: -50px; left: 200px;font-size: 2em;"></i>
                      </label>
                      <input type="file" name="imagen" id="imagen" style="display: none;">
                      <div class="input-file">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado']?>">
                      </div>
                                      
                    </form>
                  </div>
                <?php endif ?>
                  <h3><?php echo ucwords ($datos['usuario']->usuario)?></h3>
                  <div class="descripcion-usuario">
                    <span><?php echo  $datos['perfil']->nombreCompleto?></span>
                    <h6><?php echo 'Profesion: ' . $datos['perfil']->Carrer?></h6>
                    <h6><?php echo 'Salario: ' . $datos['perfil']->Salary?></h6>
                    <h6><?php echo 'Carrera que estudio: ' . $datos['perfil']->Major; ?></h6>
                </div> 
              </div>     
            </div>
          </div>
        </div>
        <!-- Publicar -->
        <div class="col-md-6">
<<<<<<< HEAD
          <?php if ($datos['usuario']->idusuario==$_SESSION['logueado']) : ?>
            <div class="ContainerPublic">
=======
          <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) : ?>
            <div class="ContainerPublicPerfil">
>>>>>>> ef746b25f7e36e9eb7f3e9c80f8334483c048d39
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
          <!-- Publicaciones y ademas solo para que salgan las del usuario -->
<!--           <?php var_dump($datos['publicacionesUser']);?>
          <br>
          <?php var_dump($datos['perfil']);?>
          <?php var_dump($datos['publicaciones']);?> -->
          <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) : ?>
            <!-- Publicaciones y ademas solo para que salgan las del usuario -->
            <?php foreach ($datos['publicaciones'] as $datosPublicacion) :?>
              <?php if ($datosPublicacion->idusuario == $_SESSION['logueado']):?>
                <div class="container-usuarios-publicaciones">
                  <div class="usuarios-publicaciones-top">
                    <?php if ($datosPublicacion->idusuario == $_SESSION['logueado']):?>
                      <div class =" acciones-publicacion-usuario">
                        <a href="<?php echo URL_PROJECT?>/publicaciones/eliminar/<?php echo $datosPublicacion->idpublicacion?>"><i class="far 
                        fa-trash-alt float-right"></i></a>
                      </div>
                    <?php endif?>
                    <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil?>" alt="" class="image-border">
                    <div class="informacion-usuario-publico">
                      <h6 class="mb-0"><a href="<?php echo URL_PROJECT?>/perfil/index/<?php echo $datosPublicacion->usuario?>"><?php echo ucwords
                      ($datosPublicacion->usuario)?></a></h6>
                      <span><?php echo $datosPublicacion->fechaPublicacion?></span>
                    </div>
                  </div>
                  <div class="cotenido-pubicacion-usuario">
                  <?php echo 'holaaaa4';?>
                    <p class="mb-1"><?php echo $datosPublicacion-> contenidoPublicacion?></p>
                    <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion?>" alt="" class="cotenidoPhoto">
                  </div>
                  <hr>
                  <!-- likes -->
                  <div class="acciones-usuario-publicar mt-2">
                    <a href="<?php echo URL_PROJECT ?>/publicaciones/megusta/<?php echo $datosPublicacion->idpublicacion . '/' . $_SESSION['logueado'] . '/'
                      . $datosPublicacion->idusuario?>"
                      class="
                        like-button
                        <? foreach ($datos['misLikes'] as $misLikesUser){
                          if ($misLikesUser->idPublicacion==$datosPublicacion->idpublicacion){
                            echo 'like-active';
                          }
                        }
                        ?>
                      "><i class="fas fa-heart mr-1"></i>Me gusta <span><?php echo $datosPublicacion->num_likes?></span></a>
                  </div>
                  <hr>
                  <!-- Comentarios -->
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
                </div>
                      <!-- Comentarios cajones -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-<?php echo $datosPublicacion->idpublicacion ?>">
                Ver comentarios!
              </button>

                  <?php foreach ($datos['publicaciones'] as $datosPublicacion): ?>
                    <!-- Modal de la publicación actual -->
                    <div class="modal fade" id="exampleModal-<?php echo $datosPublicacion->idpublicacion ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comentarios de la Publicación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <?php foreach ($datos['comentarios'] as $datosComentarios): ?>
                              <?php if ($datosComentarios->idPublicacion == $datosPublicacion->idpublicacion): ?>
                                <div class="contianer-contenido-comentario">
                                  <img src="<?php echo URL_PROJECT . '/' . $datosComentarios->fotoPerfil ?>" alt="" class="image-border mr-2">
                                  <div class="contenido-comentario-usuario">
                                    <?php if ($datosComentarios->idusuario == $_SESSION['logueado']): ?>
                                      <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminarComentario/<?php echo $datosComentarios->idcomentario ?>" class="float-right"><i class="far fa-trash-alt"></i></a>
                                    <?php endif ?>

                                    <a href="<?php echo URL_PROJECT ?>/perfil/index/<?php echo $datosComentarios->usuario ?>" class="big mr-2"><?php echo $datosComentarios->usuario ?></a>

                                    <span><?php echo $datosComentarios->fechaComentario ?></span>
                                    <p><?php echo $datosComentarios->contenidoComentario ?></p>
                                  </div>
                                </div>
                              <?php endif ?>
                            <?php endforeach ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                <!-- Fin modal -->
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>
        </div>        
        <!-- Mensajeria -->  

        <!-- <div class="col-md-1">
            <div class="container-usuario-contact">
                <a href="" class="btn btn-primary btn-block"><span class="big"><i class="far fa-envelope"></i></span>Mensaje</a>
            </div>
        </div> -->
        
    </div>
  </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>