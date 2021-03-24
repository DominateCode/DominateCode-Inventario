<?php
class Plugins{

    public function __construct(){
        
    }

    public function load_plugins(){
        $Plugins = common::FindFiles(PLUGINS,'php');
        //$MethodPlugin = 'IniciarPlugin';
        foreach($Plugins as $PluginFile){
            $PluginName = basename($PluginFile,'.php');
            require PLUGINS.$PluginFile;
            //$plugin = new $PluginName();    
            //$plugin->$MethodPlugin();
        }
   }
}


?>