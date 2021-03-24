<?php
//esta clase esta encargada de cargar la configuracion del sistema, variables de dominio, nombre del la aplicacion, tema, etc
class Config{

    private function __contruct(){
	}  
    
    public static function loadConfig(){
        $MatrizConfig = MODEL_JSON::matriz('sistema.json','sistema')[0];
        foreach ($MatrizConfig as $key => $value) {
            define($key,$value);
            $$key = $value;
        }
    }
}
?>