<?php
class Application
{
    private $url_action = "";
    private $url_controller = "";

    public function __construct()
    {
        $this->splitUrl(); //funzione da creare per dividere l'URL
        if (file_exists('./application/controller/' . $this->url_controller . '.php')) {
            require './application/controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();
            if (method_exists($this->url_controller, $this->url_action)) {
                    $this->url_controller->{$this->url_action}();
            } else {
                $this->url_controller->index();
            }
        } else {
            require './application/controller/home.php';
            $home = new home();
            $home->index();
        }
    }
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // tolgo il carattere / dalla fine della stringa
            $url = rtrim($_GET['url'], '/');
            //rimuove tutti i caratteri illegali dall'URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //divido in un array in base al carattere /
            $url = explode('/', $url);

            // divido le parti dell'url in base a controller, azione e 3 parametri
            $this->url_controller = (isset($url[0]) ? $url[0] : null);
            $this->url_action = (isset($url[1]) ? $url[1] : null);
        }
    }
}
