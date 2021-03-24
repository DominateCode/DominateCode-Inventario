<?php
class Autoloader {
    public function __construct(){
        $this->loadAppClasses();
        $this->loadModels();
        $this->loadlibs();
    }

    private function loadAppClasses(){
        spl_autoload_register(function($className) {
            require_once preg_replace("/\\\\/", "/", $className).".php";
        });
    }

    private function loadlibs(){
        $libs = common::FindFiles(LIB_PATH,'php');
        foreach($libs as $LibName){
            require_once LIB_PATH.$LibName;
        }
    }

    private function loadModels(){
        $models = common::FindFiles(APP_PATH."models/","php");
        foreach($models as $ModelName){
            require_once APP_PATH."models/".$ModelName;
        }
    }
}

new Autoloader();

?>