<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
<<<<<<< HEAD
var_dump($datosRed);

/* if (isset($datosRed)) {
    $usuario = $datosRed['usuario'];
    $perfil = $datosRed['perfil'];
    // Resto de tu código que utiliza los datos de $datosRed
    var_dump($usuario);
    var_dump($perfil);
} else {
    echo "No hay datos de usuario";
} */
=======
var_dump($datos['perfil']);
>>>>>>> 5c443effa3a5c0476c5d56e7c397578ea7335ca6

?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Contenido del primer bloque -->
        </div>
        <div class="col-md-6">
            <!-- Contenido del segundo bloque -->
        </div>
        <div class="col-md-3">
            <!-- Contenido del tercer bloque -->
        </div>
    </div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>
