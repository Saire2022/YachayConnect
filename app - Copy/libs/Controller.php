<!-- direccionar los urls -->

<?php

class Controller
{
    public function view($view , $params = []) {
        if(file_exists(URL_APP . "/views/" . $views . ".php")) {
            require_once URL_APP . "/views/" . $views . ".php";
        } else {
            echo "The view doesn't exist";
        }
    }

    public function model($model) {
        require_once URL_APP . "/model/" . $model . ".php";
        return new $model;
    }
}