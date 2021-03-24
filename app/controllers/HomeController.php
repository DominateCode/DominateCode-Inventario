<?php
namespace app\controllers;

//use app\models\User;
use \Response;

class HomeController
{
    public function Main(){
        Response::render("home",[]);
    }
}

?>