<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';

?>

<body>
  <div class="container py-5">
    <div class="row ">
      <!-- Columna perfil -->
      <div class="col-lg-4">
        <br>
        <div class="card mb-4">
          <div class="card-body text-center">
            <div class="card-body text-center">
              <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>"class="imagen-perfil-usuario rounded-circle img-fluid" style="width: 150px;" alt="FotoPerfil">
              <h4 class="my-3">
                <a href="<?php echo URL_PROJECT ?>/perfil/index/<?php echo $datos['usuario']->usuario ?>">
                  <div class="text-center texto"></br>
                    <?php echo $datos['perfil']->nombreCompleto ?>
                    <!-- <?php var_dump($datos['carreras']) ?> -->
                  </div>
                </a>
              </h4>
              <ul class="list-inline texto">
                <li class="list-inline-item">Publicaciones <br> <?php echo $datos['numPubli']?></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Interesting Information -->
        <div class="card mb-4 mb-lg-0">
          <div class="card-body text-center">
            <h4 class="text-center texto">Temas que te pueden interesar</h4>
            <!-- Graduados por carrera -->
            <div style="width: 280px; height: 300px; margin: 0 auto;">
                <canvas id="donut-chart"></canvas>
            </div>
            <!-- Yachay en el mundo -->
            <div style="width: 280px; height: 300px; margin: 0 auto;">
                <canvas id="bar-chart"></canvas>
            </div>
            <!--------------------------------------GRADUADOS POR CARRERA--------------------------------------------------------------- -->
            <?php
              $labels = [];
              $data = [];

              foreach ($datos['carreras'] as $objeto) {
                  $labels[] = $objeto->ca_estudio;
                  $data[] = (int)$objeto->total_carreras;
              }
            ?>
            <script>
                // Arreglo de colores para las secciones del donut
                const colors = [
                    '#36A2EB',
                    '#FF6384',
                    '#FFCE56',
                    '#4BC0C0',
                    '#FF9F40',
                    '#9966FF',
                    '#33CCCC',
                    '#FF4444',
                    '#66CC33',
                    '#FFD700',
                    '#20B2AA'
                ];

                // Configuración del gráfico
                const config = {
                    type: 'doughnut', // Tipo de gráfico de donut
                    data: {
                        labels: <?php echo json_encode($labels); ?>, 
                        datasets: [{
                            data: <?php echo json_encode($data); ?>, // Datos para cada sección del donut
                            backgroundColor: colors, // Usamos el arreglo de colores definido anteriormente
                            borderWidth: 1 // Ancho del borde del donut
                        }]
                    },
                    options: {
                        cutoutPercentage: 70, // Porcentaje de corte para el donut
                        responsive: true, // 
                        legend: {
                            display: true, // Muestra la leyenda del gráfico
                            position: 'bottom'
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Graduados por carrera',
                            }
                        },
                    }
                };
                // Crea el gráfico de donut
                let chart = new Chart(document.getElementById('donut-chart'), config);
            </script>

             <!-- ----------------------------------------------------------------------------------------------->
             <!--------------------------------------GRADUADOS POR CARRERA--------------------------------------------------------------- --> 
             <?php
              $labelsPais = [];
              $dataGrado = [];

              foreach ($datos['graduados_pais'] as $objeto) {
                  $labelsPais[] = $objeto->PaisActual;
                  $dataGrado[] = (int)$objeto->graduados_pais;
              };
            ?>
            <script>
              const labelsChart = <?php echo json_encode($labelsPais); ?>;
              const dataGraduados = {
                labels: labelsChart,
                datasets: [{
                  label: 'Yachay tech en el mundo',
                  data: <?php echo json_encode($dataGrado); ?>,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
                  borderWidth: 1
                }]
              };
              const configBar = {
                type: 'bar',
                data: dataGraduados,
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                },
              };

              let chart2 = new Chart(document.getElementById('bar-chart'), configBar);
            </script>
            <!-- ----------------------------------------------------------------------------------------------->
          </div>
        </div>
      </div>
      <!-- Columna principal -->
      <div class="col-md-6">
        <div class="ContainerPublic">
          <a href="<?php echo URL_PROJECT ?>/perfil/index/<?php echo $datos['usuario']->usuario ?>">
            <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border" alt=""></a>
          <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $datos['usuario']->idusuario ?>"
            method="POST" enctype="multipart/form-data" class="form-publicar ml-2">
            <textarea name="contenido" id="contenido" class="published mb-0" name="post"
              placeholder="Que estas pensando?" required></textarea>
            <div class="upload-photo">
              <label for="imagen" class="btnSubirFoto">
                <div class="upload-photo">
                  <img src="<?php echo URL_PROJECT ?>/img/picture.png" alt="" class="image-public">
                  <span class="btn btn-primary btn-block">Subir foto</span>
                </div>
              </label>
              <input type="file" name="imagen" class="form-control" id="imagen" aria-describedby="inputGroupFileAddon04"
                aria-label="Upload" style="display: none" >
              <button class="btn btn-primary btn-block">Publicar</button>
            </div>
          </form>
        </div>
        <!-- Esto es para el cajon de las publicaciones -->
        <?php foreach ($datos['publicaciones'] as $datosPublicacion): ?>
          <div class="PubContainer">
            <div class="container-usuarios-publicaciones">
              <div class="usuarios-publicaciones-top">
                <?php if ($datosPublicacion->idusuario == $_SESSION['logueado']): ?>
                  <div class="acciones-publicacion-usuario">
                    <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminar/<?php echo $datosPublicacion->idpublicacion ?>"><i
                        class="far fa-trash-alt float-right"></i></a>
                  </div>
                <?php endif ?>
                <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil ?>" alt="" class="image-border">
                <div class="informacion-usuario-publico">
                  <h6 class="mb-0 "><a
                      href="<?php echo URL_PROJECT ?>/perfil/index/<?php echo $datosPublicacion->usuario ?>"><?php echo ucwords
                          ($datosPublicacion->usuario) ?></a></h6>
                  <span>
                    <?php echo $datosPublicacion->fechaPublicacion ?>
                  </span>
                </div>
              </div>
              
                <p class="mb-1 texto">
                <?php echo $datosPublicacion->contenidoPublicacion; ?>
                </p>
                <?php if ($datosPublicacion->fotoPublicacion != "Sin imagen"): ?>
                  <div class="image-container">
                    <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion; ?>" alt="IMG-publication" class="card-img-top">
                  </div>
                <?php endif ?>
              <hr>
              <!-- likes -->
              <div class="acciones-usuario-publicaciones mt-2">
                <a href="<?php echo URL_PROJECT ?>/publicaciones/megusta/<?php echo $datosPublicacion->idpublicacion . '/' . $_SESSION['logueado'] . '/'
                     . $datosPublicacion->idusuario ?>" class="
                      like-button
                      <? foreach ($datos['misLikes'] as $misLikesUser) {
                        if ($misLikesUser->idPublicacion == $datosPublicacion->idpublicacion) {
                          echo 'like-active';
                        }
                      }
                      ?>
                ">
                  <i class="fas fa-heart mr-1"></i>
                  Me gusta <span>
                    <?php echo $datosPublicacion->num_likes ?>
                  </span></a>
              </div>
              <!-- Comentarios -->
              <hr>
              <div class="formulario-comentarios">
                <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" alt="" class='image-border mr-2'>
                <div class="acciones-formulario-comentario">
                  <form action="<?php echo URL_PROJECT ?>/publicaciones/comentar" method="POST">
                    <input type="hidden" name="iduserPropietario" value="<?php echo $datosPublicacion->idusuario ?>">
                    <input type="hidden" name="iduser" value="<?php echo $datos['usuario']->idusuario ?>">
                    <input type="hidden" name="idpublicacion" value="<?php echo $datosPublicacion->idpublicacion ?>">
                    <input type="text" name="comentario" class='form-comentario-usuario'
                      placeholder="Agregar un comentario">
                    <div class="btn-comentario-container">
                      <button class="btn-purple">Comentar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Comentarios cajones -->
            <!-- ---------------------------------------------------------------- -->
            <button type="button" class="btn btn-primary" data-toggle="modal"
              data-target="#exampleModal-<?php echo $datosPublicacion->idpublicacion ?>">
              Ver comentarios!
            </button>
            <?php foreach ($datos['publicaciones'] as $datosPublicacion): ?>
              <!-- Modal de la publicación actual -->
              <div class="modal fade" id="exampleModal-<?php echo $datosPublicacion->idpublicacion ?>" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <img src="<?php echo URL_PROJECT . '/' . $datosComentarios->fotoPerfil ?>" alt=""
                              class="image-border mr-2">
                            <div class="contenido-comentario-usuario">
                              <?php if ($datosComentarios->idusuario == $_SESSION['logueado']): ?>
                                <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminarComentario/<?php echo $datosComentarios->idcomentario ?>"
                                  class="float-right"><i class="far fa-trash-alt"></i></a>
                              <?php endif ?>
                              <a href="<?php echo URL_PROJECT ?>/perfil/index/<?php echo $datosComentarios->usuario ?>"
                                class="big mr-2"><?php echo $datosComentarios->usuario ?></a>
                              <span>
                                <?php echo $datosComentarios->fechaComentario ?>
                              </span>
                              <p>
                                <?php echo $datosComentarios->contenidoComentario ?>
                              </p>
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
        </div>
      </div>
    </div>
</body>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>