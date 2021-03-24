<?php
class common{
    private function __construct(){
        
    }

    public static function getPageName(){
        echo Response::$page;
    }

    public static function FindFiles($foldername,$extension) {
        $temp = array();
        $Files = new DirectoryIterator($foldername);
        foreach ($Files as $filename){
            if($filename == '.' || $filename == '..'){
                continue;
            }
            if($filename->isFile()){
                if ($filename->getExtension() == $extension or $extension == '') {
                    $temp[] = $filename->getFilename();
                }
            }
        }
        return $temp;
    }

    public static function readDirectory($foldername) {
        $temp = array();
        $Files = scandir($foldername);
        foreach ($Files as $filename){
            if($filename == '.' || $filename == '..' ){
                continue;
            }
            if(is_dir($foldername.'/'.$filename)){
                $temp[] = $filename;
            }
        }
        return $temp;
    }

    public function console_log( $data ){
        echo '<script> console.log('. json_encode( $data ) .') </script>';
    }

    public function alert($msj){
        echo'<script type="text/javascript">
        alert("'.$msj.'");
        </script>';
    }
}

?>