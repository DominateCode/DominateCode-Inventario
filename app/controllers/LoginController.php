<?php
namespace app\controllers;

use app\models\users;
use \Response;
use \session;

class LoginController{
    public function Main(){
        if (isset($_GET['form'])) {
            $register = "";
            $form = $_GET['form'];
            switch ($form) {
                case 'login':
                    if (isset($_POST["username"])) {
                        $register = Session::login($_POST["username"],$_POST["password"]);
                        echo $register;
                    }else{
                        echo 'false';
                    }
                    break;
                case 'register':
                    if (isset($_POST["username"])) {
                        $username = $_POST["username"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $cpasswd = $_POST["confirm_password"];
                        $register = Session::registrar_usuario($username,$email,$password,$cpasswd);
                        echo $register;
                    }else{
                        echo 'false';
                    }
                    break;
                default:
                    # code...
                    break;
            }
        }else{ 
            if(session::checklogin()){
                header("location: home");
            }else{
                Response::render("login",[]);
            } 
        }
    }
}

?>