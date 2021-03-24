<?php
namespace app\controllers;

//use app\models\User;
use \Response;

class AdminController{

    public function Main(){
        Response::render("admin",[]);
    }
}

?>