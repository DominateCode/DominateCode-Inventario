<?php
namespace app\controllers;

//use app\models\User;
use \Response;

class EmailController{

    public function Main(){
        Response::render("email",[]);
    }
}

?>