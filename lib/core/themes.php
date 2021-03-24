<?php
//esta clase es la encargada de cargar los archivos del tema
class themes
{
    private static $theme;

    private function __construct(){
    }

    public static function definir_tema(){
        static::$theme = Tema_name;
    }

    public static function getSheets(){ //obtiene las hojas de estilos existentes en la carpeta del tema
       $hojasestilos = array("style.css","estilos.css","fonts.css","screen.css","css.css");   
        foreach($hojasestilos as $sheet){
            if(file_exists(THEMES . "/". static::$theme . "/".$sheet)){
                echo('<link rel="Stylesheet" href="inc/themes/'.static::$theme.'/'.$sheet.'">');
            } 
            //else { echo('<link rel="stylesheet" href="themes/default/'.$sheet.'">');}
        } 
    }

    public static function getScripts(){
        $scripts = array("dashboard.js","theme.js");   
        foreach($scripts as $script){
            if(file_exists(THEMES . "/". static::$theme . "/".$script)){
                echo('<script src="inc/themes/'.static::$theme.'/'.$script.'"></script>');
            }
        }
    }

    public static function getThemeHeader(){
        include THEMES.Themes::$theme."/"."header.php";       
    }
    
    public static function getThemeFooter(){
        include THEMES.Themes::$theme."/"."footer.php";
    }
}

?>