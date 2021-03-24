<?php

/*Esta clase captura los modelos json en el directorio de modelos*/

class MODEL_JSON{

    private function __contruct(){
		
	}

    static function getContents($filename){
       return file_get_contents(APP_PATH."models/".$filename);
    }
    
    static function jsonDecode($filename){
        return json_decode(static::getContents($filename),true);
    }
    
    static function delete($model,$matriz,$id){
        $id = (int) $id;
        $all = file_get_contents($model);
        $all = json_decode($all, true);
        $jsonfile = $all[$matriz];
        $jsonfile = $jsonfile[$id];
    
        if ($jsonfile) {
            unset($all[$matriz][$id]);
            $all[$matriz] = array_values($all[$matriz]);
            file_put_contents($model, json_encode($all));
        }
    }
    
    static function query($model,$matriz,$id){
        $id = (int) $id;
        $getfile = file_get_contents($model);
        $jsonfile = json_decode($getfile, true);
        $jsonfile = $jsonfile[$matriz];
        $jsonfile = $jsonfile[$id];
    }

    static function matriz($model,$matriz){
        $jsonfile = static::jsonDecode($model);
        return $jsonfile = $jsonfile[$matriz];
    }

    static function edit($model,$matriz,$params = []){
        $id = (int) $_POST["id"];
        $getfile = file_get_contents($model);
        $all = json_decode($getfile, true);
        $jsonfile = $all[$matriz];
        $jsonfile = $jsonfile[$id];
    
        if ($jsonfile) {
            unset($all[$matriz][$id]);
            $all[$matriz][$id] = $post;
            $all[$matriz] = array_values($all[$matriz]);
            file_put_contents($model, json_encode($all));
        }
    }
    
    static function add($model,$matriz,$add){
            $file = file_get_contents($model);
            $data = json_decode($file, true);
            unset($add);
            $data[$matriz] = array_values($data[$matriz]);
            array_push($data[$matriz], $_POST);
            file_put_contents($model, json_encode($data));   
    }
}

?>