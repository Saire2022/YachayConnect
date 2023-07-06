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
          <a href="<?php echo URL_PROJECT?>/perfil"><img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt="" width="30px" height="30px"></a>
          <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $datos['usuario']-> idusuario?>" method="POST" enctype="multipart/form-data" class="form-publicar ml-2">
            <textarea name="contenido" id="contenido" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
            <div class="imgBx">
              <div class="upload-photo">
                <button class="btn btn-primary btn-block">
                  <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                  <div class="input-file">
                  <input type="file" name="imagen" id="imagen">
                  </div>
                    Subir foto
                </button>
                
                <input type="file" name="imagen" id="imagen">
                <button class="btn btn-primary btn-block">Publicar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- Esto es para el cajon de las publicaciones -->
        <?php foreach ($datos['publicaciones'] as $datosPublicacion) :?>
          <div class="container-usuarios-publicaciones">
            <div class="usuarios-publicaciones-top">
              <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil?>" alt="" class="image-border">
              <div class="informacion-usuario-publico">
                <h6 class="mb-0"><a href="<?php echo URL_PROJECT?>/perfil/index/<?php echo $datosPublicacion->usuario?>"><?php echo ucwords
                ($datosPublicacion->usuario)?></a></h6>
                <span><?php echo $datosPublicacion->fechaPublicacion?></span>
              </div>
              <div class =" acciones-publicacion-usuario">
                <a href="<?php echo URL_PROJECT?>/publicaciones/eliminar/<?php echo $datosPublicacion->idpublicacion?>"><i class="far fa-trash-alt"></i></a>
              </div>
            </div>
            <div class="cotenido-pubicacion-usuario">
                <p class="mb-1"><?php echo $datosPublicacion-> contenidoPublicacion?></p>
                <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion?>" alt="" class="imagen-publicacion-usuario">
            </div>
            <hr>
            <div class="acciones-usuario-publicar mt-2">
              <a href="<?php echo URL_PROJECT ?>/publicaciones/megusta/<?php echo $datosPublicacion->idpublicacion . '/' . $_SESSION['logueado']?>"
              class="<?php if (isset($datosPublicacion->idpublicacion) && isset($datos['misLikes']) && is_array($datos['misLikes'])) {
                     foreach ($datos['misLikes'] as $misLikesUser){
                      if ($misLikesUser->idPublicacion==$datosPublicacion->idpublicacion){
                        echo 'like-active';
                      }
                    }
                    }?>
              "><i class="fas fa-heart mr-1"></i>Me gusta <span><?php echo $datosPublicacion->num_likes?></span></a>
              <a href=""><i class="fas fa-comment-alt mr-1"></i>Comentar</a>
            </div>
          </div>
          <?php endforeach ?>
      </div>
    </div>
  </div>
</body>

<?php
#var_dump($datos['publicaciones']);
include_once URL_APP . '/view/custom/footer.php';
?>