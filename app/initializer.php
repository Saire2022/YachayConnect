<?php
//Llamando a config
include_once "config/config.php";
//Llamando a helper
include_once "helpers/helper.php";
//Llamando a libs
spl_autoload_register(function($file) {
    include_once "libs/" . $file . ".php";
});