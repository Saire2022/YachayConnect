<?php
//Llamando a config
require_once "config/config.php";
//Llamando a helper
require_once "helpers/url_helper.php";
//Llamando a libs
spl_autoload_register(function($file) {
    require_once "libs/" . $file . ".php";
});