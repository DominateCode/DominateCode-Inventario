<?php
namespace app\controllers;

//use app\models\User;
use \Response;

class HomeController
{
    public function Main(){
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
            switch ($page) {
                case 'about':
                    $this->about();
                    break;
                case 'dashboard':
                    $this->dashboard();
                    break;
                case 'perfil':
                    $this->perfil();
                    break;
            }
        }else{
            Response::render("Home",[]);
        }
    }

    public function dashboard(){
        Response::render("dashboard",[]);
    }

    public function perfil(){
        Response::render('perfil',[]);
    }

    public function about(){
        Response::render('about',[]);
    }
}

?>