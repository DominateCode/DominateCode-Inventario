<?php
 class Response {
 	private function __construct(){
 		
 	}
 	public static function Render($View,$Vars = []){
 		foreach ($Vars as $Key => $Value) {
 			$$Key = $Value;
 		}
		require APP_PATH."views/".$View.".View.php";
 	}
 }
?>