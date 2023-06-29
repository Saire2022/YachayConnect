<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
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
