<?php
namespace app\models;

use \Model ;

class Sistema extends Model{
	//debemos definir los campos que estan en al base de datos pero antes de eso la tabla.

	protected $table = "sistema";
    protected $PrimaryKey = "nombre";
    public $nombre;
    public $valor;
    
	//no definimos el id porque ya esta en $primaryKey en Model.php si tuvieramos otro tipo de id si lo definimos aqui
	
}

/* 
en caso de usar el manejador alternativo:

class User extends Model{
	//debemos definir los campos que estan en al base de datos pero antes de eso la tabla.

	protected $table = "User";

	public $name;
	public $age;
	public $email;
	//no definimos el id porque ya esta en $primaryKey en Model.php si tuvieramos otro tipo de id si lo definimos aqui
	
}

en el controlador:

	$User = User::Find(1);
	Response::render("home",["name" => $User->name,"age" => $User->age,"email" =>$User->email]);

en la vista:

	<p>Hola <?= $name ?></p>

*/
?>