<!-- controllar los  urls -->
<?php

class Core
{
    protected $currentController = 'home';
    protected $currentMEthod = 'index';
    protected $parameters = [];

    public function__construct()
    {
        $url = $this->getUrl();

        if(file_exists('../app/controller' . ucwords($url[0]) . '.php'))
        {
            $this->currentController = ucwords($url[0]);

            unset($url[0]);
            
        }
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;
    }

    public function getUrl()
    {
        if (isset($_GET['url'])){
            $url  = rtrim($_GET['url'], '/' );
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
