<?php

class Core 
{
    protected $currentController = "home";
    protected $currentMethod = "index";
    protected $parameters = [];

    public function __construct()
    {
        $url = $this->getURL();
        
        if(isset($url[0])) {
            $controllerName = ucwords($url[0]);
            $controllerFile = "../app/controller/" . $controllerName . ".php";
            
            if(file_exists($controllerFile)) {
                $this->currentController = $controllerName;
                unset($url[0]);
            } else {
                // Mostrar un mensaje de error o redirigir a una página de error
                echo "Controller not found";
                return;
            }
        }

        require_once "../app/controller/" . $this->currentController . ".php";
        $this->currentController = new $this->currentController;

        if(isset($url[1])) {
            if(method_exists($this->currentController , $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            } else {
                // Mostrar un mensaje de error o redirigir a una página de error
                echo "Method not found";
                return;
            }
        }

        $this->parameters = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController , $this->currentMethod] , $this->parameters);
    }

    public function getURL() {
        if(isset($_GET["url"])) {
            $url = rtrim($_GET["url"] , "/");
            $url = filter_var($url , FILTER_SANITIZE_URL);
            $url = explode("/" , $url);
            return $url;
        }
    }
}
?>
