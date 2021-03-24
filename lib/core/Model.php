<?php
//manejador de base de datos alternativo a illuminate
class Model{
	//clase modelo basico
	
	public static function consulta($sql){
		$model = new static();
		return DC::Query($sql,[]);
	}

	public static function Select(){
		//como es una clase extendida vamos a instanciarla a nosotros mismos
		$model =  new static();

		$sql = "select * from ".$model->table;
		$params = [];
		$result = DB::Query($sql,$params);
		return $result;
	}

	public static function Insert($campos,$valores){
		$model = new static();
		$sql = "insert into ".$model->table."(".$campos.") value (".$valores.")";
		common::console_log($sql);
		$params = [];
		DB::Query($sql,$params);
	}

	public static function Find($id){
		//como es una clase extendida vamos a instanciarla a nosotros mismos
		$model =  new static();

		$sql = "select * from ".$model->table." where ".$model->PrimaryKey." = :id";
		$params = ["id" => $id];
		$result = DB::Query($sql,$params)[0];
		
		//una ves los datos cargados vamos a llenar los datos del modelo con los datos que devuelva del modelo.

		foreach ($result as $key => $value) {
			$model -> $key = $value; 
		}
		return $model;
	}

	public static function Find_fk($fk,$id){
		//como es una clase extendida vamos a instanciarla a nosotros mismos
		$model =  new static();

		$sql = "select * from ".$model->table." where ".$fk." = :id";
		$params = ["id" => $id];
		$result = DB::Query($sql,$params);
		return $result;
	}
}
?>