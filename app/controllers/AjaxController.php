<?php
namespace app\controllers;

use app\models\User;
use \Response;
use \common;
use \session;

class AjaxController{
    public function Main(){
        if (isset($_GET['form'])) {
            $register = "";
            $form = $_GET['form'];
            if ($form = 'login') {
                if (isset($_POST["username"])) {
                    $register = Session::login($_POST["username"],$_POST["password"]);
                    echo $register;
                }else{
                    echo 'false';
                }
            }elseif($form = 'registrar') {
                if (isset($_POST["username"])) {
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $cpasswd = $_POST["confirm_password"];
                    $register = Session::registrar_usuario($username,$email,$password,$cpasswd);
                }else{
                    echo 'false';
                }
            }
        }
    }
}

?>