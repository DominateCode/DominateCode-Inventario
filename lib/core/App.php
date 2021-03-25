<?php

class App{
    protected $controller = "HomeController";
    protected $method = "Main";
    protected $params = [];

    public function __construct(){
        
        session_start();
        
        Config::loadConfig(); //carga configuracion de la app
        Plugins::load_plugins(); //carga los plugins disponibles
        themes::definir_tema(); //carga los archivos del tema segun la configuracion de la app

        $this->op1();
        
    }
    public function parseUrl(){
        if(isset($_GET["url"])){// Session::checklogin() && 
            return explode("/",filter_Var(rtrim($_GET["url"],"/"),FILTER_SANITIZE_URL));
        }//else{ return ['Login'];}
    }
    public function op1(){
        $url = ($this->parseUrl() == null) ? ['Home'] : $this->parseUrl(); //si no se espesifica la pagina, entonces toma la pagina Home
        $controllerName = ucfirst(strtolower($url[0]))."Controller"; //carga el nombre del controlador de la ruta
        if(file_exists(APP_PATH."controllers/".$controllerName.".php")){
            $this->controller = "app\\controllers\\".$controllerName;
            unset($url[0]);
        //}
            require APP_PATH."controllers/".$controllerName.".php"; //requerimos de forma dinamica el controlador de la aplicacion

            $this->controller = new $this->controller; //instanciamos el controlador

            if (isset($url[1])) { 
                $methodName = "Main";//"action".ucfirst(strtolower($url[1]));

                if (method_exists($this->controller, $methodName)) { //verifica si el metodo existe
                    $this->method = $methodName;
                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : $this->params; //validar existencia y obtener parametros de la url
            
            call_user_func_array([$this->controller,$this->method],$this->params); //llama al metodo en el controlador
        }
    }

    public function op2(){
        $url = (!isset($_GET["url"])) ? 'home' : $_GET["url"]; // si no se espesifica la pagina, entonces toma la pagina por defecto, "index"
 
        try {
            $action = Router::getAction($url);
            $controllerName = $action["controller"];
            $method = $action["method"];

            require APP_PATH."controllers/".$controllerName.".php";
    
            $controller = new $controllerName();
            $controller->$method();
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

?>