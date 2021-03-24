<?php

class ip{
    
    public function __construct(){
    }

    function getUserIpAddress() {
        foreach ( [ 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR' ] as $key ) {
            // Comprobamos si existe la clave solicitada en el array de la variable $_SERVER 
            if ( array_key_exists( $key, $_SERVER ) ) {
    
                // Eliminamos los espacios blancos del inicio y final para cada clave que existe en la variable $_SERVER 
                foreach ( array_map( 'trim', explode( ',', $_SERVER[ $key ] ) ) as $ip ) {
    
                    // Filtramos* la variable y retorna el primero que pase el filtro
                    if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE ) !== false ) {
                        return $ip;
                    }
                }
            }
        }
        return '?'; // Retornamos '?' si no hay ninguna IP o no pase el filtro
    }

     //función que escribe la IP del cliente en un archivo de texto    
    public function write_visita (){
 
         //Indicar ruta de archivo válida
         $archivo="/visitas.txt";
 
         //Si que quiere ignorar la propia IP escribirla aquí, esto se podría automatizar
         $ip="mi.ip.";
         $new_ip=static::get_client_ip();
 
         if ($new_ip!==$ip){
             $now = new DateTime();
 
        //Distinguir el tipo de petición, 
        // tiene importancia en mi contexto pero no es obligatorio
 
         if (!$_GET) {
             $datos="*POST: ".$_POST;
         }else{
             //Saber a qué URL se accede
             $peticion = explode('/', $_GET['PATH_INFO']);
             $datos=str_pad($peticion[0],10).' '.$peticion[1];   
         }

         $txt =  str_pad($new_ip,25). " ".
                 str_pad($now->format('Y-m-d H:i:s'),25)." ".
                 str_pad(static::ip_info($new_ip, "Country"),25)." ".json_encode($datos);
         common::console_log($txt);
         //$myfile = file_put_contents($archivo, $txt.PHP_EOL , FILE_APPEND);
         }
    }
 
 
    //Obtiene la IP del cliente
    function get_client_ip() {
         $ipaddress = '';
         if (getenv('HTTP_CLIENT_IP'))
             $ipaddress = getenv('HTTP_CLIENT_IP');
         else if(getenv('HTTP_X_FORWARDED_FOR'))
             $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
         else if(getenv('HTTP_X_FORWARDED'))
             $ipaddress = getenv('HTTP_X_FORWARDED');
         else if(getenv('HTTP_FORWARDED_FOR'))
             $ipaddress = getenv('HTTP_FORWARDED_FOR');
         else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
         else if(getenv('REMOTE_ADDR'))
             $ipaddress = getenv('REMOTE_ADDR');
         else
             $ipaddress = 'UNKNOWN';
         return $ipaddress;
    }
     
    //Obtiene la info de la IP del cliente desde geoplugin

    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
         $output = NULL;
         if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
             $ip = $_SERVER["REMOTE_ADDR"];
             if ($deep_detect) {
                 if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                 if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                     $ip = $_SERVER['HTTP_CLIENT_IP'];
             }
         }
         $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
         $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
         $continents = array(
             "AF" => "Africa",
             "AN" => "Antarctica",
             "AS" => "Asia",
             "EU" => "Europe",
             "OC" => "Australia (Oceania)",
             "NA" => "North America",
             "SA" => "South America"
         );
         if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
             $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
             if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                 switch ($purpose) {
                     case "location":
                         $output = array(
                             "city"           => @$ipdat->geoplugin_city,
                             "state"          => @$ipdat->geoplugin_regionName,
                             "country"        => @$ipdat->geoplugin_countryName,
                             "country_code"   => @$ipdat->geoplugin_countryCode,
                             "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                             "continent_code" => @$ipdat->geoplugin_continentCode
                         );
                         break;
                     case "address":
                         $address = array($ipdat->geoplugin_countryName);
                         if (@strlen($ipdat->geoplugin_regionName) >= 1)
                             $address[] = $ipdat->geoplugin_regionName;
                         if (@strlen($ipdat->geoplugin_city) >= 1)
                             $address[] = $ipdat->geoplugin_city;
                         $output = implode(", ", array_reverse($address));
                         break;
                     case "city":
                         $output = @$ipdat->geoplugin_city;
                         break;
                     case "state":
                         $output = @$ipdat->geoplugin_regionName;
                         break;
                     case "region":
                         $output = @$ipdat->geoplugin_regionName;
                         break;
                     case "country":
                         $output = @$ipdat->geoplugin_countryName;
                         break;
                     case "countrycode":
                         $output = @$ipdat->geoplugin_countryCode;
                         break;
                 }
             }
         }
         return $output;
    }
}

new ip;

?>