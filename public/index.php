<?php

//inicializador 
require_once '../app/initializer.php';

// llamando a URL helper

require_once 'helpers/url_helper.php';

//llamando a libs

spl_autoload_register(function($files){
    require_once 'libs/' . $files . '.php';

});