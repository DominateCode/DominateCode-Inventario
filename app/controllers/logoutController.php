<?php
namespace app\controllers;

use app\models\users;
//use \common;
use \session;

class logoutController{
    public function Main(){
        session::logout();
    }
}

?>