<?php
use app\models\users;

class Session{

    private function __construct(){
        
    }

    public function checklogin(){
        if(isset($_SESSION["username"])){
            return true;
        }else{
            return false;
        }
    }

    public static function logout(){
        // Initialize the session
        //session_start();
        
        // Unset all of the session variables
        $_SESSION = array();
        
        // Destroy the session.
        session_destroy();
        
        // Redirect to login page
        header("location: login");
        exit;
    }
 
    public static function registrar_usuario($username,$email,$password,$confirm_password){
        $fk = "email";
        $msj_report = "";        
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = users::Find_fk($fk,$email);

        if($password != $confirm_password){
            $msj_report = 'Las contraseñas no coinciden';
        }else{
            if (Count($query) > 0) {
                $msj_report = 'La direccion de correo electronico ya esta registrada, intenta con otra direccion.';
            }elseif (Count($query) == 0) {
                $query = DB::conexion()->prepare("INSERT INTO pruebas.users (`username`, `password`, `email`, `friend_count`, `profile_pic`) VALUES (:username,:password_hash,:email,NULL,NULL)") or die(mysql_error());
                $query->bindParam("username", $username, PDO::PARAM_STR);
                $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                $query->bindParam("email", $email, PDO::PARAM_STR);
                $result = $query->execute();
                if ($result) {
                    $msj_report = 'true';
                } else {
                    $msj_report = 'error al registrar!';
                }
            }
        }
        return $msj_report;
    }

    public static function login($username,$password){
        $msj_report = "";
        $result = users::Find($username);
        if (!$result) {
            $msj_report = 'El usuario y/o contraseña no existe';
        }else{
            if (password_verify($password, $result->password)) {
                $_SESSION['username'] = $result->username;
                $msj_report = 'true';
            }else{
               $msj_report = 'Usuario o contraseña incorrecto</p>';
            }
        }
        return $msj_report;
    }
}

?>