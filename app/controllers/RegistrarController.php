<?php
  namespace app\controllers;

  //use app\models\User;
  
  use \Response;
class RegistrarController
{
    public function Main(){
        //Session::conexion();
        // Session::checklogin();

        // $register = "";

        // if (isset($_POST["username"])) {
        //     $username = $_POST["username"];
        //     $email = $_POST["email"];
        //     $password = $_POST["password"];
        //     $cpasswd = $_POST["confirm_password"];
        //     $register = Session::registrar_usuario($username,$email,$password,$cpasswd);
        // }
        // Response::render("registrar",["registrar_msj" => $register]);
    }

}


 /*
 para definir una variable ej:
     response::render("registrar",["greeting" => "hola mundo"]);
     
     y en la vista la usamos asi:

     <h1><?= $greeting ?> </h1>

     validacion en la vista:

     <?php if(!isset($greeting)){?>
         //la variable esta definida
        <h1><?= $greeting ?> </h1>
      <?php }else{
         //la viariable no esta definida
         <h1>Hola mundo</h1>
     } ?>
 */
?>