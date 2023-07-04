<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
//var_dump($datos['usuario']);
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
          <form action="" class="form-publicar ml-2">
            <textarea name="" id="" class="published mb-0" name="post" placeholder="Que estas pensando?" required></textarea>
            <div class="imgBx">
              <div class="upload-photo">
                <button class="btn btn-primary btn-block">
                  <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                  <div class="input-file">
                    <input type="file" name="imagen" id="imagen">
                  </div>
                    Subir foto
                </button>

                <button class="btn btn-primary btn-block">Publicar</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>
