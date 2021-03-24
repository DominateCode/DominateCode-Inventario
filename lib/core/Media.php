<?php
class Media{
    public function __construct(){
        
    }

    public static function Files(){
        $media = common::FindFiles(MEDIA,"");
        $temp = array();
        $info;
        foreach ($media as $mediafile) {
            $info = pathinfo($mediafile);
            $temp[] = ["extension" => $info['extension'],"filename" => $mediafile];
        }
        return $temp;
    }
}
?>