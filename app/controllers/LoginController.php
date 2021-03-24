<?php
namespace app\controllers;

use app\models\User;
use \Response;
use \common;
use \session;

class LoginController{
    public function Main(){
        common::console_log("sin datos de formulario");
        Response::render("login",[]);
    }
}

?>