<?php

class App{
    //membuat controller, method dan param defaultnya
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        //call method parshing
        $url = $this->parseUrl();

        //cek controller
        if(isset($url[0])){
            if(file_exists('../app/controllers/' . $url[0] . '.php'));{//cek apakah controller tersedia di controllers
                $this->controller = $url[0];//mengubah controller default dengan controller yg ada pada url
                unset($url[0]);
            }

        }
        //call controller
        require_once '../app/controllers/'. $this->controller . '.php';
        $this->controller = new $this->controller;//lakukan instisiasi
        //cek method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //kelola param
        if(!empty($url)){
            $this->params = array_values($url);
        }
        //jalankan controller, method, kirim param
        call_user_func_array([$this->controller, $this->method], $this->params);
    }


    //parshing url
    public function parseUrl()
    {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/'); //delete tanda /
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}