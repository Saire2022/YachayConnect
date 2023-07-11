<?php
include_once URL_APP . '/view/custom/header.php';
?>
<form action="<?php echo URL_PROJECT ?>/home/accederCompletarPefil" method="POST">
    <button type="submit" class="btn btn-primary" name="btnGraduado">Graduado de Yachay</button>
    <button type="submit" class="btn btn-primary" name="btnEstudiante">Estudiante de Yachay</button>
    <a class="dropdown-item text-dark bg-transparent" href="<?php echo URL_PROJECT?>/home/logout" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='transparent'">Salir</a>
</form>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>
