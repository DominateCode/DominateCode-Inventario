<?php
namespace app\models;

use \Model ;

class users extends Model{
	//debemos definir los campos que estan en al base de datos pero antes de eso la tabla.

	protected $table = "username";
    protected $PrimaryKey = "uid";
    public $username;
    public $password;
    public $email;
    public $friend_count;
    public $profile_pic;
    
	//no definimos el id porque ya esta en $primaryKey en Model.php si tuvieramos otro tipo de id si lo definimos aqui
	
}

?>