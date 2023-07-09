<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';

?>

<body>
  <div class="container-fluid ">
    <div class="row h-100">
          <!-- Columna perfil -->
      <div class="col-md-4">

        <div class="containerP">
          <div class="card">
            <div class="imgBx">
                <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" alt="FotoPerfil" >
              <h4>
                <a href="<?php echo URL_PROJECT?>/perfil/index/<?php echo $datos['usuario']->usuario?>"><div class="text-center texto"></br><?php echo $datos['perfil']->nombreCompleto ?></div></a>
              </h4>
              <ul class="list-inline">
                <li class="list-inline-item">Publicaciones <br> 0</li>
                <li class="list-inline-item">|</li>
                <li class="list-inline-item">Me gustas<br>0</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Interesting Information -->
        <div class="containerCards">
          <h4 class="text-center">Temas que te pueden interesar</h4>

          <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
            <img src="<?php echo URL_PROJECT ?>/img/RegisterBackground.png" class="card-img-top" alt="TY en el Mundo">
              <div class="card-body">
                <h5 class="card-title">YT en el mundo!</h5>
                <p class="card-text">En el siguiente apartado se puede observar a nuestros graduados alrededor de mundo.</p>
                <a href="#" class="btn btn-primary center">Ver</a>
              </div>
          </div>

          <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
            <img src="<?php echo URL_PROJECT ?>/img/RegisterBackground.png" class="card-img-top" alt="TY en el Mundo">
              <div class="card-body">
                <h5 class="card-title">YT en el mundo!</h5>
                <p class="card-text">En el siguiente apartado se puede observar a nuestros graduados alrededor de mundo.</p>
                <a href="#" class="btn btn-primary center">Ver</a>
              </div>
          </div>

          <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
            <img src="<?php echo URL_PROJECT ?>/img/RegisterBackground.png" class="card-img-top" alt="TY en el Mundo">
              <div class="card-body">
                <h5 class="card-title">YT en el mundo!</h5>
                <p class="card-text">En el siguiente apartado se puede observar a nuestros graduados alrededor de mundo.</p>
                <a href="#" class="btn btn-primary center">Ver</a>
              </div>
          </div>
          
        </div>
      </div>
        


      <!-- Columna principal -->
      <div class="col-md-6">
        <div class="ContainerPublic">
<<<<<<< HEAD
          <a href="<?php echo URL_PROJECT?>/perfil"><img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" width="30px" height="30px"></a>
=======
          <a href="<?php echo URL_PROJECT?>/perfil/index/<?php echo $datos['usuario']->usuario?>"><img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt="" width="30px" height="30px"></a>
>>>>>>> 9647abccb58872f6368b8085fd9be5541bda0a5a
          <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $datos['usuario']-> idusuario?>" method="POST" enctype="multipart/form-data" class="form-publicar ml-2">
          <textarea name="contenido" id="contenido" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
            <div class="imgBx">
              <div class="upload-photo">
<<<<<<< HEAD
                  <button class="btn btn-primary btn-block" id="btnSubirFoto">
                    <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">

                    Subir foto
                  </button>
                <input type="file" name="imagen" class="form-control" id="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload" style="display: none"> 
=======
                <button class="btn btn-primary btn-block">
                  <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                  <div class="input-file">
                  <input type="file" name="imagen" id="imagen">
                  </div>
                    Subir foto
                </button>
                
                <input type="file" name="imagen" id="imagen">
>>>>>>> 9647abccb58872f6368b8085fd9be5541bda0a5a
                <button class="btn btn-primary btn-block">Publicar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- Esto es para el cajon de las publicaciones -->
        <?php foreach ($datos['publicaciones'] as $datosPublicacion) :?>
<<<<<<< HEAD
          <div class="PubContainer">
            <div class="container-usuarios-publicaciones">
              <div class="usuarios-publicaciones-top">
                
                <?php if ($datosPublicacion->idusuario == $_SESSION['logueado']):?>
                  <div class =" acciones-publicacion-usuario">
                    <a href="<?php echo URL_PROJECT?>/publicaciones/eliminar/<?php echo $datosPublicacion->idpublicacion?>"><i class="far 
                    fa-trash-alt float-right"></i></a>
                  </div>
                <?php endif ?>
                <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil?>" alt="" class="image-border">
                <div class="informacion-usuario-publico">
                  <h6 class="mb-0 "><a href="<?php echo URL_PROJECT?>/perfil/index/<?php echo $datosPublicacion->usuario?>"><?php echo ucwords
                  ($datosPublicacion->usuario)?></a></h6>
                  <span><?php echo $datosPublicacion->fechaPublicacion?></span>
                </div>
              </div>
              <div class="cotenido-pubicacion-usuario">
                  <p class="mb-1"><?php echo $datosPublicacion-> contenidoPublicacion?></p>
                  <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion?>" alt="" class="cotenidoPhoto">
              </div>
              <hr>
              <!-- likes -->

              <div class="acciones-usuario-publicaciones mt-2">
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
                ">
                  <i class="fas fa-heart mr-1"></i>
                Me gusta <span><?php echo $datosPublicacion->num_likes?></span></a>
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
          </div>

          <!-- Comentarios cajones -->
        <!-- ---------------------------------------------------------------- -->
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


        <!-- ---------------------------------------------------------------- -->

        <!-- ---------------------------------------------------------------- -->

        <?php endforeach ?>
=======
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
>>>>>>> 9647abccb58872f6368b8085fd9be5541bda0a5a
      </div>
    </div>
  </div>
</body>

<?php
var_dump($datos['notificaciones']);

include_once URL_APP . '/view/custom/footer.php';
?>