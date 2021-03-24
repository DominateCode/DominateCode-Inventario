<?php
namespace app\controllers;

//use app\models\User;

use \Response;
class AboutController
{
    public function Main(){
        Response::render("about",[]);
    }

}
?>