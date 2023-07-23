<?php
// Incluir la clase Base
include_once URL_APP . '/libs/Base.php';

// Crear una instancia de la clase Base
$base = new Base();

// Obtener los datos de la base de datos usando el método getChartData()
$chartData = $base->getChartData();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($chartData);
?>
