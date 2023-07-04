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
                <a href="#" class="text center"><br>Publicaciones <br>0 | Me gustas <br>0</a>
            </div>
          </div>
        </div>

        <div class="containerP">
          <div class="containerT">
            <a class="custom-link">Temas que te pueden interesar</a>
          
            <div class="card">
                <h4>TY en el mundo</h4>
            </div>
            <div class="card">
                <a>Carreras mejor pagadas</a>
            </div>
            <div class="card">
                <a>Graduados por carrera</a>
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
                <button class="btn-subir">
                  <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                  <div class="input-file">
                    <input type="file" name="imagen" id="imagen">
                  </div>
                    Subir foto
                </button>
                <button class="btn-publi">Publicar</button>
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
